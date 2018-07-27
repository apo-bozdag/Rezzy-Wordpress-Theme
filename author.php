<?php get_header(); ?>

    <div style="padding-left:1px;padding-right:1px;" class="container">
        <div style="max-width:100%; width:100%;" class="kutu">
            <div class="yazar-sayfasi">
				<?php echo get_avatar( get_the_author_meta( 'id' ), 96 ); ?>
                <div class="yazar-sayfasi-yazi">
                    <h5>
						<?php the_author( '' ); ?>
                        <span class="yazar-maili"><?php the_author_meta( 'url' ); ?></span>
                    </h5>
                    <p><?php the_author_meta( 'description' ); ?></p></div>
            </div>
        </div>
    </div>
    <div style="padding-left:1px;padding-right:1px;" class="container">
        <div style="max-width:100%;width:100%;padding: 13px 30px;" class="kutu yazar-kutu">
            <div style="margin-bottom:0" class="son-haberler">
	    <span class="son-yazilar">
		<div class="son-yazilar-icon">
		    <i class="<?php echo cs_get_option( 'yazar-uyenin-yazarlari-icon' ); ?>"></i></div>
			<a><?php echo cs_get_option( 'yazar-uyenin-yazarlari' ); ?></a>
		</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="padding-left:1px;padding-right:1px;" class="container">
            <div class="row mobil-row">
                <div class="col-8 kutu">
					<?php if ( have_posts() ) : while ( have_posts() ) :
					the_post(); ?>
                    <a href="&">
                        <div class="blog-listesi">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <div class="blog-listesi-kategori">
								<?php the_category( ', ,' ) ?>
                            </div>
                            <div class="blog-listesi-yazi">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3>
                    </a>
                </div>
                <div class="blog-listesi-tarih-yazar">
                    <p><?php the_author(); ?></p>
                </div>
            </div>
            </a>

			<?php endwhile; else: ?>
				<?php _e( '<div class="bisey-bulunmadi">Bişey bulunmadı...</div>' ); ?>
			<?php endif; ?>
        </div>
        <div class="col-4 mobil-kutu" style="width: 100%;max-width: 100%;padding-right: 0px;">
			<?php
			if ( ! dynamic_sidebar( 'sidebar' ) ) :?>
			<?php endif; ?>
			<?php get_sidebar(); ?>
        </div>
    </div>
    </div>
    </div>

<?php get_footer(); ?>