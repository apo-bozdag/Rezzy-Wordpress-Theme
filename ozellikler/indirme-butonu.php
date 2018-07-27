<?php
/*
Plugin Name: İndirme Butonu
Plugin URI: https://ogulcanozugenc.com/
Author: Oğulcan Özügenç
Author URI: https://ogulcanozugenc.com/
Text Domain: download-buttons-for-stores
Domain Path: /languages/
Version: 1.0.7
*/

if ( ! defined( 'WPINC' ) ) {
	 die;
}

add_action('wp_enqueue_scripts', 'indir_scripts');
function indir_scripts()
{
  $vers = '1.0.7';
	wp_register_style('indir_css', plugins_url('includes/css/style.css', __FILE__), array(), $vers); 
	wp_register_style('indir_fa', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css', array()); 
}

function indir($atts)
	{
  wp_enqueue_style('indir_css');
  wp_enqueue_style('indir_fa');
                    
  $baslik = 0;
  $link = 0;
  $market = 0;

  $baslik = $atts['baslik'];
  $link = $atts['link'];
  $market = $atts['market'];
  
	if ($link !== 'link' && $market !== 'market' && $baslik !== 'title')
		{
		$out = "<p><div class=\"indirme-butonu\">
	<ul class=\"indirme-butonu__list\">
		<li class=\"indirme-butonu__item indirme-butonu__item--$market material-shadow--1dp\">
			<a href=\"$link\" class=\"ripple has-ripple\" target=\"_blank\" baslik=\"$baslik\">
				<span class=\"indirme-butonu__icon\"></span>
				<span class=\"indirme-butonu__title\">$baslik</span>
			</a>
		</li>
	</ul>
</div></p>";
  }
  return $out;
}
add_shortcode('indir', 'indir');