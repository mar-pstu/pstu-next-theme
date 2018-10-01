<?php

/**
 *
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( is_singular() ) {
	$info = array(
		'title'			=> esc_html( get_the_title( get_the_ID() ) ),
		'excerpt'		=> ( has_excerpt( get_the_ID() ) ) ? apply_filters( 'the_excerpt', get_the_excerpt( get_the_ID() ) ) : '',
		'permalink'	=> wp_get_shortlink( get_the_ID(), 'post', true ),
	);
} elseif ( is_archive() ) {
	$info = array(
		'title'			=> apply_filters( 'the_title', get_the_archive_title() ),
		'excerpt'		=> apply_filters( 'the_excerpt', get_the_archive_description() ),
		'permalink'	=> '',
	);
} elseif ( is_search() ) {
	$info = array(
		'title'			=> __( 'Результаты поиска', 'pstu-next-theme' ),
		'excerpt'		=> '',
		'permalink'	=> '',
	);
} else {
	$info = array(
		'title'			=> '',
		'excerpt'		=> '',
		'permalink'	=> '',
	);
}

echo "<div class=\"main__info info\">\r\n";
if ( get_theme_mod( 'qr_code_url', true ) ) {
	if ( ( ! empty( $info[ 'permalink' ] ) ) && ( ! is_wp_error( $info[ 'permalink' ] ) ) ) echo "  <img class=\"lazy qr-code\" src=\"#\" data-src=\"http://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=100x100&amp;chl=" . $info[ 'permalink' ] . "\">\r\n";
}
if ( ! empty( $info[ 'title' ] ) ) echo "  <h1 class=\"title\">" . $info[ 'title' ] . "</h1>\r\n";
if ( ! empty( $info[ 'excerpt' ] ) ) echo "  <div class=\"lead\">" . $info[ 'excerpt' ] . "</div>\r\n";

the_breadcrumb();

echo "  <div class=\"clearfix\">\r\n";
if ( get_theme_mod( 'share_section_flag', false ) ) echo "<ul class=\"share__jssocials jssocials\" id=\"shareIcons\"></ul>\r\n";
echo "  </div>\r\n"; // .clearfix

if ( is_singular() ) {
	echo "  <div class=\"text-right clearfix\" style=\"margin: 10px 0px\">\r\n";
	the_pstu_languages( array(
		'before' 	=> sprintf(
			'<div class=" pull-left"><i class="icon icon-language"></i>&nbsp;%1$s: </div><ul class="list-unstyled list-inline alignleft">',
				__( 'Переводы', 'pstu-next-theme' )
		),
		'after'		=> "</ul>",
	) );
	$post_views = get_post_meta( get_the_ID(), PSTU_NEXT_THEME_POST_VIEWS_META, true );
	$post_views = ( empty( $post_views ) ) ? 1 : ( int ) $post_views + 1;
	update_post_meta( get_the_ID(), PSTU_NEXT_THEME_POST_VIEWS_META, $post_views );
	echo "    <i class=\"icon icon-eye\"></i> " . $post_views;
	echo "  </div>\r\n"; // .clearfix
}


echo "</div>\r\n"; // .info

unset( $info );


?>