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
		do_action( 'pstu_theme_article_start' );
		get_template_part( 'includes/part', 'info' );

		echo "        <div class=\"entry-content\">\r\n";
		$childs_entryes = get_pages( array(
			'sort_order'   => 'ASC',
			'sort_column'  => 'post_title',
			'child_of'     => get_the_ID(),
			'post_type'    => 'page',
			'post_status'  => 'publish',
		) );
		if ( ( $childs_entryes ) && ( ! empty( $childs_entryes ) ) && ( ! is_wp_error( $childs_entryes ) ) ) {
			$result = array();
			$first_level = get_page_children( get_the_ID(), $childs_entryes );
			if ( ( $first_level ) && ( ! empty( $first_level ) ) ) {
				foreach ( $first_level as $first_level_entry ) {
					$result[] = "<div class=\"media clearfix\">";
					$result[] = "  <div class=\"media-left pull-left\">";
					$result[] = "  	<a href=\"" . get_permalink( $first_level_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $first_level_entry->post_title ) ) . "\">";
					$result[] = "  		<img class=\"lazy media-object\" src=\"#\" data-src=\"\" alt=\"" . esc_attr( $first_level_entry->post_title ) . "\"/>";
					$result[] = "  	</a>";
					$result[] = "  </div>";
					$result[] = "  <div class=\"media-body\">";
					$result[] = "    <h4 class=\"media-heading\"><a title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $first_level_entry->post_title ) ) . "\" href=\"" . get_permalink( $first_level_entry->ID ) . "\">" . apply_filters( 'the_title', $first_level_entry->post_title ) . "</a></h4>";
					if ( ! empty( trim( $first_level_entry->post_excerpt ) ) ) $result[] = "<div class=\"excerpt\">" . apply_filters( 'the_excerpt', $first_level_entry->post_excerpt ) . "</div>";
					$second_level = get_page_children( get_the_ID(), $childs_entryes );
					if ( ( $second_level ) && ( ! empty( $second_level ) ) ) {
						$result[] = "     <ul>";
						foreach ( $second_level as $second_level_entry ) $result[] = "<li><a title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $second_level_entry->post_title ) ) . "\" href=\"" . get_permalink( $second_level_entry->ID ) . "\">" . apply_filters( 'the_title', $first_level_entry->post_title ) . "</a></li>";
						$result[] = "     </ul>";
					}
					$result[] = "  </div>"; // .media-body
					$result[] = "</div>"; // .media
				}
			} // if $first_level
			echo apply_filters( 'the_content', implode( "\r\n" , $result ) );
		} // if $flat_entryes
		unset( $result );
		echo "        </div>\r\n"; // .entry-content
		
		get_template_part( 'part', 'authors' );
		do_action( 'pstu_theme_article_end' );
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

if ( get_theme_mod( 'current_section_flag', false ) ) get_template_part( 'section', 'current' );

get_footer();



?>