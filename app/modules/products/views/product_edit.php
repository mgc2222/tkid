<?php if (!isset($webpage)) die('Direct access not allowed'); ?>
<div id="divErrors" class="system_message error"></div>

<div class="edit_wrapper">
	<table cellpadding="0" cellspacing="0" border="0" class="edit_table">
	<!-- <tr>
		<td><label for="ddlProducerId"><?php echo $trans['products.producer']?></td>
		<td><select class="form-control" id="ddlProducerId" name="ddlProducerId"><?php echo $dataView->producerList;?></select></td>
	</tr>
	-->
	<tr>
		<td><label for="txtModel"><?php echo $trans['products.model']?></td>
		<td><input type="text" class="form-control" id="txtModel" name="txtModel" value="<?php echo $dataView->txtModel?>" /></td>
	</tr>
	<tr>
		<td><label for="txtProductCode"><?php echo $trans['products.product_code']?></td>
		<td><input type="text" class="form-control" id="txtProductCode" name="txtProductCode" value="<?php echo $dataView->txtProductCode?>" /></td>
	</tr>
	<tr>
		<td><label for="txtName"><?php echo $trans['products.name']?></td>
		<td><input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $dataView->txtName?>" /></td>
	</tr>
	<tr>
		<td class="required"><?php echo $trans['general.url_key']?>:  &nbsp; &nbsp; <a href="javascript:;" title="<?php echo $trans['general.regenerate_url_key']?>" id="lnkRegenerateUrlKey" tabindex="-1"><i class="fa fa-refresh"></i></a></td>
		<td><input type="text" name="txtUrlKey" id="txtUrlKey" class="form-control" value="<?php echo $dataView->txtUrlKey?>" /></td>
	</tr>
	<tr>
		<td><label for="ddlCategoryId"><?php echo $trans['products.categories']?></td>
		<td>
			<div class="check-list">
			<?php echo $dataView->categoryList?>
			</div>
		</td>
	</tr>
	<tr>
		<td class="hidden"><label for="ddlCategoryId"><?php //echo $trans['products.sizes']?></td>
		<td class="hidden"> 
			<div class="check-list">
			<?php echo $dataView->sizeList?>
			</div>
		</td>
	</tr>
	<tr>
		<td><?php echo $trans['products.description']?>: </td>
		<td><textarea name="txtDescription"  id="txtDescription" class="tinymce" rows="20" cols="60"><?php echo $dataView->txtDescription?></textarea></td>
	</tr>
	<tr>
		<td><label for="txtPrice"><?php echo $trans['products.price']?></td>
		<td><input type="text" class="form-control" id="txtPrice" name="txtPrice" value="<?php echo $dataView->txtPrice?>" style="width:100px" /></td>
	</tr>
	<tr>
		<td><label for="txtPriceBefore"><?php echo $trans['products.price_before']?></td>
		<td><input type="text" class="form-control" id="txtPriceBefore" name="txtPriceBefore" value="<?php echo $dataView->txtPriceBefore?>" style="width:100px" /></td>
	</tr>
	<tr>
		<td><label for="txtAmount"><?php echo $trans['products.amount']?></td>
		<td><input type="text" class="form-control" id="txtAmount" name="txtAmount" value="<?php echo $dataView->txtAmount?>" style="width:100px" /></td>
	</tr>
	
	</table>
</div>
<div class="grid_buttons">
<tr>
	<?php echo HtmlControls::GenerateFormButtons($trans['general.save'], 'frm.FormSaveData()', $webpage->PageReturnUrl, $trans['products.items_list'])?>
	<?php if ($dataView->EditId != 0) { 
		echo HtmlControls::GenerateFormButton($trans['products.images'], '', _SITE_RELATIVE_URL.'pictures/id='.$dataView->EditId); 
		echo HtmlControls::GenerateNewItemButton('products', $trans['products.new_item']);
	} ?> 
</div>