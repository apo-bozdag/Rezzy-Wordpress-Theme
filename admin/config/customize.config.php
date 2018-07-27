<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$options              = array();

$options[]            = array(
  'name'              => 'rezzy-hakkinda',
  'title'             => 'Rezzy WordPress Teması Hakkında',
  'settings'          => array(
  
    array(
      'name'          => 'rezzy_ozellestirici',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'content',
          'content'   => 'Bu tema Abdulkadir Kaya tarafından yapılmıştır. 0 dan baştan sonra kendi yaparak satışa sunulmuştur.',
        ),
      ),
    ),
	array(
      'name'          => 'rezzy_ozellestirici-2',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'content',
          'content'   => 'Aşağıdaki isimleri bulunan için yardım edildiği kişilerdir.',
        ),
      ),
    ),
    array(
      'name'          => 'rezzy_ozellestirici-yardim-1',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'content',
          'content'   => 'Burak Dündar - Slider Çalışması',
        ),
      ),
    ),
	array(
      'name'          => 'rezzy_ozellestirici-yardim-2',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'content',
          'content'   => 'Baran Somaklı - index.php Çalışması',
        ),
      ),
    ),
	array(
      'name'          => 'rezzy_ozellestirici-yardim-3',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'notice',
          'content'   => 'Mustafa Küçük - Codestar Framework',
        ),
      ),
    ),
	array(
      'name'          => 'rezzy_ozellestirici-yardim-3',
      'control'       => array(
        'type'        => 'cs_field',
        'options'     => array(
          'type'      => 'notice',
          'content'   => 'Bazı kişiler YouTube den kişilerdir.',
        ),
      ),
    ),
  )
);

CSFramework_Customize::instance( $options );