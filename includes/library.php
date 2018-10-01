<?php


/**
 *	Извлекает дату из строки
 */
if ( ! function_exists( 'pstu_next_get_event_date' ) ) {
	function pstu_next_get_event_date( $title ) {
		$result = array(
			'day'     => 'XX',
			'month'   => 'XXXXXX',
			'year'    => 'XXXX',
			'date'		=> false,
		);
		preg_match( PSTU_NEXT_EVENTS_DATE_REG, $title, $matches );
		if ( ! empty( $matches ) ) {
			$events_entry_time = strtotime( $matches[0] );
			$result = array(
				'day'     => date_i18n( "j", $events_entry_time ),
				'month'   => date_i18n( "F", $events_entry_time ),
				'year'    => date_i18n( "Y", $events_entry_time ),
				'date'		=> $events_entry_time,
			);
		}
		return $result;
	}
}


/**
 *	Возвращает блок с датой
 */
if ( ! function_exists( 'pstu_next_get_date_box' ) ) {
	function pstu_next_get_date_box( $date ) {
		$result = array();
		$result[] = "<div class=\"date\">";
		$result[] = "  <div class=\"date__day day\">" . $date[ 'day' ] . "</div>";
		$result[] = "  <div class=\"date__month month\">" . $date[ 'month' ] . "</div>";
		$result[] = "  <div class=\"date__year year\">" . $date[ 'year' ] . "</div>";
		$result[] = "</div>";
		return implode( "\r\n" , $result );
	}
}


/*
 *  Возвращает список категорий в виде массива
 */
if ( ! function_exists( 'get_category_array' ) ) {
	function get_category_array() {
		$ppl_lang = ( function_exists( 'pll_get_post_language' ) ) ? pll_current_language() : false;
		$categories_args = array(
			'hide_empty'        =>  false,
		);
		$categories = get_categories( $categories_args );
		$array = array( '' => '' );
		foreach ($categories as $item) {
			if ( $ppl_lang ) {
				if ( $ppl_lang == pll_get_term_language( $item->term_id ) ) {
					$array[$item->term_id] = $item->name;
				}
			} else {
				$array[$item->term_id] = $item->name;
			}
		}
		return $array;
	}
}



/**
 *	Возвращает список меню
 */
if ( ! function_exists( 'get_nav_menus_array' ) ) {
	function get_nav_menus_array() {
		$nav_menus = wp_get_nav_menus();
		$array = array( '' => '' );
		foreach ( $nav_menus as $nav_menu ) {
			$array[ $nav_menu->term_id ] = $nav_menu->name;
		}
		return $array;
	}
}



/**
 *  Возвращает массив страниц
 */
if ( ! function_exists( 'get_pages_array' ) ) {
	function get_pages_array() {
		$page = get_pages();
		$array = array( '' => '' );
		foreach ( $page as $item ) {
			$array[ $item->ID ] = $item->post_title;
		}
		return $array;
	}
} /**/



/**
 *  Возвращает список страниц в теше <option>
 */
if ( ! function_exists( 'get_pages_select' ) ) {
	function get_pages_select( $curr ) {
		$result = "";
		$curr = ( isset( $curr ) ) ? $curr : '';
		$pages = get_pages_array();
		foreach ($pages as $id=>$name) {
			$selected = ( $id == $curr ) ? 'selected="selected"' : ''; 
			$result .= "<option value=\"$id\" $selected>$name</option>";
		}
		return $result;
	}
}

if ( ! function_exists( 'the_pages_select' ) ) {
	function the_pages_select ( $curr ) {
		echo get_pages_select( $curr );
	}
}



/*
 *  Ф-ция вывода "хлебных крошек"
 */
if ( !function_exists( 'the_breadcrumb' ) ) {
	function the_breadcrumb() {
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		} else {
			if (!is_front_page()) {
				echo '<a href="';
				echo home_url();
				echo '">'.__( 'Главная', 'pstu-next-theme' );
				echo "</a> » ";
				if ( is_category() || is_single() ) {
					the_category(' ');
					if ( is_single() ) {
						echo " » ";
						the_title();
					}
				} elseif ( is_page() ) {
					echo the_title();
				}
			}
			else {
					echo __( 'Домашняя страница', 'pstu-next-theme' );
			}
		}
	}
}



/**
 *  Получает перевод поста / категории, если его нет, то возвращает переданный id
 */
if ( ! function_exists( 'get_translate_id' ) ) {
	function get_translate_id( $id, $type = 'post' ) {
		if ( defined( 'POLYLANG_FILE' ) ) {
			switch ( $type ) {
				case 'category':
					$translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
				case 'post':
				case 'page':
				default:
					$translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
			} // switch
			$result = ( $translate ) ? $translate : false;
		} // if defined
		return $result;
	}
}



/**
 *  Определяет есть ли дочернее меню
 */
if ( ! function_exists( '__nav_hasSub' ) ) {
	function __nav_hasSub( $item_id, $items ) {
		foreach( $items as $item ) {
			if( $item->menu_item_parent && $item->menu_item_parent == $item_id ) return true;
		}
		return false;
	}
}



// вывод иерархии страниц в bootstrap 3 media
if ( ! function_exists( 'get_pstu_media_pages' ) ) {

	function get_pstu_media_pages ( $page_id ) {

		$result = "";

		$pages = get_pages( array(
			'parent'        => $page_id,
			'sort_column'   => 'post_title',
			'sort_order'    => 'ASC',
			'hierarchical'  => 0,
		) );

		if ( ( $pages ) && ( ! is_wp_error( $pages ) ) && ( ! empty( $pages ) ) ) {

			foreach ( $pages as $page ) {

			$child_pages = array();

			$page->post_content = trim( $page->post_content );

			$result .= "<div class=\"media\">\r\n";
			$result .= "  <div class=\"media-left pull-left\">\r\n";
			if ( ! empty( $page->post_content ) ) $result .= "<a href=\"" . get_permalink( $page->ID ) . "\">\r\n";
			$result .= "      <img class=\"media-object\" src=\"" . ( ( has_post_thumbnail( $page->ID ) ) ? get_the_post_thumbnail_url( $page->ID, 'thumbnail' ) : PSTU_PROFCOM_THEME_URL . "images/post_thumbnail.jpg" ) . "\" alt=\"" . the_title_attribute( array( 'echo' => false, 'post' => get_the_ID() ) ) . "\">\r\n";
			if ( ! empty( $page->post_content ) ) $result .= "</a>\r\n";
			$result .= "  </div>\r\n";
			$result .= "  <div class=\"media-body\">\r\n";
			$result .= "    <h4 class=\"media-heading\">\r\n";
			if ( ! empty( $page->post_content ) ) $result .= "<a href=\"" . get_permalink( $page->ID ) . "\">";
			$result .= apply_filters( 'the_title', $page->post_title );
			if ( ! empty( $page->post_content ) ) $result .= "</a>";
			$result .= "    </h4>\r\n";
			if ( has_excerpt( $page->ID ) ) $result .= apply_filters( 'the_excerpt', $page->post_excerpt );

			$result .= get_pstu_media_pages( $page->ID );


			$result .= "  </div>\r\n"; // .media-body
			$result .= "</div>\r\n"; // .media
				
			} // foreach

		} // if $children_pages

		return $result;

	}

}

if ( ! function_exists( 'the_pstu_media_pages' ) ) {
	function the_pstu_media_pages( $page_id ) {
		echo get_pstu_media_pages( $page_id );
	}
}



/**
 *	Случайний рисунок
 */
if ( ! function_exists( 'get_rand_img_src' ) ) {
	function get_rand_img_src ( $size = 'md' ) {
		$rand = mt_rand( 0, 14 ) + 1;
		return PSTU_NEXT_THEME_URL . 'images/rand/' . $size . '_' . str_pad( (string)$rand, 2, '0', STR_PAD_LEFT ) . '.jpg';
	}
}



/**
 *	Список категорий поста
 */
if ( ! function_exists( 'get_pstu_term_list' ) ) {
	function get_pstu_term_list ( $args ) {
		$args = wp_parse_args( $args, array(
			'id'			=> get_the_ID(),
			'term'		=> 'category',
			'list'		=> array(),
			'icon'		=> array(),
			'exclude'	=> array(),
		) );
		$result = array();
		if ( has_term( '', $args[ 'term' ], $args[ 'id' ] ) ) {
			$terms = get_the_terms( $args[ 'id' ], $args[ 'term' ] );
			if ( ( $terms ) && ( ! empty( $terms ) ) && ( ! is_wp_error( $terms ) ) ) {
				$result[] = sprintf(
					'<ul %1$s >',
					( empty( $args[ 'list' ] ) ) ? '' : 'class="' . esc_attr( implode( ' ', $args[ 'list' ] ) ) . '"'
				);
				foreach ( $terms as $term )
					if ( ! in_array( (int)$term->term_id, $args[ 'exclude' ] ) ) $result[] = sprintf(
						'<li>%1$s<a href="%2$s" title="%3$s">%4$s</a></li>',
						( empty( $args[ 'icon' ] ) ) ? '' : '<i class="' . esc_attr( implode( ' ', $args[ 'icon' ] ) ) . '"></i>',
						get_term_link( (int)$term->term_id, $term->taxonomy ),
						esc_attr( $term->name ),
						$term->name
					);
				$result[] = sprintf( '</ul>' );
			}
		}
		return ( empty( $result ) ) ? '' : implode( "\r\n" , $result );
	}
}

if ( ! function_exists( 'the_pstu_term_list' ) ) {
	function the_pstu_term_list ( $args ) {
		echo get_pstu_term_list( $args );
	}
}




/**
 *	Добавление кнопок перевода
 */
if ( ! function_exists( 'get_pstu_languages' ) ) {
	function get_pstu_languages( $args = array() ) {
		if ( ( is_singular() ) && ( function_exists( 'pll_the_languages' ) ) ) {
			$args = wp_parse_args( $args, array(
				'before'										=> "<ul>",
				'after'											=> "</ul>",
				'dropdown' 									=> 0,				//displays a list if set to 0, a dropdown list if set to 1 (default: 0)
				'show_names' 								=> 0,				//displays language names if set to 1 (default: 1)
				'display_names_as' 					=> 'name',	//either ‘name’ or ‘slug’ (default: ‘name’)
				'show_flags' 								=> 1,	//displays flags if set to 1 (default: 0)
				'hide_if_empty' 						=> 1,	//hides languages with no posts (or pages) if set to 1 (default: 1)
				'force_home' 								=> 0,	//forces link to homepage if set to 1 (default: 0)
				'echo' 											=> 0,	//echoes if set to 1, returns a string if set to 0 (default: 1)
				'hide_if_no_translation' 		=> 1,	//hides the language if no translation exists if set to 1 (default: 0)
				'hide_current'							=> 0,	//hides the current language if set to 1 (default: 0)
				'post_id'										=> get_the_ID(),	//if set, displays links to translations of the post (or page) defined by post_id (default: null)
				'raw'												=> 0,	//use this to create your own custom language switcher (default:0)
			) );
			$result = pll_the_languages( $args );
			return ( empty( trim( $result ) ) ) ? '' : $args[ 'before' ] . $result . $args[ 'after' ];
		}  
	}
}
if ( ! function_exists( 'the_pstu_languages' ) ) {
	function the_pstu_languages( $args = array() ) {
		echo get_pstu_languages( $args );
	}
}







?>