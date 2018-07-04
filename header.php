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
echo "        </div>\r\n";

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

echo "        <div class=\"header__bloginfo bloginfo\">\r\n";
echo "          <div class=\"container\">\r\n";
echo "            <div class=\"row\">\r\n";
echo "              <div class=\"col-xs-12 col-sm-3 col-md-2 col-lg-2 middle-xs\">\r\n";
echo "                <a class=\"custom-logo-link\" title=\"" . esc_attr__( 'На главную', 'pstu-next-theme' ) . "\" href=\"" . ( ( function_exists( 'pll_home_url' ) ) ? pll_home_url() : get_home_url( get_current_blog_id() ) ) . "\">\r\n";
echo "                  <img class=\"custom-logo\" src=\"images/pstu.png\" title=\"" . esc_attr( get_bloginfo( 'name' ) ) . "\">\r\n";
echo "                </a>\r\n";
echo "              </div>\r\n"; // .col-
echo "              <div class=\"col-xs-12 col-sm-9 col-md col-lg middle-xs\">\r\n";
if ( is_front_page() ) {
  echo "                <h1 class=\"bloginfo-name\">" . get_bloginfo( 'name' ) . "</h1>\r\n";
} else {
  echo "                <div class=\"bloginfo-name\">" . get_bloginfo( 'name' ) . "</div>\r\n";
}
echo "                <p class=\"bloginfo-description\">" . get_bloginfo( 'description' ) . "</p>\r\n";
echo "              </div>\r\n"; // .col-
get_sidebar( 'header' );
echo "            </div>\r\n"; //. row
echo "          </div>\r\n"; // .container
echo "        </div>\r\n"; // .header__bloginfo

echo "        <div class=\"header__nav nav\">\r\n";
echo "          <div class=\"container\">\r\n";
echo "            <div class=\"row\">\r\n";
echo "              <div class=\"col-xs-10 col-sm-10 col-md-7 col-lg-2\">\r\n";
echo "                <form class=\"searchform\" id=\"header-search\" action=\"\" method=\"post\">\r\n";
echo "                  <input class=\"form-control\" type=\"search\" name=\"s\" placeholder=\"\">\r\n";
echo "                  <input class=\"submit\" type=\"submit\" value=\"" . esc_attr__( 'Поиск', 'pstu-next-theme' ) . "\">\r\n";
echo "                </form>\r\n";
echo "              </div>\r\n";
echo "              <div class=\"col-xs-2 col-sm-2 col-md-5 col-lg-2 text-right\">\r\n";
echo "                <a class=\"help-button\" id=\"help-button\" href=\"#help-modal\" role=\"button\" data-fancybox=\"\"><i class=\"icon icon-help\"></i></a>\r\n";
if ( $pstu_help_content = get_theme_mod( 'pstu_help_content', false ) ) {
  echo "                <a class=\"rss-button\" id=\"rss-button\" href=\"#\" role=\"button\"><i class=\"icon icon-rss\"></i></a>\r\n";
  echo "                <div style=\"display: none;\">\r\n";
  echo "                  <div class=\"help-modal\" id=\"help-modal\">\r\n";
  do_shortcode( $pstu_help_content );
  echo "                  </div>\r\n";
  echo "                </div>\r\n";
}
echo "              </div>\r\n"; // .col-
echo "              <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-8 first-lg\">\r\n";
echo "                <button class=\"nav__burger burger\" id=\"header-nav-burger\" title=\"" . esc_attr__( 'Открыть главное меню', 'pstu-next-theme' ) . "\">" . __( 'Главное меню', 'pstu-next-theme' ) . "</button>\r\n";
wp_nav_menu( array( 
  'theme_location'    => 'menu_main',
  'fallback_cb'       => '__return_empty_string',
  'container'         => false,
  'menu_id'           => 'header-nav-list',
  'menu_class'        => 'nav__list list',
  'depth'             => 3,
) );
echo "              </div>\r\n"; // .col-
echo "            </div>\r\n"; // .row
echo "          </div>\r\n"; // .container
echo "        </div>\r\n"; // .header__nav

echo "      </header>\r\n";
echo "      <main class=\"wrapper__item wrapper__item--main main\" id=\"main\">\r\n";

?>