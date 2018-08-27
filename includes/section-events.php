<?php

/**
 *  Секция "Анонсы" главной страницы
 */


if ( $events_category_id = get_translate_id( get_theme_mod( 'events_category_id', false ), 'category' ) ) {

  $events_entryes = get_posts( array(
    'numberposts'       => get_theme_mod( 'events_entry_number', 5 ),
    'category'          => $events_category_id,
    'orderby'           => 'post_title',
    'order'             => 'DESC',
    'post_type'         => 'post',
    'suppress_filters'  => false,
  ) );


  if ( ( $events_entryes ) && ( ! empty( $events_entryes ) ) && ( ! is_wp_error( $events_entryes ) ) ) {

    $result = array();

    foreach ( $events_entryes as $events_entry ) {

      setup_postdata( $events_entry );

      $events_entry_date = pstu_next_get_event_date( $events_entry->post_title );

      if ( $events_entry_date[ 'date' ] < time() ) continue;

      $result[] = "<div class=\"col-xs-12 col-sm-6 col-md-12 col-lg-12\">";
      $result[] = "  <a class=\"events__entry entry\" href=\"" . get_the_permalink( $events_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $events_entry->post_title ) ) . "\">";
      $result[] = pstu_next_get_date_box( $events_entry_date );
      $result[] = "    <h3 class=\"title\">" . apply_filters( 'the_title', ( ( preg_match( PSTU_NEXT_EVENTS_DATE_REG, $events_entry->post_title ) ) ? substr( trim( $events_entry->post_title ), 10 ) : $events_entry->post_title ) ) . "</h3>";
      $result[] = "  </a>";
      $result[] = "</div>"; // .col-

    } // foreach

    wp_reset_postdata();

    if ( ! empty( $result ) ) {
      if ( ! empty( $events_category_link = get_category_link( $events_category_id ) ) ) {
        $result[] = "<div class=\"col-xs-12 col-sm-3 col-md-12 col-lg-12\">";
        $result[] = "  <p class=\"text-center small\">";
        $result[] = "    <a href=\"" . $events_category_link . "\">" . __( 'Смотреть ешё', 'pstu-next-theme' ) . "</a>";
        $result[] = "  </p>";
        $result[] = "</div>"; // .col-
      }
      echo "<section class=\"events\" id=\"events\"><div class=\"row\">" .  implode( "\r\n" , $result ) . "</div></section>";
    }

    unset( $result );
    unset( $events_entryes );
    unset( $events_entry_date );
    unset( $events_category_id );
    unset( $events_category_link );

  } // if $events_entryes

}



?>