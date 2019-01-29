<?php 
class AppPicturesModel extends AbstractModel
{	
	function __construct()
	{
		parent::__construct();
		$this->table = 'app_images_meta';
		$this->tableImages = 'app_images';
		$this->primaryKey = 'id';
	}
	
	function GetSqlCondition(&$dataSearch)
	{
		$data = new stdClass();
		$data->cond = '';
		$data->join = '';
		
		if ($dataSearch == null) {
			return $data;
		}
		
		$cond = 'WHERE 1 ';
		$join = '';
		if (isset($dataSearch->search) && $dataSearch->search != '') {
			$cond = " AND name LIKE '%{$dataSearch->search}%'";
		}
		
		if (isset($dataSearch->status)) {
			$cond = " AND status = '{$dataSearch->status}'";
		}
		
		if (isset($dataSearch->cid) && $dataSearch->cid != '') {
			$join = " INNER JOIN {$this->tableProductCategories} pc ON pc.product_id = p.id AND pc.category_id = {$dataSearch->cid}";
		}

		$data->cond = $cond;
		$data->join = $join;
			
		return $data;
	}
	
	function GetAppInfo($appCategoryId)
	{
		//echo'<pre>';print_r($appCategoryId);echo'</pre>';die;
		$sql = 'SELECT a.name, COUNT(aim.app_image_id) as images_count
				FROM app_categories a
				LEFT JOIN {$this->table} aim ON a.id = aim.app_category_id
			WHERE a.id='.$appCategoryId;	
		return $this->dbo->GetFirstRow($sql);
	}

	function GetAppCategoryName($appCategoryId)
	{
		//echo'<pre>';print_r($appCategoryId);echo'</pre>';die;
		$sql = "SELECT name FROM app_categories WHERE id={$appCategoryId} LIMIT 1";
		return $this->dbo->GetFieldValue($sql); 
	}

	function GetAppCategoriesForDropDown()
	{
		$sql = "SELECT * FROM app_categories WHERE true";
		return $this->dbo->GetRows($sql);
	}

	function GetAppImageById($imageId)
	{
		//echo'<pre>';print_r($imageId);echo'</pre>';die;
		$cond = 'id='.$imageId;
		$sql = "SELECT * FROM {$this->tableImages} WHERE {$cond}"; 
		$row = $this->dbo->GetFirstRow($sql);
			
		return $row;
	}

	function GetAppImages($appCategoryId)
	{
		//echo'<pre>';print_r($appCategoryId);echo'</pre>';die;
		$cond = 'app_category_id='.$appCategoryId;
		$sql = "SELECT * FROM {$this->tableImages} WHERE {$cond}"; 
		$rows = $this->dbo->GetRows($sql);
			
		return $rows;
	}

	function GetAppImagesWithMeta($appCategoryId='')
	{
		//echo'<pre>';print_r($appCategoryId);echo'</pre>';die;
		$appCategoryId = ($appCategoryId) ? $appCategoryId : true;
		$cond = 'ai.app_category_id='.$appCategoryId;
		$sql = "SELECT * FROM {$this->tableImages} as ai
				INNER JOIN {$this->table} aim ON ai.id = aim.app_image_id
				WHERE {$cond} ORDER BY aim.order_index ASC"; 
		$rows = $this->dbo->GetRows($sql);
			
		return $rows;
	}

	function GetAppImageMetaIdByAppImageId($imageId)
	{
		//echo'<pre>IMAGE ID:';print_r($imageId);echo'</pre>';die;
		$sql = "SELECT id FROM {$this->table} WHERE app_image_id = {$imageId} LIMIT 1";
		return $this->dbo->GetFieldValue($sql); 
	}

}
?>