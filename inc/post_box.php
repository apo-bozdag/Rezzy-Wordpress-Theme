<div class="blog-listesi">
    <a href="<?php the_permalink(); ?>">
        <div class="ana-sayfa-gorsel"><?php the_post_thumbnail( 'medium' ); ?></div>
    </a>
    <div class="blog-listesi-kategori">
        <a href="#"><?php the_category( ', ,' ) ?></a>
    </div>
    <div class="blog-listesi-yazi">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php echo strip_tags( get_field('kisa_aciklama', get_the_ID() ) ); ?>
    </div>
    <div class="blog-listesi-tarih-yazar">
        <p><?php the_author(); ?></p>
    </div>
</div>