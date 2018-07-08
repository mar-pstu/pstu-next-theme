<?php


/**
 *	Подключение скриптов кастомайзера
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_preview_init', function () {

	wp_enqueue_script(
		'astraukraine-theme-customizer',
		PSTU_NEXT_THEME_URL . 'scripts/customizer.js',
		array( 'jquery', 'customize-preview' )
	);

} );


?>