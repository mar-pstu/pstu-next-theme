<?php


/**
 *	Регистрация и подключение скриптов
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'wp_enqueue_scripts', function () {

	$suffix = ( get_theme_mod( 'minify_js', true ) ) ? '.min' : '';

	// основные скрипты темы
	wp_enqueue_script(
		'pstu-next-theme-main',
		PSTU_NEXT_THEME_URL . "scripts/main{$suffix}.js",
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_localize_script( 'pstu-next-theme-main', 'pstuNextThemeTranslate', array(
		'toTopBtn'         => __( 'Наверх', 'pstu-next-theme' ),
		'themeUrl'         =>  PSTU_NEXT_THEME_URL,
		'more'             => __( 'Подробней', 'pstu-next-theme' ),
		'loadMore'         => __( 'Загрузить ещё', 'pstu-next-theme' ),
		'loading'          => __( 'Загрузка...', 'pstu-next-theme' ),
	) );
	if ( get_theme_mod( 'ajax_pagination', false ) ) {
		global $wp_query;
		if ( 1 < $wp_query->max_num_pages ) {
			wp_localize_script( 'pstu-next-theme-main', 'pstuNextThemeAjaxPagination', array(
				'ajaxurl'        => admin_url( 'admin-ajax.php' ),
				'part'           => ( is_search() ) ? 'search' : 'blog',
				'query_vars'     => wp_json_encode( ( OBJECT ) $wp_query->query_vars ),
				'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
				'max_num_pages'  => $wp_query->max_num_pages
			) );
		}
	}

	wp_enqueue_script(
		'fancybox',
		PSTU_NEXT_THEME_URL . "scripts/fancybox{$suffix}.js",
		array( 'jquery' ),
		'3.3.5',
		'in_footer'
	);
	wp_add_inline_script( 'fancybox', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/fancybox-init.js' ), 'after' );
	wp_add_inline_script( 'fancybox', 'jQuery( "#help-button" ).fancybox();', 'after' );

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
			PSTU_NEXT_THEME_URL . "scripts/jquery{$suffix}.js",
			null,
			null,
			'in_footer'
		);
	}

	wp_enqueue_script(
		'jssocials',
		PSTU_NEXT_THEME_URL . "scripts/jssocials{$suffix}.js",
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'jssocials', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/jssocials-init.js' ), 'after' );

	// адаптивное видео
	wp_enqueue_script(
		'superembed',
		PSTU_NEXT_THEME_URL . "scripts/superembed{$suffix}.js",
		array( 'jquery' ),
		null,
		'in_footer'
	);

	// ленивая загрузка изображений
	wp_enqueue_script(
		'lazyload',
		PSTU_NEXT_THEME_URL . "scripts/lazyload{$suffix}.js",
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'lazyload', 'jQuery( ".lazy" ).lazy();', 'after' );

	// скрипт слайдера slick
	wp_enqueue_script(
		'slick',
		PSTU_NEXT_THEME_URL . "scripts/slick{$suffix}.js",
		array( 'jquery' ),
		null,
		'in_footer'
	);
	wp_add_inline_script( 'slick', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/slick-init.js' ), 'after' );


	// скрипты для работы комментариев
	wp_enqueue_script( 'comment-reply' );

} );