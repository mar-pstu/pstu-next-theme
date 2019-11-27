<?php


/**
	*	Настройки секции с закреплённым постом
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_sticky',
		array(
			'title'            => __( 'Закреплённый пост', 'pstu-next-theme' ),
			'priority'         => 10,
			'description'      => __( 'Настройки секции главной страницы с "закреплённым постом".' , 'pstu-next-theme' ),
			'panel'            => 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'sticky_section_flag',
		array(
			'default'          => false,
			'transport'        => 'reset'
		)
	);
	$wp_customize->add_control(
		'sticky_section_flag',
		array(
			'section'          => 'pstu_next_theme_sticky',
			'label'            => __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'             => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'sticky_label_flag',
		array(
			'default'          => false,
			'transport'        => 'reset'
		)
	);
	$wp_customize->add_control(
		'sticky_label_flag',
		array(
			'section'          => 'pstu_next_theme_sticky',
			'label'            => __( 'Использовать метку', 'pstu-next-theme' ),
			'description'      => __( 'Текст в правом углу превью закреплённого поста', 'pstu-next-theme' ),
			'type'             => 'checkbox',
		)
	); /**/


	$wp_customize->add_setting(
		'sticky_label_text',
		array(
			'default'          => __( 'Важное', 'pstu-next-theme' ),
			'transport'        => 'reset'
		)
	);
	$wp_customize->add_control(
		'sticky_label_text',
		array(
			'section'          => 'pstu_next_theme_sticky',
			'label'            => __( 'Текст метки', 'pstu-next-theme' ),
			'type'             => 'text',
		)
	); /**/


	
} );