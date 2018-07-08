<?php


/**
 *	Регистрация и подключение скриптов
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'wp_enqueue_scripts', function () {


	// замена версии jQuery
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery',
			PSTU_NEXT_THEME_URL . 'scripts/jquery' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
			null,
			null,
			'in_footer'
		);
	}

	// основные скрипты темы
	wp_enqueue_script(
		'pstu-profcom-theme-main',
		PSTU_NEXT_THEME_URL . 'scripts/main' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_localize_script( 'pstu-profcom-theme-main', 'pstuNextThemeTranslate', array(
		'toTopBtn'		=> __( 'Наверх', 'pstu-next-theme' ),
	) );

	// адаптивное видео
	wp_enqueue_script(
		'superembed',
		PSTU_NEXT_THEME_URL . 'scripts/superembed' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);

	// скрипт блока поделиться
	if ( get_theme_mod( 'share_flag', true ) ) {
		wp_enqueue_script(
			'rrssb',
			PSTU_NEXT_THEME_URL . 'scripts/rrssb' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
			array( 'jquery' ),
			null,
			'in_footer'
		);
	}

	wp_enqueue_script(
		'fancybox',
		PSTU_NEXT_THEME_URL . 'scripts/fancybox' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'fancybox', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/fancybox-init.js' ), 'after' );

	// ленивая загрузка изображений
	wp_enqueue_script(
		'lazyload',
		PSTU_NEXT_THEME_URL . 'scripts/lazyload' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'lazyload', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/lazyload-init.js' ), 'after' );

	// скрипт слайдера slick
	wp_register_script(
		'slick',
		PSTU_NEXT_THEME_URL . 'scripts/slick' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);


	if ( get_theme_mod( 'gallery_huk_flag', false ) ) {
		wp_enqueue_script(
			'blocksit',
			PSTU_NEXT_THEME_URL . 'scripts/blocksit' . PSTU_NEXT_THEME_MINIFY_SCRIPT_SLUG . '.js',
			array( 'jquery' ),
			null,
			'in_footer'
		);
		wp_add_inline_script( 'blocksit', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/blocksit-gallery-init.js' ), 'after' );
	} // gallery_huk_type


	// скрипты для работы комментариев
	wp_enqueue_script( 'comment-reply' );

} );