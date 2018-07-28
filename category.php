<?php get_header(); ?>
    <meta name="description" content="<?php echo category_description( $category_id ); ?>"/>
    <div class="container">
        <div class="row mobil-row">
            <div class="col-8 kutu">
                <div class="container">
                    <div class="son-haberler">
	    <span class="son-yazilar">
		<div class="son-yazilar-icon">
		    <i class="fa fa-book"></i></div>
			<a><?php kategori_ismi() ?></a>
		</span>
                    </div>
					<?php if ( cs_get_option( 'kategori-aciklama-akf' ) ): ?>
                        <div class="kategori-etiket-seo">
							<?php echo category_description( $category_id ); ?>
                        </div>
					<?php endif ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php include "inc/post_box.php"; ?>

					<?php endwhile; else: ?>
						<?php _e( '<div class="bisey-bulunmadi">Bişey Bulunmadı...</div>' ); ?>
					<?php endif; ?>

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
				if ( ! dynamic_sidebar( 'sidebar' ) ) :?>
				<?php endif; ?>
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    </div>
<?php
get_footer();