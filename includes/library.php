<?php




if ( ! function_exists( 'pstu_get_month' ) ) {
	function pstu_get_month ( $m ) {
		$result = '';
		$months = array(
			'01' => __( 'Январь', 'pstu-next-theme' ),
			'02' => __( 'Февраль', 'pstu-next-theme' ),
			'03' => __( 'Март', 'pstu-next-theme' ),
			'04' => __( 'Апрель', 'pstu-next-theme' ),
			'05' => __( 'Май', 'pstu-next-theme' ),
			'06' => __( 'Июнь', 'pstu-next-theme' ),
			'07' => __( 'Июль', 'pstu-next-theme' ),
			'08' => __( 'Август', 'pstu-next-theme' ),
			'09' => __( 'Сентябрь', 'pstu-next-theme' ),
			'10' => __( 'Октябрь', 'pstu-next-theme' ),
			'11' => __( 'Ноябрь', 'pstu-next-theme' ),
			'12' => __( 'Декабрь', 'pstu-next-theme' ),
		);
		$result = $months[ $m ];
		return $result;
	}
}

if ( ! function_exists( 'pstu_the_month' ) ) {
	function pstu_the_month( $m ) {
		echo pstu_get_month( $m );
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
 *  Возвращает массив страниц
 */
if ( ! function_exists( 'get_pages_array' ) ) {
	function get_pages_array() {
		$page = get_pages();
		$array = array( '' => __( 'Не обрано', 'pstu-cct-theme' ) );
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
 *  Ф-ции для установки и вывода количество просмотров
 */
if ( ! function_exists( 'get_post_views' ) ) {
	function get_post_views($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '1');
			return "1";
		}
		return $count;
	}
}

if ( !function_exists( 'set_post_views' ) ) {
	function set_post_views($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 1;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '1');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
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


?>