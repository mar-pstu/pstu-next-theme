<?php


/**
	*	Настройки секции "Action" главной страницы
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_action',
		array(
			'title'       	=> __( 'Секция "Action"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Ссылки на социальные сети и контакты. Список публикуется в шапке сайта и подвале.' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'action_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_section_flag',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'action_section_logo',
		array(
			'default'				=> PSTU_NEXT_THEME_URL . 'images/action_bgi.jpg',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'action_section_logo',
			array(
				'label'    => 'Фон секции',
				'settings' => 'action_section_logo',
				'section'  => 'pstu_next_theme_action'
			)
		)
	);

	$wp_customize->add_setting(
		'action_section_title',
		array(
			'default'				=> get_bloginfo( 'name' ),
			'transport'			=> 'reset',
			'sanitize_callback' => 'wp_strip_all_tags',
		)
	);
	$wp_customize->add_control(
		'action_section_title',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Заголовок', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'action_section_subtitle',
		array(
			'default'				=> get_bloginfo( 'description' ),
			'transport'			=> 'reset',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	$wp_customize->add_control(
		'action_section_subtitle',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Подзаголовок', 'pstu-next-theme' ),
			'type'					=> 'textarea',
		)
	); /**/


} );