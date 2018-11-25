<?php
class Contact extends AdminController
{
	//private $homeModel;
	
	function __construct()
	{
		parent::__construct();
		$this->module = 'contact';
		//$this->Auth();
		//$this->homeModel = $this->LoadModel('app_pictures', 'pictures');
		
		$this->pageId = 'contact';
		$this->translationPrefix = $this->pageId;
	}
	
	function GetViewData($query = '')
	{		
		$dataSearch = $this->GetQueryItems($query, array('search'));
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
			//'theme/jquery.js',
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
			_JS_APPLICATION_FOLDER.'contact/contact_form.js',
			'theme/gmap3.min.js',
			'https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB');
			//'https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js',
			//<script type="text/javascript" src="plugins/gmap3.min.js"></script>
    		//<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
			/*'https://maps.googleapis.com/maps-api-v3/api/js/33/4/common.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/util.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/map.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/marker.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/infowindow.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/onion.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/controls.js',
			'https://maps.googleapis.com/maps-api-v3/api/js/33/4/stats.js',*/
			//'theme/google-map-init.js');
		parent::SetWebpageData($this->pageId);
		
		// if search
		//$this->webpage->RedirectPostToGet($this->webpage->PageUrl, 'actionSearch', '1', array('txtSearch'), array('search'));
	
		$form = new Form();
		
		$formData = $form->data;
		$this->ProcessFormAction($formData, $dataSearch);
		$dataSearch->languageId = $this->languageId;
				
		//$this->webpage->PageHeadTitle = $this->trans[$this->translationPrefix.'.page_title'];
		$data = new stdClass();
		//$appCategories = $this->LoadController('app_categories', 'front');
		//$data = $appCategories->GetAppCategoryDataById(1); //get slider data
		//$this->FormatAppImagesRows($data->rows);
		//echo '<pre>'; print_r($this->webpage); echo '</pre>'; die;

		$data->PageTitle = $this->webpage->PageTitle;
		
		$this->webpage->AppendQueryParams($this->webpage->PageUrl);
		return $data;
	}
	
	function ProcessFormAction(&$formData, &$dataSearch)
	{
		switch($formData->Action)
		{
			case 'Save':
				$permissionId = $this->homeModel->SaveRecord($formData, false);
				if ($permissionId != 0)
				{
					Session::SetFlashMessage($this->trans[$this->translationPrefix.'.save_success'], 'success', $this->webpage->PageUrl.'/'.$permissionId);
				}
				else
					$this->webpage->SetMessage($this->trans['general.save_error'], 'error');
			break;
			case 'Delete':
				$id = (int)$formData->Params;
				$this->homeModel->DeleteRecord($id);
				Session::SetFlashMessage($this->trans[$this->translationPrefix.'.delete_success'], 'success', $this->webpage->PageUrl);
			break;
			case 'DeleteSelected':
				$selectedRecords = $this->GetSelectedRecords();
				if ($selectedRecords != '')
				{
					$this->homeModel->DeleteSelectedRecords($selectedRecords);
					Session::SetFlashMessage($this->trans[$this->translationPrefix.'.delete_selected_success'], 'success', $this->webpage->PageUrl);
				}
				else $this->webpage->SetMessage($this->trans[$this->translationPrefix.'.error_selected_elements'], 'error');
			break;
			case 'SortColumn':
				$this->webpage->RedirectPostToGet($this->webpage->PageUrl, 'sys_Action', 'SortColumn', array('hidSortColumn_'.$this->pageId), array('sc'));
			break;
		}
	}

	function FormatAppImagesRows(&$rows)
	{
		if ($rows == null) {
			return;
		}
		$filePath = _SITE_ADMIN_URL.'render_app_image/';
		foreach ($rows as &$row) {
			$row->imagePath = $filePath.$row->app_category_id.'/'.$row->file;
		}
	}
}
?>
