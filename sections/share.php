<?php

/**
 *  Блок поделиться
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


$share_title = get_theme_mod( 'share_section_title', get_bloginfo( 'name' ) );
if ( function_exists( 'pll__' ) ) $share_title = pll__( $share_title );

$share_bgi = get_theme_mod( 'share_section_bgi', PSTU_NEXT_THEME_URL . 'images/share_bg.jpg' );

echo "<section class=\"share lazy\" id=\"share\" data-src=\"" . $share_bgi . "\">\r\n";
echo "  <div class=\"section__body body\">\r\n";
echo "    <div class=\"container\">\r\n";
echo "      <div class=\"row\">\r\n";
echo "        <div class=\"col-xs-12 col-sm-3 col-md-2 col-lg-2\">\r\n";
echo "          <img class=\"share__qr-code qr-code lazy\" src=\"#\" data-src=\"http://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=100x100&amp;chl=" . get_home_url() . "\">\r\n";
echo "        </div>\r\n";
echo "        <div class=\"col-xs-12 col-sm-9 col-md-10 col-lg-10 first-sm\">\r\n";
if ( ! empty( $share_title ) ) echo "<div class=\"share__title title\" data-aos=\"fade-up\"><h2>" . $share_title . "</h2></div>\r\n";
echo "          <ul class=\"share__jssocials jssocials\" id=\"shareIcons\"></ul>\r\n";
echo "        </div>\r\n"; // .col-
echo "      </div>\r\n"; // .row
echo "    </div>\r\n"; // .container
echo "  </div>\r\n"; // .section__body
echo "</section>\r\n";


?>