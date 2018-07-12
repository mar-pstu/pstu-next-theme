<?php

/**
 *
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result = array();

$prev_post = get_previous_post();
if ( ( $prev_post ) && ( ! is_wp_error( $prev_post ) ) && ( ! empty( $prev_post ) ) ) {
	$result[] = "<a class=\"next pager__item item\" href=\"" . get_permalink( $next_post ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $prev_post->post_title ) ) . "\">";
	$result[] = "  <div class=\"arrow\"><i class=\"icon icon-two-right-arrows\"></i></div>";
	$result[] = "  <h4 class=\"title\">" . apply_filters( 'the_title', $prev_post->post_title ) . "</h4>";
	$result[] = "</a>";
}

$next_post = get_next_post();
if ( ( $next_post ) && ( ! is_wp_error( $next_post ) ) && ( ! empty( $next_post ) ) ) {
	$result[] = "<a class=\"previous pager__item item\" href=\"" . get_permalink( $next_post ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $next_post->post_title ) ) . "\">";
	$result[] = "  <div class=\"arrow\"><i class=\"icon icon-two-left-arrows\"></i></div>";
	$result[] = "  <h4 class=\"title\">" . apply_filters( 'the_title', $next_post->post_title ) . "</h4>";
	$result[] = "</a>";
}

if ( ! empty( $result ) ) echo "<nav class=\"pager clearfix\" aria-label=\"...\">" . implode( "\r\n", $result ) . "</nav>";

unset( $result );
unset( $prev_post );
unset( $next_post );

?>