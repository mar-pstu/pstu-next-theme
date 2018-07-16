<?php


/**
	*	Настройки секции "Action" главной страницы
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_action',
		array(
			'title'       	=> __( 'Секция "Action"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Ссылки на социальные сети и контакты. Список публикуется в шапке сайта и подвале.' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'action_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_section_flag',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'action_section_logo',
		array(
			'default'				=> PSTU_NEXT_THEME_URL . 'images/action_bgi.jpg',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'action_section_logo',
			array(
				'label'    => 'Фон секции',
				'settings' => 'action_section_logo',
				'section'  => 'pstu_next_theme_action'
			)
		)
	);

	$wp_customize->add_setting(
		'action_section_title',
		array(
			'default'				=> '',
			'transport'			=> 'reset',
			'sanitize_callback' => 'wp_strip_all_tags',
		)
	);
	$wp_customize->add_control(
		'action_section_title',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Заголовок', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'action_section_subtitle',
		array(
			'default'				=> '',
			'transport'			=> 'reset',
			'sanitize_callback' => 'force_balance_tags',
		)
	);
	$wp_customize->add_control(
		'action_section_subtitle',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Подзаголовок', 'pstu-next-theme' ),
			'type'					=> 'textarea',
		)
	); /**/

	$wp_customize->add_setting(
		'action_entry_number',
		array(
			'default'				=> '2',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_entry_number',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Количество записей', 'pstu-next-theme' ),
			'type'					=> 'number',
			'input_attrs'		=> array(
				'min'						=> '1',
				'max'						=> '10',
			),
		)
	); /**/

	$wp_customize->add_setting(
		'action_entry_type',
		array(
			'default'				=> 'item',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_entry_type',
		array(
			'section'				=> 'pstu_next_theme_action',
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
		'action_nav_menu_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_nav_menu_id',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Выбор меню', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_nav_menus_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'action_category_id',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_category_id',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Выбор категории', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_category_array(),
		)
	); /**/

	$wp_customize->add_setting(
		'action_parent_page_id',
		array(
			'default'				=> 'page',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'action_parent_page_id',
		array(
			'section'				=> 'pstu_next_theme_action',
			'label'					=> __( 'Выбор родительской страницы', 'pstu-next-theme' ),
			'type'					=> 'select',
			'choices'				=> get_pages_array(),
		)
	); /**/




} );



?>