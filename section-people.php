<?php

/**
 *  Слайдер главной страницы "Люди"
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( $people_category_id = get_translate_id( get_theme_mod( 'people_category_id', false ), 'category' ) ) {

  $people_category = get_category( $people_category_id, OBJECT );

  if ( ( $people_category ) && ( ! empty( $people_category ) ) && ( ! is_wp_error( $people_category ) ) ) {

    $people = get_posts( array(
      'numberposts'       => get_theme_mod( 'people_posts_number', '5' ),
      'category'          => $people_category->term_id,
      'orderby'           => 'date',
      'order'             => 'DESC',
      'post_type'         => 'post',
      'suppress_filters'  => fasle,
    ) );

    if ( ( $people ) && ( ! empty( $people ) ) && ( ! is_wp_error( $people ) ) ) {

      echo "<section class=\"people section\" id=\"people\">\r\n";
      echo "  <div class=\"container\">\r\n";
      echo "    <div class=\"row\">\r\n";
      echo "      <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
      if ( get_theme_mod( 'people_heading_flag', true ) ) {
        echo "        <div class=\"section__heading heading\">\r\n";
        echo "          <h2 class=\"title\">" . apply_filters( 'the_title', $people_category->name ) . "</h2>\r\n";
        if ( ! empty( trim( $people_category->description ) ) ) echo "          <div class=\"desctiption\">" . apply_filters( 'the_excerpt', $people_category->description ) . "</div>\r\n";
        echo "        </div>\r\n"; // .section__heading
      }
      echo "        <div class=\"section__body body\">\r\n";
      echo "          <button class=\"slider-arrow slider-prev\" id=\"people-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
      echo "          <button class=\"slider-arrow slider-next\" id=\"people-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
      echo "          <div class=\"slider-for\" id=\"people-slider\">\r\n";

      foreach ( $people as $person ) {
        
        setup_postdata( $person );
        $person_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID, 'thumbnail' );
        $person_title_attribute = the_title_attribute( array(
          'before'  => '',
          'adter'   => '',
          'echo'    => false,
          'post'    => $person->ID,
        ) );
        echo "<a class=\"" . join( ' ', get_post_class( 'slider-for__entry entry center-block', $news_post->ID ) ) . "\" href=\"" . get_the_permalink( $person->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), $person_title_attribute ) . "\">\r\n";
        echo "  <div class=\"thumbnail\"><img class=\"wp-post-image\" src=\"\" data-lazy=\"" . ( ( $person_thumbnail_url ) ? $person_thumbnail_url : PSTU_NEXT_THEME_URL . 'images/user-md.jpg' ) . "\" alt=\"" . $person_title_attribute . "\"></div>\r\n";
        echo "  <div class=\"title\"><h3>" . apply_filters( 'the_title', $person->post_title ) . "</h3></div>\r\n";
        if ( has_excerpt( $person->ID ) ) echo "  <div class=\"excerpt\">" . apply_filters( 'the_excerpt', $person->post_excerpt ) . "</div>\r\n";
        echo "</a>\r\n";

      } // foreach

      wp_reset_postdata();

      echo "          </div>\r\n"; // #people-slider
      echo "        </div>\r\n"; // .section__body
      echo "      </div>\r\n"; // .col-
      echo "    </div>\r\n"; // .row
      echo "  </div>\r\n"; // .container
      echo "</section>\r\n";

      unset( $person );
      unset( $person_thumbnail_url );
      unset( $person_title_attribute );

    } // if $people

    unset( $people );

  } // if $people_category

  unset( $people_category );

} // if $people_category_id

unset( $people_category_id );



?>