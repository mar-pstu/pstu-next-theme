<?php

/**
*	Переключатель языков шапки сайта
*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) && ( function_exists( 'pll_home_url' ) ) ) {
	$result = array();
	$current = pll_current_language( 'slug' );
	$result[] = sprintf(
		'<span class="current" title="%3$s">%2$s</span>',
		pll_home_url( $current ),
		$current,
		__( 'На главную', 'pstu-next-theme' )
	);
	$other = pll_the_languages( array(
		'dropdown'           => 0,
		'show_names'         => '',
		'display_names_as'   => 'slug',
		'show_flags'         => 0,
		'hide_if_empty'      => 0,
		'force_home'         => 0,
		'echo'               => 0,
		'hide_if_no_translation' => 0,
		'hide_current'       => 1,
		'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
		'raw'                => 1,
	) );
	if ( ( $other ) && ( ! empty( $other ) ) ) {
		$result[] = '<ul class="other">';
		foreach ( $other as $lang ) $result[] = sprintf(
			'<li><a href="%1$s">%2$s</a></li>',
			$lang[ 'url' ],
			$lang[ 'name' ]
		);
		$result[] = '</ul>';
	}
	if ( ! empty( $result ) ) echo '<div class="languages">' . implode( "\r\n", $result ) . '</div>';
}


?>