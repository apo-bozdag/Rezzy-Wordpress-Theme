<?php get_header(); ?>
<div class="container">
  <div class="row mobil-row">
  <div class="col-8 kutu">
  <div class="container">
    <div class="son-haberler">
	    <span class="son-yazilar">
		<div class="son-yazilar-icon">
		    <i class="fa fa-search"></i></div>
			<a><?php echo cs_get_option('aradiginiz-kelime'); ?> "<?php echo $s ?>"</a>
		</span>
	</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<a href="&"><div class="blog-listesi">
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
  <div class="blog-listesi-kategori">
    <?php the_category(', ,') ?>
    </div>
  <div class="blog-listesi-yazi">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3></a>
  </div>
  <div class="blog-listesi-tarih-yazar">
    <p><?php the_author(); ?></p>
  </div>
  </div></a>

	<?php endwhile; else: ?>
<?php _e('<div class="bisey-bulunmadi">Bişey Bulunmadı...</div>'); ?>
<?php endif; ?>
	
</div></div>
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