<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( $partners_category_id = get_translate_id( get_theme_mod( 'partners_category_id', false ), 'category' ) ) {

	$partners = get_posts( array(
		'numberposts' 				=> get_theme_mod( 'partners_posts_number', 5 ),
		'category'    				=> $partners_category_id,
		'orderby'     				=> 'date',
		'order'       				=> 'DESC',
		'post_type'   				=> 'post',
		'suppress_filters' 		=> true,
	) );

	if ( ( $partners ) && ( ! empty( $partners ) ) && ( ! is_wp_error( $partners ) ) ) {

		echo "<section class=\"partners\" id=\"partners\">\r\n";
		echo "	<div class=\"container\">\r\n";
		echo "		<div class=\"row\">\r\n";
		echo "			<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
		echo "				<div class=\"section__body\">\r\n";
		echo "					<button class=\"slider-arrow slider-prev\" id=\"partners-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
		echo "					<button class=\"slider-arrow slider-next\" id=\"partners-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
		echo "					<div class=\"partners-slider\" id=\"partners-slider\">\r\n";

		foreach ( $partners as $partner ) {
			
			setup_postdata( $partner );
			if ( ! has_post_thumbnail( $partner->ID ) ) continue;
			$partner_title_attribute = the_title_attribute( array(
				'before'	=> '',
				'adter'		=> '',
				'echo'		=> false,
				'post'		=> $partner->ID,
			) );
			if ( ! $partner_thumbnail_url = get_the_post_thumbnail_url( $partner->ID, 'medium' ) ) continue;
			echo "<a class=\"partners__entry entry\" href=\"" . get_permalink( $partner->ID ) . "\" title=\"" . sprintf( '%s - %s', __( 'Подробней', 'pstu-next-theme' ), $partner_title_attribute ) . "\">\r\n";
			echo "<img src=\"#\" data-lazy=\"" . $partner_thumbnail_url . "\" alt=\"" . $partner_title_attribute . "\">\r\n";
			echo "</a>\r\n";

		} // foreach

		wp_reset_postdata();

		echo "					</div>\r\n"; // .partners-slider
		echo "				</div>\r\n"; // .section__body
		echo "			</div>\r\n"; // .col-
		echo "		</div>\r\n"; // .row
		echo "	</div>\r\n"; // .container
		echo "</section>\r\n";

		unset( $partner );
		unset( $partner_thumbnail_url );
		unset( $partner_title_attribute );

	} // if $partners

	unset( $partners );

} // if $partners_category_id

unset( $partners_category_id );


?>