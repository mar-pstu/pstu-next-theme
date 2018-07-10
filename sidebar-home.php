<?php

/**
 *	Сайдбар главной страницы
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<aside class=\"aside\">\r\n";
echo "  <div class=\"row\">\r\n";
dynamic_sidebar( 'side_home' );
echo "  </div>\r\n"; // .row
echo "</aside>\r\n";


?>