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

		echo "<div class=\"" . implode( ' ', get_post_class( array( 'news__entry', 'entry', 'media' ), get_the_ID() ) ) . "\">\r\n";
		echo "  <div class=\"clearfix\">\r\n";
		echo "    <div class=\"media-left pull-left\">\r\n";
		echo "      <a href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . $title_attribute . "\">\r\n";
		echo "        <img class=\"lazy media-object\" src=\"\" data-src=\"images/post_thumbnail_sm_01.jpg\" alt=\"" . $title_attribute . "\"/>\r\n";
		echo "      </a>\r\n";
		echo "    </div>\r\n"; // .media-left
		echo "    <div class=\"media-body\">\r\n";
		echo "      <h3 class=\"media-heading\"><a href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . $title_attribute . "\">" . apply_filters( 'the_title', get_the_title( get_the_ID() ) ) . "</a></h3>\r\n";
		if ( has_excerpt( get_the_ID() ) ) echo "      <div class=\"excerpt\">" . apply_filters( 'the_excerpt', get_the_excerpt( get_the_ID() ) ) . "</div>\r\n";
		echo "      <div class=\"text-right\">\r\n";
		if ( current_user_can( 'edit_post' ) ) echo "        <a class=\"btn btn-warning\" href=\"" . get_edit_post_link( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Редактировать', 'pstu-next-theme' ) . "\">" . __( 'Редактировать', 'pstu-next-theme' ) . " <i class=\"icon icon-edit\"></i></a>\r\n";
		echo "        <a class=\"btn btn-success\" href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Подробней', 'pstu-next-theme' ) . "\">" . __( 'Подробней', 'pstu-next-theme' ) . " <i class=\"icon icon-more\"></i></a>\r\n";
		echo "      </div>\r\n"; // .text-right
		echo "    </div>\r\n"; // .media-body
		echo "  </div>\r\n"; // .clearfix
		echo "</div>\r\n"; // .news__entry

	} // while have_posts

} // if have_posts


?>