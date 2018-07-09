<?php

/**
 *
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result = array();
$flat_entryes = array();
$flat_entry_number = get_theme_mod( 'flat_entry_number', 5 );

switch ( get_theme_mod( 'flat_entry_type', 'item' ) ) {

  case 'page':
    if ( $flat_parent_page_id = get_translate_id( get_theme_mod( 'flat_parent_page_id', false ) ), 'page' ) {
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
          $flat_entryes[] = array(
            'title'     => apply_filters( 'the_title', $flat_page->post_title ),
            'excerpt'   => ( has_excerpt( $flat_page->ID ) ? apply_filters( 'the_excerpt', $flat_page->post_excerpt ) : '' ),
            'link'      => get_permalink( $flat_page->ID ),
            'thumbnail' => ( ( has_post_thumbnail( $flat_page->ID ) ) ? get_the_post_thumbnail_url( $flat_page->ID, 'large' ) : $flat_entry_bgi ),
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
          $flat_entryes[] = array(
            'title'     => apply_filters( 'the_title', $flat_post->post_title ),
            'excerpt'   => ( has_excerpt( $flat_page->ID ) ? apply_filters( 'the_excerpt', $flat_page->post_excerpt ) : '' ),
            'link'      => get_permalink( $flat_post->ID ),
            'thumbnail' => ( ( has_post_thumbnail( $flat_post->ID ) ) ? get_the_post_thumbnail_url( $flat_post->ID, 'large' ) : $flat_entry_bgi ),
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
        foreach ( (array) $flat_nav_menu_items as $key => $menu_item ){
          $flat_entryes[] = array(
            'title'     => apply_filters( 'the_title', $menu_item->title ),
            'excerpt'   => $menu_item->description,
            'link'      => $menu_item->url,
            'thumbnail' => ( ( has_post_thumbnail( $menu_item->object_id ) ) ? get_the_post_thumbnail_url( $menu_item->object_id, 'large' ) : $flat_entry_bgi ),
          );
        } // foreach
      } // if $flat_nav_menu_items
      unset( $flat_nav_menu_items );
    } // if $flat_nav_menu_id
    unset( $flat_nav_menu_id );
    break;

}

if ( ( $flat_entryes ) && ( ! empty( $flat_entryes ) ) ) {

  $result[] "<section class=\"flat\" id=\"flat\">";
  $result[] "  <div class=\"row\">";

  foreach ( $flat_entryes as $flat_entry ) {
    
    $result[] = "<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-6\">";
    $result[] = "  <a class=\"flat__entry entry\" href=\"#\" title=\"\">";
    $result[] = "    <img class=\"wp-post-image lazy\" src=\"#\" data-src=\"images/flat_thumbnail_sm_01.jpg\"/>";
    $result[] = "    <div class=\"title\"><h3></h3></div>";
    $result[] = "    <div class=\"excerpt\"></div>";
    $result[] = "  </a>";
    $result[] = "</div>"; //col-

  } // foreach

  $result[] = "  </div>"; // .row
  $result[] = "</section>";

  echo implode( "\r\n" , $result );
  unset( $result );

} // if $flat_entryes


?>