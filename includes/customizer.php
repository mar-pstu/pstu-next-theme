<?php

/**
 *	Настройки темы
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	// Регистрация панели "Настройки портфолио"
	$wp_customize->add_panel(
		'pstu_next_theme_options',
		array(
			'capability'		=> 'edit_theme_options',
			'title'					=> __( 'Настройки темы "ПГТУ Next"', 'pstu-next-theme' ),
			'priority'			=> 200
		)
	);



	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-main.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-share.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-socials.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-partners.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-news.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-people.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-current.php';
	require_once PSTU_NEXT_THEME_DIR . 'include/customizer-projects.php';



} );


?>