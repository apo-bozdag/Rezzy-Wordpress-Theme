<?php if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'Lütfen bu sayfaya doğrudan yükleme yapmayınız, teşekkürler.' );
}
if ( post_password_required() ) { ?>Bu yazı parola korumalıdır, yorumları görebilmek için parolayı girin.
	<?php return;
} ?>

<?php if ( have_comments() ) : ?>
    <h4 class="kacyorum"><?php echo cs_get_option( 'yorumlar-yazi' ); ?>
        (<?php comments_number( '0 Yorum :/', '1 Yorum', '% Yorum' ); ?>)</h4>

    <ul class="yorumlistele">
		<?php wp_list_comments( 'type=all&callback=sinyor_comment' ); ?>
    </ul>

<?php else : ?>
	<?php if ( comments_open() ) : ?>
	<?php else : ?>
		<?php echo cs_get_option( 'bu-yazı-yorumlara-kapatilmistir.' ); ?>

	<?php endif; ?>
<?php endif; ?>

<?php global $trackbacks; ?>

<?php if ( $trackbacks ) : ?>
	<?php $comments = $trackbacks; ?>
    <div id="pingback-trackback">
        <h3 id="trackbacks"><?php echo cs_get_option( 'geri-bildirimler' ); ?><?php echo sizeof( $trackbacks ); ?></h3>
        <ol class="pings">
			<?php foreach ( $comments as $comment ) : ?>
                <!-- Geriizleme başlangıç -->
                <li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
                    <cite><?php comment_author_link() ?></cite>
					<?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php echo cs_get_option( 'yorumunuz-denetim-icin-bekliyor' ); ?></em>
					<?php endif; ?>
                </li>

				<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>
			<?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>
<?php ?>
<?php if ( comments_open() ) : ?>
    <?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
        <?php echo cs_get_option( 'yorum-yapabilmek-icin' ); ?> <a
                href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo cs_get_option( 'yorum-yazma-giris' ); ?></a> <?php echo cs_get_option( 'yorum-yazma-yapmalisiniz' ); ?>
    <?php else : ?>
        <?php comment_form(); ?>
    <?php endif; ?>
<?php endif; ?>