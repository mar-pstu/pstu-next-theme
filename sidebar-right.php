<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };



echo "<aside class=\"aside aside--right\">\r\n";
echo "  <div class=\"row\">\r\n";
dynamic_sidebar( 'side_right' );
echo "  </div>\r\n"; // .row
echo "</aside>\r\n";


?>