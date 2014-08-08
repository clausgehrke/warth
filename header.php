<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo IMG; ?>/warthartfavicon.png" />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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
  <div class="col-8-12 last">
    <div class="mobil-menu-button"><span></span></div>
    <div class="meta-nav">
      <?php

		// prepare language switcher
        if ( qtrans_getLanguage() == 'en' ) :
	        $lang = '<li class="language">';
	        $lang .= '<a class="flag qtrans_flag_en" href="' . qtrans_convertURL( home_url( '/' ), 'de' ) . '" title="' . __('Englisch', 'warth') . '">';
	        $lang .= __('Englisch', 'warth');
	        $lang .= '</a>';
	        $lang .= '</li>';
        else:
	        $lang = '<li class="language">';
	        $lang .= '<a class="flag qtrans_flag_de" href="' . qtrans_convertURL( home_url( '/' ), 'en' ) . '" title="' . __('Deutsch', 'warth') . '">';
	        $lang .= __('Deutsch', 'warth');
	        $lang .= '</a>';
	        $lang .= '</li>';
        endif;

        // meta nav with language switcher
        wp_nav_menu(
	        array(
		        'menu' => 'metamenu',
		        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $lang . '</ul>'
	        )
        );

      ?>
    </div>
  </div>
  <div class="mainnav col-1-1">
    <nav>
      <?php wp_nav_menu( array('menu' => 'mainmenu' ) ); ?>
    </nav>
  </div>
  <div class="mobilnav col-1-1 trans-f">
    <nav>
      <?php wp_nav_menu( array('menu' => 'mobilmenu' ) ); ?>
    </nav>
  </div>

</div>

