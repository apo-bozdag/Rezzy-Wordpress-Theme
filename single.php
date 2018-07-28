<?php get_header(); ?>
    <div class="container">
        <div style="padding-left:1px;padding-right:1px;" class="container">
            <div class="row mobil-row single-row">
				<?php /*dimox_breadcrumbs(); */?>
                <div class="col-8 kutu icerik-kutu">
                    <!-- Yazar Paneli -->
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="yazar-paneli">
                            <div class="icerik-yorum-sayisi">
								<?php comments_popup_link( __( '0 yorum' ), __( '1 yorum' ), __( '% yorum' ), '', __( ' ' ) ); ?>
                            </div>

							<?php echo wp_kses_post( get_avatar( get_the_author_meta( 'user_email' ), 52 ) ); ?>
                            <a><?php echo esc_url( the_author_posts_link() ); ?></a>
                            <p><?php the_author_meta( 'url' ); ?></p>
                            <span class="okunma-sayisi">
                                <?php echo minutes_read( $post->post_content ); ?> içinde okuyabilirsiniz
                            </span>
                            <h3 style="font-size: 2.25em; font-weight: 700; color: #000;">
								<?php the_title(); ?>
                            </h3>

                        </div>
					<?php endwhile; endif; ?>
                    <!-- Yazar Paneli Bitiş -->
                    <!-- Öne Çıkan Resim -->
					<?php if ( cs_get_option( 'icerik-onecikan-resim' ) ): ?>
                        <div class="icerik-one-cikan-resim">
							<?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                }
							?>
                        </div>
					<?php endif ?>
                    <!-- Öne Çıkan Resim Bitiş -->
                    <!-- Reklam Alanı -->
					<?php if ( cs_get_option( 'yazi-ici-gorsel-alti-reklam-kodu-akf' ) ): ?>
                        <div class="reklam-kodu"><?php echo cs_get_option( 'yazi-ici-gorsel-alti-reklam-kodu' ); ?></div>
					<?php endif ?>

                    <style>
                        .kisa_aciklama p {
                            font-size: 1.5em;
                            line-height: 1.5em;
                        }
                    </style>

                    <!-- Reklam Alanı Bitiş -->
                    <div class="yazi-icerik">
                        <div class="kisa_aciklama">
                            <?php echo get_field('kisa_aciklama'); ?>
                        </div>

                        <!-- Galeri -->
                        <div class="row">
                            <div class="my-gallery col-8" itemscope itemtype="http://schema.org/ImageGallery">
		                        <?php
		                        $images = get_field('galeri');
		                        if( $images ): ?>
			                        <?php foreach( $images as $image ): ?>
                                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject"
                                                style="width: 150px;float: left;margin-right: 15px;">
                                            <a href="<?php echo $image['url']; ?>" itemprop="contentUrl" data-size="600x400">
                                                <img src="<?php echo $image['sizes']['thumbnail']; ?>"
                                                     alt="<?php echo $image['alt']; ?>" itemprop="thumbnail" style="width: 150px;"/>
                                            </a>
                                            <figcaption itemprop="caption description"><?php echo $image['caption']; ?></figcaption>
                                        </figure>
			                        <?php endforeach; ?>

		                        <?php endif; ?>
                            </div>
                        </div>sss


						<?php the_content(); ?>
						<?php if ( cs_get_option( 'icerik-etiket' ) ): ?>
                            <div class="yazi-icerik-kategori">
								<?php the_tags( '<span class="etiket-baslik">Etiket:</span> ', '  ', '<br />' ); ?>
                            </div>
						<?php endif ?>
                        <!-- Reklam Alanı -->
						<?php if ( cs_get_option( 'yazi-ici-alti-reklam-kodu-akf' ) ): ?>
                            <div class="reklam-kodu"><?php echo cs_get_option( 'yazi-ici-alti-reklam-kodu' ); ?></div>
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
	    <?php if ( cs_get_option( 'icerik-yorum' ) ): ?>
            <div class="row mobil-row">
                <div class="col-8 kutu icerik-kutu">
                    <?php comments_template(); ?>
                </div>
            </div>
	    <?php endif ?>
    </div>


<?php get_footer(); ?>