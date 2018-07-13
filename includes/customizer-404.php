<?php


/**
	*	Настройки страницы "Ошибка 404"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_404',
		array(
			'title'       	=> __( '404', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Настройки страницы "Ошибка 404"' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'error404_title',
		array(
			'default'				=> __( 'Ошибка 404', 'pstu-next-theme' ),
			'transport'			=> 'reset',
			'sanitize_callback' => 'wp_strip_all_tags',
		)
	);
	$wp_customize->add_control(
		'error404_title',
		array(
			'section'				=> 'pstu_next_theme_404',
			'label'					=> __( 'Заголовок', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'error404_subtitle',
		array(
			'default'				=> '',
			'transport'			=> 'reset',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	$wp_customize->add_control(
		'error404_subtitle',
		array(
			'section'				=> 'pstu_next_theme_404',
			'label'					=> __( 'Подзаголовок', 'pstu-next-theme' ),
			'type'					=> 'textarea',
		)
	); /**/

	$wp_customize->add_setting(
		'error404_logo',
		array(
			'default'				=> PSTU_NEXT_THEME_URL . 'images/error-logo.png',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'error404_logo',
			array(
				'label'    => 'Логотип',
				'settings' => 'error404_logo',
				'section'  => 'pstu_next_theme_404'
			)
		)
	);


	
} );


?>