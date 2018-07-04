<?php


get_header();

if ( have_posts() ) {

	echo "<div class=\"search__list list\">\r\n";

	while ( have_posts() ) {
		
		the_post();
	  echo "<div class=\"" . implode( ' ' , get_post_class( array( 'search__entry', 'entry' ), get_the_ID() ) ) . "\">\r\n";
	  echo "  <h3 class=\"title\">" . apply_filters( 'the_title', get_the_title( get_the_ID() ) ) . "</h3>\r\n";
	  if ( has_excerpt( get_the_ID() ) ) echo "  <div class=\"excerpt\">" . apply_filters( 'the_excerpt', get_the_excerpt( get_the_ID() ) ) . "</div>\r\n";
	  echo "    <div class=\"text-right\">\r\n";
		if ( current_user_can( 'edit_post' ) ) echo "        <a class=\"btn btn-warning\" href=\"" . get_edit_post_link( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Редактировать', 'pstu-next-theme' ) . "\">" . __( 'Редактировать', 'pstu-next-theme' ) . " <i class=\"icon icon-edit\"></i></a>\r\n";
		echo "      <a class=\"btn btn-success\" href=\"" . get_the_permalink( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Подробней', 'pstu-next-theme' ) . "\">" . __( 'Подробней', 'pstu-next-theme' ) . " <i class=\"icon icon-more\"></i></a>\r\n";
		echo "    </div>\r\n"; // .text-right
	  echo "</div>\r\n";

	} // while have_posts

	echo "</div>"; // .search__list

} // if have_posts

get_footer();


?>