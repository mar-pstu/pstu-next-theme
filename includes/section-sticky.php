<?php

/**
 *  Закреплённый пост
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$entry = array();

switch ( get_theme_mod( 'sticky_type', 'sticky' ) ) {

  case 'page':
    if ( $sticky_page_id = get_translate_id( get_theme_mod( 'sticky_page_id', false ), 'page' ) ) {
      $sticky_page = get_post( $sticky_page_id, OBJECT );
      if ( ( $sticky_page ) && ( ! empty( $sticky_page ) ) && ( ! is_wp_error( $sticky_page ) ) ) {
        $entry = array(
          'title'     => apply_filters( 'the_title', $sticky_page->post_title ),
          'excerpt'   => ( has_excerpt( $sticky_page->ID ) ) ? apply_filters( 'the_excerpt', $sticky_page->post_excerpt ) : false,
          'link'      => get_permalink( $sticky_page->ID ),
          'thumbnail' => get_the_post_thumbnail_url( $sticky_page->ID, 'thumbnail' ),
        );
      }
      unset( $sticky_page );
    }
    unset( $sticky_page_id );
    break;

  case 'category':
    if ( $sticky_category_id = get_translate_id( get_theme_mod( 'sticky_category_id', false ), 'category' ) ) {
      $sticky_category = get_category( $sticky_category_id, OBJECT );
      if ( ( $sticky_category ) && ( ! empty( $sticky_category ) ) && ( ! is_wp_error( $sticky_category ) ) ) {
        $entry = array(
          'title'      => apply_filters( 'the_title', $sticky_category->name ),
          'excerpt'    => ( empty( trim( $sticky_category->description ) ) ) ? false : apply_filters( 'the_excerpt', $sticky_category->description ),
          'link'       => get_category_link( $sticky_page->term_id ),
          'thumbnail'  => get_term_meta( $sticky_category->term_id, 'pstu_thumbnail', true ),
        );
      }
      unset( $sticky_category );
    }
    unset( $sticky_category_id );
    break;

  case 'post':
  default:
    $sticky_posts_array = get_option( 'sticky_posts', array() );
    if ( ( $sticky_posts_array ) && ( ! empty( $sticky_posts_array ) ) ) {
      $sticky_post = get_post( $sticky_posts_array[ 0 ], OBJECT );
      if ( ( $sticky_post ) && ( ! empty( $sticky_post ) ) && ( ! is_wp_error( $sticky_post ) ) ) {
        $entry = array(
          'title'     => apply_filters( 'the_title', $sticky_post->post_title ),
          'excerpt'   => ( has_excerpt( $sticky_post->ID ) ) ? apply_filters( 'the_excerpt', $sticky_post->post_excerpt ) : false,
          'link'      => get_permalink( $sticky_post->ID ),
          'thumbnail' => get_the_post_thumbnail_url( $sticky_post->ID, 'thumbnail' ),
        );
      }
      unset( $sticky_post );
    }
    unset( $sticky_posts_array );
    break;

} // switch

// if ( ( $entry ) && ( ! empty( $entry ) ) && ( ! is_wp_error( $entry ) ) ) {

  $sticky_text_color = get_theme_mod( 'sticky_text_color', '#ffffff' );
  $sticky_bg_color = get_theme_mod( 'sticky_bg_color', '#0c426f' );
  $stick_bgi = get_theme_mod( 'sticky_bgi', false );

  echo "<section class=\"sticky\" id=\"sticky\">\r\n";
  echo "  <div class=\"sticky__entry entry\" style=\"background-color: " . $sticky_bg_color . "\">\r\n";
  echo "    <div class=\"container\">\r\n";
  echo "      <div class=\"row middle-xs\">\r\n";
  if ( $entry[ 'thumbnail' ] ) {
    echo "        <div class=\"col-xs-12 col-sm-4 col-md-3 col-lg-2 text-center\">\r\n";
    echo "          <a href=\"" . $entry[ 'link' ] . "\">\r\n";
    echo "            <img class=\"wp-post-image lazy\" src=\"#\" data-src=\"" . $entry[ 'thumbnail' ] . "\" alt=\"" . esc_attr( $entry[ 'title' ] ) . "\">\r\n";
    echo "          </a>\r\n";
    echo "        </div>\r\n";
  }
  echo "        <div class=\"col-xs-12 col-sm col-md col-lg\">\r\n";
  echo "          <h3 class=\"title\"><a href=\"" . $entry[ 'link' ] . "\" style=\"color: " . $sticky_text_color . ";\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $entry[ 'title' ] ) ) . "\">" . $entry[ 'title' ] . "</a></h3>\r\n";
  if ( $entry[ 'excerpt' ] ) echo "          <div class=\"excerpt\" style=\"color: " . $sticky_text_color . ";\">" . $entry[ 'excerpt' ] . "</div>\r\n";
  echo "        </div>\r\n"; // .col-
  echo "        <div class=\"col-xs-12 col-sm-12 col-md-3 col-lg-2 text-right\">\r\n";
  echo "          <a class=\"permalink btn btn-success btn-md\" href=\"" . $entry[ 'link' ] . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $entry[ 'title' ] ) ) . "\">" . __( 'Подробней', 'pstu-next-theme' ) . "</a>\r\n";
  echo "        </div>\r\n"; // .col-
  echo "      </div>\r\n"; // .row
  echo "    </div>\r\n"; // .container
  echo "  </div>\r\n"; // .sticky__entry
  echo "</section>\r\n";

// } // if $entry

unset( $entry );
unset( $sticky_text_color );



?>