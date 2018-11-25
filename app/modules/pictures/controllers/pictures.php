<?php
class Pictures extends AdminController
{
	protected $imagesModel;
	
	function __construct()
	{
		parent::__construct();
		$this->module = 'pictures';
		$this->pageId = $this->module;
		$this->translationPrefix = $this->module;
		
		$this->Auth();
		$this->imagesModel = $this->LoadModel('pictures');
	}
	
	function HandleAjaxRequest()
	{
		$data = $this->GetAjaxJson();
		$ajaxAction = $data['ajaxAction'];
		unset($data['ajaxAction']);
		
		$response = null;
		switch ($ajaxAction)
		{
			case 'save_order': 
				$saveId = $this->UpdateImagesOrder((int)$data['productId'], explode(',', $data['img_ids']));
				$this->UpdateProductDefaultImage((int)$data['productId']);
				$message = $this->trans[$this->translationPrefix.'.order_save_success'];
				$response = $this->GetDefaultResponse($message, $saveId);
			break;
		}
		
		if ($response != null)
		{
			$this->WriteResponse($response);
			die();
		}
	}
	
	function GetViewData($query = '')
	{
		$this->HandleAjaxRequest();
		
		$dataSearch = $this->GetQueryItems($query, array('id'));
		
		array_push($this->webpage->StyleSheets, 'jquery/jquery-ui-1.8.17.custom.css', 'tooltip/jquery.tooltip.css','upload/jquery.plupload.queue.css');
		array_push($this->webpage->ScriptsFooter, 'lib/jquery/jquery-ui-1.8.17.custom.min.js', 
		'lib/upload/plupload.full.js',
		'lib/upload/jquery.plupload.queue.js',
		'lib/tooltip/jquery.tooltip.min.js', 
		_JS_APPLICATION_FOLDER.$this->pageId.'/upload_images.js?id=4',
		_JS_APPLICATION_FOLDER.$this->pageId.'/pictures.js');
		parent::SetWebpageData($this->pageId);
		
		$this->webpage->FormAttributes = 'enctype="multipart/form-data"';
				
		$form = new Form('Save');
		$formData = $form->data;
		$formData->productId = (int)$dataSearch->id;
		if ($formData->productId == 0) {
			Session::SetFlashMessage($this->trans['products.no_elements'], _SITE_RELATIVE_URL.'products');
		}
		
		$this->ProcessFormAction($formData);
		
		$data = new stdClass();
		$data->product = $this->imagesModel->GetProductInfo($formData->productId);
		$data->rows = $this->imagesModel->GetProductImages($formData->productId);
		$this->FormatRows($formData->productId, $data->product->name, $data->rows);
		$data->productId = $formData->productId;
		$this->webpage->PageUrl = $this->webpage->AppendQueryParams($this->webpage->PageUrl);
		
		return $data;
	}		
	
	function FormatRows($productId, $productName, &$rows)
	{
		if ($rows == null) {
			return;
		}
		$productName = StringUtils::UrlTitle($productName);
		$filePath = _SITE_RELATIVE_URL.'product_thumb/'.$productName.'-';
		foreach ($rows as &$row) {
			$row->thumb = $filePath.$row->id.'-120x120.'.$row->extension;
			$row->thumb_med = $filePath.$row->id.'-320x240.'.$row->extension;
		}
	}
	
	function ProcessFormAction(&$formData)
	{
		switch($formData->Action)
		{
			case 'Save':
				$this->UploadImage('fileUpload', $formData->productId);
				$this->webpage->PageUrl = $this->webpage->AppendQueryParams($this->webpage->PageUrl);
				$this->UpdateProductDefaultImage($formData->productId);
				Session::SetFlashMessage('Imaginea a fost salvata', 'success', $this->webpage->PageUrl);
			break;
			case 'Delete':
				$path = $this->GetBasePath()._PRODUCT_IMAGES_PATH.$formData->productId.'/';
				$this->imagesModel->DeleteRecordWithFile((int)$formData->Params, $path);
				$this->webpage->PageUrl = $this->webpage->AppendQueryParams($this->webpage->PageUrl);
				$this->UpdateProductDefaultImage($formData->productId);
				Session::SetFlashMessage('Imaginea a fost stearsa', 'success', $this->webpage->PageUrl);
			break;
			case 'DeleteProductImages':
				$path = $this->GetBasePath()._PRODUCT_IMAGES_PATH.$formData->productId.'/';
				$this->imagesModel->DeleteProductImages($formData->productId, $path);
				$this->imagesModel->UpdateProductImagesMeta($formData->productId, true);
				$this->UpdateProductDefaultImage($formData->productId);
				$this->webpage->PageUrl = $this->webpage->AppendQueryParams($this->webpage->PageUrl);
				Session::SetFlashMessage('Imaginile au fost sterse', 'success', $this->webpage->PageUrl);
			break;
		}
	}
	
	function UploadImage($query = '')
	{
		$this->IncludeClasses(array('system/lib/files/file_upload.php'));
		$dataSearch = $this->GetQueryItems($query, array('productId'));
		$productId = $dataSearch->productId;
		$this->UploadProductImage('file', $productId);
		die();
	}
	
	function UploadProductImage($fileInputId, $productId)
	{
		$fileInfo = $this->GetFileInfo($fileInputId, $productId);
		$fileSavedData = $this->UploadFile($fileInputId, _PRODUCT_IMAGES_PATH.$productId, $fileInfo->fileName);
		
		if ($fileSavedData['status'])
		{ 
			$row = array('id'=>0, 'product_id'=>$productId, 'file'=>$fileInfo->fileName, 'order_index'=>$fileInfo->imageOrder, 'img_width'=>$fileSavedData['img_width'], 'img_height'=>$fileSavedData['img_height'], 'extension'=>$fileSavedData['extension']);
			$imageId = $this->imagesModel->SaveData($row);
			$this->imagesModel->UpdateProductImagesMeta($productId);
			return $imageId;
		}
		else 
		{
			$this->Message = 'Imaginea nu a fost salvata:'.$fileInfo->filePath.'.'.$fileSavedData['upload_message'];
			return 0;
		}
	}
	
	function GetFileInfo($fileInputId, $productId)
	{
		// image path is: _PRODUCT_IMAGES_PATH./{productId}/{productName}-X.{fileExtension}  , X = image index
		$productInfo = $this->GetProductInfo($productId);
		$productName = StringUtils::UrlTitle($productInfo->name);
		$imageOrder = $productInfo->images_count + 1;
		
		$fileNameBase = $productName.'-';
		
		// there may be cases when user deletes some images and the max order will be less than the order in the existing images name
		// therefor, check in a loop if the images already exists, and if so, increment the imageOrder and check again
		$filePath = '';
		$extension = $this->GetUploadedFileExtension($fileInputId);
		
		$fileName = $fileNameBase;
		
		$fileName .= $imageOrder.'.'.$extension;
		$filePath = _PRODUCT_IMAGES_PATH.$productId.$fileName;			
		
		$ret = new stdClass();
		$ret->fileName = $fileName;
		$ret->filePath = $filePath;
		$ret->imageOrder = $imageOrder;
		
		return $ret;
	}
	
	function GetProductInfo($productId)
	{
		return $this->imagesModel->GetProductInfo($productId);
	}
	
	function GetUploadedFileExtension($fileInputId)
	{
		$fileName = $_FILES[$fileInputId]['name'];
		$fileParts = pathinfo($fileName);
		return $fileParts['extension'];
	}
	
	function UploadFile($fileInputId, $fileFolder, $fileName)
	{
		$fileUpload = new FileUpload();
		$this->Message = '';
		
		$options = new stdClass();
		$options->fileMaxSize = '5000000';
		$options->allowedTypes = array('image/jpeg','image/pjpeg','image/gif','image/png','application/octet-stream');
		
		$imagePath = $fileFolder.'/'.$fileName;

		// save the original image
		$options->actions = array(
			array('action'=>'save_file', 'filePath'=>$imagePath)
		);
						
		$uploadOk = $fileUpload->ProcessUploadFile($fileInputId, $fileFolder, $fileName, $options);
		$ret = array('status'=>$uploadOk, 'file_name'=>$fileName, 'upload_message'=>$fileUpload->lastError, 'img_width'=>$fileUpload->ImageWidth, 'img_height'=>$fileUpload->ImageHeight, 'extension'=>$fileUpload->FileExtension);
		
		return $ret;
	}
	
	
	function UpdateImagesOrder($productId, $imageIdList)
	{
		if (!$imageIdList || count($imageIdList) == 0) return 0;
		$fields = array('id', 'order_index');
		
		$orderIndex = 1;
		$rows = array();
		foreach ($imageIdList as $imageId)
		{
			$row = array($imageId, $orderIndex);
			array_push($rows, $row);
			$orderIndex++;
		}
		
		$this->imagesModel->UpdateImagesOrder($productId, $fields, $rows);
		return 1;
	}
	
	function CropImage($imageId, $productId, $width, $height, $x, $y)
	{
		$row = $this->GetRecordByProductId($imageId, $productId);
		if ($row == null) return 0;
		
		$filePath = _PRODUCT_IMAGES_PATH.$productId.'/';
		$fileName = $row->image;

		$fileUpload = new FileUpload();
		
		$imagePath = $filePath.$fileName;
		
		$options = new stdClass();
		$options->actions = array(
			array('action'=>'crop_image',  'start_x'=>$x, 'start_y'=>$y, 'width'=>$width,'height'=>$height, 'filePath'=>$imagePath, 'quality'=>0.95)
		);
						
		$uploadOk = $fileUpload->ProcessFile($imagePath, $options);
		
		$this->UpdateImageSize($imageId, $width, $height);
		
		return $row->id;
	}

	private function UpdateProductDefaultImage($productId)
	{
		$row = $this->imagesModel->GetProductFirstImage($productId);
		if (!$row) {
			return;
		}
		$this->imagesModel->UpdateProductDefaultImage($productId, $row->id, $row->file);
	}
}
?>
