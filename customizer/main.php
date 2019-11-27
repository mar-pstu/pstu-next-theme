<?php


/**
	*	Основные настройки
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_main',
		array(
			'title'           => __( 'Основные настройки', 'pstu-next-theme' ),
			'priority'        => 10,
			'description'     => '',
			'panel'           => 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'ajax_pagination',
		array(
			'default'         => false,
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'ajax_pagination',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'AJAX переключение страниц', 'pstu-next-theme' ),
			'type'            => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'minify_css',
		array(
			'default'         => true,
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'minify_css',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Использовать минифицированные стили', 'pstu-next-theme' ),
			'type'            => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'minify_js',
		array(
			'default'         => true,
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'minify_js',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Использовать минифицированные скрипты', 'pstu-next-theme' ),
			'type'            => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'header_help_content',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'header_help_content',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Содержимое справочного модального окна в шапке сайта', 'pstu-next-theme' ),
			'type'            => 'textarea',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_address[title]',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_address[title]',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Адрес', 'pstu-next-theme' ),
			'type'            => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_address[map_url]',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_address[map_url]',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'URL google карты', 'pstu-next-theme' ),
			'type'            => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_address[title]',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_address[title]',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Адрес', 'pstu-next-theme' ),
			'type'            => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[email]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[email]',
		array(
			'section'				=> 'pstu_next_theme_main',
			'label'					=> __( 'Email', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[facebook]',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[facebook]',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Facebook', 'pstu-next-theme' ),
			'type'            => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[instagram]',
		array(
			'default'         => '',
			'transport'       => 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[instagram]',
		array(
			'section'         => 'pstu_next_theme_main',
			'label'           => __( 'Instagram', 'pstu-next-theme' ),
			'type'            => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[linkedin]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[linkedin]',
		array(
			'section'				=> 'pstu_next_theme_main',
			'label'					=> __( 'Linkedin', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[twitter]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[twitter]',
		array(
			'section'				=> 'pstu_next_theme_main',
			'label'					=> __( 'Twitter', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[youtube]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[youtube]',
		array(
			'section'				=> 'pstu_next_theme_main',
			'label'					=> __( 'Youtube', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'pstu_next_socials[rss]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'pstu_next_socials[rss]',
		array(
			'section'				=> 'pstu_next_theme_main',
			'label'					=> __( 'RSS', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/


	
} );