<?php


/**
	*	Настройки секции "первый экран" главной страницы
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_jumbotron( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_jumbotron',
		array(
			'title'       	=> __( 'Первый экран', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Секция "Первый экран" главной страницы.' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'jumbotron_section_flag',
		array(
			'section'				=> 'pstu_next_theme_jumbotron',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_entry_number',
		array(
			'default'				=> '5',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'jumbotron_entry_number',
		array(
			'section'				=> 'pstu_next_theme_jumbotron',
			'label'					=> __( 'Количество записей', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '10',
			),
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_entry_type',
		array(
			'default'				=> 'items',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'jumbotron_entry_type',
		array(
			'section'				=> 'pstu_next_theme_jumbotron',
			'label'					=> __( 'Тип потов', 'pstu-next-theme' ),
			'type'					=> 'radio',
			'choices'				=> array(
				'item'					=> __( 'пенкты меню',							'pstu-next-theme' ),
				'page'					=> __( 'постоянные страницы',			'pstu-next-theme' ),
				'post'					=> __( 'записи (посты)',					'pstu-next-theme' ),
			),
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_nav_menu_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'jumbotron_nav_menu_id',
		array(
			'section'				=> 'pstu_next_theme_jumbotron',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_nav_menus_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'jumbotron_category_id',
		array(
			'section'				=> 'pstu_next_theme_jumbotron',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_parent_page_id',
		array(
			'default'				=> 'page',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'jumbotron_parent_page_id',
		array(
			'section'				=> 'pstu_next_theme_jumbotron',
			'label'					=> __( 'Выбор родительской страницы', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_pages_array(),
		)
	); /**/




} );



?>