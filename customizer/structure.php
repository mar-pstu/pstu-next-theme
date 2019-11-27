<?php


/**
	*	Настройки сайдбара главной страницы "Структура"
	* размещается меню и список дочерних страниц
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_structure',
		array(
			'title'           => __( 'Сайдбар "Структура"', 'pstu-next-theme' ),
			'priority'        => 10,
			'description'     => __( 'Настройки сайдбара главной страницы. Размещается меню и список дочерних страниц' , 'pstu-next-theme' ),
			'panel'           => 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'structure_sidebar_flag',
		array(
			'default'         => false,
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'structure_sidebar_flag',
		array(
			'section'         => 'pstu_next_theme_structure',
			'label'           => __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'            => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'structure_parent_page_id',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'structure_parent_page_id',
		array(
			'section'         => 'pstu_next_theme_structure',
			'label'           => __( 'Родительская страница', 'pstu-next-theme' ),
			'type'            => 'dropdown-pages',
		)
	); /**/

	$wp_customize->add_setting(
		'structure_thumbnail_type',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'structure_thumbnail_type',
		array(
			'section'         => 'pstu_next_theme_structure',
			'label'           => __( 'Превью', 'pstu-next-theme' ),
			'type'            => 'select',
			'chices'          => array(
				'bgi'           => __( 'Фоновое изображение страницы', 'pstu-next-theme' ),
				'thumbnail'     => __( 'Превью страницы', 'pstu-next-theme' ),
			),
		)
	); /**/

	$wp_customize->add_setting(
		'structure_pages_number',
		array(
			'default'         => '10',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'structure_pages_number',
		array(
			'section'         => 'pstu_next_theme_structure',
			'label'           => __( 'Количество слайдов', 'pstu-next-theme' ),
			'type'            => 'number',
			'input_attrs'     => array(
				'min'           => '1',
				'max'           => '20',
			),
		)
	); /**/
	
} );

