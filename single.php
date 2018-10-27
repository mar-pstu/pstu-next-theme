<?php

get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";

echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";
if ( have_posts() ) {
	while ( have_posts() ) {
		
		the_post();
		echo "      <article class=\"entry-content\">\r\n";
		do_action( 'pstu_theme_article_start' );
		get_template_part( 'includes/part', 'info' );      
		echo "        <div class=\"entry-content\">\r\n";
		switch ( get_post_format( get_the_ID() ) ) {
			case 'link':
				if ( $entry_link = get_url_in_content( get_the_content( get_the_ID() ) ) ) {
					$entry_titile_attr = the_title_attribute( array(
						'before'  => '',
						'adter'   => '',
						'echo'    => false,
						'post'    => get_the_ID(),
					) );
					echo "<div class=\"well\">\r\n";
					echo "  <div class=\"row middle-xs\">\r\n";
					echo "    <div class=\"col-xs-12 col-sm-4 col-md-4 col-lg-4\">\r\n";
					echo "    	<a class=\"center-block\" target=\"_blank\" title=\"" . sprintf( "%s - %s", __( 'Перейти', 'pstu-next-theme' ), $entry_titile_attr ) . "\" href=\"" . $entry_link . "\"><img class=\"center-block lazy\" src=\"#\" data-src=\"" . PSTU_NEXT_THEME_URL . "images/grid-world.png\"></a>\r\n";
					echo "    </div>\r\n"; // .col-
					echo "    <div class=\"col-xs-12 col-sm-8 col-md-8 col-lg-8\">\r\n";
					echo "      <p class=\"text-center lead\"><a target=\"_blank\" title=\"" . sprintf( "%s - %s", __( 'Перейти', 'pstu-next-theme' ), $entry_titile_attr ) . "\" class=\"text-success font-bold\" href=\"" . $entry_link . "\">" . $entry_link . "</a></p>\r\n";
					echo "      <p class=\"text-center\"><a target=\"_blank\" title=\"" . sprintf( "%s - %s", __( 'Перейти', 'pstu-next-theme' ), $entry_titile_attr ) . "\" href=\"" . $entry_link . "\" class=\"btn btn-success\">" . __( 'Перейти', 'pstu-next-theme' ) . "</a></p>\r\n";
					echo "    </div>\r\n"; // .col-
					echo "  </div>\r\n"; // .row
					echo "</div>\r\n"; // .well
				}
				the_content();
				break;
			default:
				the_content();
				break;
		}
		echo "        </div>\r\n"; // .entry-content
		get_template_part( 'includes/part', 'authors' );
		do_action( 'pstu_theme_article_end' );
		echo "      </article>\r\n";
		get_template_part( 'includes/part', 'pager' );
		if ( get_theme_mod( 'similar_section_flag', false ) ) get_template_part( 'sections', 'similar' );
		if ( comments_open( get_the_ID() ) ) comments_template();

	}
}
echo "    </div>\r\n"; // .col-

if ( is_active_sidebar( 'side_right' ) ) {
	echo "    <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4\">\r\n";
	get_sidebar( 'right' );
	echo "    </div>\r\n"; // .col-
}

echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'current_section_flag', false ) ) get_template_part( 'sections', 'current' );

get_footer();

?>