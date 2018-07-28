<?php

add_action( 'admin_enqueue_scripts', 'mabc_color_enqueues' );
function mabc_color_enqueues() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'meta-box-color-js', '/wp-content/themes/rezzy/ozellikler/' . 'adres-cubugu-degistir.js', array( 'wp-color-picker' ) );
}

add_action( 'wp_head', 'address_mobile_address_bar' );
function address_mobile_address_bar() {

    $mabc_options = get_option('mabc_setting');
    $color = $mabc_options['mabc_theme_color'];;
    //this is for Chrome, Firefox OS, Opera and Vivaldi
    echo '<meta name="theme-color" content="'.$color.'">';
    //Windows Phone **
    echo '<meta name="msapplication-navbutton-color" content="'.$color.'">';
    // iOS Safari
    echo '<meta name="apple-mobile-web-app-capable" content="yes">';
    echo '<meta name="apple-mobile-web-app-status-bar-style" content="black">';
}

add_action( 'admin_menu', 'mabc_add_admin_menu' );
function mabc_add_admin_menu(){ 
    add_options_page( 'Mobil Adres Çubuğu Değiştirici', 'Mobil Adres Çubuğu Değiştirici', 'manage_options', 'mobile_address_bar_chnage', 'mabc_options_page' );
}

function mabc_options_page(){ 
    if (isset($_POST['mabc-submit'])) {
        $msg = 0;
        $mabc_setting = array();
        $mabc_setting['mabc_theme_color'] = $_POST['mabc_theme_color'];

        $options = get_option('mabc_setting');
        if (empty($options)) {
            add_option('mabc_setting', $mabc_setting);
            $msg = 1;
        }
        else{
            update_option( 'mabc_setting', $mabc_setting );
            $msg = 1;
        }
}
?>
<?php if ($msg==1) { ?>
    <div class="updated settings-error notice is-dismissible" id="setting-error-settings_updated">
         <p>
            <strong>Ayarlar Kaydedildi.</strong>
        </p>
    </div>
<?php } ?>
<div class="wrap">
    <div class="logo-card">
    <div class="logo-favicon"></div>
    </div>
    <div class="card pressthis">

        <h2>Mobil Adres Çubuğu Değiştirici</h2>
        <?php $mabc_options = get_option('mabc_setting'); ?>
        <form method="post" action="">
             <table class="form-table">
                  <tr valign="top"><th scope="row">Renk Şeç :</th>
                      <td>
                           <input type="text" id="mabc_theme_color" name="mabc_theme_color" value="<?php echo $mabc_options['mabc_theme_color']; ?>" />
                      </td>
                  </tr>
             </table>
             <p class="submit">
                 <input type="submit" class="button-primary" name="mabc-submit" value="<?php _e('Save Changes') ?>" />
             </p>
        </form>
        <br>
        <link rel="stylesheet" type="text/css" href="/03062018/akadirkaya-eklenti.css" />
        <a class="destekle" href="https://akadirkaya.com">
        <div class="destekle-butonu" href="https://www.akadirkaya.com/">DESTEKLE</div></a>
        <br><br>
    </div>
    <div class="card pressthis orta-yazi">
    Bu Kodu <b>RezzaksTV</b> tarafından yapılmıştır. 
    Lüften <a href="s">sitemizi</a> ziyaret etmeyi unutmayınız.
    </div>


</div>
    <?php
}

?>
