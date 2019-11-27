<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>


<?php


if ( is_singular() ) {
	$title = the_title( '', '', false );
	$description = ( has_excerpt( get_the_ID() ) ) ? get_the_excerpt( get_the_ID() ) : '';
	$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
} else {
	$title = get_the_archive_title();
	$description = get_the_archive_description();
	$thumbnail_id = false;
}


?>


<div class="pageheader">
	<?php if ( (bool) $thumbnail_id ) : ?>
		<a class="fancybox thumbnail" href="<?php echo wp_get_attachment_image_url( $thumbnail_id, 'full', false ); ?>" title="<?php _e( 'Увеличить', 'pstu-next-theme' ); ?>">
			<img class="lazy wp-post-thumbnail" src="#" data-src="<?php echo wp_get_attachment_image_url( $thumbnail_id, 'thumbnail', false ); ?>" alt="<?php esc_attr( $title ) ?>">
		</a>
	<?php endif; ?>
	<h1 class="title"><?php echo $title; ?></h1>
</div>
<?php if ( ! empty( $description ) ) : ?><p class="lead"><?php echo $description; ?></p><?php endif; ?>
<?php the_breadcrumb(); ?>