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
		$array = array( '' => __( 'Не обрано', 'pstu-profcom-theme' ) );
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
				echo '">'.__( 'Главная', 'pstu-profcom-theme' );
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
					echo __( 'Домашняя страница', 'pstu-profcom-theme' );
			}
		}
	}
}



/**
 *  Получает перевод поста / категории, если его нет, то возвращает переданный id
 */
if ( ! function_exists( 'get_translate_id' ) ) {
	function get_translate_id( $id, $type = 'post' ) {
		$result = $id;
		$translate = false;
		if ( defined( 'POLYLANG_FILE' ) ) {
			switch ( $type ) {
				case 'post':
				case 'page':
					$translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id ) : $translate;
					break;
				case 'category':
					$translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id ) : $translate;
					break;
			} // switch
			$result = ( $translate ) ? $translate : $result;
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
 *  Возаращает информацию о странице для плагина rrssb
 */
if ( ! function_exists( 'get_pstu_rrssb_page_info' ) ) {
	function get_pstu_rrssb_page_info () {
		$default_image =  ( has_custom_logo() ) ? has_custom_logo() : get_header_image();
		$default_image = ( empty( $default_image ) ) ? PSTU_NEXT_THEME_URL . 'images/post_thumbnail.jpg' : $default_image;
		if ( is_home()  && is_front_page() ) {
			$result = array(
				'title'         => get_bloginfo( 'name' ),
				'url'           => home_url(),
				'description'   => get_bloginfo( 'description' ),
				'emailBody'     => '',
				'image'					=> $default_image,
			);
		} elseif ( is_page() || is_single() ) {
			$result = array(
				'title'         => wp_get_document_title(),
				'url'           => get_permalink( get_the_ID() ),
				'description'   => get_the_excerpt( get_the_ID() ),
				'emailBody'     => get_the_content( $more_link_text = null, $strip_teaser = false ),
				'image'					=> ( has_post_thumbnail( get_the_ID() ) ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : $default_image,
			);
		} elseif ( is_archive() ) {
			$result = array(
				'title'         => get_the_archive_title(),
				'url'           => get_post_type_archive_link( get_query_var( 'post_type' ) ),
				'description'   => get_the_archive_description(),
				'emailBody'     => '',
				'image'					=> $default_image,
			);
		} elseif ( is_search() ) {
			$result = array(
				'title'         => get_the_archive_title(),
				'url'           => get_post_type_archive_link( get_query_var( 'post_type' ) ),
				'description'   => get_the_archive_description(),
				'emailBody'     => '',
				'image'					=> $default_image,
			);
		} else {
			$result = array(
				'title'         => wp_get_document_title(),
				'url'           => home_url(),
				'description'   => get_bloginfo( 'description' ),
				'emailBody'     => '',
				'image'					=> $default_image,
			);
		}
		return $result;
	}
}


?>