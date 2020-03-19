<?php

/**
*	Переключатель языков шапки сайта
*/


if ( ! defined( 'ABSPATH' ) ) { exit; };



if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) && ( function_exists( 'pll_home_url' ) ) && ( function_exists( 'pll_get_term' ) ) ) {
	$result = array();
	$current = pll_current_language( 'slug' );
	$result[] = sprintf(
		'<span class="current" title="%3$s">%2$s</span>',
		pll_home_url( $current ),
		$current,
		__( 'На главную', 'pstu-next-theme' )
	);
	$languages_list = pll_languages_list( array(
		'hide_empty' => 1,
		'fields'     => 'slug',
	) );
	if ( is_array( $languages_list ) ) {
		if ( is_singular() ) {
			$function_to_translate_name = 'pll_get_post';
			$object_id = get_the_ID();
			$function_to_permalink_name = 'get_permalink';
		} else {
			$function_to_translate_name = 'pll_get_term';
			$object_id = get_queried_object_id();
			$function_to_permalink_name = 'get_term_link';
		}
		// echo "<pre>";
		// var_dump( $function_to_permalink_name( $function_to_translate_name( $object_id, 'uk' ) ) );
		// echo "</pre>";
		$result[] = '<ul class="other">';
		foreach ( $languages_list as $language ) {
			if ( $current != $language ) {
				if ( is_front_page() || is_search() || is_404() ) {
					$link = pll_home_url( $language );
				} else {
					$link = $function_to_permalink_name( $function_to_translate_name( $object_id, $language ) );
				}
				$result[] = sprintf(
					'<li><a href="%1$s">%2$s</a></li>',
					( is_wp_error( $link ) ) ? pll_home_url( $language ) : $link,
					$language
				);
			}
		}
		$result[] = '</ul>';
	}
	if ( ! empty( $result ) ) echo '<div class="languages">' . implode( "\r\n", $result ) . '</div>';
}