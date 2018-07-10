<?php

/**
 *  Секция "Анонсы" главной страницы
 */


if ( $events_category_id = get_translate_id( get_theme_mod( 'events_category_id', false ), 'category' ) ) {

  $events_posts = get_posts( array(
    'number'        => get_theme_mod( 'events_entry_number', 5 ),
    'child_of'      => $events_category_id,
    'sort_column'   => 'post_title',
    'sort_order'    => 'desc',
    'hierarchical'  => 0,
  ) );


  if ( ( $events_entryes ) && ( ! empty( $events_entryes ) ) && ( ! is_wp_error( $events_entryes ) ) ) {

    $result = array();

    $result[] = "<section class=\"events\" id=\"events\">";
    $result[] = "  <div class=\"row\">";

    foreach ( $events_entryes as $events_entry ) {

      setup_postdata( $events_entry );

      preg_match( "/^([0-9]{2}.[0-9]{2}.[0-9]{4})/", $events_entry->post_title, $matches );
      if ( empty( $matches ) ) {
        $events_entry_date = array(
          'day'     => 'XX',
          'month'   => 'XXXXXX',
          'year'    => 'XXXX',
        );
      } else {
        $events_entry_date = array(
          'day'     => date( "d", $matches[0] ),
          'month'   => pstu_get_month( date( "m", $matches[0] ) ),
          'year'    => date( "Y", $matches[0] ),
        );
      }
      
      $result[] = "<div class=\"col-xs-12 col-sm-6 col-md-12 col-lg-12\">";
      $result[] = "  <a class=\"events__entry entry\" href=\"" . get_the_excerpt( $events_entry->ID ) . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $events_entry->post_title ) ) . "\">";
      $result[] = pstu_next_get_date_box( pstu_next_get_event_date( $event_entry->post_title ) );
      $result[] = "    <h3 class=\"title\">" . apply_filters( 'the_title', ( ( preg_match( PSTU_NEXT_EVENTS_DATE_REG, $events_entry->post_title ) ) ? substr( trim( $events_entry->post_title ), 10 ) : $events_entry->post_title ) ) . "</h3>";
      $result[] = "  </a>";
      $result[] = "</div>"; // .col-

    } // foreach

    wp_reset_postdata();

    $result[] = "    <div class=\"col-xs-12 col-sm-3 col-md-12 col-lg-12\">";
    $result[] = "      <p class=\"text-center small\">";
    $result[] = "        <a href=\"\">" . __( 'Смотреть ешё', 'pstu-next-theme' ) . "</a>";
    $result[] = "      </p>";
    $result[] = "    </div>"; // .col-
    $result[] = "  </div>"; // .row
    $result[] = "</section>";

    echo implode( "\r\n" , $result );
    unset( $result );
    unset( $events_posts );
    unset( $events_entryes );
    unset( $events_entry_date );
    unset( $events_category_id );

  } // if $events_entryes

}



?>