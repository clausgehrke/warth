<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo IMG; ?>/warthartfavicon.png" />
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class=" grid grid-pad header">
  <div class="col-4-12">
    <a href="<?php echo HOME; ?>" title="Warth Art">
      <img alt="Warth Logo" src="<?php echo IMG; ?>/warthlogo.png">
    </a>
  </div>
  <div class="col-8-12">
    <div class="mobil-menu-button"><span></span></div>
    <div class="meta-nav">
      <?php wp_nav_menu( array('menu' => 'metamenu' ) ); ?>
    </div>
  </div>
  <div class="mainnav col-1-1">
    <nav>
      <?php wp_nav_menu( array('menu' => 'mainmenu' ) ); ?>
    </nav>
  </div>
  <div class="mobilnav col-1-1 trans-f">
    <nav>
      <?php // wp_nav_menu( array('menu' => 'mainmenu' ) ); ?>
      <?php // wp_nav_menu( array('menu' => 'metamenu' ) ); ?>
      <?php wp_nav_menu( array('menu' => 'mobilmenu' ) ); ?>

    </nav>
  </div>

</div>
      <?php /* TODO: mobil navigation 
        <p>
          <a href="#" id="trigger" class="menu-trigger">Open/Close Menu</a>
        </p> 
      */?>
       <?php /* <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu">
          <div class="mp-level">
            <h2 class="icon icon-world">All Categories</h2><!-- icon für warth W -->
            <ul>
              <li><a href="#">Home</a></li>
              <li class="icon icon-arrow-left">
                <a href="#">Galerie</a>
                <div class="mp-level">
                  <h2>Galerie</h2>
                  <a class="mp-back" href="#">back</a>
                  <ul>
                    <li >
                      <a href="#">Bilder</a>
<!--                      <div class="mp-level">
                        <h2>Mobile Phones</h2>
                        <a class="mp-back" href="#">back</a>
                        <ul>
                          <li><a href="#">Super Smart Phone</a></li>
                          <li><a href="#">Thin Magic Mobile</a></li>
                          <li><a href="#">Performance Crusher</a></li>
                          <li><a href="#">Futuristic Experience</a></li>
                        </ul>
                    </div> -->
                    </li>
                    <li class="icon icon-arrow-left">
                      <a href="#">Videos</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li><a href="#">Aktuelles</a></li>
              <li class="icon icon-arrow-left">
                <a href="#">Service</a>
                <div class="mp-level">
                  <h2>Service Navi</h2>
                  <a class="mp-back" href="#">back</a>
                  <ul>
                    <li><a href="#">bla</a></li>
                    <li >
                      <a href="#">Organisationen</a>
                    </li>
                    <li class="icon icon-arrow-left">
                      <a href="#">Videos</a>
                    </li>
                    <li class="icon icon-arrow-left">
                      <a href="#">Cameras</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul> 
          </div>
        </nav>
        */ ?>
        <!-- /mp-menu -->

