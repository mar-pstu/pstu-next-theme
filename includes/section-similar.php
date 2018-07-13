<?php


/**
 *  Секция "Похожие записи"
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$similar_entryes = array();


if ( ( $similar_entryes ) && ( ! empty( $similar_entryes ) ) && ( ! is_wp_error( $similar_entryes ) ) ) {

  echo "<section class=\"section similar slider\" id=\"similar\">\r\n";
  echo "  <div class=\"section__heading heading\">\r\n";
  echo "    <h2>" . get_theme_mod( '', __( 'Похожие записи', 'pstu-next-theme' ) ) . "</h2>\r\n";
  echo "  </div>\r\n";
  echo "  <div class=\"section__body body\">\r\n";
  echo "    <button class=\"slider-arrow slider-prev\" id=\"similar-slider-arrow-prev\">&larr;</button>\r\n";
  echo "    <button class=\"slider-arrow slider-next\" id=\"similar-slider-arrow-next\">&rarr;</button>\r\n";
  echo "    <div id=\"similar-slider\">\r\n";

  foreach ( $similar_entryes as $similar_entry ) {
    
    setup_postdata( $similar_entry )

    echo "<div class=\"similar__entry entry media clearfix\">\r\n";
    echo "  <div class=\"media-left pull-left\">\r\n";
    echo "    <a href=\"" . get_permalink( $similar_entry->ID ) . "\">\r\n";
    echo "      <img class=\"media-object\" src=\"#\" data-lazy=\"images/post_thumbnail_sm_01.jpg\" alt=\"" . $similar . "\">\r\n";
    echo "      <div class=\"small text-center posted hide-sm">20.06.2018</div>\r\n";
    echo "    </a>\r\n";
    echo "  </div>\r\n";
    echo "  <div class="media-body">\r\n";
    echo "    <h3 class="media-heading"><a href="#"></a></h3>\r\n";
    echo "    <div class="excerpt"></div>\r\n";
    echo "    <p class="clearfix">\r\n";
    echo "      <div class="alignleft small hide-xs visible-sm">20.06.2018</div>\r\n";
    echo "      <a class="alignright btn btn-link font-italic" href="#">Подробней</a>\r\n";
    echo "    </p>\r\n";
    echo "  </div>\r\n";
    echo "</div>\r\n";

  }

  wp_reset_postdata();

  echo "    </div>";
  echo "  </div>";
  echo "</section>";


}


?>