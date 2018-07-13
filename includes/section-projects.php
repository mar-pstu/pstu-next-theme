<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
	* Слайдер "Проекты". Публикуется на главной странице.
	*/


if ( $projects_category_id = get_translate_id( get_theme_mod( 'projects_category_id', false ), 'category' ) ) {

	$projects_category = get_category( $projects_category_id, OBJECT );

	if ( ( $projects_category ) && ( ! empty( $projects_category ) ) && ( ! is_wp_error( $projects_category ) ) ) {

		$projects = get_posts( array(
			'numberposts'       => get_theme_mod( 'projects_posts_number', 5 ),
	    'category'          => $projects_category_id,
	    'orderby'           => 'post_date',
	    'order'             => 'DESC',
	    'post_type'         => 'post',
	    'suppress_filters'  => false,
		) );

		if ( ( $projects ) && ( ! empty( $projects ) ) && ( ! is_wp_error( $projects ) ) ) {

			echo "<section class=\"section projects\" id=\"projects\">\r\n";
			echo "  <div class=\"container\">\r\n";
			echo "    <div class=\"row\">\r\n";
			echo "      <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
			if ( get_theme_mod( 'projects_heading_flag', true ) ) {
				echo "        <div class=\"section__heading heading\">\r\n";
				echo "          <h2 class=\"title\"><a href=\"" . get_category_link( $projects_category->term_id ) . "\">" . apply_filters( 'the_title', $projects_category->name ) . "</a></h2>\r\n";
				if ( ! empty( trim( $projects_category->description ) ) ) echo "          <div class=\"desctiption\">" . apply_filters( 'the_excerpt', $projects_category->description ) . "</div>\r\n";
				echo "        </div>\r\n"; // .section__heading
			}
			echo "        <div class=\"section__body body\">\r\n";
			echo "          <button class=\"slider-arrow slider-prev\" id=\"projects-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
			echo "          <button class=\"slider-arrow slider-next\" id=\"projects-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
			echo "          <div class=\"slider\" id=\"projects-slider\">\r\n";

			foreach ( $projects as $project ) {
				
				setup_postdata( $project );
				$project_thumbnail_url = get_the_post_thumbnail_url( $project->ID, 'medium' );
				$project_title_attribute = the_title_attribute( array(
					'before'  => '',
					'adter'   => '',
					'echo'    => false,
					'post'    => $project->ID,
				) );

				echo "<div class=\"" . join( ' ', get_post_class( 'slider-for__entry entry', $project->ID ) ) . "\">\r\n";
				echo "  <div class=\"row\">\r\n";
				if ( $project_thumbnail_url ) {
					echo "    <div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">\r\n";
					echo "      <img class=\"center-block wp-post-image\" src=\"#\" data-lazy=\"" . $project_thumbnail_url . "\" alt=\"" . $project_title_attribute . "\">\r\n";
					echo "    </div>\r\n"; // .col-
				}
				echo "    <div class=\"col-xs-12 col-sm col-md col-lg\">\r\n";
				echo "      <div class=\"title\"><h3>" . apply_filters( 'the_title', $project->post_title ) . "</h3></div>\r\n";
				if ( has_excerpt( $project->ID ) ) echo "      <div class=\"excerpt\">" . apply_filters( 'the_excerpt', $project->post_excerpt ) . "</div>\r\n";
				echo "      <p><a class=\"btn btn-success\" href=\"\">" . __( 'Подробней', 'pstu-next-theme' ) . "</a></p>\r\n";
				echo "    </div>\r\n"; // .col-
				echo "  </div>\r\n"; // .row
				echo "</div>\r\n"; // .entry

			}

			wp_reset_postdata();

			echo "          </div>\r\n"; // #projects-slider
			echo "        </div>\r\n"; // .section__body
			echo "      </div>\r\n"; // .col-
			echo "    </div>\r\n"; // .row
			echo "  </div>\r\n"; // .container
			echo "</section>\r\n";

			unset( $project );
			unset( $project_thumbnail_url );
			unset( $project_title_attribute );

		} // if $projects

		unset( $projects );

	} // if $projects_category

	unset( $projects_category );

} // if $projects_category_id

unset( $projects_category_id );



?>