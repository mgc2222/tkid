<?php
class Home extends AdminController
{
    private $homeModel;
    private $categoriesModel;

    function __construct()
    {
        parent::__construct();
        $this->module = 'home';
        //$this->Auth();
        $this->homeModel = $this->LoadModel('app_pictures', 'pictures');
        $this->categoriesModel = $this->LoadModel('categories', 'categories');
        $basePath = $this->GetBasePath();
        $appCategoriesPath = $basePath._APPLICATION_FOLDER.'lib/app_categories/app_categories.php';
        $categoriesMapPath = $basePath.'system/lib/dbutils/categories_map.php';
        //$productCategoriesMapPath = $basePath._APPLICATION_FOLDER.'lib/categories_map/product_categories_map.php';
        $this->IncludeClasses(array($appCategoriesPath, $categoriesMapPath));

        $this->pageId = 'home';
        $this->translationPrefix = 'home';
    }

    function GetViewData($query = '')
    {
        $dataSearch = $this->GetQueryItems($query, array('search'));
        // page initializations

        array_push($this->webpage->StyleSheets,
            'cookieconsent/cookieconsent.min.css',
            //'bootstrap/bootstrap-2.3.2.css',
            //'bootstrap/bootstrap-responsive-2.3.2.css',
            'bootstrap/bootstrap.min.css',
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
        //'popper/popper.css'
        );

        array_push($this->webpage->StyleSheetsOutsideStyleFolder,
            'bootstrap_calendar/css/calendar.css',
            'bootstrap_calendar/css/custom.css'
        );

        array_push($this->webpage->ScriptsFooter,
            //'theme/jquery.form.min.js',
            //'lib/bootstrap/bootstrap-2.3.2.min.js',
            //'theme/scripts.js',
            //'theme/dtbaker-woocommerce-slider.js',
            //'theme/jquery.blockUI.min.js',
            //'theme/woocommerce.min.js',
            //'theme/system/wp-embed.min.js',
            'theme/content/53cf86c741e21951c726ebe800a3241e.js',
            //'theme/jquery.cookie.min.js',
            //'theme/system/core.min.js',
            //'theme/javascript.js',
            //_JS_OUTSIDE_JS_FOLDER.'bootstrap_calendar/components/moment/moment.min.js',
            _JS_OUTSIDE_JS_FOLDER.'bootstrap_calendar/components/underscore/underscore-min.js',
            _JS_OUTSIDE_JS_FOLDER.'bootstrap_calendar/components/jstimezonedetect/jstz.min.js',
            _JS_OUTSIDE_JS_FOLDER.'bootstrap_calendar/js/language/ro-RO.js',
            _JS_OUTSIDE_JS_FOLDER.'bootstrap_calendar/js/calendar.js',
            _JS_OUTSIDE_JS_FOLDER.'bootstrap_calendar/js/app.js',


            //'lib/popper/popper.min.js',
            //'theme/popper-init.js',
            'theme/navigation.js',
            //'theme/skip-link-focus-fix.js',
            'theme/jquery.prettyPhoto.min.js',
            'theme/jquery.prettyPhoto.init.js',
            'theme/slick.min.js',
            'theme/frontend.min.js',
            'theme/scroll-smooth.js',
            'theme/custom.js',
            //'theme/waypoints.min.js',

            'theme/initMap.js',
            'theme/google-map-init.js',
            'https://maps.google.com/maps/api/js?v=3&libraries=places&key='._GOOGLE_API_KEY.'&language='.$this->webpage->language->abbreviation.'&callback=initMap',
            //'lib/validator/jquery.validate.min.js',
            //'lib/wrappers/validator/validator.js',
            //'lib/toastr/toastr.min.js',
            _JS_APPLICATION_FOLDER.'default_init.js');
        //_JS_APPLICATION_FOLDER.'contact/contact_form.js');
        parent::SetWebpageData($this->pageId, '', '','','');
        $this->webpage->SearchBlock = $this->GetGeneralBlockPath('search_block');
        $this->webpage->PageDescription = $this->trans['meta.description'];
        $this->webpage->PageKeywords = $this->trans['meta.keywords'];
        $this->webpage->FormAction = '';
        $this->webpage->ScriptsHeader = array(
            'lib/cookieconsent/cookieconsent.min.js',
            'theme/cookie-consent-init.js');

        // if search
        //$this->webpage->RedirectPostToGet($this->webpage->PageUrl, 'actionSearch', '1', array('txtSearch'), array('search'));
        //$form = new Form();
        //$formData = $form->data;
        //$this->ProcessFormAction($formData, $dataSearch);
        $dataSearch->languageId = $this->languageId;

        $this->webpage->PageHeadTitle = $this->trans[$this->translationPrefix.'.page_title'];
        $this->webpage->BodyClasses =
            'home page-template-default page page-id-20 page-id-10 page-parent wp-custom-logo site_color_white foliageblog_header_header1bottomlgpng foliageblog_header_bottom foliageblog_post_option_columns_1 foliageblog_page_option_title_show foliageblog_page_option_width_normal foliageblog_page_option_background_transparent elementor-default elementor-page';
        $categorySliderId = $this->categoriesModel->GetCategoryIdByCategoryName('Slider');
        $categoryGalleryId = $this->categoriesModel->GetCategoryIdByCategoryName('Gallery');
        //$categoryEventsId = $this->categoriesModel->GetCategoryIdByCategoryName('Events');
        $appCategories = AppCategories::GetInstance();
        $data = new stdClass();

        $data->slider = $appCategories->GetAppCategoryDataById($categorySliderId); //get slider data
        $appCategories->FormatAppImagesRows($data->slider->rows);
        $data->gallery = $appCategories->GetAppCategoryDataById($categoryGalleryId); //get gallery data
        $appCategories->FormatAppImagesRows($data->gallery->rows);
        //$data->events = $appCategories->GetAppCategoryDataById($categoryEventsId); //get events data
        //$appCategories->FormatAppImagesRows($data->bannerUpcomingEvents->rows);

        $data->categoryContentAboutId = $this->categoriesModel->GetCategoryIdByCategoryName('Content About');
        $data->categoryContentEventsId = $this->categoriesModel->GetCategoryIdByCategoryName('Content Events');
        $data->categoryContentContactId = $this->categoriesModel->GetCategoryIdByCategoryName('Content Contact');
        $data->categoryContentMottoId = $this->categoriesModel->GetCategoryIdByCategoryName('Content Motto');

        $data->PageTitle = $this->webpage->PageTitle;

        $this->webpage->AppendQueryParams($this->webpage->PageUrl);
        return $data;
    }


}
?>
