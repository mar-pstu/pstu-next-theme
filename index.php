<?php

get_header();

echo "<div class=\"container\">\r\n";
echo "  <div class=\"row\">\r\n";
echo "    <div class=\"col-xs-12 col-sm-12 col-md col-lg\">\r\n";


if ( is_search() ) {
  get_template_part( 'includes/loop', 'search' );
} else {

  get_template_part( 'includes/part', 'info' );

  if ( ( get_theme_mod( 'events_category_flag', false ) ) && ( $events_category_id = get_translate_id( get_theme_mod( 'events_category_id', false ), 'category' ) ) ) {
    if ( is_category( $events_category_id ) ) get_template_part( 'includes/loop', 'events' );
  } else {
    get_template_part( 'includes/loop', 'blog' );
  }

  if ( ( get_theme_mod( 'documents_category_flag', false ) ) && ( $documents_category_id = get_translate_id( get_theme_mod( 'documents_category_id', false ), 'category' ) ) ) {
    if ( is_category( $documents_category_id ) ) get_template_part( 'includes/loop', 'documents' );
  } else {
    get_template_part( 'includes/loop', 'blog' );
  }

}


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