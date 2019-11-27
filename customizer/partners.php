<?php


/**
	*	Настройки слайдера "Партнёры"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_partners',
		array(
			'title'       	=> __( 'Блок "Партнёры"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Настройки слайдера "Партнёры" в подвале сайта' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'partners_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'partners_section_flag',
		array(
			'section'				=> 'pstu_next_theme_partners',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/


	$wp_customize->add_setting(
		'partners_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'partners_category_id',
		array(
			'section'				=> 'pstu_next_theme_partners',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'partners_posts_number',
		array(
			'default'				=> '5',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'partners_posts_number',
		array(
			'section'				=> 'pstu_next_theme_partners',
			'label'					=> __( 'Количество слайдов', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '20',
			),
		)
	); /**/
	
} );