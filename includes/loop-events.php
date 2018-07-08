<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();
		
		$title_attribute = the_title_attribute( array(
			'before'  => '',
			'after'   => '',
			'echo'    => false,
			'post'    => get_the_ID()
		) );

		$event_date = '';

		echo "<div class=\"" . implode( ' ', get_post_class( array( 'media', 'clearfix' ), get_the_ID() ) ) . "\">\r\n";
		echo "  <div class=\"media-left pull-left\">\r\n";
		echo "    <div class=\"date\">\r\n";
		echo "      <div class=\"date__day day\">" . date( 'd', $event_date ) . "</div>\r\n";
		echo "      <div class=\"date__month month\">" . pstu_get_month( date( 'm', $event_date ) ) . "</div>\r\n";
		echo "      <div class=\"date__year year\">" . date( 'Y', $event_date ) . "</div>\r\n";
		echo "    </div>\r\n"; // .date
		echo "  </div>\r\n"; // .media-left
		echo "  <div class=\"media-body\">\r\n";
		echo "    <h4 class=\"media-heading\"><a href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . $title_attribute . "\">" . apply_filters( 'the_title', get_the_title( get_the_ID() ) ) . "</a></h4>\r\n";
		if ( has_excerpt( get_the_ID() ) ) echo "    <div class=\"excerpt\">" . apply_filters( 'the_excerpt', get_the_excerpt( get_the_ID() ) ) . "</div>\r\n";
		echo "      <div class=\"text-right\">\r\n";
		if ( current_user_can( 'edit_post' ) ) echo "        <a class=\"btn btn-warning\" href=\"" . get_edit_post_link( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Редактировать', 'pstu-next-theme' ) . "\">" . __( 'Редактировать', 'pstu-next-theme' ) . " <i class=\"icon icon-edit\"></i></a>\r\n";
		echo "        <a class=\"btn btn-success\" href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Подробней', 'pstu-next-theme' ) . "\">" . __( 'Подробней', 'pstu-next-theme' ) . " <i class=\"icon icon-more\"></i></a>\r\n";
		echo "      </div>\r\n"; // .text-right
		echo "  </div>\r\n"; // .media-body
		echo "</div>\r\n"; // .media

	} // while have_posts

} // if have_posts


?>