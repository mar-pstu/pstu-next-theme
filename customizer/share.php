<?php


/**
	*	Настройки секции и блока "Поделиться"
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_share',
		array(
			'title'       	=> __( 'Секция "Поделиться"', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Настройки секции главной страницы "Поделиться" и блока с иконками на постоянных страницах и постах' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'share_section_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'share_section_flag',
		array(
			'section'				=> 'pstu_next_theme_share',
			'label'					=> __( 'Использовать секцию', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'share_section_title',
		array(
			'default'				=> get_bloginfo( 'name' ),
			'transport'			=> 'reset',
			'sanitize_callback'	=> 'wp_strip_all_tags'
		)
	);
	$wp_customize->add_control(
		'share_section_title',
		array(
			'section'				=> 'pstu_next_theme_share',
			'label'					=> __( 'Заголовок', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'share_section_bgi',
		array(
			'default'				=> PSTU_NEXT_THEME_URL . 'images/share_bg.jpg',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'share_section_bgi',
      array(
        'label' 			=> __( 'Фоновое изображение', 'pstu-next-theme' ),
        'section'			=> 'pstu_next_theme_share',
        'settings'		=> 'share_section_bgi'
      )
    )
	);




} );
