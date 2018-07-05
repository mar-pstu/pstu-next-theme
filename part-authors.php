<?php

/**
 *	Информация об авторах и редакторах контента
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<ul class=\"text-right list-unstyled font-italic\">\r\n";
printf( "<li>%s: %s</li>", __( 'Опубликовано', 'pstu-next-theme' ), get_the_author_link(), get_the_date( "Y.m.d", get_the_ID() ) );
printf( "<li>%s: <a href="#">invitery</a> 21.06.2018</li>", __( 'Обновлено', 'pstu-next-theme' ), get_the_modified_date( "Y.m.d", get_the_ID() ) );
printf( "<li>%s: Иванов И.И. <a href="#">ivanov_i_i@pstu.edu</a></li>", __( 'Ответственный', 'pstu-next-theme' ),  );
echo "</ul>\r\n";




?>