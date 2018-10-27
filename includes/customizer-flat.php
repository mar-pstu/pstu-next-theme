<?php


/**
	*	Настройки секции "первый экран" главной страницы
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_flat',
		array(
			'title'       	=> __( 'Секция "Флат"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Секция главной страницы с флат иконками.' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'flat_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'flat_section_flag',
		array(
			'section'				=> 'pstu_next_theme_flat',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'flat_entry_number',
		array(
			'default'				=> '5',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'flat_entry_number',
		array(
			'section'				=> 'pstu_next_theme_flat',
			'label'					=> __( 'Количество записей', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '20',
			),
		)
	); /**/

	$wp_customize->add_setting(
		'flat_entry_type',
		array(
			'default'				=> 'item',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'flat_entry_type',
		array(
			'section'				=> 'pstu_next_theme_flat',
			'label'					=> __( 'Тип потов', 'pstu-next-theme' ),
			'type'					=> 'radio',
			'choices'				=> array(
				'item'					=> __( 'пункты меню',							'pstu-next-theme' ),
				'page'					=> __( 'постоянные страницы',			'pstu-next-theme' ),
				'post'					=> __( 'записи (посты)',					'pstu-next-theme' ),
			),
		)
	); /**/

	$wp_customize->add_setting(
		'flat_nav_menu_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'flat_nav_menu_id',
		array(
			'section'				=> 'pstu_next_theme_flat',
			'label'					=> __( 'Выбор меню', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_nav_menus_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'flat_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'flat_category_id',
		array(
			'section'				=> 'pstu_next_theme_flat',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'flat_parent_page_id',
		array(
			'default'				=> 'page',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'flat_parent_page_id',
		array(
			'section'				=> 'pstu_next_theme_flat',
			'label'					=> __( 'Выбор родительской страницы', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_pages_array(),
		)
	); /**/




} );



?>