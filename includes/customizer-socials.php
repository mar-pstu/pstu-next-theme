<?php


/**
	*	настройки блока с контактной информацией
	*/


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section(
		'pstu_next_theme_socials',
		array(
			'title'       	=> __( 'Контакты', 'pstu-next-theme' ),
			'priority'    	=> 10,
			'description' 	=> __( 'Ссылки на социальные сети и контакты. Список публикуется в шапке сайта и подвале.' , 'pstu-next-theme' ),
			'panel'       	=> 'pstu_next_theme_options'
		)
	); /**/

	$wp_customize->add_setting(
		'socials_flag',
		array(
			'default'				=> false,
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials_flag',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Использовать блок', 'pstu-next-theme' ),
			'type'					=> 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[envelope]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[envelope]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Электронная почта', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[facebook]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[facebook]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Facebook', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[google-plus]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[google-plus]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Google Plus', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[instagram]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[instagram]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Instagram', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[linkedin]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[linkedin]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'LinkedIn', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[pinterest]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[pinterest]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Pinterest', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[twitter]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[twitter]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Twitter', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[vk]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[vk]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Вконтакте', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'socials[call]',
		array(
			'default'				=> '',
			'transport'			=> 'reset'
		)
	);
	$wp_customize->add_control(
		'socials[call]',
		array(
			'section'				=> 'pstu_next_theme_socials',
			'label'					=> __( 'Номер телефона', 'pstu-next-theme' ),
			'type'					=> 'text',
		)
	); /**/
	
} );


?>