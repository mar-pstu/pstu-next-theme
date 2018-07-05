<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
	*	Блок поделиться
	*/
$wp_customize->add_section(
	'pstu_next_theme_share',
	array(
		'title'       	=> __( 'Блок поделиться', 'pstu-next-theme' ),
		'priority'    	=> 10,
		'description' 	=> __( 'Поделиться в социальных сетях на основе библиотеки rrssb.js' , 'pstu-next-theme' ),
		'panel'       	=> 'pstu_next_theme_options'
	)
); /**/

$wp_customize->add_setting(
	'share_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_flag',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Использовать блок "поделиться"', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_section_flag',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_section_flag',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Отображать секцию "поделиться" главной странице', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[email]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[email]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Email', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[facebook]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[facebook]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Facebook', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[instagram]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[instagram]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Instagram', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[linkedin]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[linkedin]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'LinkedIn', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[xing]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[xing]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Xing', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[twitter]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[twitter]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Twitter', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[googleplus]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[googleplus]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Google Plus', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[pocket]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[pocket]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Pocket', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[github]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[github]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Github', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[print]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[print]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'Распечатать', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/

$wp_customize->add_setting(
	'share_links[whatsapp]',
	array(
		'default'				=> true,
		'transport'			=> 'reset'
	)
);
$wp_customize->add_control(
	'share_links[whatsapp]',
	array(
		'section'				=> 'pstu_next_theme_share',
		'label'					=> __( 'WhatsApp', 'pstu-next-theme' ),
		'type'					=> 'checkbox',
	)
); /**/



?>