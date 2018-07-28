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

                        <div class="blog-listesi">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <div class="blog-listesi-kategori">
								<?php the_category( ', ,' ) ?>
                            </div>
                            <div class="blog-listesi-yazi">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3></a>
                            </div>
                            <div class="blog-listesi-tarih-yazar">
                                <p><?php the_author(); ?></p>
                            </div>
                        </div>

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