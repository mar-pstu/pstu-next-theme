<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'PSTU_NEXT_THEME_URL', get_template_directory_uri() . '/' );
define( 'PSTU_NEXT_THEME_DIR', get_template_directory() . '/' );
define( 'PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG', ( ( get_theme_mod( 'minify_scripts_flag', false ) ) ? '.min' : '' ) );
define( 'PSTU_NEXT_THEME_MODE_PSTU', get_theme_mod( 'mode_pstu_flag', true ) );
define( 'PSTU_NEXT_EVENTS_DATE_REG', "/^([0-9]{2}.[0-9]{2}.[0-9]{4})/" );


get_template_part( 'includes/library' );
get_template_part( 'includes/enqueue', 'styles' );
get_template_part( 'includes/enqueue', 'scripts' );
if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$wp_customize->add_panel(
			'pstu_next_theme_options',
			array(
				'capability'		=> 'edit_theme_options',
				'title'					=> __( 'Настройки темы "ПГТУ Next"', 'pstu-next-theme' ),
				'priority'			=> 200
			)
		);
	} );
	get_template_part( 'includes/customizer', 'enqueue' );
	get_template_part( 'includes/customizer', 'main' );
	get_template_part( 'includes/customizer', 'share' );
	get_template_part( 'includes/customizer', 'socials' );
	get_template_part( 'includes/customizer', 'jumbotron' );
	get_template_part( 'includes/customizer', 'flat' );
	get_template_part( 'includes/customizer', 'events' );
	get_template_part( 'includes/customizer', 'sticky' );
	get_template_part( 'includes/customizer', 'partners' );
	get_template_part( 'includes/customizer', 'news' );
	get_template_part( 'includes/customizer', 'people' );
	get_template_part( 'includes/customizer', 'current' );
	get_template_part( 'includes/customizer', 'projects' );
	get_template_part( 'includes/customizer', 'action' );
}


add_action( 'after_setup_theme', function () {

	// загрузка текстового домена
	load_theme_textdomain( 'pstu-next-theme', PSTU_NEXT_THEME_DIR . 'languages/' );

	add_post_type_support( 'page', 'excerpt' );

	// опции темы
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-image'          => false,
		'random-default'         => false,
		'flex-height'            => false,
		'flex-width'             => false,
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
	add_filter( 'widget_text', 'do_shortcode' );
	add_filter( 'wp_nav_menu_objects', function ( $items ) {
		foreach( $items as $item ) {
			if( __nav_hasSub( $item->ID, $items ) ) $item->classes[] = 'has-sub-menu';
		}
		return $items;
	} );

	// замена стандартного кода вывода галереи wp
	if ( get_theme_mod( 'gallery_huk_flag', false ) ) add_filter( 'post_gallery', function ( $output, $attr ) {

		$ids_arr = explode( ',', $attr[ 'ids' ] );
		$ids_arr = array_map( 'trim', $ids_arr );

		$pictures = get_posts( array(
			'posts_per_page' => -1,
			'post__in'       => $ids_arr,
			'post_type'      => 'attachment',
			'orderby'        => 'post__in',
		) );

		if( ! $pictures ) return;

		$result = "<div class=\"gallery gallery--blocksit\" data-block-element=\"a\">\r\n";
		foreach( $pictures as $pic ){
			$src = $pic->guid;
			$t = esc_attr( $pic->post_title );
			$title = ( $t && false === strpos($src, $t)  ) ? $t : '';
			$result .= "<a class=\"gallery__item item\" title=\"" . $title . "\" data-fancybox=\"gallery-" . implode( '', $ids_arr ) ."\" href=\"" . $src . "\">\r\n";
			$result .= "  <img class=\"lazy\" src=\"#\" alt=\"". $title . "\" data-src=\"" . $src . "\" width=\"100%\">\r\n";
			$result .= "</a>\r\n";
		} // foreach
		$result .= '</div>'; // .gallery

		return $result;

	}, 10, 2);


	/**
	 *	Регистрация меню
	 */
	register_nav_menus( array(
		'menu_main'					=> __( 'Главное меню', 						'pstu-next-theme' ),
		'menu_second'				=> __( 'Дополнительное меню',			'pstu-next-theme' ),
		'menu_fixed'				=> __( 'Фиксированное меню',			'pstu-next-theme' ),
		'menu_footer'				=> __( 'Меню подвала',						'pstu-next-theme' ),
		'menu_jumbotron'		=> __( 'Секция "первый экран"',		'pstu-next-theme' ),
		'menu_current'			=> __( 'Секция "Актуальное"',			'pstu-next-theme' ),
		'menu_action'				=> __( 'Кнопки секции "Action"',	'pstu-next-theme' ),
	) );


	/**
	 *	Регистрация переводов строк
	 */
	if ( function_exists( 'pll_register_string' ) ) {

		// блок ссылок на контакты и социальные сети ( part-social.php )
		foreach ( get_theme_mod( 'socials', array( '' ) ) as $slug => $value ) {
			if ( empty( $value ) ) continue;
			pll_register_string( 'social_' . $slug, $value, 'pstu-next-theme', false );
	  }

	  // Перевод заголовков секции "Action" главной страницы
	  foreach ( array( 'action_section_title', 'action_section_title' ) as $slug ) {
	  	if ( empty( $value = get_theme_mod( $slug, '' ) ) ) continue;
	  	pll_register_string( $slug, $value, 'pstu-next-theme', false );
	  }

	} // if function_exists 'pll_register_string'

} ); // after_setup_theme


/**
 *	Регистрация сайдбаров
 */
add_action( 'widgets_init', function () {

	register_sidebar( array(
		'name'						=> __( 'Сайдбар шапки', 'pstu-next-theme' ),
		'id'							=> 'side_header',
		'description'			=> __( '', 'pstu-next-theme' ),
		'class'						=> '',
		'before_widget'		=> '<div class="col-xs-12 col-sm col-md-3 col-lg-3 small"><div class="widget">',
		'after_widget'		=> '</div></div>',
		'before_title'		=> '<h3 class="widget__title"><i class="icon icon-quote"></i>&nbsp;',
		'after_title'			=> '</h3>',
	) );

	register_sidebar( array(
		'name'						=> __( 'Правая колонка', 'pstu-next-theme' ),
		'id'							=> 'side_right',
		'description'			=> __( '', 'pstu-next-theme' ),
		'class'						=> '',
		'before_widget'		=> '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12"><div class="widget">',
		'after_widget'		=> '</div></div>',
		'before_title'		=> '<h3 class="widget__title"><i class="icon icon-quote"></i>&nbsp;',
		'after_title'			=> '</h3>',
	) );

	register_sidebar( array(
		'name'						=> __( 'Сайдбар подвала', 'pstu-next-theme' ),
		'id'							=> 'side_basement',
		'description'			=> __( '', 'pstu-next-theme' ),
		'class'						=> '',
		'before_widget'		=> '<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"><div class="widget">',
		'after_widget'		=> '</div></div>',
		'before_title'		=> '<h3 class="widget__title"><i class="icon icon-quote"></i>&nbsp;',
		'after_title'			=> '</h3>',
	) );

	register_sidebar( array(
		'name'						=> __( 'Сайдбар главной страницы', 'pstu-next-theme' ),
		'id'							=> 'side_home',
		'description'			=> __( '', 'pstu-next-theme' ),
		'class'						=> '',
		'before_widget'		=> '<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12"><div class="widget">',
		'after_widget'		=> '</div></div>',
		'before_title'		=> '<h3 class="widget__title"><i class="icon icon-quote"></i>&nbsp;',
		'after_title'			=> '</h3>',
	) );

} ); // widgets_init




?>