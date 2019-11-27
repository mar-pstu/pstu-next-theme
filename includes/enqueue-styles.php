<?php

/**
 *	Регистрация и подключение стилей и скриптов
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 *	Добавление "критикал" стилей и скриптов для оптимизации загрузки страницы
 */
add_action( 'wp_head', function () {
	$suffix = ( get_theme_mod( 'minify_css', true ) ) ? '.min' : '';
	echo "<style type=\"text/css\">" . file_get_contents( PSTU_NEXT_THEME_DIR . "styles/critical{$suffix}.css" ) . "</style>\r\n";
} );



add_action( 'wp_print_styles', function () {
	wp_deregister_style( 'fancybox' );
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'pstu-contacts-frontend' );
	wp_dequeue_style( 'pstu-misspellings-frontend' );
	wp_dequeue_style( 'shortcodes-css' );
	wp_dequeue_style( 'wpemfb-lightbox' );
	wp_dequeue_style( 'tablepress-default' );
	wp_dequeue_style( 'shortcodes' );
} );




/**
 *	Загрузка остальных стилей
 */
add_action( 'get_footer', function () {
	$suffix = ( get_theme_mod( 'minify_css', true ) ) ? '.min' : '';
	wp_enqueue_style(
		'jssocials',
		PSTU_NEXT_THEME_URL . "styles/jssocials{$suffix}.css",
		array(),
		'1.4.0'
	);
	wp_enqueue_style(
		'jssocials-theme-flat',
		PSTU_NEXT_THEME_URL . "styles/jssocials-theme-flat{$suffix}.css",
		array( 'jssocials' ),
		'1.4.0'
	);
	wp_enqueue_style(
		'fancybox',
		PSTU_NEXT_THEME_URL . "styles/fancybox{$suffix}.css",
		array(),
		'3.3.5'
	);
	// wp стили темы
	wp_enqueue_style(
		'pstu-next-theme-wp',
		PSTU_NEXT_THEME_URL . 'style.css',
		array(),
		filemtime( PSTU_NEXT_THEME_DIR . 'style.css' )
	);
	// основные стили темы
	wp_enqueue_style(
		'pstu-next-theme-main',
		PSTU_NEXT_THEME_URL . "styles/main{$suffix}.css",
		array(),
		filemtime( PSTU_NEXT_THEME_DIR . "styles/main{$suffix}.css" )
	);
	// стили слайдера slick
	wp_enqueue_style(
		'slick',
		PSTU_NEXT_THEME_URL . "styles/slick{$suffix}.css",
		array(),
		'1.9.0'
	);
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'pstu-contacts-frontend' );
	wp_enqueue_style( 'pstu-misspellings-frontend' );
	wp_enqueue_style( 'shortcodes-css' );
	wp_enqueue_style( 'wpemfb-lightbox' );
	wp_enqueue_style( 'tablepress-default' );
	wp_enqueue_style( 'shortcodes' );
} );