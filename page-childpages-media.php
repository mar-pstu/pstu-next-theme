<?php

/**
 * Template Name: Subpage MEDIA
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";

echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";

if ( have_posts() ) {
	while ( have_posts() ) {
		
		the_post();

		$result = array();
		
		$childs_entries = get_pages( array(
			'sort_order'   => 'ASC',
			'sort_column'  => 'post_title',
			'parent'		   => get_the_ID(),
			'post_type'    => 'page',
			'post_status'  => 'publish',
		) );
		if ( ( $childs_entries ) && ( ! empty( $childs_entries ) ) && ( ! is_wp_error( $childs_entries ) ) ) {
			foreach ( $childs_entries as $childs_entry ) {
				$result[] = "<div class=\"media clearfix\">";
				if ( has_post_thumbnail( $childs_entry->ID ) ) {
					$result[] = "  <div class=\"media-left pull-left\">";
					$result[] = "  	<a href=\"" . get_permalink( $childs_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $childs_entry->post_title ) ) . "\">";
					$result[] = "  		<img class=\"lazy media-object\" src=\"#\" data-src=\"" . get_the_post_thumbnail_url( $childs_entry->ID, 'thumbnail' ) . "\" alt=\"" . esc_attr( $childs_entry->post_title ) . "\"/>";
					$result[] = "  	</a>";
					$result[] = "  </div>"; // .media-left
				}
				$result[] = "  <div class=\"media-body\">";
				$result[] = "    <h4 class=\"media-heading\"><a title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $childs_entry->post_title ) ) . "\" href=\"" . get_permalink( $childs_entry->ID ) . "\">" . apply_filters( 'the_title', $childs_entry->post_title ) . "</a></h4>";
				if ( ! empty( trim( $childs_entry->post_excerpt ) ) ) $result[] = "<div class=\"excerpt\">" . apply_filters( 'the_excerpt', $childs_entry->post_excerpt ) . "</div>";
				$first_level_entries = get_pages( array(
					'sort_order'   => 'ASC',
					'sort_column'  => 'post_title',
					'parent'		   => $childs_entry->ID,
					'post_type'    => 'page',
					'post_status'  => 'publish',
				) );
				if ( ( $first_level_entries ) && ( ! empty( $first_level_entries ) ) && ( ! is_wp_error( $first_level_entries ) ) ) {
					$result[] = "<ul>";
					foreach ( $first_level_entries as $first_level_entry ) $result[] = sprintf(
						'<li><a title="%1$s - %2$s" href="%3$s">%4$s</a></li>',
						__( 'Подробней', 'pstu-next-theme' ),
						esc_attr( $first_level_entry->post_title ),
						get_permalink( $first_level_entry->ID ),
						apply_filters( 'the_title', $first_level_entry->post_title )
					);
					$result[] = "</ul>";
				}
				$edit_link = sprintf(
					'<a class="btn btn-warning" href="%1$s" title="%2$s"><i class=\"icon icon-edit\"></i> %2$s</a>',
					get_edit_post_link( $childs_entry->ID ),
					esc_attr__( 'Редактировать', 'pstu-next-theme' )
				);
				$result[] = sprintf(
					'<p class="text-right">%4$s<a class="btn btn-success" href="%1$s" title="%2$s - %3$s">%2$s</a></p>',
					get_permalink( $childs_entry->ID ),
					esc_attr__( 'Подробней', 'pstu-next-theme' ),
					esc_attr( $childs_entry->post_title ),
					( current_user_can( 'edit_post', $childs_entry->ID ) ) ? $edit_link . ' ' : ''
				);
				$result[] = "  </div>"; // .media-body
				$result[] = "</div>"; // .media
			}
		} // if $childs_entries

		echo "<article class=\"entry-content\">\r\n";
		get_template_part( 'includes/part', 'info' );
		echo apply_filters( 'the_content', get_the_content() . implode( "\r\n" , $result ) );
		get_template_part( 'part', 'authors' );
		echo "</article>\r\n"; // .entry-content

		unset( $result );
		unset( $edit_link );

		get_template_part( 'includes/part', 'pager' );
		if ( get_theme_mod( 'similar_section_flag', false ) ) get_template_part( 'sections/similar' );
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