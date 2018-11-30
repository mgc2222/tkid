<?php if (!isset($webpage)) die('Direct access not allowed');?>
						        
<!-- Start Navigation Menu -->
<div class="menu-main-menu-container" id="main-menu-container">
    <ul id="primary-menu" class="menu">
        <li id="menu-item-30" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-20 menu-item-has-children menu-item-30 menu-item-for-page-20">
            <a href="#section-home"><?php echo $trans['navigation.home'];?></a>
        </li>
        <?php if(false){?>
        <li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-28 menu-item-for-page-2">
            <a href="#section-events">Pages</a>
            <ul class="sub-menu">
                <li id="menu-item-133" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-133 menu-item-for-page-2"> <a href="sample-page.html">Typography</a> </li>
                <li id="menu-item-131" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-131 menu-item-for-page-121"> <a href="sample-page-blank-page.html">Blank Page</a> </li>
                <li id="menu-item-130" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-130 menu-item-for-page-124"> <a href="sample-page-footer-widgets.html">Footer Widgets</a> </li>
                <li id="menu-item-132" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-132 menu-item-for-page-117"> <a href="sample-page-left-sidebar.html">Left Sidebar</a> </li>
                <li id="menu-item-138" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-138 menu-item-for-page-134"> <a href="sample-page-normal-title.html">Normal Title</a> </li>
            </ul>
        </li>
        <?php }?>
        <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 menu-item-for-page-10"> <a href="#section-about"><?php echo $trans['navigation.about'];?></a> </li>
        <li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29 menu-item-for-page-12"> <a href="#section-events"><?php echo $trans['navigation.events'];?></a> </li>
        <li id="menu-item-26" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26 menu-item-for-page-16"> <a href="#section-gallery"><?php echo $trans['navigation.gallery'];?></a> </li>
        <li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25 menu-item-for-page-18"> <a href="#section-contact"><?php echo $trans['navigation.contact'];?></a> </li>
    </ul>
</div>