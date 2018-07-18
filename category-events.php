<?php

get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";


if ( have_posts() ) {

  while ( have_posts() ) {
    
    the_post();

    echo "<div class=\"media clearfix\">\r\n";
    echo "  <div class=\"media-left pull-left\">\r\n";
    echo pstu_next_get_date_box( pstu_next_get_event_date( $events_entry->post_title ) );
    echo "  </div>\r\n"; // media-left
    echo "  <div class=\"media-body\">\r\n";
    echo "    <h4 class=\"media-heading\"><a href=\"" . get_the_permalink( get_the_ID() ) . "\">" . apply_filters( 'the_title', ( ( preg_match( PSTU_NEXT_EVENTS_DATE_REG, get_the_title( get_the_ID() ) ) ) ? substr( trim( get_the_title( get_the_ID() ) ), 10 ) : get_the_title( get_the_ID() ) ) ) . "</a></h4>\r\n";
    echo "    <div class=\"excerpt\"></div>\r\n";
    echo "    <div class=\"text-right\">\r\n";
    echo "      <a class=\"btn btn-primary\" href=\"#\">Подробней <i class=\"icon icon-more\"></i></a>\r\n";
    echo "    </div>\r\n"; // .text-right
    echo "  </div>\r\n"; // media-body
    echo "</div>\r\n"; // .media

  } // while have_posts

} // if have_posts


the_posts_pagination( array(
  'show_all'        => false, // показаны все страницы участвующие в пагинации
  'end_size'        => 1,     // количество страниц на концах
  'mid_size'        => 1,     // количество страниц вокруг текущей
  'prev_next'       => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
  'prev_text'       => '« ' . __( 'Предыдущая страница', 'pstu-next-theme' ),
  'next_text'       => __( 'Следующая страница', 'pstu-next-theme' ) . ' »',
  'add_args'        => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
  'add_fragment'    => '',     // Текст который добавиться ко всем ссылкам.
  'screen_reader_text' => __( 'Навигация по постам', 'pstu-next-theme' ),
) );


echo "    </div>\r\n";

if ( is_active_sidebar( 'side_right' ) ) {
	echo "    <div class=\"col-xs-12 col-sm-12 col-md-5 col-lg-4\">\r\n";
	get_sidebar( 'right' );
	echo "    </div>\r\n"; // .col-
}
echo "  </div>\r\n"; // .row
echo "</div>\r\n"; // .container

if ( get_theme_mod( 'current_section_flag', false ) ) get_template_part( 'includes/section', 'current' );

get_footer();

?>