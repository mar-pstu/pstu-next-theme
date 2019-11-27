<?php 

/**
 * Регистрация блоков Гутенберга
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'enqueue_block_assets', function () {

	if ( is_admin() && ( ! wp_doing_ajax() ) ) {
		wp_enqueue_script(
			'pstu-editor-core-styles',
			PSTU_NEXT_THEME_URL . 'gutenberg/core-styles.js',
			array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
			filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/core-styles.js' ),
			'in_footer'
		);

		wp_enqueue_script(
	        'pstu-editor-richtext-button',
			PSTU_NEXT_THEME_URL . 'gutenberg/richtext-button.js',
	        array( 'wp-element', 'wp-rich-text', 'wp-editor', 'wp-i18n' ),
	        filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/richtext-button.js' ),
			'in_footer'
	    );

	    wp_enqueue_style(
			'pstu-editor-richtext-button',
			PSTU_NEXT_THEME_URL . 'styles/richtext-button.css',
			array( 'wp-edit-blocks' ),
			filemtime( PSTU_NEXT_THEME_DIR . "styles/richtext-button.css" )
		);
	}

	// wp_enqueue_style(
	// 	'pstu-editor-core-styles',
	// 	PSTU_NEXT_THEME_URL . 'styles/core-styles.css',
	// 	array( 'wp-edit-blocks' ),
	// 	filemtime( PSTU_NEXT_THEME_DIR . "styles/core-styles.css" )
	// );

} );



add_action( 'init', function() {

	wp_register_script(
		'pstu-editor-well',
		PSTU_NEXT_THEME_URL . 'gutenberg/well.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/well.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-clearfix',
		PSTU_NEXT_THEME_URL . 'gutenberg/clearfix.js',
		array( 'wp-blocks', 'wp-element', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/clearfix.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-media-object',
		PSTU_NEXT_THEME_URL . 'gutenberg/media-object.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/media-object.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-list-subpages',
		PSTU_NEXT_THEME_URL . 'gutenberg/list-subpages.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/list-subpages.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-nav-icons-container',
		PSTU_NEXT_THEME_URL . 'gutenberg/nav-icons-container.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/nav-icons-container.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-nav-icon',
		PSTU_NEXT_THEME_URL . 'gutenberg/nav-icon.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/nav-icon.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-youtube-video',
		PSTU_NEXT_THEME_URL . 'gutenberg/youtube-video.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/youtube-video.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-nav-flat-container',
		PSTU_NEXT_THEME_URL . 'gutenberg/nav-flat-container.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/nav-flat-container.js' ),
		'in_footer'
	);


	wp_register_script(
		'pstu-editor-nav-flat',
		PSTU_NEXT_THEME_URL . 'gutenberg/nav-flat.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/nav-flat.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-accordio',
		PSTU_NEXT_THEME_URL . 'gutenberg/accordio.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/accordio.js' ),
		'in_footer'
	);

	wp_register_script(
		'pstu-editor-heading',
		PSTU_NEXT_THEME_URL . 'gutenberg/heading.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( PSTU_NEXT_THEME_DIR . 'gutenberg/heading.js' ),
		'in_footer'
	);

	wp_register_style(
		'pstu-next-theme-gutenberg-editor-style',
		PSTU_NEXT_THEME_URL . 'gutenberg/editor.css',
		array( 'wp-edit-blocks' ),
		filemtime( PSTU_NEXT_THEME_DIR . "gutenberg/editor.css" )
	);



	register_block_type( 'pstu-next-theme/well', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-well',
	) );

	register_block_type( 'pstu-next-theme/clearfix', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-clearfix',
	) );

	register_block_type( 'pstu-next-theme/media-object', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-media-object',
	) );

	register_block_type( 'pstu-next-theme/list-subpages', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-list-subpages',
	) );

	register_block_type( 'pstu-next-theme/nav-icons-container', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-nav-icons-container',
	) );

	register_block_type( 'pstu-next-theme/nav-icon', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-nav-icon',
	) );

	register_block_type( 'pstu-next-theme/youtube-video', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-youtube-video',
	) );

	register_block_type( 'pstu-next-theme/nav-flat-container', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-nav-flat-container',
	) );

	register_block_type( 'pstu-next-theme/nav-flat', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-nav-flat',
	) );

	register_block_type( 'pstu-next-theme/accordio', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-accordio',
	) );

	register_block_type( 'pstu-next-theme/heading', array(
		'editor_style' => 'pstu-next-theme-gutenberg-editor-style',
		'editor_script' => 'pstu-editor-heading',
	) );

} );