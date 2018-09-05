<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<!DOCTYPE html>\r\n";
echo "<html " . get_language_attributes() . ">\r\n";
echo "  <head>\r\n";
echo "    <meta charset=\"" . get_bloginfo( 'charset' ) . "\">\r\n";
echo "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">\r\n";
echo "    <meta name=\"description\" content=\"" . get_bloginfo( 'description' ) . "\">\r\n";
wp_head();
echo "  </head>\r\n";
echo "  <body class=\"" . join( ' ', get_body_class() ) . "\">\r\n";
echo "    <div class=\"wrapper\" id=\"wrapper\">\r\n";
echo "      <header class=\"wrapper__item header\" id=\"header\">\r\n";

if ( has_nav_menu( 'menu_fixed' ) ) {
  echo "        <div class=\"header__fixed fixed\">\r\n";
  echo "          <div class=\"button\"><i class=\"icon icon-sort-down\"></i></div>\r\n";
  wp_nav_menu( array( 
    'theme_location'    => 'menu_fixed',
    'fallback_cb'       => '__return_empty_string',
    'container'         => false,
      'menu_id'           => '',
    'menu_class'        => 'list',
    'depth'             => 2,
  ) );
  echo "        </div>\r\n"; // .header__fixed
}

if ( has_nav_menu( 'menu_second' ) ) {
  echo "        <div class=\"header__top top\">\r\n";
  echo "          <div class=\"container-fluid\">\r\n";
  echo "            <div class=\"row\">\r\n";
  echo "              <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
  echo "                <nav class=\"nav\">\r\n";
  echo "                  <button class=\"nav__burger burger\" id=\"top-nav-burger\" title=\"" . esc_attr__( 'Открыть верхнее меню', 'pstu-next-theme' ) . "\">" . __( 'Верхнее меню', 'pstu-next-theme' ) . "</button>\r\n";
  wp_nav_menu( array( 
    'theme_location'    => 'menu_second',
    'fallback_cb'       => '__return_empty_string',
    'container'         => false,
    'menu_id'           => 'top-nav-list',
    'menu_class'        => 'nav__list list',
    'depth'             => 3,
  ) );
  echo "                </nav>\r\n";
  echo "              </div>\r\n"; // .col-
  echo "            </div>\r\n"; // .row
  echo "          </div>\r\n"; // .container-fluid
  echo "        </div>\r\n"; // .header__top
}

echo "        <div class=\"header__bloginfo bloginfo\">\r\n";
echo "          <div class=\"container\">\r\n";
echo "            <div class=\"row middle-xs\">\r\n";
if ( has_custom_logo() ) echo "<div class=\"col-xs-12 col-sm-3 col-md-2 col-lg-2 middle-xs\">" . get_custom_logo() . "</div>\r\n";
echo "              <div class=\"col-xs-12 col-sm col-md col-lg middle-xs\">\r\n";

echo force_balance_tags( sprintf(
  "%s<a href=\"%s\" title=\"%s - %s\">%s</a>",
  ( ( is_front_page() ) ? "<h1 class=\"bloginfo-name\">" : "<div class=\"bloginfo-name\">" ),
  get_home_url(),
  __( 'На главную', 'pstu-next-theme' ),
  get_bloginfo( 'name' ),
  get_bloginfo( 'name' )
) );

echo "                <p class=\"bloginfo-description\">" . get_bloginfo( 'description' ) . "</p>\r\n";
echo "              </div>\r\n"; // .col-
if ( is_active_sidebar( 'side_header' ) ) dynamic_sidebar( 'side_header' );
echo "            </div>\r\n"; //. row
echo "          </div>\r\n"; // .container
echo "        </div>\r\n"; // .header__bloginfo

echo "        <div class=\"header__nav nav\">\r\n";
echo "          <div class=\"container\">\r\n";
echo "            <div class=\"row\">\r\n";
if ( get_theme_mod( 'header_search_flag', false ) ) {
  echo "              <div class=\"col-xs-10 col-sm-10 col-md-7 col-lg-2\">\r\n";
  echo "                <form class=\"searchform\" id=\"header-search\" action=\"" . home_url( '/' ) . "\" method=\"get\" role=\"search\">\r\n";
  echo "                  <input class=\"form-control\" type=\"search\" id=\"header-s\" name=\"s\" placeholder=\"\" value=\"" . get_search_query() . "\">\r\n";
  echo "                  <input class=\"submit\" id=\"header-search-submit\" type=\"submit\" value=\"" . esc_attr__( 'Поиск', 'pstu-next-theme' ) . "\">\r\n";
  echo "                </form>\r\n";
  echo "              </div>\r\n";
}
echo "              <div class=\"col-xs-2 col-sm-2 col-md-5 col-lg-2 text-right\">\r\n";
echo "                <a class=\"rss-button\" id=\"rss-button\" href=\"" . get_home_url( ) . "/feed/\" role=\"button\"><i class=\"icon icon-rss\"></i></a>\r\n";
if ( ! empty( trim( $pstu_header_help_modal_content = get_theme_mod( 'header_help_content', '' ) ) ) ) {
  echo "                <a class=\"help-button\" id=\"help-button\" href=\"#help-modal\" role=\"button\" data-fancybox=\"\"><i class=\"icon icon-help\"></i></a>\r\n";
  echo "                <div style=\"display: none;\">\r\n";
  echo "                  <div class=\"help-modal\" id=\"help-modal\">\r\n";
  echo apply_filters( 'pstu_theme_header_help_modal_content', do_shortcode( force_balance_tags( $pstu_header_help_modal_content ) ) );
  echo "                  </div>\r\n";
  echo "                </div>\r\n";
}
echo "              </div>\r\n"; // .col-
echo "              <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg first-lg\">\r\n";
if ( has_nav_menu( 'menu_main' ) ) {
  echo "                <button class=\"nav__burger burger\" id=\"header-nav-burger\" title=\"" . esc_attr__( 'Открыть главное меню', 'pstu-next-theme' ) . "\">" . __( 'Главное меню', 'pstu-next-theme' ) . "</button>\r\n";
  wp_nav_menu( array( 
    'theme_location'    => 'menu_main',
    'fallback_cb'       => '__return_empty_string',
    'container'         => false,
    'menu_id'           => 'header-nav-list',
    'menu_class'        => 'nav__list list',
    'depth'             => 3,
  ) );
}
echo "              </div>\r\n"; // .col-
echo "            </div>\r\n"; // .row
echo "          </div>\r\n"; // .container
echo "        </div>\r\n"; // .header__nav

echo "      </header>\r\n";
echo "      <main class=\"wrapper__item wrapper__item--main main\" style=\"position: relative;\" id=\"main\">\r\n";

if ( is_singular( array( 'page', 'post' ) ) )
  if ( $main_bgi_id = get_post_meta( get_the_ID(), 'pstu_bgi', true ) )
    if ( $main_bgi_src = wp_get_attachment_image_url( $main_bgi_id, ( wp_is_mobile() ? 'medium' : 'large' ) ) )
      echo "<div class=\"main-bgi lazy\" data-src=\"" . $main_bgi_src . "\"></div>";

?>