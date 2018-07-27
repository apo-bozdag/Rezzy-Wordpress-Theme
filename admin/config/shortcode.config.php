<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------

// -----------------------------------------
// Simple Shortcode Examples               -
// -----------------------------------------
$options[]     = array(
  'title'      => 'Bilgi Oluştur',
  'shortcodes' => array(

	array(
      'name'      => 'bilgikutusu',
      'title'     => 'Bilgi Kutusu Oluştur',
      'fields'    => array(
		array(
          'id'    => 'color',
          'type'  => 'color_picker',
          'title' => 'Kutu Rengi',
        ),
		array(
          'id'    => 'content',
          'type'  => 'textarea',
          'title' => 'Kutu İçeriği',
        ),


      ),
    ),
    // end: shortcode
    
  ),
);
CSFramework_Shortcode_Manager::instance( $options );