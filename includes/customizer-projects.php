<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
	*	Настройки слайдера "Проекты". Публикуется на главной странице.
	*/
$wp_customize->add_section(
	'pstu_next_theme_projects',
	array(
		'title'       	=> __( 'Слайдер "Актуальное"', 'pstu-next-theme' ),
		'priority'    	=> 10,
		'description' 	=> __( 'Настройки слайдера "Проекты". Слайдер только на главной странице.' , 'pstu-next-theme' ),
		'panel'       	=> 'pstu_next_theme_options'
	)
); /**/

$wp_customize->add_setting(
	'projects_section_flag',
	array(
		'default'				=> false,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'projects_section_flag',
	array(
		'section'				=> 'pstu_next_theme_projects',
		'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'projects_category_id',
	array(
		'default'				=> '',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'projects_category_id',
	array(
		'section'				=> 'pstu_next_theme_projects',
		'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
		'type'					=> 'select',
		'choices'				=> get_category_array(),
	)
); /**/

$wp_customize->add_setting(
	'projects_heading_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'projects_heading_flag',
	array(
		'section'				=> 'pstu_next_theme_projects',
		'label'					=> __( 'Выводить заголовок слайдера', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'projects_posts_number',
	array(
		'default'				=> '5',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'projects_posts_number',
	array(
		'section'				=> 'pstu_next_theme_projects',
		'label'					=> __( 'Количество слайдов', 'pstu-next-theme' ),
		'type'					=> 'number',
		'input_attrs'		=> array(
			'min'						=> '1',
			'max'						=> '20',
		),
	)
); /**/


?>