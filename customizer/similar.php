<?php


/**
	*	Настройки слайдера "Проекты". Публикуется на главной странице.
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_similar',
		array(
			'title'       	=> __( 'Похожие записи', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> '',
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'similar_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'similar_section_flag',
		array(
			'section'				=> 'pstu_next_theme_similar',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'similar_section_type',
		array(
			'default'				=> 'category',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'similar_section_type',
		array(
			'section'				=> 'pstu_next_theme_similar',
			'label'					=> __( 'Критерий выбора', 'pstu-next-theme' ),
			'type'					=> 'radio',
			'choices'				=> array(
				'category'			=> __( 'категория', 'pstu-next-theme' ),
				'tag'						=> __( 'метка', 'pstu-next-theme' ),
			),
		)
	); /**/

	$wp_customize->add_setting(
		'similar_heading_flag',
		array(
			'default'				=> true,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'similar_heading_flag',
		array(
			'section'				=> 'pstu_next_theme_similar',
			'label'					=> __( 'Выводить заголовок слайдера', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'similar_heading_title',
		array(
			'default'				=> __( 'Похожие записи', 'pstu-next-theme' ),
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'similar_heading_title',
		array(
			'section'				=> 'pstu_next_theme_similar',
			'label'					=> __( 'Текст заголовка', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/	

	$wp_customize->add_setting(
		'similar_posts_number',
		array(
			'default'				=> '5',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'similar_posts_number',
		array(
			'section'				=> 'pstu_next_theme_similar',
			'label'					=> __( 'Количество слайдов', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '20',
			),
		)
	); /**/
	
} );
