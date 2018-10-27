<?php


/**
 *	Регистрация и подключение скриптов
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'wp_enqueue_scripts', function () {

	wp_register_script(
		'jssocials',
		PSTU_NEXT_THEME_URL . 'scripts/jssocials' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);

	wp_register_script(
		'fancybox',
		PSTU_NEXT_THEME_URL . 'scripts/fancybox' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);

	wp_register_script(
		'blocksit',
		PSTU_NEXT_THEME_URL . 'scripts/blocksit' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);



	if ( is_admin() ) {
		wp_enqueue_script(
			'pstu-next-theme-admin',
			PSTU_NEXT_THEME_URL . 'scripts/admin.js',
			array( 'jquery' ),
			null,
			'in_footer'
		);
	} else {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery',
			PSTU_NEXT_THEME_URL . 'scripts/jquery' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
			null,
			null,
			'in_footer'
		);
	}

	// основные скрипты темы
	wp_enqueue_script(
		'pstu-next-theme-main',
		PSTU_NEXT_THEME_URL . 'scripts/main' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_localize_script( 'pstu-next-theme-main', 'pstuNextThemeTranslate', array(
		'toTopBtn'		=> __( 'Наверх', 'pstu-next-theme' ),
		'themeUrl'		=>  PSTU_NEXT_THEME_URL,
	) );

	// адаптивное видео
	wp_enqueue_script(
		'superembed',
		PSTU_NEXT_THEME_URL . 'scripts/superembed' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);

	// скрипт блока поделиться
	if ( get_theme_mod( 'share_section_flag', false ) ) {
		wp_enqueue_script( 'jssocials' );
		wp_add_inline_script( 'jssocials', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/jssocials-init.js' ), 'after' );
	}

	if ( ( get_theme_mod( 'img_fancybox_flag', false ) ) ) {
		wp_enqueue_script( 'fancybox' );
		wp_add_inline_script( 'fancybox', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/fancybox-init.js' ), 'after' );
	}

	if ( ! empty( trim( get_theme_mod( 'header_help_content', '' ) ) ) ) {
		wp_enqueue_script( 'fancybox' );
		wp_add_inline_script( 'fancybox', 'jQuery( document ).ready( function () { jQuery( "#help-button" ).fancybox(); } );', 'after' );
	}

	// ленивая загрузка изображений
	wp_enqueue_script(
		'lazyload',
		PSTU_NEXT_THEME_URL . 'scripts/lazyload' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'lazyload', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/lazyload-init.js' ), 'after' );

	// скрипт слайдера slick
	wp_enqueue_script(
		'slick',
		PSTU_NEXT_THEME_URL . 'scripts/slick' . PSTU_NEXT_THEME_MINIFY_SCRIPTS_SLUG . '.js',
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'slick', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/slick-init.js' ), 'after' );


	if ( get_theme_mod( 'gallery_huk_flag', false ) ) {
		wp_enqueue_script( 'blocksit' );
		wp_add_inline_script( 'blocksit', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/blocksit-gallery-init.js' ), 'after' );
	} // gallery_huk_type


	// скрипты для работы комментариев
	wp_enqueue_script( 'comment-reply' );

} );