<!DOCTYPE html>
<html lang="<?php echo $webpage->languageAbb?>">
<?php include(_APPLICATION_FOLDER.'blocks/html_head_block.php'); ?>
<body class="<?php echo $webpage->BodyClasses?>">
<noscript><div class="talign-center"><strong><?php echo $trans['javascript.disabled_message'];?></strong></div></noscript>
<div id="page" class="">
    <div id="header-content" class="">
        <div id="header-content-inner">
			<?php include(_APPLICATION_FOLDER.'blocks/header.php'); ?>
        </div>
    </div>
    <main id="main-wrapper">
        <div id="main-content" class="site-content-full inner-content-width">
            <!--<div id="primary" class="content-area">
                <div id="main" class="site-main">-->
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
                <!--</div>
            </div>-->
        </div>
    </main>
	<?php include(_APPLICATION_FOLDER.'blocks/footer.php')?>
	<?php include(_APPLICATION_FOLDER.'blocks/back_to_top.php');?>
</div>


<?php include(_APPLICATION_FOLDER.'blocks/html_footer_scripts.php'); ?>
</body>
</html>