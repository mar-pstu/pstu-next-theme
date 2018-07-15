<?php


/**
 *  Секция "Похожие записи"
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$similar_posts_number = get_theme_mod( 'similar_posts_number', 5 );

switch ( get_theme_mod( 'similar_section_type', 'category' ) ) {

  case 'tag':
    $similar_entryes_tags = wp_get_object_terms( get_the_ID(), 'tag', array( 'fields ' => 'ids' ) );
    if ( ( $similar_entryes_tags ) && ( ! is_wp_error( $similar_entryes_tags ) ) ) {
      $similar_entryes = get_posts( array(
        'numberposts'       => $similar_posts_number,
        'tag'               => implode( " ", $similar_entryes_tags ),
        'orderby'           => 'date',
        'order'             => 'DESC',
        'post_type'         => 'post',
        'suppress_filters'  => false,
      ) );
    }
    unset( $similar_entryes_tags );
    break;
  
  case 'category':
  default:
    $similar_entryes_categoryes = wp_get_object_terms( get_the_ID(), 'tag', array( 'fields ' => 'ids' ) );
    if ( ( $similar_entryes_categoryes ) && ( ! is_wp_error( $similar_entryes_categoryes ) ) ) {
      $similar_entryes = get_posts( array(
        'numberposts'       => $similar_posts_number,
        'category'          => implode( ",", $similar_entryes_categoryes ),
        'orderby'           => 'date',
        'order'             => 'DESC',
        'post_type'         => 'post',
        'suppress_filters'  => false,
      ) );
    }
    unset( $similar_entryes_categoryes );
    break;

} // switch

if ( ( $similar_entryes ) && ( ! empty( $similar_entryes ) ) && ( ! is_wp_error( $similar_entryes ) ) ) {

  echo "<section class=\"section similar slider\" id=\"similar\">\r\n";
  if ( get_theme_mod( 'similar_heading_flag', true ) ) {
    $similar_heading_title = get_theme_mod( 'similar_heading_title', __( 'Похожие записи', 'pstu-next-theme' ) );
    echo "  <div class=\"section__heading heading\">\r\n";
    echo "    <h2>" . ( ( function_exists( 'ppl__' ) ) ? ppl__( $similar_heading_title ) : $similar_heading_title ) . "</h2>\r\n";
    echo "  </div>\r\n";
  }
  echo "  <div class=\"section__body body\">\r\n";
  echo "    <button class=\"slider-arrow slider-prev\" id=\"similar-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
  echo "    <button class=\"slider-arrow slider-next\" id=\"similar-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
  echo "    <div id=\"similar-slider\">\r\n";

  foreach ( $similar_entryes as $similar_entry ) {
    
    setup_postdata( $similar_entry );

    $similar_entry_title_attribute = esc_attr( strip_tags( $similar_entry->post_title ) );
    $similar_entry_date = date( "d.m.Y", strtotime( $similar_entry->post_date ) );

    echo "<div class=\"similar__entry entry media clearfix\">\r\n";
    if ( has_post_thumbnail( $similar_entry->ID ) ) {
      echo "  <div class=\"media-left pull-left\">\r\n";
      echo "    <a href=\"" . get_the_permalink( $similar_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), $similar_entry_title_attribute ) . "\">\r\n";
      echo "      <img class=\"media-object\" src=\"#\" data-lazy=\"" .  . "\" alt=\"" . $similar_entry_title_attribute . "\">\r\n";
      echo "      <div class=\"small text-center posted hide-sm\">" . $similar_entry_date . "</div>\r\n";
      echo "    </a>\r\n";
      echo "  </div>\r\n"; // .media-left
    }
    echo "  <div class=\"media-body\">\r\n";
    echo "    <h3 class=\"media-heading\"><a href=\"" . get_the_permalink( $similar_entry->ID ) . "\">" . apply_filters( 'the_title', $similar_entry->post_title ) . "</a></h3>\r\n";
    if ( ! empty( trim( $similar_entry->post_excerpt ) ) ) echo "    <div class=\"excerpt\">" . apply_filters( 'the_excerpt', $similar_entry->post_excerpt ) . "</div>\r\n";
    echo "    <p class=\"clearfix\">\r\n";
    echo "      <div class=\"alignleft small hide-xs visible-sm\">" . $similar_entry_date . "</div>\r\n";
    if( current_user_can( 'delete_posts' ) ) echo "<a class=\"alignright btn btn-danger\" href=\"". get_delete_post_link( get_the_ID() ) ."\" title=\"" . esc_attr__( 'Удалить', 'pstu-next-theme' ) . "\">" . __( 'Удалить', 'pstu-next-theme' ) . "</a>";
    if ( current_user_can( 'edit_post', get_the_ID() ) ) echo "<a class=\"alignright btn btn-warning\" href=\"" . get_edit_post_link( get_the_ID() ) . "\" title=\"" . esc_attr__( 'Редактировать', 'pstu-next-theme' ) . "\">" . __( 'Редактировать', 'pstu-next-theme' ) . " <i class=\"icon icon-edit\"></i></a>\r\n";
    echo "      <a class=\"alignright btn btn-link font-italic\" href=\"" . get_the_permalink( $similar_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), $similar_entry_title_attribute ) . "\">" . __( 'Подробней', 'pstu-next-theme' ) . "</a>\r\n";
    echo "    </p>\r\n";
    echo "  </div>\r\n"; // .media-body
    echo "</div>\r\n"; // .similar__entry

  } // foreach

  wp_reset_postdata();

  echo "    </div>"; // #similar-slider
  echo "  </div>"; // .section__body
  echo "</section>";

} // if $similar_entryes


?>