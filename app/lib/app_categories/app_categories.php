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
		$filePathThumb = _SITE_ADMIN_URL.'app_thumb/';
		$filePath = _SITE_ADMIN_URL.'render_app_image/';

		foreach ($rows as &$row) {
			$row->imagePath = $filePath.$row->app_category_id.'/'.$row->file;
            $fileNameNoExtension =  substr($row->file,  0, -(strlen($row->extension) + 1));
            $row->thumb = $filePathThumb.$row->app_category_id.'/'.$fileNameNoExtension.'-120x120.'.$row->extension;
            $row->thumb_med = $filePathThumb.$row->app_category_id.'/'.$fileNameNoExtension.'-300x200.'.$row->extension;

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
