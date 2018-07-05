<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

get_template_part( 'section', 'jumbotron' );
if ( get_theme_mod( 'sticky_section_flag', false ) ) get_template_part( 'section', 'sticky' );

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-12 col-md-7 col-lg-8\">\r\n";
get_template_part( 'section', 'flat' );
echo "    </div>\r\n"; // .col-
echo "    <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4\">\r\n";
get_template_part( 'section', 'events' );
echo "    </div>\r\n"; // .col-
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

get_template_part( 'section', 'action' );

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"" . ( ( is_active_sidebar( 'home' ) ) ? 'col-xs-12 col-sm-12 col-md-7 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12' ) . "\">\r\n";
if ( get_theme_mod( 'news_section_flag', false ) ) get_template_part( 'section', 'news' );
echo "    </div>\r\n"; // .col-
if ( is_active_sidebar( 'home' ) ) {
  echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";
  get_sidebar( 'home' );
  echo "    </div>\r\n"; // .col-
}
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'share_section_flag', false ) ) get_template_part( 'section', 'share' );
if ( get_theme_mod( 'people_section_flag', false ) ) get_template_part( 'section', 'people' );
if ( get_theme_mod( 'current_section_flag', false ) ) get_template_part( 'section', 'current' );
if ( get_theme_mod( 'projects_section_flag', false ) ) get_template_part( 'section', 'projects' );

get_footer();

?>