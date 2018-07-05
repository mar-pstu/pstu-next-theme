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



	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-main.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-share.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-socials.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-sticky.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-partners.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-news.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-people.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-current.php';
	require_once PSTU_NEXT_THEME_DIR . 'includes/customizer-projects.php';



} );


?>