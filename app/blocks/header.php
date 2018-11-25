<?php if (!isset($webpage)) die('Direct access not allowed');?>
<header id="masthead" class="site-header">
    <!-- Template Section Start: template-parts/header-logo -->
    <div class="site-branding">
        <!-- Start Logo Area -->
        <a href="/" class="custom-logo-link" rel="home" itemprop="url">
            <img width="292" height="131" src="images/content/logo.png" class="custom-logo" alt="" itemprop="logo" />
        </a>
        <!-- End Logo Area -->
        <div class="site-title">
            <div><a href="/" rel="home">The Kid</a></div>
        </div>
    </div>
    <!-- .site-branding -->
    <!-- Template Section End: template-parts/header-logo -->
    <!-- Template Section Start: template-parts/header-menu -->
    <div id="main-navigation-wrap" class="">
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Menu</button>
            

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