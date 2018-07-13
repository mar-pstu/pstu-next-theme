<?php

get_header();

$error404_title = get_theme_mod( 'error404_title', 'Ошибка 404' );
$error404_subtitle = get_theme_mod( 'error404_subtitle', '' );

if ( function_exists( 'ppl__' ) ) {
  $error404_title = ppl__( $error404_title );
  $error404_subtitle = ppl__( $error404_subtitle );
}

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">\r\n";
echo "      <h1>" . $error404_title . "</h1>\r\n";
if ( ! empty( trim( $error404_subtitle ) ) ) echo "      <div class=\"lead\">" . $error404_subtitle . "</div>\r\n";
echo "    </div>\r\n";
echo "    <div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6 first-sm\">\r\n";
echo "      <img class=\"lazy error404__logo logo\" src=\"#\" data-src=\"" . get_theme_mod( 'error404_logo', PSTU_NEXT_THEME_URL . 'images/error-logo.png' ) . "\">\r\n";
echo "    </div>\r\n";
echo "  </div>\r\n";
echo "</div>\r\n";

get_footer();

?>