<?php if (!isset($webpage)) die('Direct access not allowed');?>
<header id="masthead" class="site-header">
    <!-- Template Section Start: template-parts/header-logo -->
    <div class="site-branding page-section" id="section-home">
        <!-- Start Logo Area -->
        <div id="logo">
            <a href="/" class="custom-logo-link" rel="home">
                <img width="292" height="131" src="images/content/logo.png" class="custom-logo" alt="" />
                <img width="200" height="156" src="images/content/rocking-horse.png" class="custom-logo-2" alt="" />
            </a>

        </div>
        <!-- End Logo Area -->
        <div id="logo-aside">
            <img src="images/content/dreamcatcher.png" class="custom-logo-3" alt="" />
        </div>
        <div class="site-title">
            <div><h1><a href="/" rel="home">The Kid</a></h1></div>
        </div>
    </div>
    <div id="motto">
        <i><?php echo $trans['header.motto_content'];?></i>
        <?php /*echo '<pre>';print_r($webpage);die();*/?>
    </div>
    <!-- .site-branding -->
    <!-- Template Section End: template-parts/header-logo -->
    <!-- Template Section Start: template-parts/header-menu -->
    <section id="dtbaker-social-icons-widget-2" class="widget dtbaker-social-icons-widget vergeblog_widget vergeblog_widget_count_1">
        <h4 class="elementor-heading-title elementor-size-large page-section hidden-true">
            <?php echo $trans['header.section_contact_hidden_heading'];?>
        </h4>
        <ul class="dtbaker-social-icons-list dtbaker-social-icons-list--without-canvas dtbaker-social-icons-list--rounded dtbaker-social-icons-list--no-labels">
            <li class="dtbaker-social_icons-list__item">
                <a class="dtbaker-social_icons-list__link" href="https://www.facebook.com/theKIDplayground" target="_blank" rel=”noreferrer noopener”> <span class="socicon socicon-facebook" style="color:#b2b2b2"></span> </a>
            </li>
            <!--<li class="dtbaker-social_icons-list__item">
                <a class="dtbaker-social_icons-list__link" href="https://tweeter.com/" target="_blank" rel=”noreferrer noopener”> <span class="socicon socicon-twitter" style="color:#b2b2b2"></span> </a>
            </li>
            <li class="dtbaker-social_icons-list__item">
                <a class="dtbaker-social_icons-list__link" href="https://www.instagram.com/" target="_blank" rel=”noreferrer noopener”> <span class="socicon socicon-instagram" style="color:#b2b2b2"></span> </a>
            </li>-->
            <li class="dtbaker-social_icons-list__item">
                <a class="dtbaker-social_icons-list__link" href="mailto:contact@tkid.ro" target="_blank"> <span class="fa fa-envelope" style="color:#b2b2b2"></span> </a>
            </li>
            <li class="dtbaker-social_icons-list__item">
                <a class="dtbaker-social_icons-list__link" href="tel:+40729577854" target="_blank" rel=”noreferrer noopener”> <span class="fa fa-phone" style="color:#b2b2b2"></span> </a>
            </li>
        </ul>
    </section>
    <div id="main-navigation-wrap" class="">
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" type=button aria-controls="primary-menu" aria-expanded="false"><span id="hamburger-bars"><i class="fa fa-bars"></i></span></button>
            

<?php 
// Include our global navigation code for menu generation:
include(_APPLICATION_FOLDER.'blocks/navigation.php');
//include( '_navigation.php' );
?>


        </nav>
        <!-- #site-navigation -->
    </div>
    <!-- Template Section End: template-parts/header-menu -->
</header>