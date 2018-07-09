<?php

/**
 *  Секция "Анонсы" главной страницы
 */


if ( ( $events_entryes ) && ( ! empty( $events_entryes ) ) && ( ! is_wp_error( $events_entryes ) ) ) {

  $result = array();

  $result[] = "<section class=\"events\" id=\"events\">";
  $result[] = "  <div class=\"row\">";

  foreach ( $events_entryes as $events_entry ) {
    
    $result[] = "<div class=\"col-xs-12 col-sm-6 col-md-12 col-lg-12\">";
    $result[] = "  <a class=\"events__entry entry\" href=\"\">";
    $result[] = "    <div class=\"date\">";
    $result[] = "      <div class=\"date__day day\">29</div>";
    $result[] = "      <div class=\"date__month month\">сентября</div>";
    $result[] = "      <div class=\"date__year year\">2020</div>";
    $result[] = "    </div>";
    $result[] = "    <h3 class=\"title\">Lorem ipsum dolor sit amet</h3>";
    $result[] = "  </a>";
    $result[] = "</div>";

  } // foreach

  $result[] = "    <div class=\"col-xs-12 col-sm-3 col-md-12 col-lg-12\">";
  $result[] = "      <p class=\"text-center small\">";
  $result[] = "        <a href=\"\">" . __( 'Смотреть ешё', 'pstu-next-theme' ) . "</a>";
  $result[] = "      </p>";
  $result[] = "    </div>"; // .col-
  $result[] = "  </div>"; // .row
  $result[] = "</section>";

  echo implode( "\r\n" , $result );
  unset( $result );
  unset( $events_entryes );

} // if $events_entryes



?>