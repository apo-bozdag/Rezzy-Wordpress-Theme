<?php get_header(); ?>
<div class="container">
  <div class="row">
  <div class="col-8 kutu kutu-yan icerik-kutu">
  <div class="container">
    <div class="son-haberler">
	    <span class="son-yazilar">
		<div class="son-yazilar-icon">
		    <i class="fa fa-book"></i></div>
			<a><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_tags(); ?>
			</a>
		</span>
	</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<div class="blog-listesi">
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
  <div class="blog-listesi-kategori">
    <?php the_category(', ,') ?>
    </div>
	<?php endwhile; else: ?>
<?php _e('Sonuç Bulunamadi.'); ?>
<?php endif; ?>
  <div class="blog-listesi-yazi">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3></a>
  </div>
  <div class="blog-listesi-tarih-yazar">
    <p><?php the_author(); ?></p>
  </div>
  </div>

	<?php endwhile; else: ?>
<?php _e('<div class="bisey-bulunmadi">Bişey bulunmadı...</div>'); ?>
<?php endif; ?>
	
</div></div>
<div class="col-4 kutu icerik-kutu">
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