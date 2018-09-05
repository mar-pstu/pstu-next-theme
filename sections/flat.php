<?php

/**
 *
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result = array();
$flat_entries = array();
$flat_entry_number = get_theme_mod( 'flat_entry_number', 5 );

switch ( get_theme_mod( 'flat_entry_type', 'item' ) ) {

  case 'page':
    if ( $flat_parent_page_id = get_translate_id( get_theme_mod( 'flat_parent_page_id', false ), 'page' ) ) {
      $flat_pages = get_pages( array(
        'number'        => $flat_entry_number,
        'child_of'      => $flat_parent_page_id,
        'sort_column'   => 'post_date',
        'sort_order'    => 'desc',
        'hierarchical'  => 0,
      ) );
      if ( ( $flat_pages ) && ( ! empty( $flat_pages ) ) && ( ! is_wp_error( $flat_pages ) ) ) {
        foreach ( $flat_pages as $flat_page ) {
          setup_postdata( $flat_page );
          $flat_entries[] = array(
            'title'     => apply_filters( 'the_title', $flat_page->post_title ),
            'excerpt'   => ( empty( trim( $flat_page->post_excerpt ) ) ) ? wp_trim_words( wp_strip_all_tags( strip_shortcodes( $flat_page->post_content ) ), 20 ) : apply_filters( 'the_excerpt', $flat_page->post_excerpt ),
            'link'      => get_permalink( $flat_page->ID ),
            'thumbnail' => ( ( has_post_thumbnail( $flat_page->ID ) ) ? get_the_post_thumbnail_url( $flat_page->ID, 'thumbnail-3x2' ) : get_rand_img_src() ),
          );
        } // foreach
        wp_reset_postdata();
      } // if $flat_pages
      unset( $flat_pages );
    }
    unset( $flat_parent_page_id );
    break;

  case 'post':
    if ( $flat_category_id = get_translate_id( get_theme_mod( 'flat_category_id', false ), 'category' ) ) {
      $flat_posts = get_posts( array(
        'number'        => $flat_entry_number,
        'child_of'      => $flat_category_id,
        'sort_column'   => 'post_date',
        'sort_order'    => 'desc',
        'hierarchical'  => 0,
      ) );
      if ( ( $flat_posts ) && ( ! empty( $flat_posts ) ) && ( ! is_wp_error( $flat_posts ) ) ) {
        foreach ( $flat_posts as $flat_post ) {
          $flat_entries[] = array(
            'title'     => apply_filters( 'the_title', $flat_post->post_title ),
            'excerpt'   => ( empty( trim( $flat_page->post_excerpt ) ) ) ? wp_trim_words( wp_strip_all_tags( strip_shortcodes( $flat_page->post_content ) ), 20 ) : apply_filters( 'the_excerpt', $flat_page->post_excerpt ),
            'link'      => get_permalink( $flat_post->ID ),
            'thumbnail' => ( ( has_post_thumbnail( $flat_post->ID ) ) ? get_the_post_thumbnail_url( $flat_post->ID, 'thumbnail-3x2' ) : get_rand_img_src() ),
          );
        } // foreach
      } // if $flat_pages
      unset( $flat_posts );
    }
    unset( $flat_category_id );
    break;
  
  case 'item':
  default:
    if ( $flat_nav_menu_id = get_theme_mod( 'flat_nav_menu_id', false ) ) {
      $flat_nav_menu_items = wp_get_nav_menu_items( $flat_nav_menu_id );
      if ( ( $flat_nav_menu_items ) && ( ! empty( $flat_nav_menu_items ) ) ) {
        foreach ( (array) $flat_nav_menu_items as $key => $menu_item ) {
          if ( $menu_item->object_id ) {
            $menu_item_entry = get_post( get_translate_id( $menu_item->object_id, 'page' ), OBJECT );
            if ( ( ! $menu_item_entry ) || ( empty( $menu_item_entry ) ) || ( is_wp_error( $menu_item_entry ) ) ) continue;
            $flat_entries[] = array(
              'title'     => apply_filters( 'the_title', $menu_item_entry->post_title ),
              'excerpt'   => ( empty( trim( $menu_item_entry->post_excerpt ) ) ) ? wp_trim_words( wp_strip_all_tags( strip_shortcodes( $menu_item_entry->post_content ) ), 20 ) : apply_filters( 'the_excerpt', $menu_item_entry->post_excerpt ),
              'link'      => get_permalink( $menu_item_entry->ID ),
              'thumbnail' => ( ( has_post_thumbnail( $menu_item_entry->ID ) ) ? get_the_post_thumbnail_url( $menu_item_entry->ID, 'thumbnail-3x2' ) : get_rand_img_src() ),
            );
          }
        } // foreach
      } // if $flat_nav_menu_items
      unset( $flat_nav_menu_items );
    } // if $flat_nav_menu_id
    unset( $flat_nav_menu_id );
    break;

}

if ( ( $flat_entries ) && ( ! empty( $flat_entries ) ) ) {

  $result[] = "<section class=\"flat\" id=\"flat\">";
  $result[] = "  <div class=\"row\">";

  $entries_in_the_row = ( get_theme_mod( 'events_section_flag', false ) ) ? 2 : 3;
  $entries_in_the_count = 0;

  foreach ( $flat_entries as $flat_entry ) {

    $entries_in_the_count++;
    
    $result[] = "<div class=\"col-xs-12 col-sm col-md col-lg\">";
    $result[] = "  <a class=\"flat__entry entry\" href=\"" . $flat_entry[ 'link' ] . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $flat_entry[ 'title' ] ) ) . "\">";
    $result[] = "    <img class=\"wp-post-image lazy\" src=\"#\" data-src=\"" . $flat_entry[ 'thumbnail' ] . "\"/>";
    $result[] = "    <div class=\"title\"><h3>" . $flat_entry[ 'title' ] . "</h3></div>";
    if ( ! empty( trim( $flat_entry[ 'excerpt' ] ) ) ) $result[] = "    <div class=\"excerpt\">" . $flat_entry[ 'excerpt' ] . "</div>";
    $result[] = "  </a>";
    $result[] = "</div>"; //col-

    if ( $entries_in_the_count == $entries_in_the_row ) {
      $result[] = "</div>\r\n<div class=\"row\">\r\n";
      $entries_in_the_count = 0;
    }

  } // foreach

  $result[] = "  </div>"; // .row
  $result[] = "</section>";

  if ( ! empty( $result ) ) echo "<div class=\"col-xs-12 col-sm-12 col-md col-lg\">" . implode( "\r\n" , $result ) . "</div>";
  unset( $result );

} // if $flat_entries


?>