<?php

/**
 * Template Name: Subpage FLAT
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result = array();

$side_right_flag = is_active_sidebar( 'side_right' );

$flat_entries = get_pages( array(
	'sort_order'   => 'ASC',
	'sort_column'  => 'post_title',
	'hierarchical' => 0,
	'parent'       => get_the_ID(),
	'post_type'    => 'page',
	'post_status'  => 'publish',
) );
if ( ( $flat_entries ) && ( ! empty( $flat_entries ) ) && ( ! is_wp_error( $flat_entries ) ) ) {
	$result[] = "<section class=\"flat\" id=\"flat\">";
	$result[] = "  <div class=\"row\">";
	foreach ( $flat_entries as $flat_entry ) {
		$result[] = "<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">";
		$result[] = "  <a class=\"flat__entry entry\" href=\"" . get_permalink( $flat_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $flat_entry->post_title ) ) . "\">";
		$result[] = "    <img class=\"wp-post-image lazy\" src=\"#\" data-src=\"" . ( ( has_post_thumbnail( $flat_entry->ID ) ) ? get_the_post_thumbnail_url( $flat_entry->ID, 'thumbnail-3x2' ) : get_rand_img_src() ) . "\"/>";
		$result[] = "    <h3 class=\"title\">" . apply_filters( 'the_title', $flat_entry->post_title ) . "</h3>";
		$result[] = "    <div class=\"excerpt\">" . ( ( empty( trim( $flat_entry->post_excerpt ) ) ) ? wp_trim_words( wp_strip_all_tags( strip_shortcodes( $flat_entry->post_content ) ), 20 ) : apply_filters( 'the_excerpt', $flat_entry->post_excerpt ) ) . "</div>";
		$result[] = "  </a>";
		$result[] = "</div>"; //col-
	} // foreach
	$result[] = "  </div>"; // .row
	$result[] = "</section>";
}

?>


<?php get_header(); ?>

<div class="container">
  <div class="row">

    <div class="col-xs-12 col-sm-12 <?php echo ( $side_right_flag ) ? 'col-md-7 col-lg-8' : ''; ?>">
    	<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article>
						<?php get_template_part( 'parts/pageheader' ); ?>
						<div class="entry-content"><?php echo apply_filters( 'the_content', get_the_content() . implode( "\r\n" , $result ) ); ?></div>
						<?php get_template_part( 'parts/info' ); ?>
					</article>
					<?php get_template_part( 'parts/pager' ); ?>
					<?php if ( get_theme_mod( 'similar_section_flag', false ) ) get_template_part( 'sections/similar' ); ?>
					<?php if ( comments_open( get_the_ID() ) ) comments_template(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
    </div>

	<?php if ( $side_right_flag ) : ?>
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
			<?php get_sidebar( 'right' ); ?>
		</div>
	<?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>