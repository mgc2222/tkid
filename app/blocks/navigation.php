<?php if (!isset($webpage)) die('Direct access not allowed');?>
						        
<!-- Start Navigation Menu -->
<div class="menu-main-menu-container" id="main-menu-container">
    <ul id="primary-menu" class="menu">
        <li id="menu-item-30" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-20 menu-item-has-children menu-item-30 menu-item-for-page-20">
            <a href="#section-home"><?php echo $trans['navigation.home'];?></a>
        </li>

        <li id="menu-section-about" class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="#section-about"><?php echo $trans['navigation.about'];?></a> </li>
        <li id="menu-section-events" class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="#section-events"><?php echo $trans['navigation.events'];?></a> </li>
        <li id="menu-section-calendar" class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="#section-calendar"><?php echo $trans['navigation.calendar'];?></a> </li>
        <li id="menu-section-gallery" class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="#section-gallery"><?php echo $trans['navigation.gallery'];?></a> </li>
        <li id="menu-section-contact" class="menu-item menu-item-type-post_type menu-item-object-page"> <a href="#section-contact"><?php echo $trans['navigation.contact'];?></a> </li>
        <?php /*if(false){*/?>
            <li id="translate-menu" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children ">
                <span id="translate-text"><i class="fa fa-language"></i> <?php echo $trans['navigation.select_language'];?></span>
                <?php if($webpage->languageDdl){
                ?>
                <ul class="sub-menu" style="width: 100%;margin: 0;">
                <?php
                    foreach ($webpage->languageDdl as $lang){
                    ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <button type="submit" style="width:100%" value="<?php echo $lang->id;?>" name="language"><?php echo $lang->abbreviation;?></button>
                        </li>
                    <?php
                    }
                }
                    ?>
                </ul>
            </li>
        <?php /*if(false){*/?>
        <?php /*}*/?>
    </ul>
</div>