<?php

/**
 *	Template Name: Without SIDEBAR
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
if ( have_posts() ) {
	while ( have_posts() ) {
		
		the_post();
		echo "      <article>\r\n";
		get_template_part( 'parts/pageheader' );
		echo "        <div class=\"entry-content\">\r\n";
		the_content();
		echo "        </div>\r\n"; // .entry-content
		get_template_part( 'parts/info' );
		echo "      </article>\r\n";
		get_template_part( 'parts/pager' );
		if ( get_theme_mod( 'similar_section_flag', false ) ) get_template_part( 'sections/similar' );
		if ( comments_open( get_the_ID() ) ) comments_template();

	}
}
echo "    </div>\r\n"; // .col-
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

get_footer();