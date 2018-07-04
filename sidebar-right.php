<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( is_active_sidebar( 'side_right' ) ) {

  echo "<aside class=\"aside aside--right\">\r\n";
  echo "  <div class=\"row\">\r\n";

  dynamic_sidebar( 'side_right' );

  echo "  </div>\r\n";
  echo "</aside>\r\n";

}

?>