<?php


if ( get_theme_mod( 'ajax_pagination', false ) ) {
  echo '<div id="pagination-ajax" class="pagination pagination--ajax"></div>';
} else {
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
}
