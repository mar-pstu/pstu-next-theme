<?php

/**
 *	Форма поиска
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result[] = "<form class=\"searchform form\" id=\"searchform\" role=\"search\" method=\"get\" action=\"" . home_url( '/' ) . "\">\r\n";
$result[] = "  <div class=\"form-group\">\r\n";
$result[] = "    <div class=\"input-group\">\r\n";
$result[] = "      <input class=\"form-control\" id=\"s\" type=\"text\" value=\"" . get_search_query() . "\" name=\"s\">\r\n";
$result[] = "      <button class=\"btn btn-success\" id=\"searchsubmit\" type=\"submit\" role=\"button\">" . __( 'Найти', 'pstu-next-theme' ) . "</button>\r\n";
$result[] = "    </div>\r\n";
$result[] = "  </div>\r\n"; // .form-group
$result[] = "</form>\r\n";

echo apply_filters( 'pstu_theme_searchform', implode( "\r\n" , $result ) );

unset( $result );


?>