<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'PSTU_NEXT_THEME_URL', get_template_directory_uri() . '/' );
define( 'PSTU_NEXT_THEME_DIR', get_template_directory() . '/' );


get_template_part( 'includes/library' );
get_template_part( 'includes/enqueue', 'styles' );
get_template_part( 'includes/enqueue', 'scripts' );
get_template_part( 'includes/class', 'gallery' );
get_template_part( 'includes/gutenberg' );


if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}



require_once PSTU_NEXT_THEME_DIR . 'shortcodes/class-accordio-list.php';
new pstuAccordioListClass();



if ( is_admin() ) {
	add_action( 'current_screen', function () {
		add_editor_style( PSTU_NEXT_THEME_URL . 'styles/critical.css' );
		add_editor_style( PSTU_NEXT_THEME_URL . 'styles/main.css' );
		add_editor_style( PSTU_NEXT_THEME_URL . 'style.css' );
		add_editor_style( wp_enqueue_media() );
		
	} );
	get_template_part( 'metaboxes/bgi' );
	get_template_part( 'metaboxes/relevance' );
	get_template_part( 'metaboxes/unpublished' );
	if ( class_exists( 'pstuBGIMetaboxClass' ) ) new pstuBGIMetaboxClass();
	if ( class_exists( 'pstuRelevanceMetaboxClass' ) ) new pstuRelevanceMetaboxClass();
	if ( class_exists( 'pstuUnpublishedMetaboxClass' ) ) new pstuUnpublishedMetaboxClass();	
}


/**
 * Шорткод для создания списка редиректов с русской версии на укр
 */
// add_shortcode( 'ru_to_uk_redirect', function () {
// 	$result = [];
// 	switch_to_locale( 'uk' );
// 	foreach ( get_post_types( [
// 		'public'   => true,
// 	], 'names', 'and' ) as $post_type ) {
// 		if ( pll_is_translated_post_type( $post_type ) ) {
// 			$posts = get_posts( [
// 				'numberposts' => -1,
// 				'post_type'   => $post_type,
// 			] );
// 			if ( is_array( $posts ) && ! empty( $posts ) ) {
// 				foreach ( $posts as $post ) {
// 					$ru_post_id = pll_get_post( $post->ID, 'ru_RU');
// 					if ( $ru_post_id ) {
// 						$result[] = sprintf(
// 							'Redirect 301 %1$s %2$s',
// 							parse_url( get_permalink( $ru_post_id, false ) )[ 'path' ],
// 							get_permalink( $post->ID, false )
// 						);
// 					}
// 				}
// 			}
// 		}
// 	}
// 	foreach ( get_taxonomies( [
// 		'public'   => true,
// 	], 'names', 'AND' ) as $taxonomy ) {
// 		if ( pll_is_translated_taxonomy( $taxonomy ) ) {
// 			$terms = get_terms( [
// 				'taxonomy'   => $taxonomy,
// 				'hide_empty' => false,
// 			] );
// 			if ( is_array( $terms ) && ! empty( $term ) ) {
// 				foreach ( $posts as $post ) {
// 					$ru_term_id = pll_get_term( $term->term_id, 'ru_RU');
// 					if ( $ru_term_id ) {
// 						$result[] = sprintf(
// 							'Redirect 301 %1$s %2$s',
// 							parse_url( get_term_link( $ru_term_id, $taxonomy ) )[ 'path' ],
// 							get_term_link( $term->term_id, $taxonomy )
// 						);
// 					}
// 				}
// 			}
// 		}
// 	}
// 	return '<div style="overflow-x: scroll; font-size: 75%; white-space: pre;">' . implode( "\r\n", $result ) . '</div>';
// } );


if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$wp_customize->add_panel(
			'pstu_next_theme_options',
			array(
				'capability'		=> 'edit_theme_options',
				'title'				=> __( 'Настройки темы "ПГТУ Next"', 'pstu-next-theme' ),
				'priority'			=> 200
			)
		);
	} );
	get_template_part( 'customizer/enqueue' );
	get_template_part( 'customizer/main' );
	get_template_part( 'customizer/share' );
	get_template_part( 'customizer/socials' );
	get_template_part( 'customizer/events' );
	get_template_part( 'customizer/sticky' );
	get_template_part( 'customizer/structure' );
	get_template_part( 'customizer/partners' );
	get_template_part( 'customizer/news' );
	get_template_part( 'customizer/people' );
	get_template_part( 'customizer/current' );
	get_template_part( 'customizer/projects' );
	get_template_part( 'customizer/action' );
	get_template_part( 'customizer/similar' );
	get_template_part( 'customizer/alerts' );
	get_template_part( 'customizer/404' );
}






add_action( 'after_setup_theme', function () {

	// загрузка текстового домена
	load_theme_textdomain( 'pstu-next-theme', PSTU_NEXT_THEME_DIR . 'languages/' );

	add_post_type_support( 'page', 'excerpt' );

	// форматы записей
	add_theme_support( 'post-formats', array(
		// 'aside',
		// 'image',
		// 'video',
		// 'audio',
		// 'quote',
		'link',
		// 'gallery',
  ) );

	// опции темы
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-image'          => false,
		'random-default'         => false,
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => 'ffffff',
		'header-text'            => true,
		'uploads'                => false,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => false, // с 4.7
		'video-active-callback'  => false, // с 4.7
	) );
	add_theme_support( 'automatic-feed-links' );

	add_image_size( 'thumbnail-3x2', 600, 400, true ); // размер миниатюры 3x2 с жестким кадрированием
	add_filter( 'image_size_names_choose', function ( $sizes ) {
		return array_merge( $sizes, array(
			'thumbnail-3x2' => __( '2x3 жесткое кадрирование', 'pstu-next-theme' ),
		) );
	}, 10, 1 );

	add_filter( 'widget_text', 'do_shortcode' );
	add_filter( 'wp_nav_menu_objects', function ( $items ) {
		foreach( $items as $item ) {
			if( __nav_hasSub( $item->ID, $items ) ) $item->classes[] = 'has-sub-menu';
		}
		return $items;
	} );


	/**
	 *	Регистрация меню
	 */
	register_nav_menus( array(
		'menu_main'          => __( 'Главное меню', 'pstu-next-theme' ),
		'menu_second'        => __( 'Дополнительное меню', 'pstu-next-theme' ),
		'menu_jumbotron'     => __( 'Слайдер (главная страница)', 'pstu-next-theme' ),
		'menu_flat'          => __( '"Флат" меню главной страницы', 'pstu-next-theme' ),
		'menu_structure'     => __( 'Структура (главная страница)', 'pstu-next-theme' ),
		'menu_action'        => __( 'Реклама (главная страница)', 'pstu-next-theme' ),
		'menu_footer'        => __( 'Меню подвала', 'pstu-next-theme' ),
	) );

} ); // after_setup_theme


/**
 *	Регистрация сайдбаров
 */
add_action( 'widgets_init', function () {

	register_sidebar( array(
		'name'             => __( 'Правая колонка', 'pstu-next-theme' ),
		'id'               => 'side_right',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );

	register_sidebar( array(
		'name'             => __( 'Сайдбар подвала', 'pstu-next-theme' ),
		'id'               => 'side_basement',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-5 col-md-3 col-lg-2 text-left"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );

	register_sidebar( array(
		'name'             => __( 'Сайдбар модально окна поиска', 'pstu-next-theme' ),
		'id'               => 'side_search',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3>',
		'after_title'      => '</h3>',
	) );

} ); // widgets_init




/**
 * AJAX загрузка постов
 */
if ( get_theme_mod( 'ajax_pagination', false ) ) {
	function pstu_ajax_load_posts () {
		$args = get_object_vars( json_decode( wp_unslash( sanitize_text_field( $_POST[ 'query' ] ) ) ) );
		$args[ 'paged' ] = $_POST[ 'page' ] + 1;
		$args[ 'post_status' ] = 'publish';
		query_posts( $args );
		if ( 'search' == $_POST[ 'part' ] ) {
			get_template_part( 'loops/search' );
		} else {
			get_template_part( 'loops/blog' );
		}
		wp_die();
	}
	add_action( 'wp_ajax_pstu_pagination', 'pstu_ajax_load_posts' );
	add_action( 'wp_ajax_nopriv_pstu_pagination', 'pstu_ajax_load_posts' );
}