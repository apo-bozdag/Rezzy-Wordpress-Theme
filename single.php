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
                        <div id="demo-test-gallery" class="demo-gallery">

                            <a href="https://farm4.staticflickr.com/3894/15008518202_c265dfa55f_h.jpg" data-size="1600x1600" data-med="https://farm4.staticflickr.com/3894/15008518202_b016d7d289_b.jpg" data-med-size="1024x1024" data-author="Folkert Gorter" class="demo-gallery__img--main">
                                <img src="https://farm4.staticflickr.com/3894/15008518202_b016d7d289_m.jpg" alt="" />
                                <figure>This is dummy caption.</figure>
                            </a>

                            <a href="https://farm6.staticflickr.com/5591/15008867125_b61960af01_h.jpg" data-size="1600x1068" data-med="https://farm6.staticflickr.com/5591/15008867125_68a8ed88cc_b.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                                <img src="https://farm6.staticflickr.com/5591/15008867125_68a8ed88cc_m.jpg" alt="" />
                                <figure>This is dummy caption. It has been placed here solely to demonstrate the look and feel of finished, typeset text.</figure>
                            </a>


                            <a href="https://farm4.staticflickr.com/3902/14985871946_24f47d4b53_h.jpg" data-size="1600x1067" data-med="https://farm4.staticflickr.com/3902/14985871946_86abb8c56f_b.jpg" data-med-size="1024x683" data-author="Ales Krivec">
                                <img src="https://farm4.staticflickr.com/3902/14985871946_86abb8c56f_m.jpg" alt="" />
                                <figure>This is dummy caption. It is not meant to be read.</figure>
                            </a>


                            <a href="https://farm6.staticflickr.com/5584/14985868676_b51baa4071_h.jpg" data-size="1600x1067" data-med="https://farm6.staticflickr.com/5584/14985868676_4b802b932a_b.jpg" data-med-size="1024x683" data-author="Michael Hull">
                                <img src="https://farm6.staticflickr.com/5584/14985868676_4b802b932a_m.jpg" alt="" />
                                <figure>Dummy caption. It's Greek to you. Unless, of course, you're Greek, in which case, it really makes no sense.</figure>
                            </a>

                            <a href="https://farm4.staticflickr.com/3920/15008465772_d50c8f0531_h.jpg" data-size="1600x1067" data-med="https://farm4.staticflickr.com/3920/15008465772_383e697089_b.jpg" data-med-size="1024x683" data-author="Thomas Lefebvre">
                                <img src="https://farm4.staticflickr.com/3920/15008465772_383e697089_m.jpg" alt="" />
                                <figure>It's a dummy caption. He who searches for meaning here will be sorely disappointed.</figure>
                            </a>
                        </div>
                        <!-- Galeri -->
	                    <?php

	                    $images = get_field('galeri');

	                    if( $images ): ?>
                            <ul>
			                    <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo $image['url']; ?>">
                                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" style="width: 150px;"/>
                                        </a>
                                        <p><?php echo $image['caption']; ?></p>
                                    </li>
			                    <?php endforeach; ?>
                            </ul>
	                    <?php endif; ?>


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