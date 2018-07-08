<?php

/**
 *	Регистрация и подключение стилей и скриптов
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 *	Добавление "критикал" стилей и скриптов для оптимизации загрузки страницы
 */
add_action( 'wp_head', function () {
	echo "<style type=\"text/css\">" . file_get_contents( PSTU_NEXT_THEME_DIR . 'styles/critical.min.css' ) . "</style>\r\n";	
} );




/**
 *	Подключение стилей к редактору
 */
if ( is_admin() ) add_action( 'current_screen', function () {
	add_editor_style( PSTU_NEXT_THEME_URL . 'styles/critical' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css' );
	add_editor_style( PSTU_NEXT_THEME_URL . 'styles/main' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css' );
} );





/**
 *	Загрузка остальных стилей
 */
add_action( 'wp_enqueue_scripts', function () {

	// основные стили темы
	wp_enqueue_style(
		'pstu-profcom-theme-main',
		PSTU_NEXT_THEME_URL . 'styles/main.min.css',
		array(),
		filemtime( PSTU_NEXT_THEME_DIR . 'styles/main' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css' )
	);

	// стили блока "поделиться"
	wp_enqueue_style(
		'rrssb',
		PSTU_NEXT_THEME_URL . 'styles/rrssb.min.css',
		array(),
		filemtime( PSTU_NEXT_THEME_DIR . 'styles/rrssb' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css' )
	);


	wp_enqueue_style(
		'fancybox',
		PSTU_NEXT_THEME_URL . 'styles/fancybox.min.css',
		array(),
		filemtime( PSTU_NEXT_THEME_DIR . 'styles/fancybox' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css' )
	);
	
	
		// стили слайдера slick
	wp_register_style(
		'slick',
		PSTU_NEXT_THEME_URL . 'styles/slick' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css',
		array(),
		filemtime( PSTU_NEXT_THEME_DIR . 'styles/slick' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.css' )
	);

} );