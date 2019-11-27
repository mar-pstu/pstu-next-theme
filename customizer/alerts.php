<?php


/**
	*	Настройки секции главной страницы и вывода категории с "Анонсами"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_alerts',
		array(
			'title'       	=> __( 'Блок "Оповещения"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Настройки секции главной страницы и вывода категории с "Анонсами".' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'alerts_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'alerts_section_flag',
		array(
			'section'				=> 'pstu_next_theme_alerts',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'alerts_entry_number',
		array(
			'default'				=> '5',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'alerts_entry_number',
		array(
			'section'				=> 'pstu_next_theme_alerts',
			'label'					=> __( 'Количество записей в секции', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '10',
			),
		)
	); /**/

	$wp_customize->add_setting(
		'alerts_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'alerts_category_id',
		array(
			'section'				=> 'pstu_next_theme_alerts',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

} );