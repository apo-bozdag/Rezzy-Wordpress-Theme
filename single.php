<?php get_header(); ?>
<?php
$icerik = $post->post_content;
$word = str_word_count(strip_tags($icerik));
$m = floor($word / 60 );
$s = floor($word % 60 / (60 / 60));
$est = $m . ' dakika' . ($m == 1 ? '' : 'da');
?>
  <div class="container">
	    <div style="padding-left:1px;padding-right:1px;" class="container">
		<div class="row mobil-row single-row">
            <div class="col-8 kutu icerik-kutu">
				<!-- Yazar Paneli -->
				<div class="yazar-paneli">				
				    <div class="icerik-yorum-sayisi">
					    <?php comments_popup_link(__('0 yorum'), __('1 yorum'), __('% yorum'), '', __(' ')); ?>
					</div>
				    <?php echo  get_avatar( get_the_author_email(), '80' ); ?>
					<a><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?><?php the_author(); ?><?php endwhile; endif; ?></a>
					<p>	<?php the_author_url(''); ?></p><span class="okunma-sayisi"><?php echo $est; ?> okuyabilirsiniz</span>
				</div>
				<!-- Yazar Paneli Bitiş -->
				<!-- Öne Çıkan Resim -->
				<?php if (cs_get_option('icerik-onecikan-resim')): ?>
				<div class="icerik-one-cikan-resim">
				    <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
				</div>
				<?php endif ?>
				<!-- Öne Çıkan Resim Bitiş -->
				<!-- Reklam Alanı -->
				<?php if (cs_get_option('yazi-ici-gorsel-alti-reklam-kodu-akf')): ?>
					<div class="reklam-kodu"><?php echo cs_get_option('yazi-ici-gorsel-alti-reklam-kodu'); ?></div>
				<?php endif ?>
				<!-- Reklam Alanı Bitiş -->
				<div class="yazi-icerik">
				   <?php the_content(); ?>
				   <?php if (cs_get_option('icerik-etiket')): ?>
				   <div class="yazi-icerik-kategori">
				   <?php the_tags( '<span class="etiket-baslik">Etiket:</span> ', '  ', '<br />' ); ?>
				   </div>
				   <?php endif ?>
				<!-- Reklam Alanı -->
				<?php if (cs_get_option('yazi-ici-alti-reklam-kodu-akf')): ?>
					<div class="reklam-kodu"><?php echo cs_get_option('yazi-ici-alti-reklam-kodu'); ?></div>
				<?php endif ?>
				<!-- Reklam Alanı Bitiş -->
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
   <?php if (cs_get_option('icerik-yorum')): ?>
   <div class="container">
   <div style="padding-left:1px;padding-right:1px;" class="container">
   <div class="row mobil-row">
    <div class="col-8 kutu icerik-kutu">
      <?php comments_template(); ?>
	</div>
   </div>
   </div>
   </div>
   <?php endif ?>

<?php get_footer(); ?>