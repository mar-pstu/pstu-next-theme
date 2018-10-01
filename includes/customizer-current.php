<?php


/**
	*	Настройки слайдера "Актуальное"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

$wp_customize->add_section(
	'pstu_next_theme_current',
	array(
		'title'       	=> __( 'Слайдер "Актуальное"', 'pstu-next-theme' ),
		'priority'    	=> 10,
		'description' 	=> __( 'Настройки слайдера "Актуальное". Слайдер выводится на главной и на врутренних страницах сайта.' , 'pstu-next-theme' ),
		'panel'       	=> 'pstu_next_theme_options'
	)
); /**/

$wp_customize->add_setting(
	'current_section_flag',
	array(
		'default'				=> false,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'current_section_flag',
	array(
		'section'				=> 'pstu_next_theme_current',
		'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'current_category_id',
	array(
		'default'				=> '',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'current_category_id',
	array(
		'section'				=> 'pstu_next_theme_current',
		'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
		'type'					=> 'select',
		'choices'				=> get_category_array(),
	)
); /**/

$wp_customize->add_setting(
	'current_heading_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'current_heading_flag',
	array(
		'section'				=> 'pstu_next_theme_current',
		'label'					=> __( 'Выводить заголовок слайдера', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'current_posts_number',
	array(
		'default'				=> '5',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'current_posts_number',
	array(
		'section'				=> 'pstu_next_theme_current',
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