<?php

/**
 *  Секция "первый экран" главйной страницы
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! get_theme_mod( 'jumbotron_section_flag', false ) ) continue;

$jumbotron_entryes = array();
$jumbotron_entry_number = get_theme_mod( 'jumbotron_entry_number', 5 );
$jumbotron_entry_bgi = ( $jumbotron_entry_bgi = get_theme_mod( 'jumbotron_entry_bgi', false ) ) ? $jumbotron_entry_bgi : PSTU_NEXT_THEME . 'images/jumbotron-entry-bgi.jpg';

switch ( get_theme_mod( '', 'item' ) ) {

  case 'page':
    if ( $jumbotron_parent_page_id = get_translate_id( get_theme_mod( 'jumbotron_parent_page_id', false ) ), 'page' ) {
      $jumbotron_pages = get_pages( array(
        'number'        => $jumbotron_entry_number,
        'child_of'      => $jumbotron_parent_page_id,
        'sort_column'   => 'post_date',
        'sort_order'    => 'desc',
        'hierarchical'  => 0,
      ) );
      if ( ( $jumbotron_pages ) && ( ! empty( $jumbotron_pages ) ) && ( ! is_wp_error( $jumbotron_pages ) ) ) {
        foreach ( $jumbotron_pages as $jumbotron_page ) {
          setup_postdata( $jumbotron_page );
          $jumbotron_entryes[] = array(
            'title'     => apply_filters( 'the_title', $jumbotron_page->post_title ),
            'excerpt'   => ( has_excerpt( $jumbotron_page->ID ) ? apply_filters( 'the_excerpt', $jumbotron_page->post_excerpt ) : '' ),
            'link'      => get_permalink( $jumbotron_page->ID ),
            'thumbnail' => ( ( has_post_thumbnail( $jumbotron_page->ID ) ) ? get_the_post_thumbnail_url( $jumbotron_page->ID, 'large' ) : $jumbotron_entry_bgi ),
          );
        } // foreach
        wp_reset_postdata();
      } // if $jumbotron_pages
      unset( $jumbotron_pages );
    }
    unset( $jumbotron_parent_page_id );
    break;

  case 'post':
    if ( $jumbotron_category_id = get_translate_id( get_theme_mod( 'jumbotron_category_id', false ), 'category' ) ) {
      $jumbotron_posts = get_posts( array(
        'number'        => $jumbotron_entry_number,
        'child_of'      => $jumbotron_category_id,
        'sort_column'   => 'post_date',
        'sort_order'    => 'desc',
        'hierarchical'  => 0,
      ) );
      if ( ( $jumbotron_posts ) && ( ! empty( $jumbotron_posts ) ) && ( ! is_wp_error( $jumbotron_posts ) ) ) {
        foreach ( $jumbotron_posts as $jumbotron_post ) {
          $jumbotron_entryes[] = array(
            'title'     => apply_filters( 'the_title', $jumbotron_post->post_title ),
            'excerpt'   => ( has_excerpt( $jumbotron_page->ID ) ? apply_filters( 'the_excerpt', $jumbotron_page->post_excerpt ) : '' ),
            'link'      => get_permalink( $jumbotron_post->ID ),
            'thumbnail' => ( ( has_post_thumbnail( $jumbotron_post->ID ) ) ? get_the_post_thumbnail_url( $jumbotron_post->ID, 'large' ) : $jumbotron_entry_bgi ),
          );
        } // foreach
      } // if $jumbotron_pages
      unset( $jumbotron_posts );
    }
    unset( $jumbotron_category_id );
    break;
  
  case 'item':
  default:
    if ( $jumbotron_nav_menu_id = get_theme_mod( 'jumbotron_nav_menu_id', false ) ) {
      $jumbotron_nav_menu_items = wp_get_nav_menu_items( $jumbotron_nav_menu_id );
      if ( ( $jumbotron_nav_menu_items ) && ( ! empty( $jumbotron_nav_menu_items ) ) ) {
        foreach ( (array) $jumbotron_nav_menu_items as $key => $menu_item ){
          $jumbotron_entryes[] = array(
            'title'     => apply_filters( 'the_title', $menu_item->title ),
            'excerpt'   => $menu_item->description,
            'link'      => $menu_item->url,
            'thumbnail' => ( ( has_post_thumbnail( $menu_item->object_id ) ) ? get_the_post_thumbnail_url( $menu_item->object_id, 'large' ) : $jumbotron_entry_bgi ),
          );
        } // foreach
      } // if $jumbotron_nav_menu_items
      unset( $jumbotron_nav_menu_items );
    } // if $jumbotron_nav_menu_id
    unset( $jumbotron_nav_menu_id );
    break;

} // switch

if ( ( $jumbotron_entryes ) && ( ! empty( $jumbotron_entryes ) ) ) {

  echo "<div class=\"jumbotron\" id=\"jumbotron\">\r\n";
  echo "  <div class=\"jumbotron-slider\" id=\"jumbotron-slider\">\r\n";

  foreach ( $jumbotron_entryes as $jumbotron_entry ) {
    
    echo "<div class=\"jumbotron__entry entry\">\r\n";
    echo "  <div class=\"container\">\r\n";
    echo "    <div class=\"row\">\r\n";
    echo "      <div class=\"col-xs-12 col-sm-9 col-md-8 col-lg-8\">\r\n";
    echo "        <img class=\"wp-post-image\" src=\"\" data-lazy=\"" . $jumbotron_entry[ 'link' ] . "\" alt=\"" . esc_attr( $jumbotron_entry[ 'title' ] ) . "\">\r\n";
    echo "        <div class=\"overlay\">\r\n";
    echo "          <h3 class=\"title\">" . $jumbotron_entry[ 'title' ] . "</h3>\r\n";
    if ( ! empty( $jumbotron_entry[ 'excerpt' ] ) ) echo "          <div class=\"excerpt\">" . $jumbotron_entry[ 'excerpt' ] . "</div>\r\n";
    echo "          <p><a class=\"btn btn-md btn-success\" href=\"" . $jumbotron_entry[ 'link' ] . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $jumbotron_entry[ 'title' ] ) ) . "\">" . __( 'Подробней', 'pstu-next-theme' ) . "</a></p>\r\n";
    echo "        </div>\r\n"; // .overlay
    echo "      </div>\r\n"; // .col-
    echo "    </div>\r\n"; // .row
    echo "  </div>\r\n"; // .container
    echo "</div>\r\n"; // .jumbotron__entry

  } // foreach

  echo "  </div>\r\n"; // #jumbotron-slider
  echo "  <div class=\"jumbotron-arrows\" id=\"jumbotron-arrows\">\r\n";
  echo "    <div class=\"container\">\r\n";
  echo "      <div class=\"row\">\r\n";
  echo "        <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right\">\r\n";
  echo "          <button class=\"slider-arrow slider-prev\" id=\"jumbotron-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
  echo "          <button class=\"slider-arrow slider-next\" id=\"jumbotron-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
  echo "        </div>\r\n"; // .col-
  echo "      </div>\r\n"; // .row
  echo "    </div>\r\n"; // .container
  echo "  </div>\r\n"; // #jumbotron-arrows
  echo "</div>\r\n"; // #jumbotron

} // if $jumbotron_entryes




unset( $jumbotron_entryes );
unset( $jumbotron_entry_bgi );





?>