<?php
class PictureCrop extends AdminController
{
	protected $usedModel;
	function __construct()
	{
		parent::__construct();
		$this->module = 'pictures';
		$this->pageId = 'picture_crop';
		$this->translationPrefix = $this->pageId;
		
		$this->Auth();
	}
	
	function GetViewData($query = '')
	{
		$dataSearch = $this->GetQueryItems($query, array('id'));		
		$pictureId = (int)$dataSearch->id;
		$row = $this->GetPropertyImageData($pictureId);
		
		array_push($this->webpage->StyleSheets, 'crop/jquery.Jcrop.css');
		array_push($this->webpage->ScriptsFooter, 'lib/jquery/jquery-ui-1.8.17.custom.min.js', 'cache/properties_qs.js',
		'lib/crop/jquery.Jcrop.min.js',
		_JS_APPLICATION_FOLDER.$this->module.'/image_crop.js');
		parent::SetWebpageData($this->pageId);
		
		$this->webpage->FormAttributes = 'onsubmit="return checkCoords();"';
		$this->webpage->PageReturnUrl = _SITE_RELATIVE_URL.'images';

		$form = new Form('CropImage');
		$formData = $form->data;
		$formData->pictureId = $pictureId;
		
		$this->ProcessFormAction($formData);
		
		$data = $formData;
		$data->image = _SITE_RELATIVE_URL._PROPERTY_IMAGES_PATH.$row->city_name.'/'.$row->image;
		
		return $data;
	}
	
	function GetPropertyImageData($targetId)
	{
		$this->usedModel = $this->LoadModel('pictures');
		
		$row = null;
		$row = $this->usedModel->GetRecordById($targetId);
		if ($row == null) Session::SetFlashMessage('Poza nu a fost gasita', 'error', $this->webpage->PageReturnUrl);
		
		return $row;
	}
	
	function ProcessFormAction(&$formData)
	{
		switch($formData->Action)
		{
			case 'CropImage':
				$this->IncludeClasses(array('system/lib/files/file_upload.php'));
				$this->usedModel->CropImage($formData->pictureId, $this->auth->PropertyId, (int)$_POST['w'], (int)$_POST['h'], (int)$_POST['x'], (int)$_POST['y']);
				$this->UpdateImagesRanking($this->auth->PropertyId);
				$this->webpage->SetMessage('Imaginea a fost modificata.', 'success');
			break;
		}
	}
	
	function UpdateImagesRanking($propertyId)
	{
		$ctlPropertyRanking = $this->LoadController('property_ranking_compute', 'ranking');
		$ctlPropertyRanking->UpdatePropertyImagesRanking($propertyId);
	}
}
?>
