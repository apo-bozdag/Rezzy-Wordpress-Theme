<?php get_header(); ?>
<?php
$icerik = $post->post_content;
$word = str_word_count(strip_tags($icerik));
$m = floor($word / 60 );
$s = floor($word % 60 / (60 / 60));
$est = $m . ' dakika' . ($m == 1 ? '' : 'da');
?>
  <div class="container">
	    <div class="container">
		<div class="row">
            <div class="col-8 kutu icerik-kutu">
				<div class="yazi-icerik">
				   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                 <div class="sayfa-ayarlari">
				 <div class="sayfa-ayarlari-baslik">
				 <?php the_title(); ?></div>
				 <?php if (cs_get_option('icerik-onecikan-resim')): ?>
				<?php endif ?>
                 <?php the_content(); ?>

            <?php endwhile; endif; ?>
				</div></div>
			</div>
			<div class="col-4">  
<?php
if ( ! dynamic_sidebar( 'sidebar' ) ) :?>
<?php endif; ?>
  <?php get_sidebar(); ?>
 </div>
        </div>
		</div>
   </div>

<?php get_footer(); ?>