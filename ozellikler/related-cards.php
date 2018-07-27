<?php
/*
Plugin Name: Related Cards
Plugin URI: https://ogulcanozugenc.com/
Description: Fast and good looking related cards solution.
Author: Oğulcan Özügenç
Author URI: https://ogulcanozugenc.com/
Text Domain: related-cards
Domain Path: /languages/
Version: 1.0.5
*/

if (!defined('WPINC')) {
    die;
}

define('RC_PLUGIN_VERSION', '1.0.5');
define('RC_BASE_FILE', __FILE__);

if (!class_exists('Related_Cards_Class')) {
    class Related_Cards_Class
    {
        private static $instance;
        
        /**
         * Initiator
         */
        public static function init()
        {
            return self::$instance;
        }
        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('wp_enqueue_scripts', array(
                $this,
                'rc_scripts'
            ));
            add_action('init', array(
                $this,
                'rc_shortcodes'
            ));
            
            if (is_admin()) {
                add_action('init', array(
                    $this,
                    'rc_tinymce_button'
                ));
            }
            
            add_action('wp_ajax_rc_list', array(
                $this,
                'list_ajax'
            ));
            add_action('admin_footer', array(
                $this,
                'rc_list'
            ));
        }
        
        public function rc_shortcodes()
        {
            add_shortcode('ilgili', array(
                $this,
                'rc'
            ));
        }
        
        public function rc_scripts()
        {
            wp_register_style('rc_css', plugins_url('includes/css/style.css', RC_BASE_FILE), array(), RC_PLUGIN_VERSION);
        }
        
        public function rc($atts)
        {
            wp_enqueue_style('rc_css');
            $id    = $atts['id'];
            $perma = $atts['perma'];
            $id2   = url_to_postid($perma);
            if ($id2 > 0) {
                $id = $id2;
            }
            
            $baslik = get_the_title($id);
            $url    = get_permalink($id);
            $img    = get_the_post_thumbnail_url($id, 'medium');
            $cat    = 'İLGİLİ YAZI';
            $out    = "<html><body><p><div class=\"ilgili-haber\"><div class=\"ilgili-haber-gorsel\"><a href=\"$url\" target=\"_blank\"><img class=\"img\" src=\"$img\" /></a></div><div class=\"ilgili-haber-kategori\"><a>$cat</a></div><div class=\"ilgili-haber-baslik\"><a href=\"$url\" target=\"_blank\">$baslik</a></div></div></p></body></html>";
            if ($img != '' || $img != 0) {
                return $out;
            }
        }
        
        function rc_tinymce_button()
        {
            if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
                return;
            }
            
            if (get_user_option('rich_editing') !== 'true') {
                return;
            }
            
            add_filter('mce_external_plugins', array(
                &$this,
                'add_tinymce_plugin'
            ));
            add_filter('mce_buttons', array(
                &$this,
                'add_tinymce_toolbar_button'
            ));
        }
        
        function add_tinymce_plugin($plugin_array)
        {
            $plugin_array['rc_button'] = get_template_directory_uri(RC_BASE_FILE) . '/ozellikler/rc_button.js?ver=' . RC_PLUGIN_VERSION;
            return $plugin_array;
        }
        
        function add_tinymce_toolbar_button($buttons)
        {
            array_push($buttons, '', 'rc_button');
            return $buttons;
        }
        
        /**
         * Function to fetch rc posts list
         * @return string
         */
        public function posts($post_type)
        {
            
            global $wpdb;
            $rc_type        = $post_type;
            $rc_post_status = 'publish';
            $rc             = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title
	                FROM $wpdb->posts 
	                WHERE $wpdb->posts.post_type = %s
	                AND $wpdb->posts.post_status = %s
	                ORDER BY ID DESC", $rc_type, $rc_post_status));
            
            $list = array();
            
            foreach ($rc as $post) {
                $selected  = '';
                $post_id   = $post->ID;
                $post_name = $post->post_title;
                $list[]    = array(
                    'text' => $post_name,
                    'value' => $post_id
                );
            }
            
            wp_send_json($list);
        }
        
        /**
         * Function to fetch buttons
         * @since  1.6
         * @return string
         */
        public function list_ajax()
        {
            // check for nonce
            check_ajax_referer('twd-nonce', 'security');
            $posts = $this->posts('post'); // change 'book' to 'post' if you need posts list
            return $posts;
        }
        
        /**
         * Function to output button list ajax script
         * @return string
         */
        public function rc_list()
        {
            // create nonce
            global $pagenow;
            var_dump($pagenow);
            if ($pagenow != 'admin.php') {
                $nonce = wp_create_nonce('twd-nonce');
?>
			    <script type="text/javascript">
					jQuery( document ).ready( function( $ ) {
						var data = {
							'action'	: 'rc_list',							// wp ajax action
							'security'	: '<?php
                echo $nonce;
?>'		// nonce value created earlier
						};
						// fire ajax
					  	jQuery.post( ajaxurl, data, function( response ) {
					  		// if nonce fails then not authorized else settings saved
					  		if( response === '-1' ){
						  		// do nothing
						  		console.log('error');
					  		} else {
					  			if (typeof(tinyMCE) != 'undefined') {
					  				if (tinyMCE.DOM != null) {
										tinyMCE.DOM.rc_list = response;
									}
								}
					  		}
					  	});
					});
				</script>
				<?php
            }
        }
        
    }
}

$Related_Cards_Class = new Related_Cards_Class;
$Related_Cards_Class->init();