<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

get_template_part( 'includes/section', 'jumbotron' );
if ( get_theme_mod( 'sticky_section_flag', false ) ) get_template_part( 'includes/section', 'sticky' );

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-12 col-md-7 col-lg-8\">\r\n";
if ( get_theme_mod( 'flat_section_flag', false ) ) get_template_part( 'includes/section', 'flat' );
echo "    </div>\r\n"; // .col-
echo "    <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4\">\r\n";
if ( get_theme_mod( 'events_section_flag', false ) ) get_template_part( 'includes/section', 'events' );
echo "    </div>\r\n"; // .col-
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'action_section_flag', false ) ) get_template_part( 'includes/section', 'action' );

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"" . ( ( is_active_sidebar( 'home' ) ) ? 'col-xs-12 col-sm-12 col-md-7 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12 col-lg-12' ) . "\">\r\n";
if ( get_theme_mod( 'news_section_flag', false ) ) get_template_part( 'includes/section', 'news' );
echo "    </div>\r\n"; // .col-
if ( is_active_sidebar( 'home' ) ) {
  echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";
  get_sidebar( 'home' );
  echo "    </div>\r\n"; // .col-
}
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'share_section_flag', false ) )			get_template_part( 'includes/section', 'share' );
if ( get_theme_mod( 'people_section_flag', false ) )		get_template_part( 'includes/section', 'people' );
if ( get_theme_mod( 'current_section_flag', false ) )		get_template_part( 'includes/section', 'current' );
if ( get_theme_mod( 'projects_section_flag', false ) )	get_template_part( 'includes/section', 'projects' );

get_footer();

?>