<?php

/**
 * Template Name: Subpage FLAT
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";

echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";
if ( have_posts() ) {
	while ( have_posts() ) {
		
		the_post();
		echo "      <article class=\"entry-content\">\r\n";
		get_template_part( 'includes/part', 'info' );

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
				$result[] = "    <div class=\"title\"><h3>" . apply_filters( 'the_title', $flat_entry->post_title ) . "</h3></div>";
				$result[] = "    <div class=\"excerpt\">" . ( ( empty( trim( $flat_entry->post_excerpt ) ) ) ? wp_trim_words( wp_strip_all_tags( strip_shortcodes( $flat_entry->post_content ) ), 20 ) : apply_filters( 'the_excerpt', $flat_entry->post_excerpt ) ) . "</div>";
				$result[] = "  </a>";
				$result[] = "</div>"; //col-
			} // foreach
			$result[] = "  </div>"; // .row
			$result[] = "</section>";
			echo apply_filters( 'the_content', get_the_content() . implode( "" , $result ) );
		} // if $flat_entries
		unset( $result );
		
		get_template_part( 'part', 'authors' );
		echo "      </article>\r\n";
		get_template_part( 'includes/part', 'pager' );
		if ( get_theme_mod( 'similar_section_flag', false ) ) get_template_part( 'includes/section', 'similar' );
		if ( comments_open( get_the_ID() ) ) comments_template();

	}
}
echo "    </div>\r\n"; // .col-

if ( is_active_sidebar( 'side_right' ) ) {
	echo "    <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4\">\r\n";
	get_sidebar( 'right' );
	echo "    </div>\r\n"; // .col-
}

echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'current_section_flag', false ) ) get_template_part( 'sections/current' );

get_footer();



?>