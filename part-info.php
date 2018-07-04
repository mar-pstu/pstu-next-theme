<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


$info = arra(
	'title'			=> '',
	'excerpt'		=> '',
	'permalink'	=> '',
);



echo "<div class=\"main__info info\">\r\n";
if ( get_theme_mod( 'qr_code_url', true ) ) echo "  <img class=\"lazy qr-code\" src=\"#\" data-src=\"http://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=100x100&amp;chl=" . get_the_permalink( get_the_ID() ) . "\">\r\n";
echo "  <h1 class=\"title\">" . apply_filters( 'the_title', get_the_title( get_the_ID() ) ) . "</h1>\r\n";
if ( has_excerpt( get_the_ID() ) ) echo "  <p class=\"lead\">Шаблон блога / категории / архива (index.php / category.php / archive.php)</p>\r\n";
the_breadcrumb();
echo "  <div class=\"clearfix\">\r\n";

get_template_part( 'part', 'share' );

echo "  </div>\r\n";
echo "</div>\r\n";