<?php

function minutes_read($content){
	$word   = str_word_count( strip_tags( $content ) );
	$m      = floor( $word / 60 );
	$s      = floor( $word % 60 / ( 60 / 60 ) );
	if ($m == 0){
		$m = 1;
	}
	$est    = $m . ' dakika' . ( $m == 1 ? '' : 'da' );
	return $est;
}

function sinyor_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<?php $PostAuthor = false;
	if ( $comment->comment_author_email == get_the_author_email() ) {
		$PostAuthor = true;
	} elseif ( $comment->comment_author_email == 'mailadresiniz@mail.com' ) {
		$PostAuthor = true;
	}
	?>
<li <?php if ( $PostAuthor ) {
	echo "class='authorcomment' ";
} ?> id="li-yorum-
    <?php comment_ID() ?>">
	<div class="yorum">
		<div class="cevapla">
			<i class="fa fa-reply"></i>
			<?php comment_reply_link( array_merge( $args, array(
				'depth'     => $depth,
				'max_depth' => $args['max_depth']
			) ) ) ?>
		</div>
		<div class="yorumkullanici">
			<!-- Yorum Avatar -->
			<div class="yorumavatar">
				<?php echo get_avatar( $comment, $size = '54' ); ?>
			</div>
			<!-- #Yorum Avatar -->
			<!-- Kullanıcı Adı ve Tarih -->
			<h3>
				<div class="yorum-alani">
					<?php printf( __( '%s' ), get_comment_author_link() ) ?>
				</div>
			</h3>
			<div class="yorumtarih">
				<i class="yorumtarihikon"></i>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php printf( get_comment_date() ); ?>
				</a>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php printf( get_comment_time() ); ?>
				</a>
			</div>
			<!-- #Kullanıcı Adı ve Tarih -->
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="yorumonay">Yorumunuz onaylandıktan sonra görüntülenecektir.</em>
		<?php endif; ?>
		<div class="yorumyazi">
			<?php comment_text() ?>
		</div>
	</div>
<?php }
