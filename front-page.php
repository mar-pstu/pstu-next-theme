<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

if ( get_theme_mod( 'jumbotron_section_flag', false ) ) get_template_part( 'sections/jumbotron' );
if ( get_theme_mod( 'sticky_section_flag', false ) ) get_template_part( 'sections/sticky' );

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
if ( get_theme_mod( 'flat_section_flag', false ) ) get_template_part( 'sections/flat' );
if ( get_theme_mod( 'events_section_flag', false ) ) get_template_part( 'sections/events' );
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'action_section_flag', false ) ) get_template_part( 'sections/action' );

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-12 col-md-8 col-lg-8\">\r\n";
if ( get_theme_mod( 'news_section_flag', false ) ) get_template_part( 'sections/news' );
echo "    </div>\r\n"; // .col-
if ( is_active_sidebar( 'side_home' ) ) {
  echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";
  get_sidebar( 'home' );
  echo "    </div>\r\n"; // .col-
}
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'share_section_flag', false ) )			get_template_part( 'sections/share' );
if ( get_theme_mod( 'people_section_flag', false ) )		get_template_part( 'sections/people' );
if ( get_theme_mod( 'current_section_flag', false ) )		get_template_part( 'sections/current' );
if ( get_theme_mod( 'projects_section_flag', false ) )	get_template_part( 'sections/projects' );

get_footer();

?>