<?php get_header(); ?>
<?php if ( cs_get_option( 'orta-menu-aktif' ) ): ?>
	<?php include "ozellikler/orta-menu.php"; ?>
<?php endif ?>
<?php if ( cs_get_option( 'slider-akf' ) ): ?>
    <div class="slider">
        <div class="container slider-container">
            <div class="row slider-row" style="height: 380px;">
	            <?php
                    $slider = get_posts(array(
	                                'numberposts' => 3,
                                    'meta_query' => array(
                                        array(
                                            'key' => 'manset',
                                            'compare' => '=',
                                            'value' => '1'
                                        )
                                    )
                                ));
                                // $slider = new WP_Query("showposts=3");

                    foreach( $slider as $post ):  ?>
	            <?php if(++$burak % 3 != 0){ ?>
                <div class="col<?php if(++$dundar % 2 != 0){ echo '-8';} ?> slider-yan<?php if(++$des % 3 != 1){ echo '-sol';} ?>">
		            <?php } ?>
                    <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()){ the_post_thumbnail(); } else { ?>
                            <img src="<?php bloginfo('template_url'); ?>/resimyok.jpg">
			            <?php } ?>
                        <div class="slider-back-renk<?php echo (++$pon % 3 != 1) ? '-2-3' : ''; ?>">
                            <div class="slider-baslik<?php echo (++$res % 3 != 1) ? '-2-3' : ''; ?>">
                                <h4><?php the_title(''); ?></h4>
                            </div>
                        </div></a>
		            <?php echo (++$j % 3 != 2) ? '</div>' : ''; ?>
		            <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div style="padding-left:1px;" class="container">
		<?php if ( cs_get_option( 'slider-alti-reklam' ) ): ?>
            <div class="reklam-kodu header-reklam-kodu"><?php echo cs_get_option( 'slider-alti-reklam-kodu' ); ?></div>
		<?php endif; ?>
    </div>
<?php endif; ?>
    <div class="container">
        <div class="row mobil-row">
            <div class="col-8 kutu">
                <div class="container">
                    <div class="son-haberler">
	    <span class="son-yazilar">
		<div class="son-yazilar-icon">
		    <i class="<?php echo cs_get_option( 'son-yazilar-icon' ); ?>"></i></div>
			<a><?php echo cs_get_option( 'son-yazilar-yazisi' ); ?></a>
		</span>
                    </div>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php include "inc/post_box.php"; ?>

			<?php endwhile; else:
				_e( '<div class="bisey-bulunmadi">Bişey Bulunmadı...</div>' );
			endif; ?>
            <!-- Pagination -->
	        <?php if(function_exists('wp_pagenavi')) { ?>
		        <?php wp_pagenavi(); ?>
	        <?php } else { ?>
                <span class="cat-item"><?php previous_posts_link('&lsaquo; ' . esc_html__('Yeni Yazılar', 'radkod') . ''); ?></span>
                <span class="cat-item"><?php next_posts_link('' . esc_html__('Önceki Yazılar', 'radkod') . ' &rsaquo;'); ?></span>
	        <?php } // Default Pagination ?>
            <!-- pagination -->
        </div>
    </div>
    <div class="col-4 mobil-kutu">
		<?php
            if ( ! dynamic_sidebar( 'sidebar' ) ) :
            endif;
            get_sidebar();
		?>
    </div>
    </div>
    </div>
    </div>
<?php get_footer(); ?>