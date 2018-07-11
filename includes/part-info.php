<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


$info = array(
	'title'			=> '',
	'excerpt'		=> '',
	'permalink'	=> '',
);



echo "<div class=\"main__info info\">\r\n";
if ( get_theme_mod( 'qr_code_url', true ) ) echo "  <img class=\"lazy qr-code\" src=\"#\" data-src=\"http://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=100x100&amp;chl=" . wp_get_shortlink( get_the_ID(), 'post', true ) . "\">\r\n";
echo "  <h1 class=\"title\">" . apply_filters( 'the_title', get_the_title( get_the_ID() ) ) . "</h1>\r\n";
if ( has_excerpt( get_the_ID() ) ) echo "  <p class=\"lead\">" . get_the_excerpt( get_the_ID() ) . "</p>\r\n";

echo "  <div class=\"clearfix\">\r\n";
echo "    <div class=\"pull-left\">";
the_breadcrumb();
echo "    </div>\r\n"; // .pull-left
if ( ( is_single() ) || ( is_page() ) ) {
	echo "    <div class=\"pull-left\">";
	set_post_views( get_the_ID() );
	get_post_views( get_the_ID() );
	echo "    </div>\r\n"; // .pull-left
}
echo "  </div>\r\n"; // .clearfix


echo "  <div class=\"clearfix\">\r\n";

get_template_part( 'part', 'share' );

echo "  </div>\r\n";
echo "</div>\r\n";