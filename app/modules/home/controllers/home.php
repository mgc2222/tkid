<?php
class Home extends AdminController
{
	private $homeModel;
	
	function __construct()
	{
		parent::__construct();
		$this->module = 'home';
		//$this->Auth();
		$this->homeModel = $this->LoadModel('app_pictures', 'pictures');

		$basePath = $this->GetBasePath();
		$appCategoriesPath = $basePath._APPLICATION_FOLDER.'lib/app_categories/app_categories.php';
		$categoriesMapPath = $basePath.'system/lib/dbutils/categories_map.php';
		$productCategoriesMapPath = $basePath._APPLICATION_FOLDER.'lib/categories_map/product_categories_map.php';
		$this->IncludeClasses(array($appCategoriesPath, $categoriesMapPath, $productCategoriesMapPath));

		$this->pageId = 'home';
		$this->translationPrefix = 'home';
	}
	
	function GetViewData($query = '')
	{		
		$dataSearch = $this->GetQueryItems($query, array('search'));
		// page initializations

		array_push($this->webpage->StyleSheets,
			/*'theme/css/plugin/styles.css',
	        'theme/css/plugin/dtbaker-woocommerce.css',
	       	'theme/css/plugin/woocommerce-layout.css',
	        'theme/css/plugin/woocommerce-smallscreen.css',
	        'theme/css/plugin/woocommerce.css',
			'theme/fonts/icons demo/demo-files/demo.css',
	        

	        'theme/css/plugin/socicon.css',
	        'theme/css/plugin/genericons.css',
	        'theme/css/plugin/font-awesome.min.css',
	        'theme/css/system/dashicons.min.css',
	        'theme/css/plugin/elementor-icons.min.css',
	        'theme/css/plugin/animations.min.css',
	        'theme/css/plugin/frontend.min.css',
	        'theme/css/content/post-20.css',
	        'theme/css/theme/style.prettyPhoto.css',
	        'theme/css/theme/style.normalize.css',
	        'theme/css/theme/style.clearings.css',
	        'theme/css/theme/style.typorgraphy.css',
	        'theme/css/theme/style.widths.css',
	        'theme/css/theme/style.elements.css',
	        'theme/css/theme/style.forms.css',
	        'theme/css/theme/style.page_background.css',
	        'theme/css/theme/style.header_logo.css',
	        'theme/css/theme/style.navigation.css',
	        'theme/css/theme/style.accessibility.css',
	        'theme/css/theme/style.alignments.css',
	        'theme/css/theme/style.widgets.css',
	        'theme/css/theme/style.sidebar.css',
	        'theme/css/theme/style.footer.css',
	        'theme/css/theme/style.blog.css',
	        'theme/css/theme/style.content.css',
	        'theme/css/theme/style.infinite_scroll.css',
	        'theme/css/theme/style.media.css',
	        'theme/css/theme/style.plugins.css',
	        'theme/css/theme/style.cf7.css',
	        'theme/css/theme/style.color.css',
	        'theme/css/theme/style.woocommerce.css',
	        'theme/css/theme/style.layout.css',
			'theme/css/theme/style.back_to_top.css',
	        'theme/css/content/34ff2b96c4deb0896841c73b9b9f43a7.css'*/
	        'theme/css/stylesheet.css',
	        'theme/css/google-place-card.min.css'
	    );

		array_push($this->webpage->ScriptsFooter,
		    //'theme/jquery.form.min.js',

		    //'theme/scripts.js',
		    //'theme/dtbaker-woocommerce-slider.js',
		    //'theme/jquery.blockUI.min.js',
		    //'theme/woocommerce.min.js',
            //'theme/system/wp-embed.min.js',
            'theme/content/53cf86c741e21951c726ebe800a3241e.js',
		    //'theme/jquery.cookie.min.js',
		    //'theme/system/core.min.js',
		    //'theme/javascript.js',
		    'theme/navigation.js',
		    'theme/skip-link-focus-fix.js',
		    'theme/jquery.prettyPhoto.min.js',
		    'theme/jquery.prettyPhoto.init.min.js',
		    'theme/slick.min.js',
		    //'theme/waypoints.min.js',
		    'theme/frontend.min.js',
		    'theme/custom.js',
		    'theme/initMap.js',
		    'https://maps.google.com/maps/api/js?v=3&libraries=places&key='._GOOGLE_API_KEY.'&language='.$this->webpage->languageAbb.'&callback=initMap',
			//'app.js',
			//'lib/validator/jquery.validate.min.js',
			//'lib/wrappers/validator/validator.js',
			//'lib/toastr/toastr.min.js', 
			_JS_APPLICATION_FOLDER.'default_init.js');
			//_JS_APPLICATION_FOLDER.'contact/contact_form.js');
		parent::SetWebpageData($this->pageId);
		$this->webpage->SearchBlock = $this->GetGeneralBlockPath('search_block');
		$this->webpage->PageDescription = $this->trans['meta.description'];
		$this->webpage->PageKeywords = $this->trans['meta.keywords'];
		$this->webpage->FormAction = 'change_language';

		// if search
		//$this->webpage->RedirectPostToGet($this->webpage->PageUrl, 'actionSearch', '1', array('txtSearch'), array('search'));
	
		$form = new Form();
		
		$formData = $form->data;
		$this->ProcessFormAction($formData, $dataSearch);
		$dataSearch->languageId = $this->languageId;
				
		$this->webpage->PageHeadTitle = $this->trans[$this->translationPrefix.'.page_title'];
		$this->webpage->BodyClasses =
			'home page-template-default page page-id-20 page-id-10 page-parent wp-custom-logo site_color_white foliageblog_header_header1bottomlgpng foliageblog_header_bottom foliageblog_post_option_columns_1 foliageblog_page_option_title_show foliageblog_page_option_width_normal foliageblog_page_option_background_transparent elementor-default elementor-page';
		$appCategories = AppCategories::GetInstance();
		$data = new stdClass();
		$data->slider = $appCategories->GetAppCategoryDataById(1); //get slider data
		$appCategories->FormatAppImagesRows($data->slider->rows);
		$data->gallery = $appCategories->GetAppCategoryDataById(12); //get gallery data
		$appCategories->FormatAppImagesRows($data->gallery->rows);
		$data->events = $appCategories->GetAppCategoryDataById(5); //get events data
		$appCategories->FormatAppImagesRows($data->bannerUpcomingEvents->rows);
		/*$data->bannerTableReservation = $appCategories->GetAppCategoryDataById(6); //get banner table reservation data
		$appCategories->FormatAppImagesRows($data->bannerTableReservation->rows);*/

		/*$categoriesMap = ProductCategoriesMap::GetInstance();
   		$categoriesMap->MapCategories();
    	$data->productCategories = $categoriesMap->GetTreeList(0);
    	if(is_array($data->productCategories)){
    		$this->FormatRows($data->productCategories, $categoriesMap);
    	}
    	else{
    		$this->FormatRow($data->productCategories, $categoriesMap);
    	}*/
		//echo '<pre>'; print_r($data); echo '</pre>'; die;

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

	function FormatRows(&$productCategories, $categoriesMap)
	{
		$categoryChildrenList = array();
		//echo'<pre>';print_r($productCategories);echo'</pre>';die;
		foreach ($productCategories as $key=>&$row)
		{
			if ($row->DirectChildrenCount > 0  && $row->display_separate_status > 0 && $row->status > 0) 
			//get only active, separate meniu categories => status = 1 ; display_separate_status = 1
			{
				$categoryChildrenList[$key] = $categoriesMap->GetCategoryChildrenList($row->id);
			}
			else{
				if($row->display_separate_status > 0 && $row->status > 0){ 
				//get only active, separate meniu categories => status = 1 ; display_separate_status = 1
					$categoryChildrenList[$key] = $row;
				}
				
			}
		}
		//echo '<pre>'; print_r($productCategories); echo '</pre>'; die;
		$productCategories = $categoryChildrenList;
		//echo'<pre>';print_r($productCategories);echo'</pre>';die;
	}

	function FormatRow(&$productCategories, $categoriesMap)
	{

		if ($productCategories->display_separate_status == 0){ 
			//get only active, separate meniu categories => status = 1 ; display_separate_status = 1
			return $productCategories=null;
		}
		if ($productCategories->DirectChildrenCount > 0 && $productCategories->display_separate_status > 0 && $productCategories->status > 0)
		//get only active, separate meniu categories => status = 1 ; display_separate_status = 1
		{
			$categoryChildrenList = $categoriesMap->GetCategoryChildrenList($productCategories->id);
			$productCategories = $categoryChildrenList;
		}
		return $productCategories;
		//echo'<pre>';print_r($productCategories);echo'</pre>';die;
	}

	
}
?>
