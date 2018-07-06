<?php


/**
	*	Настройки блока главной страницы "Новости"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_news',
		array(
			'title'       	=> __( 'Блок "Новости"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Настройки блока новостей главной страницы' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'news_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'news_section_flag',
		array(
			'section'				=> 'pstu_next_theme_news',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'news_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'news_category_id',
		array(
			'section'				=> 'pstu_next_theme_news',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'news_heading_flag',
		array(
			'default'				=> true,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'news_heading_flag',
		array(
			'section'				=> 'pstu_next_theme_news',
			'label'					=> __( 'Выводить заголовок секции', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'news_posts_number',
		array(
			'default'				=> '5',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'news_posts_number',
		array(
			'section'				=> 'pstu_next_theme_news',
			'label'					=> __( 'Количество слайдов', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '20',
			),
		)
	); /**/
	
} );


?>