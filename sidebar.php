<?php

/**
 *	Сайдбар в подвале сайта
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<aside class=\"aside aside--basement bottom-xs\" id=\"aside-basement\">\r\n";
echo "  <div class=\"container\">\r\n";
echo "    <div class=\"row\">\r\n";

dynamic_sidebar( 'side_basement' );

echo "    </div>\r\n"; //.row
echo "  </div>\r\n"; // .container
echo "</aside>\r\n";

?>