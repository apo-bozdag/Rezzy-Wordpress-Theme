<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-8 kutu kutu-yan icerik-kutu">
                <div class="container">
                    <div class="son-haberler">
                        <span class="son-yazilar">
                            <div class="son-yazilar-icon"><i class="fa fa-book"></i></div>
                            <a>
                                <?php the_tags(); ?>
                            </a>
                        </span>
                    </div>
					<?php if ( have_posts() ) : while ( have_posts() ) :
						the_post(); ?>

						<?php include "inc/post_box.php"; ?>
					<?php endwhile; else: ?>
						<?php _e( '<div class="bisey-bulunmadi">Bişey Bulunmadı...</div>' ); ?>
					<?php endif; ?>

                </div>
            </div>
            <div class="col-4 kutu icerik-kutu">
				<?php
				if ( ! dynamic_sidebar( 'sidebar' ) ) :?>
				<?php endif; ?>
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php
get_footer();