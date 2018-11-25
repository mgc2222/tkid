<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php include(_APPLICATION_FOLDER.'blocks/html_head_block.php'); ?>
<body class="<?php echo $webpage->BodyClasses?>">
<div id="page" class="">
    <div id="header-content" class="">
        <div id="header-content-inner">
			<?php include(_APPLICATION_FOLDER.'blocks/header.php'); ?>
			<main id="main-wrapper">
				<form id="mainForm" method="post" action="" <?php echo $webpage->FormAttributes?>>	
				<?php if ($webpage->Message!='') { ?>
					<div class="system_message <?php echo $webpage->MessageCss?>"><span><?php echo $webpage->Message?></span></div><?php } ?>
				<?php if ($webpage->ContentInclude != null)
				{
					foreach ($webpage->ContentInclude as $contentInclude)
					{
						include($contentInclude);
					}
				}
				?>
					<?php echo $webpage->FormHtml; ?>
				</form>
			</main>
		</div>
	</div>
	<?php include(_APPLICATION_FOLDER.'blocks/footer.php')?>
	<?php include(_APPLICATION_FOLDER.'blocks/back_to_top.php');?>
</div>


<?php include(_APPLICATION_FOLDER.'blocks/html_footer_scripts.php'); ?>
</body>
</html>