<?php

get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";

echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";
if ( have_posts() ) {
	while ( have_posts() ) {
		
		the_post();
		echo "      <article class=\"entry-content\">\r\n";
		get_template_part( 'part', 'info' );      
		echo "        <div class=\"entry-content\">\r\n";
		the_content();
		echo "        </div>\r\n"; // .entry-content
		get_template_part( 'part', 'authors' );
		echo "      </article>\r\n";
		get_template_part('part', 'pager' );
		get_template_part( 'section', 'similar' );
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