<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <?php echo cs_get_option('google-analytics-ve-adsense-kodu'); ?>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<meta property="og:site_name" content="<?php echo cs_get_option('site-ismi'); ?>" />
	<meta property="og:description" content="<?php echo cs_get_option('site-aciklama'); ?>" />
	<meta name="keywords"  content="<?php echo cs_get_option('site-keywords'); ?>" />
    <title><?php wp_title('-', true, 'right'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js/bootstrap.min.js" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/mobil-style.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/rezzy.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/mobil.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php echo cs_get_option('head-arasina-eklenecek-kodlar-ust'); ?>
	<?php wp_head(); ?>
</head>
<?php include "ozellikler/style-degistirici.php"; ?>
	   <div class="header-2">
	    <div class="container">
		  <a href="<?php bloginfo('url'); ?>" ><div class="header-2-logo-yazi">
		    <?php echo cs_get_option ('site-logosu-yazi'); ?>
		  </div></a>
		  <div class="header-2-menu">
		    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		  </div>
		</div>
		<div class="container">
		<div class="header-2-sag-menu ">
<button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
  <?php if(function_exists(clean_custom_menus_right())) clean_custom_menus_right(); ?>
</ul></div>
	  </div>
	  </div>

	<?php echo cs_get_option('head-arasina-eklenecek-kodlar-alt'); ?>
	<!-- Reklam Alanı -->
	  <div style="padding-left:1px;" class="container">
		<?php if (cs_get_option('header-alti-reklam')): ?>
			<div class="reklam-kodu header-reklam-kodu"><?php echo cs_get_option('header-alti-reklam-kodu'); ?></div>
		<?php endif ?>
		</div>
	<!-- Reklam Alanı Bitiş -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_url') ?>/ozellikler/adres-cubugu-degistir.js"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>