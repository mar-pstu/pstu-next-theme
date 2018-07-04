<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
	*	Настройки слайдера "Люди" главной страницы
	*/
$wp_customize->add_section(
	'pstu_next_theme_people',
	array(
		'title'       	=> __( 'Слайдер "Люди"', 'pstu-next-theme' ),
		'priority'    	=> 10,
		'description' 	=> __( 'Настройки слайдера "Люди" главной страницы' , 'pstu-next-theme' ),
		'panel'       	=> 'pstu_next_theme_options'
	)
); /**/

$wp_customize->add_setting(
	'people_section_flag',
	array(
		'default'				=> false,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'people_section_flag',
	array(
		'section'				=> 'pstu_next_theme_people',
		'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'people_category_id',
	array(
		'default'				=> '',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'people_category_id',
	array(
		'section'				=> 'pstu_next_theme_people',
		'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
		'type'					=> 'select',
		'choices'				=> get_category_array(),
	)
); /**/

$wp_customize->add_setting(
	'people_heading_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'people_heading_flag',
	array(
		'section'				=> 'pstu_next_theme_people',
		'label'					=> __( 'Выводить заголовок слайдера', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'people_posts_number',
	array(
		'default'				=> '5',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'people_posts_number',
	array(
		'section'				=> 'pstu_next_theme_people',
		'label'					=> __( 'Количество слайдов', 'pstu-next-theme' ),
		'type'					=> 'number',
		'input_attrs'		=> array(
			'min'						=> '1',
			'max'						=> '20',
		),
	)
); /**/


?>