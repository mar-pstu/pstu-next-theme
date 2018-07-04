<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
	*	Основные настройки
	*/
$wp_customize->add_section(
	'pstu_next_theme_main',
	array(
		'title'       	=> __( 'Основные настройки', 'pstu-next-theme' ),
		'priority'    	=> 10,
		'description' 	=> __( 'Подключение скриптов, галерея ...' , 'pstu-next-theme' ),
		'panel'       	=> 'pstu_next_theme_options'
	)
); /**/

$wp_customize->add_setting(
	'minify_scripts_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'minify_scripts_flag',
	array(
		'section'				=> 'pstu_next_theme_main',
		'label'					=> __( 'Минифицировать скрипты', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'minify_styles_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'minify_styles_flag',
	array(
		'section'				=> 'pstu_next_theme_main',
		'label'					=> __( 'Минифицировать стили', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'gallery_huk_flag',
	array(
		'default'				=> false,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'gallery_huk_flag',
	array(
		'section'				=> 'pstu_next_theme_main',
		'label'					=> __( 'Замена скрипта галереи', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'qr_code_url',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'qr_code_url',
	array(
		'section'				=> 'pstu_next_theme_main',
		'label'					=> __( 'QR-код URL страницы', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'img_fancybox_flag',
	array(
		'default'				=> false,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'img_fancybox_flag',
	array(
		'section'				=> 'pstu_next_theme_main',
		'label'					=> __( 'Fancybox', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/



?>