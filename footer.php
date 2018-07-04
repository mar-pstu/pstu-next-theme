<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "      </main>\r\n";

echo "      <div class=\"links\">\r\n";
echo "        <div class=\"container\">\r\n";
echo "          <div class=\"row\">\r\n";
echo "            <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
wp_nav_menu( array( 
  'theme_location'    => 'menu_fixed',
  'fallback_cb'       => '__return_empty_string',
  'container'         => false,
  'menu_id'           => 'basement-nav-list',
  'menu_class'        => 'links__list list text-center',
  'depth'             => 1,
) );
echo "            </div>\r\n"; // .col-
echo "          </div>\r\n"; // .row
echo "        </div>\r\n"; // .container
echo "      </div>\r\n"; // .links

get_sidebar();

if ( get_theme_mod( 'partners_section_flag', $default = false ) ) get_template_part( 'section', 'partners' );

echo "      <footer class=\"footer wrapper__item\" id=\"footer\">\r\n";
echo "        <div class=\"container\">\r\n";
echo "          <div class=\"row\">\r\n";
echo "            <div class=\"col-xs-12 first-sm col-sm-3 col-md-4 col-lg-4\">\r\n";
echo "              <p class=\"copyright\">2018 &copy; <a href=\"//pstu.edu\" title=\"Государственное высшее учебное заведение Приазовский государственный технический университет\">ГВУЗ ПГТУ</a></p>\r\n";
echo "            </div>\r\n";
echo "            <div class=\"col-xs-12 first-xs col-sm-6 col-md-4 col-lg-4\">\r\n";
get_template_part( 'part', 'social' );
echo "            </div>\r\n";
echo "            <div class=\"col-xs-12 col-sm-3 col-md-4 col-lg-4\">\r\n";
echo "              <p class=\"developer\">Разработка: <a href=\"//cct.pstu.edu\" title=\"Центр компьютерных технологий Приазовского государственного технического университета\">ЦКТ ПГТУ</a></p>\r\n";
echo "            </div>\r\n";
echo "          </div>\r\n";
echo "        </div>\r\n";
echo "      </footer>\r\n";
wp_footer();
echo "    </div>\r\n";
echo "  </body>\r\n";
echo "</html>\r\n";