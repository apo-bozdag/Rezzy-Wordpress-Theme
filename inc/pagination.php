<!-- Pagination -->
<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
	<?php wp_pagenavi(); ?>
<?php } else { ?>
	<span class="cat-item"><?php previous_posts_link( '&lsaquo; ' . esc_html__( 'Yeni Yazılar', 'radkod' ) . '' ); ?></span>
	<span class="cat-item"><?php next_posts_link( '' . esc_html__( 'Önceki Yazılar', 'radkod' ) . ' &rsaquo;' ); ?></span>
<?php } // Default Pagination ?>
<!-- pagination -->