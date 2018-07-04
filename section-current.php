<?php

/**
 *  Слайдер "Актуальное". Выводится на главной и на внутрених страницах
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( $current_category_id = get_translate_id( get_theme_mod( 'current_category_id', false ), 'category' ) ) {

  $current_category = get_category( $current_category_id, OBJECT );

  if ( ( $current_category ) && ( ! empty( $current_category ) ) && ( ! is_wp_error( $current_category ) ) ) {

    $current_posts = get_posts( array(
      'numberposts'       => get_theme_mod( 'current_posts_number', '5' ),
      'category'          => $current_category->term_id,
      'orderby'           => 'date',
      'order'             => 'DESC',
      'post_type'         => 'post',
      'suppress_filters'  => fasle,
    ) );

    if ( ( $current_posts ) && ( ! empty( $current_posts ) ) && ( ! is_wp_error( $current_posts ) ) ) {

      echo "<section class=\"section current grey flat\" id=\"current\">\r\n";
      echo "  <div class=\"container\">\r\n";
      echo "    <div class=\"row\">\r\n";
      echo "      <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
      if ( get_theme_mod( '', true ) ) {
        echo "        <div class=\"section__heading heading\">\r\n";
        echo "          <h2 class=\"title\">" . apply_filters( 'the_title', $current_category->name ) . "</h2>\r\n";
        if ( ! empty( trim( $current_category->description ) ) ) echo "          <div class=\"desctiption\">" . apply_filters( 'the_excerpt', $current_category->description ) . "</div>\r\n";
        echo "        </div>\r\n"; // .section__heading
      }
      echo "        <div class=\"section__body body\">\r\n";
      echo "          <button class=\"slider-arrow slider-prev\" id=\"current-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
      echo "          <button class=\"slider-arrow slider-next\" id=\"current-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
      echo "          <div id=\"current-slider\">\r\n";

      foreach ( $current_posts as $current_post ) {
        
        setup_postdata( $current_post );
        $current_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID, 'medium' );
        $current_title_attribute = the_title_attribute( array(
          'before'  => '',
          'adter'   => '',
          'echo'    => false,
          'post'    => $person->ID,
        ) );
        echo "<a class=\"current__entry flat__entry entry\" href=\"" . get_the_permalink( $current_post->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), $current_title_attribute ) . "\">\r\n";
        echo "  <img class=\"wp-post-image\" src=\"#\" data-lazy=\"" . ( ( $current_thumbnail_url ) ? $current_thumbnail_url : PSTU_NEXT_THEME_URL . 'images/flat_default_thumbnail.jpg' ) . "\" alt=\"" . $current_title_attribute . "\">\r\n";
        echo "  <div class=\"title\"><h3>" . apply_filters( 'the_title', $current_post->post_title ) . "</h3></div>\r\n";
        if ( has_excerpt( $current_post->ID ) ) echo "  <div class=\"excerpt\">" . apply_filters( 'the_excerpt', $current_post->post_excerpt ) . "</div>\r\n";
        echo "</a>\r\n";

      } // foreach

      wp_reset_postdata();

      echo "          </div>\r\n"; // #current-slider
      echo "        </div>\r\n"; // .section__body
      echo "        <div class=\"section__basement basement\">\r\n";
      echo "          <p class=\"text-center\">\r\n";
      echo "            <a class=\"small\" href=\"" . get_category_link( $current_category->term_id ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $current_category->name ) ) . "\">" . __( 'Смотреть ещё', 'pstu-next-theme' ) . "</a>\r\n";
      echo "          </p>\r\n";
      echo "        </div>\r\n"; // .section__basement
      echo "      </div>\r\n"; // .col-
      echo "    </div>\r\n"; // .row
      echo "  </div>\r\n"; // .container
      echo "</section>\r\n";

      unset( $current_post );
      unset( $current_thumbnail_url );
      unset( $current_title_attribute );

    } // if $current_posts

    unset( $current_posts );

  } // if $current_category

  unset( $current_category );

} // if $current_category_id

unset( $current_category_id );


?>