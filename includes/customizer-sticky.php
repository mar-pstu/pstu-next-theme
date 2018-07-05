<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
	*	Настройки слайдера "Проекты". Публикуется на главной странице.
	*/
$wp_customize->add_section(
	'pstu_next_theme_sticky',
	array(
		'title'       	=> __( 'Закреплённый пост', 'pstu-next-theme' ),
		'priority'    	=> 10,
		'description' 	=> __( 'Настройки секции главной страницы с "закреплённым постом".' , 'pstu-next-theme' ),
		'panel'       	=> 'pstu_next_theme_options'
	)
); /**/

$wp_customize->add_setting(
	'sticky_section_flag',
	array(
		'default'				=> false,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'sticky_section_flag',
	array(
		'section'				=> 'pstu_next_theme_sticky',
		'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'sticky_text_color',
	array(
		'default'				=> '#ffffff',
		'transport'			=> 'reset',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
    $wp_customize,
    'sticky_text_color',
    array(
    	'section' 		=> 'pstu_next_theme_sticky',
      'label' 			=> __( 'Цвет текста', 'pstu-next-theme' ),
      'settings' 		=> 'sticky_text_color',
    )
  )
); /**/

$wp_customize->add_setting(
	'sticky_bg_color',
	array(
		'default'				=> '#0c426f',
		'transport'			=> 'reset',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
    $wp_customize,
    'sticky_bg_color',
    array(
    	'section' 		=> 'pstu_next_theme_sticky',
      'label' 			=> __( 'Цвет фона', 'pstu-next-theme' ),
      'settings' 		=> 'sticky_bg_color',
    )
  )
); /**/

$wp_customize->add_setting(
	'sticky_type',
	array(
		'default'				=> 'post',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'sticky_type',
	array(
		'section'				=> 'pstu_next_theme_sticky',
		'label'					=> __( 'Выбор типа поста', 'pstu-next-theme' ),
		'type'					=> 'select',
		'choices'				=> array(
			'post'					=> __( 'Закреплённый пост', 'pstu-next-theme' ),
			'category'			=> __( 'Категория', 'pstu-next-theme' ),
			'page'					=> __( 'Страница', 'pstu-next-theme' ),
		),
	)
); /**/

$wp_customize->add_setting(
	'sticky_category_id',
	array(
		'default'				=> '',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'sticky_category_id',
	array(
		'section'				=> 'pstu_next_theme_sticky',
		'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
		'type'					=> 'select',
		'choices'				=> get_category_array(),
	)
); /**/

$wp_customize->add_setting(
	'sticky_page_id',
	array(
		'default'				=> '',
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'sticky_page_id',
	array(
		'section'				=> 'pstu_next_theme_sticky',
		'label'					=> __( 'Выбор страницы', 'pstu-next-theme' ),
		'type'					=> 'dropdown-pages',
	)
); /**/


?>