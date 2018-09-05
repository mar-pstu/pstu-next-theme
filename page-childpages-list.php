<?php

/**
 * Template Name: Subpage LIST
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

		$result = array();

		$childs_entries = get_pages( array(
			'sort_order'   => 'ASC',
			'sort_column'  => 'post_title',
			'parent'		   => get_the_ID(),
			'post_type'    => 'page',
			'post_status'  => 'publish',
		) );
		if ( ( $childs_entries ) && ( ! empty( $childs_entries ) ) && ( ! is_wp_error( $childs_entries ) ) ) {
			foreach ( $childs_entries as $childs_entry ) $result[] = sprintf(
					'<h3><img class="lazy" style="display: inline-block; vartical-align: middle;" src="#" data-src="%1$s"> <a href="%2$s" title="%3$s - %4$s">%5$s</a></h3>',
					PSTU_NEXT_THEME_URL . 'images/text-file.png',
					get_permalink( $childs_entry->ID ),
					__( 'Подробней', 'pstu-next-theme' ),
					esc_attr( $childs_entry->post_title ),
					apply_filters( 'the_title', $childs_entry->post_title )
				);
		} // if $childs_entries

		echo "<div class=\"entry-content\">\r\n";
		echo apply_filters( 'the_content', get_the_content() . implode( "\r\n" , $result ) );
		echo "</div>\r\n"; // .entry-content

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