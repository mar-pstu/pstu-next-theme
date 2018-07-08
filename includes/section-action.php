<?php


/**
 *  Секция главйной страницы
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<section class=\"action lazy\" id=\"action\" data-src=\"images/action_bgi.jpg\">\r\n";
echo "  <div class=\"container\">\r\n";
echo "    <div class=\"row middle-xs\">\r\n";
echo "      <div class=\"col-xs-12 col-sm-8 col-md-9 col-lg-9\">\r\n";
echo "        <div class=\"action__content content\">\r\n";
$action_section_title = trim( get_theme_mod( 'action_section_title', '' ) );
$action_section_subtitle = trim( get_theme_mod( 'action_section_subtitle', '' ) );
if ( ! empty( $action_section_title ) ) echo "<h2>" . $action_section_title . "</h2>\r\n";
if ( ! empty( $action_section_subtitle ) ) echo $action_section_subtitle;
echo "        </div>\r\n";
echo "      </div>\r\n"; // .col-
echo "      <div class=\"col-xs-12 col-sm-4 col-md-3 col-lg-3\">\r\n";
echo "        <div class=\"action__btns btns\">\r\n";
echo "          <p><a class=\"btn btn-success btn-md\" href=\"\">Как стать студентом?</a></p>\r\n";
echo "          <p><a class=\"btn btn-success btn-md\" href=\"\">Найти ПГТУ на карте</a></p>\r\n";
echo "        </div>\r\n";
echo "      </div>\r\n"; // col-
echo "    </div>\r\n"; // .row
echo "  </div>\r\n"; // .container
echo "</section>\r\n";

unset( $action_section_title );
unset( $action_section_subtitle );

?>