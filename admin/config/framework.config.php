<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Tema Ayarları',
  'menu_type'       => 'menu',
  'menu_slug'       => 'rezzy-settings',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Rezzy WordPress Blog Tema Ayarları <small>by Abdulkadir Kaya</small>',
);

$options        = array();

$options[]      = array(
  'name'        => 'genel-ayarlari',
  'title'       => 'Genel Ayarları',
  'icon'        => 'fa fa-cogs',

  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => 'Genel Ayarları',
    ),
	array(
      'id'      => 'site-ismi',
      'type'    => 'text',
      'title'   => 'Site İsmi ( SEO )',
	  'desc'    => 'Site Açıklamanız yazmak SEO açısından iyi olacaktır.',
    ),
	array(
      'id'      => 'site-aciklama',
      'type'    => 'text',
      'title'   => 'Site Açıklama ( SEO )',
	  'desc'    => 'Site Açıklamanız yazmak SEO açısından iyi olacaktır.',
    ),
	array(
      'id'      => 'site-keywords',
      'type'    => 'text',
      'title'   => 'Site Keywords ( SEO )',
	  'desc'    => 'Her ayrı için virgul(,) koymayı unutmayınız.',
    ),
	array(
      'type'    => 'subheading',
      'content' => 'Header Ayarları',
    ),
	array(
      'id'      => 'slider-akf',
      'type'    => 'switcher',
      'title'   => 'Slider Gözüksün mü?',
    ),
	array(
      'id'      => 'site-logosu-aktif',
      'type'    => 'switcher',
      'title'   => 'Site Logosu (Resim)',
    ),
	array(
      'id'      => 'site-logosu-img',
      'type'    => 'upload',
      'title'   => 'Site Logosu',
    ),
	array(
      'type'    => 'notice',
      'class'   => 'info',
      'content' => 'Eğer Headerdeki Logo yaparsanız üstte aktif edin. Ama eğer yazı ise aşağıdaki aktif ediniz.',
    ),
	array(
      'id'      => 'site-logosu-yazi-aktif',
      'type'    => 'switcher',
      'title'   => 'Site logo',
	  'default' => true
    ),
	array(
      'id'      => 'site-logosu-yazi',
      'type'    => 'text',
      'title'   => 'Site İsmi',
	  'desc'    => 'İstediğiniz yazabilirsiniz.',
    ),
	array(
      'id'      => 'footer-yazi',
      'type'    => 'text',
      'title'   => 'Footer Açıklama',
    ),
	array(
      'id'      => 'google-analytics-ve-adsense-kodu',
      'type'    => 'textarea',
      'title'   => 'Google Analytics veya Adsense Kodu',
	  'sanitize' => false,
	  'desc'    => 'Her satır başına istediğinizi yazabilirsiniz',
    ),
	array(
      'id'      => 'head-arasina-eklenecek-kodlar-ust',
      'type'    => 'textarea',
      'title'   => 'Head arasına eklenecek kodlar (üst)',
	  'sanitize' => false,
	  'desc'    => 'Her satır başına istediğinizi yazabilirsiniz',
	  'help'    => 'Buraya yazdığınız zaman headerin üstünde gözükür.',
    ),
	array(
      'id'      => 'head-arasina-eklenecek-kodlar-alt',
      'type'    => 'textarea',
      'title'   => 'Head arasına eklenecek kodlar (alt)',
	  'sanitize' => false,
	  'desc'    => 'Her satır başına istediğinizi yazabilirsiniz',
	  'help'    => 'Buraya yazdığınız zaman headerin altında gözükür.',
    ),
  )
);

$options[]      = array(
  'name'        => 'icerik-ayarlari',
  'title'       => 'Sayfa-İçerik Ayarları',
  'icon'        => 'fa fa-cog',

  'fields'      => array(

    array(
      'id'      => 'icerik-yazar-bilgisi-akf',
	  'title'   => 'Yazar Bilgisi Gösterilsin mi?',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'icerik-onecikan-resim',
	  'title'   => 'Öne Çıkan Resim Gözüksün mü?',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'icerik-etiket',
	  'title'   => 'Etiket Kısmı Gözüksün mü?',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'icerik-yorum',
	  'title'   => 'Yorum Kısmı Gözüksün mü?',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'kategori-aciklama-akf',
	  'title'   => 'Kategori Açıklama (SEO) gözüksün mü?',
      'type'    => 'switcher',
    ),
	array(
      'type'    => 'subheading',
      'content' => 'Buton ve Ana Sayfa İkon Ayarları',
    ),
	array(
      'id'        => 'image_select_option',
      'type'      => 'image_select',
      'title'     => 'Border Radiusu Ayarlar ( Resimli )',
	  'options'   => array(
        'left'    => get_template_directory_uri() .'/resim/admin-paneli/border-radius.png',
    ),
    ),
	array(
      'id'      => 'border-radius-ayarla',
      'type'    => 'number',
      'title'   => 'Border Radiusu Ayarla',
      'desc'    => 'Genelde Butonu yuvarlatır.',
      'default' => '2',
    ),
	array(
      'id'      => 'son-yazilar-icon',
      'type'    => 'icon',
      'title'   => 'Son Yazılar İconu',
      'default' => 'fa fa-newspaper',
    ),
  )
);

$options[]      = array(
  'name'        => 'reklam-ayarlaris',
  'title'       => 'Reklam Ayarları',
  'icon'        => 'fa fa-money',

  'fields'      => array(

    array(
      'id'      => 'header-alti-reklam',
	  'title'   => 'Header Altı Reklam',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'header-alti-reklam-kodu',
	  'title'   => 'Header Altı Reklam Kodu',
      'type'    => 'textarea',
    ),
	array(
      'id'      => 'slider-alti-reklam',
	  'title'   => 'Slider Altı Reklam',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'slider-alti-reklam-kodu',
	  'title'   => 'Slider Altı Reklam Kodu',
      'type'    => 'textarea',
    ),
	array(
      'id'      => 'yazi-ici-gorsel-alti-reklam-kodu-akf',
	  'title'   => 'Yazı İçi Öne Çıkan Resim Altı Reklam',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'yazi-ici-gorsel-alti-reklam-kodu',
	  'title'   => 'Yazı İçi Öne Çıkan Resim Altı Reklam Kodu',
      'type'    => 'textarea',
    ),
	array(
      'id'      => 'yazi-ici-alti-reklam-kodu-akf',
	  'title'   => 'Yazı İçi Resim Altı Reklam',
      'type'    => 'switcher',
    ),
	array(
      'id'      => 'yazi-ici-alti-reklam-kodu',
	  'title'   => 'Yazı İçi Altı Reklam Kodu',
      'type'    => 'textarea',
    ),
  )
);

$options[]      = array(
  'name'        => 'renk-ayarlaris',
  'title'       => 'Renk ve Diğer Ayarları',
  'icon'        => 'fa fa-tint',

  'fields'      => array(

    array(
      'id'      => 'header-renk',
	  'title'   => 'Header Renk',
      'type'    => 'color_picker',
	  'default' => '#1e73be',
	  'rgba'    => true,
    ),
	array(
      'id'      => 'header-renk-2',
	  'title'   => 'Header Renk 2',
      'type'    => 'color_picker',
	  'default' => '#185c98',
	  'rgba'    => true,
    ),
	array(
      'id'      => 'ana-renk',
	  'title'   => 'Ana Renk ',
      'type'    => 'color_picker',
	  'default' => '#1e73be',
	  'rgba'    => true,
    ),
	array(
      'id'      => 'footer-renk',
	  'title'   => 'Footer Renk ',
      'type'    => 'color_picker',
	  'default' => '#2C3136',
	  'rgba'    => true,
    ),
  )
);

$options[]   = array(
  'name'     => 'kategori-ayarlari',
  'title'    => 'Orta Menü Ayarları',
  'icon'     => 'fa fa-cog',
  'sections' => array(

    // sub section 1
	
    array(
      'name'     => 'sub_section_1',
      'title'    => 'Kategoriler',
      'icon'     => 'fa fa-minus',
      'fields'   => array(
        
        
		array(
           'id'        => 'image_select_option',
           'type'      => 'image_select',
           'title'     => 'Orta Menü ( Resimli )',
	       'options'   => array(
           'left'    => get_template_directory_uri() .'/resim/admin-paneli/orta-menu.png',
        ),
        ),
		array(
           'id'      => 'orta-menu-aktif',
           'type'    => 'switcher',
           'title'   => 'Orta Menü Aktif Olsun mu?',
        ),
		array(
           'id'      => 'kategori-anarenk',
           'type'    => 'color_picker',
           'title'   => 'Ana Renk',
		   'desc'    => 'Eğer tüm kategorilerin aynı renk olmasını isterseniz bu renk ile değiştirin.',
        ),
		array(
           'id'      => 'kategori-ikon-anarenk',
           'type'    => 'color_picker',
           'title'   => 'Kategori İkon Rengi',
		   'desc'    => 'Eğer tüm kategorilerin aynı renk olmasını isterseniz bu renk ile değiştirin.',
        ),
		array(
           'id'      => 'kategori-radius',
           'type'    => 'number',
           'title'   => 'Köeşeleri Yuvarlat',
		   'default' => '50',
        ),
		array(
           'type'    => 'subheading',
           'content' => '1 Kategori',
        ),
        array(
           'id'      => 'kategori-icon-1-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),
		array(
           'id'      => 'kategori-adi-1',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-1-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-1-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-1-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),
		array(
           'type'    => 'subheading',
           'content' => '2 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-2-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-2',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-2-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-2-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-2-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),

		array(
           'type'    => 'subheading',
           'content' => '3 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-3-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-3',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-3-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-3-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-3-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),
      )
    ),

    // sub section 2
    array(
      'name'     => 'sub_section_2',
      'title'    => 'Kategoriler',
      'icon'     => 'fa fa-minus',
      'fields'   => array(

        array(
           'type'    => 'subheading',
           'content' => '4 Kategori',
        ),
		array(
           'id'      => 'kategori-icon-4-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),		
		array(
           'id'      => 'kategori-adi-4',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-4-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-4-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-4-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),
		array(
           'type'    => 'subheading',
           'content' => '5 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-5-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-5',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-5-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-5-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-5-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),

		array(
           'type'    => 'subheading',
           'content' => '6 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-6-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-6',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-6-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-6-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-6-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),
		
      )
    ),

    // sub section 3
    array(
      'name'     => 'sub_section_3',
      'title'    => 'Kategoriler',
      'icon'     => 'fa fa-minus',
      'fields'   => array(

        array(
           'type'    => 'subheading',
           'content' => '7 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-7-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-7',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-7-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-7-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-7-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),
		array(
           'type'    => 'subheading',
           'content' => '8 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-8-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-8',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-8-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-8-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-8-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),

		array(
           'type'    => 'subheading',
           'content' => '9 Kategori',
        ),		
		array(
           'id'      => 'kategori-icon-9-akf',
           'type'    => 'switcher',
           'title'   => 'Kategori Gözüksün mü?',
        ),	
		array(
           'id'      => 'kategori-adi-9',
           'type'    => 'text',
           'title'   => 'Kategori Adı',
        ),
		array(
           'id'      => 'kategori-icon-9-omi',
           'type'    => 'icon',
           'title'   => 'Kategori İconu',
        ),
		array(
           'id'      => 'kategori-icon-9-oml',
           'type'    => 'text',
           'title'   => 'Kategori Linki',
        ),
		array(
           'id'      => 'kategori-icon-9-omr',
           'type'    => 'color_picker',
           'title'   => 'Kategori Arkaplan Rengi',
        ),

      )
    ),

  ),
);

$options[]      = array(
  'name'        => 'ceviri-ayarlari',
  'title'       => 'Çeviri Ayarları',
  'icon'        => 'fa fa-text-width',

  'fields'      => array(

	array(
      'type'    => 'subheading',
      'content' => 'Ana Sayfa',
    ),
	array(
      'id'      => 'son-yazilar-yazisi',
      'type'    => 'text',
	  'default' => 'Yayın Akışı',
      'title'   => 'Son Yazılar Yazısı',
    ),
	array(
      'id'      => 'bilesen-yazisi',
      'type'    => 'text',
	  'default' => 'Destek Olmak ister misin?',
      'title'   => 'Bileşen Yazısı',
    ),
	array(
      'type'    => 'subheading',
      'content' => '404 Sayfası',
    ),
	array(
      'id'      => 'upps-aradigini-bulamadık',
      'type'    => 'text',
	  'default' => 'Upps, Aradığınız bulamadık',
      'title'   => 'Upps, Aradığınız bulamadık',
    ),
	array(
      'id'      => 'ya-kaldirilmis-olabilir-veya-baglantiyi-kontrol-ediniz',
      'type'    => 'text',
	  'default' => 'Ya kaldırılmış olabilir veya bağlantıyı kontrol ediniz',
      'title'   => 'Ya kaldırılmış olabilir veya bağlantıyı kontrol ediniz',
    ),
	array(
      'id'      => '404-butonu-anasayfaya-git',
      'type'    => 'text',
	  'default' => 'Ana Sayfaya Git',
      'title'   => 'Ana Sayfaya Git',
    ),
	array(
      'id'      => 'bisey-bulunmadi',
      'type'    => 'text',
	  'default' => 'Bişey Bulunmadı',
      'title'   => 'Bişey Bulunmadı',
    ),
	array(
      'type'    => 'subheading',
      'content' => 'Yazar Sayfası',
    ),
	array(
      'id'      => 'yazar-uyenin-yazarlari',
      'type'    => 'text',
	  'default' => 'Üyenin Yazıları',
      'title'   => 'Üyenin Yazıları',
    ),
	array(
      'id'      => 'yazar-uyenin-yazarlari-icon',
      'type'    => 'icon',
	  'default' => 'fa fa-coffee',
      'title'   => 'Üyenin Yazarları İkon',
    ),
	array(
      'type'    => 'subheading',
      'content' => 'Yorum Sayfası',
    ),
	array(
      'id'      => 'yorumlar-yazi',
      'type'    => 'text',
	  'default' => 'Yorumlar',
      'title'   => 'Yorumlar',
    ),
	array(
      'id'      => 'bu-yazı-yorumlara-kapatilmistir.',
      'type'    => 'text',
	  'default' => 'Bu Yazı Yorumlara Kapatılmıştır.',
      'title'   => 'Bu Yazı Yorumlara Kapatılmıştır.',
    ),
	array(
      'id'      => 'geri-bildirimler',
      'type'    => 'text',
	  'default' => 'Geri bildirimler:',
      'title'   => 'Geri bildirimler:',
    ),
	array(
      'id'      => 'yorumunuz-denetim-icin-bekliyor',
      'type'    => 'text',
	  'default' => 'Yorumunuz denetim için bekliyor.',
      'title'   => 'Yorumunuz denetim için bekliyor.',
    ),
	array(
      'id'      => 'yorum-yapabilmek-icin',
      'type'    => 'text',
	  'default' => 'Yorum Yapabilmek İçin',
      'title'   => 'Yorum Yapabilmek İçin',
    ),
	array(
      'id'      => 'yorum-yazma-giris',
      'type'    => 'text',
	  'default' => 'giriş',
      'title'   => 'giriş',
    ),
	array(
      'id'      => 'yorum-yazma-yapmalısınız',
      'type'    => 'text',
	  'default' => 'yapmalısınız.',
      'title'   => 'yapmalısınız.',
    ),
	array(
      'type'    => 'subheading',
      'content' => 'Arama Sayfası',
    ),
	array(
      'id'      => 'aradiginiz-kelime',
      'type'    => 'text',
	  'default' => 'Aradığınız Kelime',
      'title'   => 'Aradığınız Kelime',
    ),
  )
);

$options[] = array(
  'name'   => 'seperator_1',
  'title'  => 'Yedekleme',
  'icon'   => 'fa fa-bookmark'
);

$options[]   = array(
  'name'     => 'backup_section',
  'title'    => 'Yedekle',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'Bu bölümden yedeklerinizi indirebilir veya yükleyebilirsiniz.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

CSFramework::instance( $settings, $options );
