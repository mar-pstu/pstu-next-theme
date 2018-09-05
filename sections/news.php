<?php

/**
 *  Блон кновостей на главной странице
 */


if ( ! defined( 'ABSPATH' ) ) { exit; }


if ( $news_category_id = get_translate_id( get_theme_mod( 'news_category_id', false ), 'category' ) ) {

  $news_category = get_category( $news_category_id, OBJECT );

  if ( ( $news_category ) && ( ! empty( $news_category ) ) && ( ! is_wp_error( $news_category ) ) ) {

    $news_posts = get_posts( array(
      'numberposts'       => get_theme_mod( 'news_posts_number', '5' ),
      'category'          => $news_category->term_id,
      'orderby'           => 'date',
      'order'             => 'DESC',
      'post_type'         => 'post',
      'suppress_filters'  => false,
    ) );

    if ( ( $news_posts ) && ( ! empty( $news_posts ) ) && ( ! is_wp_error( $news_posts ) ) ) {

      echo "<section class=\"section news\" id=\"news\">\r\n";
      if ( get_theme_mod( 'news_heading_flag', true ) ) {
        echo "  <div class=\"section__heading heading\">\r\n";
        echo "    <h2 class=\"title\"><a href=\"" . get_category_link( $news_category->ID ) . "\">" . apply_filters( 'the_title', $news_category->name ) . "</a></h2>\r\n";
        if ( ! empty( trim( $news_category->description ) ) ) echo "    <p class=\"description lead\">" . apply_filters( 'the_excerpt', $news_category->description ) . "</p>\r\n";
        echo "  </div>\r\n"; // .section__heading
      }
      echo "  <div class=\"section__body body\">\r\n";

      foreach ( $news_posts as $news_post ) {
        
        setup_postdata( $news_post );
        $news_post_title_attribute = the_title_attribute( array(
          'before'  => '',
          'adter'   => '',
          'echo'    => false,
          'post'    => $news_post->ID,
        ) );

        echo "<div class=\"" . join( ' ', get_post_class( 'news__entry entry media', $news_post->ID ) ) . "\">\r\n";
        echo "  <div class=\"clearfix\">\r\n";
        if ( has_post_thumbnail( $news_post->ID ) ) {
          $news_post_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID, 'thumbnail' );
          echo "    <div class=\"media-left pull-left\">\r\n";
          echo "      <a href=\"" . get_the_permalink( $news_post->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), $news_post_title_attribute ) . "\">\r\n";
          echo "        <img class=\"lazy media-object\" src=\"#\" data-src=\"" . $news_post_thumbnail_url . "\" alt=\"" . $news_post_title_attribute . "\"/>\r\n";
          echo "      </a>\r\n";
          echo "    </div>\r\n"; // .media-left
        }
        echo "    <div class=\"media-body\">\r\n";
        echo "      <h3 class=\"media-heading\"><a href=\"" . get_the_permalink( $news_post->ID ) . "\">" . apply_filters( 'the_title', $news_post->post_title ) . "</a></h3>\r\n";
        if ( has_excerpt( $news_post->ID ) ) echo "      <div class=\"excerpt\">" . apply_filters( 'the_excerpt', $news_post->post_excerpt ) . "</div>\r\n";
        echo "      <div class=\"text-right\">\r\n";
        echo "        <a class=\"btn btn-success\" href=\"" . get_the_permalink( $news_post->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), $news_post_title_attribute ) . "\">\r\n";
        echo __( 'Подробней', 'pstu-next-theme' ) . " <i class=\"icon icon-more\"></i>\r\n";
        echo "        </a>\r\n";
        echo "      </div>\r\n"; // .text-right
        echo "    </div>\r\n"; // .media-body
        echo "  </div>\r\n"; // .clearfix
        echo "</div>\r\n"; // .news__entry

      } // foreach

      wp_reset_postdata();

      echo "  </div>\r\n"; // .section__body
      echo "  <div class=\"section__basement basement\">\r\n";
      echo "    <p class=\"text-center\">\r\n";
      echo "      <a class=\"small\" href=\"" . get_category_link( $news_category->term_id ) . "\" title=\"" . sprintf( "%s - %s", __( 'Смотреть ещё', 'pstu-next-theme' ), esc_attr( $news_category->name ) ) . "\">" . __( 'Смотреть ещё', 'pstu-next-theme' ) . "</a>\r\n";
      echo "    </p>\r\n";
      echo "  </div>\r\n"; // .section__basement
      echo "</section>\r\n";

    } // if $news_posts

  } // if $news_category

  unset( $news_post_title_attribute );
  unset( $news_post );
  unset( $news_posts );
  unset( $news_category );

} // if $news_category_id

unset( $news_category_id );


?>