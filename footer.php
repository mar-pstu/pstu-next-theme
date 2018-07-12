<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "      </main>\r\n";

if ( has_nav_menu( 'menu_footer' ) ) {
	echo "      <div class=\"links\">\r\n";
	echo "        <div class=\"container\">\r\n";
	echo "          <div class=\"row\">\r\n";
	echo "            <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
	wp_nav_menu( array( 
	  'theme_location'    => 'menu_footer',
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
}

if ( is_active_sidebar( 'side_basement' ) ) get_sidebar();

if ( get_theme_mod( 'partners_section_flag', false ) ) get_template_part( 'includes/section', 'partners' );

echo "      <footer class=\"footer wrapper__item\" id=\"footer\">\r\n";
echo "        <div class=\"container\">\r\n";
echo "          <div class=\"row\">\r\n";
echo "            <div class=\"col-xs-12 first-sm col-sm-3 col-md-4 col-lg-4\">\r\n";
printf(
	"<p class=\"copyright\">%d &copy; <a href=\"//pstu.edu\" title=\"%s\">%s</a></p>\r\n",
	date( 'Y' ),
	__( 'Государственное высшее учебное заведение Приазовский государственный технический университет', 'pstu-next-theme' ),
	__( 'ГВУЗ ПГТУ', 'pstu-next-theme' )
);
echo "            </div>\r\n";
if ( get_theme_mod( 'socials_flag', false ) ) {
	echo "            <div class=\"col-xs-12 first-xs col-sm-6 col-md-4 col-lg-4\">\r\n";
	get_template_part( 'part', 'social' );
	echo "            </div>\r\n"; // .col-
}
echo "            <div class=\"col-xs-12 col-sm-3 col-md col-lg\">\r\n";
printf(
	"<p class=\"developer\">%s: <a href=\"//cct.pstu.edu\" title=\"%s\">%s</a></p>\r\n",
	__( 'Разработка', 'pstu-next-theme' ),
	__( 'Центр компьютерных технологий Приазовского государственного технического университета', 'pstu-next-theme' ),
	__( 'ЦКТ ПГТУ', 'pstu-next-theme' )
);
echo "            </div>\r\n"; // .col-
echo "          </div>\r\n"; // .row
echo "        </div>\r\n"; // .container
echo "      </footer>\r\n";
wp_footer();
echo "    </div>\r\n"; // #WRAPPER
echo "  </body>\r\n";
echo "</html>\r\n";