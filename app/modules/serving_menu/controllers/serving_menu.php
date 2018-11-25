<?php
class ServingMenu extends AdminController
{
	//private $homeModel;
	
	function __construct()
	{
		parent::__construct();
		$this->module = 'serving_menu';
		//$this->Auth();
		//$this->homeModel = $this->LoadModel('app_pictures', 'pictures');
		
		$this->pageId = 'serving_menu';
		$this->translationPrefix = $this->pageId;
		$basePath = $this->GetBasePath();
		$categoriesMapPath = $basePath.'system/lib/dbutils/categories_map.php';
		$productCategoriesMapPath = $basePath._APPLICATION_FOLDER.'lib/categories_map/product_categories_map.php';
		$this->IncludeClasses(array($categoriesMapPath, $productCategoriesMapPath));
	}
	
	function GetViewData($query = '')
	{		
		$dataSearch = $this->GetQueryItems($query, array());
		// page initializations

		array_push($this->webpage->StyleSheets,
		 'theme/css/pearl-restaurant.css',
		 'theme/css/bootstrap.css',
		 'theme/fonts/pearl-icons.css',
		 'theme/css/default-color.css',
		 'theme/css/dropmenu.css', 
		 'theme/css/sticky-header.css', 
		 'theme/css/countdown.css', 
		 'theme/css/settings.css', 
		 'theme/css/extralayers.css', 
		 'theme/css/owl.carousel.css', 
		 'theme/css/date-pick.css', 
		 'theme/css/form-dropdown.css', 
		 'theme/css/jquery.mmenu.all.css', 
		 'theme/css/loader.css');

		array_push($this->webpage->ScriptsFooter, 
			'theme/jquery.mmenu.min.all.js', 
			'theme/scroll-desktop.js',   
			'theme/scroll-desktop-smooth.js',
			'theme/jquery.themepunch.revolution.min.js', 
			'theme/jquery.themepunch.tools.min.js', 
			'theme/parallax.js', 
			'theme/countdown.js', 
			'theme/owl.carousel.js', 
			'theme/cart-detail.js', 
			'theme/form-dropdown.js', 
			'theme/classie.js', 
			'theme/jquery-ui-1.10.3.custom.js', 
			'theme/custom.js', 
			'theme/revolution-slider.js',
			'lib/validator/jquery.validate.min.js',
			'lib/wrappers/validator/validator.js',
			'lib/toastr/toastr.min.js', 
			_JS_APPLICATION_FOLDER.'default_init.js',
			_JS_APPLICATION_FOLDER.'contact/contact_form.js');
		parent::SetWebpageData($this->pageId);
		
		// if search
		//$this->webpage->RedirectPostToGet($this->webpage->PageUrl, 'actionSearch', '1', array('txtSearch'), array('search'));
	
		$form = new Form();
		
		$formData = $form->data;
		$this->ProcessFormAction($formData);
		$dataSearch->languageId = $this->languageId;
				
		//$this->webpage->PageHeadTitle = $this->trans[$this->translationPrefix.'.page_title'];
		$data = new stdClass();
		$categoriesMap = ProductCategoriesMap::GetInstance();
		$categoriesMap->MapCategories();
		$productCategories = $categoriesMap->GetCategoryItemByUrlKey($query);
		if (!$productCategories) {
			$this->webpage->Redirect($this->GetRelativePath(''));
		}
		
		// $limit = $this->GetPagingCode($data, $recordsCount);
		// return $this->categoriesModel->GetRecordsList($dataSearch, $orderBy, $limit);
		//echo'<pre>';print_r($categoryId);echo'</pre>';die;
				
		//echo'<pre>';print_r($data->productCategories);echo'</pre>';die;

		/*if ($data->productCategories){
			$data->productCategories = $categoriesMap->GetCategoryChildrenList($data->productCategories->id);
			if(!$data->productCategories){
				$data->productCategories = $categoriesMap->GetproductCategoriesById($data->productCategories->id);
			}
		}*/

		if(is_object($productCategories)){

			
			$data->productCategories = $productCategories;
			$this->webpage->PageTitle.=' '.ucfirst($data->productCategories->name);
			$this->FormatRow($data->productCategories, $categoriesMap);


		}
		//echo'<pre>';print_r($this->webpage->PageTitle);echo'</pre>';die;
		if(is_array($productCategories)){
			$data->productCategories = $productCategories;
			if($data->productCategories[0]->parent_id){
				$this->webpage->PageTitle.=' '.ucfirst($data->productCategories[0]->parentRef->name);
			}
			else{
				$this->webpage->PageTitle.=' '.ucfirst($data->productCategories[0]->name);
			}
			$this->FormatRows($data->productCategories, $categoriesMap);
		}
		
		
		
   		
		//echo'<pre>';print_r($data->productCategories);echo'</pre>';die;

		$data->PageTitle = $this->webpage->PageTitle;
		//echo'<pre>';print_r($data->PageTitle);echo'</pre>';die;
		
		$this->webpage->AppendQueryParams($this->webpage->PageUrl);
		return $data;
	}
	
	function ProcessFormAction(&$formData)
	{
		//echo '<pre>'; print_r($formData); echo '</pre>'; die;
		switch($formData->Action)
		{
			case 'GetServingMenu':
				$id = (int)$formData->Params;
				$formData->menuId = $id;
			break;
		}
	}

	function FormatRows(&$productCategories, $categoriesMap, $categoryId = 0)
	{
		$categoryChildrenList = array();
		foreach ($productCategories as $key=>&$row)
		{
			if ($row->DirectChildrenCount > 0 && $row->status > 0 && $row->display_separate_status == 0)
			//get only active meniu categories => status = 1 ; display_separate_status = 0 
			{
				$categoryChildrenList[$key] = $categoriesMap->GetCategoryChildrenList($row->id);
			}
			else{
				if($row->parentRef->status > 0 && $row->status > 0 && $row->display_separate_status == 0){ 
					//get only active meniu categories => status = 1 ; display_separate_status = 0
					$categoryChildrenList[$key] = $row;
				}
				
			}
		}
		$productCategories = $categoryChildrenList;
		//echo'<pre>';print_r($productCategories);echo'</pre>';die;
	}

	function FormatRow(&$productCategories, $categoriesMap)
	{
		if ($productCategories->display_separate_status == 1){ 
			//get only active meniu categories => status = 1 ; display_separate_status = 0
			return $productCategories=null;
		}
		if ($productCategories->DirectChildrenCount > 0 && $productCategories->status > 0 )
		//get only active meniu categories => status = 1 ; display_separate_status = 0   
		{
			$categoryChildrenList = $categoriesMap->GetCategoryChildrenList($productCategories->id);
			$productCategories = $categoryChildrenList;
		}
		return $productCategories;
		
	}
}
?>
