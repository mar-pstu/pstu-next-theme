<?php

/**
 *	Информация об авторах, редакторах и источнике контента
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<ul class=\"text-right list-unstyled font-italic\">\r\n";
printf( '<li>%1$s: %2$s %3$s</li>', __( 'Опубликовано', 'pstu-next-theme' ), get_the_author_link(), get_the_date( "Y.m.d", get_the_ID() ) );
if ( $modified_author_id = get_post_meta( get_the_ID(), '_edit_last', true) ) {
	if ( $modified_author = get_userdata( $modified_author_id ) )	printf(
		'<li>%1$s: <a href=\"%2$s\">%3$s</a> %4$s</li>',
		__( 'Обновлено', 'pstu-next-theme' ),
		$modified_author->user_url,
		apply_filters( 'the_modified_author', $modified_author->display_name ),
		get_the_modified_date( "Y.m.d", get_the_ID() )
	);
}
echo "</ul>\r\n";




?>