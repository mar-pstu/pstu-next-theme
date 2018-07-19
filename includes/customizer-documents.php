<?php


/**
	*	Настройки секции главной страницы и вывода категории с "Анонсами"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_documents',
		array(
			'title'       	=> __( 'Документы', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Настройки вывода категории "Документы".' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'documents_category_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'documents_category_flag',
		array(
			'section'				=> 'pstu_next_theme_documents',
			'label'					=> __( 'Использовать отдельный шаблон для вывода категории', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'documents_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'documents_category_id',
		array(
			'section'				=> 'pstu_next_theme_documents',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

} );



?>