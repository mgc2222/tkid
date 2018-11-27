<?php
class AppCategories
{
	private static $instance;
	
	function __construct()
	{
		$this->dbo = DBO::global_instance();
	}
	
	// singleton
	static function GetInstance()
	{
		if (!isset(self::$instance)) 
		{
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
	}
	
	
	function GetAppCategoryDataById($appCategoryId = '')
	{		
		$data = new stdClass();
		$data->rows = $this->GetAppImagesWithMeta($appCategoryId);
		return $data;
	}
	function FormatAppImagesRows(&$rows)
	{
		if ($rows == null) {
			return;
		}
		//$filePath = _SITE_ADMIN_URL.'render_app_image/';
		$filePath = _SITE_ADMIN_URL.'files/app/';
		foreach ($rows as &$row) {
			$row->imagePath = $filePath.$row->app_category_id.'/'.$row->file;
		}
	}

	function GetAppImagesWithMeta($appCategoryId='')
	{
		$appCategoryId = ($appCategoryId) ? $appCategoryId : true;
		$cond = 'ai.app_category_id='.$appCategoryId;
		$sql = "SELECT * FROM app_images as ai
				INNER JOIN app_images_meta aim ON ai.id = aim.app_image_id
				WHERE {$cond} ORDER BY aim.order_index ASC"; 
		$rows = $this->dbo->GetRows($sql);
			
		return $rows;
	}
}
?>
