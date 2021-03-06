<?php
load_template( get_template_directory() . "/ozellikler/mobil-adres-cubugu-degistiri.php" );
load_template( get_template_directory() . "/ozellikler/related-cards.php" );
load_template( get_template_directory() . "/ozellikler/indirme-butonu.php" );

include 'functions/post.php';
// include 'ozellikler/advanced-custom-fields/acf.php';
include 'ozellikler/advanced-custom-fields-pro/acf.php';
include 'functions/fields.php';

function wpdocs_filter_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	$title            .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'SAYFA %s', 'twentytwelve' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );

function complete_version_removal() {
	return '';
}

add_filter( 'the_generator', 'complete_version_removal' );

function ajx_sharpen_resized_files( $resized_file ) {
	$image = wp_load_image( $resized_file );
	if ( ! is_resource( $image ) ) {
		return new WP_Error( 'error_loading_image', $image, $file );
	}
	$size = @getimagesize( $resized_file );
	if ( ! $size ) {
		return new WP_Error( 'invalid_image', __( 'Could not read image size' ), $file );
	}
	list( $orig_w, $orig_h, $orig_type ) = $size;
	switch ( $orig_type ) {
		case IMAGETYPE_JPEG:
			$matrix  = array(
				array( - 1, - 1, - 1 ),
				array( - 1, 16, - 1 ),
				array( - 1, - 1, - 1 ),
			);
			$divisor = array_sum( array_map( 'array_sum', $matrix ) );
			$offset  = 0;
			imageconvolution( $image, $matrix, $divisor, $offset );
			imagejpeg( $image, $resized_file, apply_filters( 'jpeg_quality', 90, 'edit_image' ) );
			break;
		case IMAGETYPE_PNG:
			return $resized_file;
		case IMAGETYPE_GIF:
			return $resized_file;
	}

	return $resized_file;
}

add_filter( 'image_make_intermediate_size', 'ajx_sharpen_resized_files', 900 );

function wpse218025_remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}

add_filter( 'get_comment_author_link', 'wpse218025_remove_comment_author_link', 10, 3 );

function create_copyright() {
	$all_posts  = get_posts( 'post_status=publish&order=ASC' );
	$first_post = $all_posts[0];
	$first_date = $first_post->post_date_gmt;
	_e( 'Theme by <a href="https://akadirkaya.com" rel="nofollow">Abdulkadir Kaya</a>' );
}

function register_my_menus() {
	register_nav_menus( array(
		'header-menu' => __( 'Header Menü' ),
		'right-menu'  => __( 'Sağ Menü' ),
		'alt-menu'    => __( 'Footer Menü' )
	) );
}

add_action( 'init', 'register_my_menus' );

function new_excerpt_length( $length ) {
	return 12;
}

add_filter( 'excerpt_length', 'new_excerpt_length' );


add_theme_support( 'post-thumbnails' );
add_image_size( 'anasayfa', 155, 265, true );
add_action( 'wp_dashboard_setup', 'my_custom_dashboard_widgets' );

function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget( 'custom_help_widget', 'Rezzy WordPress Blog Teması', 'custom_dashboard_help' );
}

function custom_dashboard_help() {
	echo '<p>Merhabalar, Rezzy WordPress Blog Teması indirdiğiniz için teşekkürler,
 Eğer temayla ilgili bi sorun, destek, bilgi almak isterseniz
  <a href="mailto:abdulkadirofficial01@gmail.com.com">mail</a> ile iletişime geçebilirsiniz. Yeni güncellemeler, 
  özellikler gibi <a href="https://www.akadirkaya.com" target="_blank">Kişisel Sitemiz</a> de bulabilirsiniz.</p>';
}

add_filter( 'widget_text', 'do_shortcode' );

function dimox_breadcrumbs() {

	$delimiter     = '&raquo;';
	$name          = 'Ana Sayfa'; //text for the 'Home' link
	$currentBefore = '<span class="current">';
	$currentAfter  = '</span>';

	if ( ! is_home() && ! is_front_page() || is_paged() ) {

		echo '<div id="crumbs">';

		global $post;
		$home = get_bloginfo( 'url' );
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

		if ( is_category() ) {
			global $wp_query;
			$cat_obj   = $wp_query->get_queried_object();
			$thisCat   = $cat_obj->term_id;
			$thisCat   = get_category( $thisCat );
			$parentCat = get_category( $thisCat->parent );
			if ( $thisCat->parent != 0 ) {
				echo( get_category_parents( $parentCat, true, ' ' . $delimiter . ' ' ) );
			}
			echo $currentBefore . 'Archive by category &#39;';
			single_cat_title();
			echo '&#39;' . $currentAfter;

		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time( 'd' ) . $currentAfter;

		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time( 'F' ) . $currentAfter;

		} elseif ( is_year() ) {
			echo $currentBefore . get_the_time( 'Y' ) . $currentAfter;

		} elseif ( is_single() && ! is_attachment() ) {
			$cat = get_the_category();
			$cat = $cat[0];
			echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
			echo $currentBefore;
			the_title();
			echo $currentAfter;

		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			$cat    = $cat[0];
			echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
			echo '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $currentBefore;
			the_title();
			echo $currentAfter;

		} elseif ( is_page() && ! $post->post_parent ) {
			echo $currentBefore;
			the_title();
			echo $currentAfter;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs = array_reverse( $breadcrumbs );
			foreach ( $breadcrumbs as $crumb ) {
				echo $crumb . ' ' . $delimiter . ' ';
			}
			echo $currentBefore;
			the_title();
			echo $currentAfter;

		} elseif ( is_search() ) {
			echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;

		} elseif ( is_tag() ) {
			echo $currentBefore . 'Posts tagged &#39;';
			single_tag_title();
			echo '&#39;' . $currentAfter;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;

		} elseif ( is_404() ) {
			echo $currentBefore . 'Error 404' . $currentAfter;
		}

		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo __( 'Page' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}

		echo '</div>';

	}
}

add_theme_support( 'post-thumbnails' );

require_once get_template_directory() . '/admin/cs-framework.php';

register_sidebar( array(
	'name'          => 'Rezzy { Anasayfa-Sidebar-1 }',
	'id'            => 'rezzy-anasayfa-sidebar-1',
	'description'   => 'Ana sayfa bölümünde görünecek',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );

function kategori_ismi( $ayirici = ' ' ) {
	$kategoriler = (array) get_the_category(); //

	$liste = '';
	foreach ( $kategoriler as $kategori ) {
		$liste .= $ayirici . $kategori->category_nicename;
	}
	echo $liste;
}

remove_filter( 'pre_term_description', 'wp_filter_kses' );

function comicpress_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results( "
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
" );
	$output          = '';
	if ( $copyright_dates ) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		if ( $copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate ) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright;
	}

	return $output;
}

add_shortcode( "bilgikutusu", "ss_framework_bilgikutusu_sc" );

function ss_framework_bilgikutusu_sc( $atts, $content = null, $color = null ) {
	extract( shortcode_atts( array( "color" => "" ), $atts ) );

	return "<div class=\"bilgikutusu\" style=\"background-color:" . esc_attr( $color ) . ";\">" . do_shortcode( $content ) . "</div>";
}

function clean_custom_menus_right() {
	$menu_name = 'right-menu';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );

		$menu_list = '' . "\n";
		$menu_list .= "\t\t\t\t" . '' . "\n";
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title     = $menu_item->title;
			$url       = $menu_item->url;
			$menu_list .= "\t\t\t\t\t" . '<li class="mdl-menu__item"><a href="' . $url . '">' . $title . '</a></li>' . "\n";
		}
		$menu_list .= "\t\t\t\t" . '' . "\n";
		$menu_list .= "\t\t\t" . '' . "\n";
	} else {
	}
	echo $menu_list;
}

function kisalt($par, $uzunluk =50){
	if (strlen($par) > $uzunluk){
		$par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
	}
	return $par;
}

require_once( 'wp-updates-theme.php' );
new WPUpdatesThemeUpdater_2329( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );
