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
		do_action( 'pstu_theme_article_start' );
		get_template_part( 'includes/part', 'info' );

		echo "        <div class=\"entry-content\">\r\n";
		$flat_entryes = get_pages( array(
			'sort_order'   => 'ASC',
			'sort_column'  => 'post_title',
			'hierarchical' => 0,
			'parent'       => get_the_ID(),
			'post_type'    => 'page',
			'post_status'  => 'publish',
		) );
		if ( ( $flat_entryes ) && ( ! empty( $flat_entryes ) ) && ( ! is_wp_error( $flat_entryes ) ) ) {
			$result[] = "<section class=\"flat\" id=\"flat\">";
			$result[] = "  <div class=\"row\">";
			foreach ( $flat_entryes as $flat_entry ) {   
				$result[] = "<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">";
				$result[] = "  <a class=\"flat__entry entry\" href=\"" . $flat_entry[ 'link' ] . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $flat_entry[ 'title' ] ) ) . "\">";
				$result[] = "    <img class=\"wp-post-image lazy\" src=\"#\" data-src=\"" . $flat_entry[ 'thumbnail' ] . "\"/>";
				$result[] = "    <div class=\"title\"><h3>" . $flat_entry[ 'title' ] . "</h3></div>";
				if ( ! empty( trim( $flat_entry[ 'excerpt' ] ) ) ) $result[] = "    <div class=\"excerpt\"></div>";
				$result[] = "  </a>";
				$result[] = "</div>"; //col-
			} // foreach
			$result[] = "  </div>"; // .row
			$result[] = "</section>";
			$result[] = get_the_title( get_the_ID() );
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