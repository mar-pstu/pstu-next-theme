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

	$result = array();

	if ( ( $partners ) && ( ! empty( $partners ) ) && ( ! is_wp_error( $partners ) ) ) {

		foreach ( $partners as $partner ) {
			
			setup_postdata( $partner );
			
			if ( has_post_thumbnail( $partner->ID ) ) {
				$content_link = ( 'link' == get_post_format( $partner->ID ) ) ? get_url_in_content( $partner->post_content ) : false;
				$result[] = sprintf(
					'<a class="partners__entry entry" target="%5$s" href="%1$s" title="%2$s - %3$s"><img src="#" data-lazy="%4$s" alt="%3$s"></a>',
					( $content_link ) ? $content_link : get_permalink( $partner->ID ),
					__( 'Подробней', 'pstu-next-theme' ),
					the_title_attribute( array(
						'before'	=> '',
						'adter'		=> '',
						'echo'		=> false,
						'post'		=> $partner->ID,
					) ),
					get_the_post_thumbnail_url( $partner->ID, 'large' ),
					( $content_link ) ? '_blank' : '_self'
				);
			}

		} // foreach

		wp_reset_postdata();

		if ( ! empty( $result ) ) {
			echo "<section class=\"partners\" id=\"partners\">\r\n";
			echo "	<div class=\"container-fluid\">\r\n";
			echo "		<div class=\"row\">\r\n";
			echo "			<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\">\r\n";
			echo "				<div class=\"section__body\">\r\n";
			echo "					<button class=\"slider-arrow slider-prev\" id=\"partners-slider-arrow-prev\" title=\"" . esc_attr__( 'Листать назад', 'patu-next-theme' ) . "\">&larr;</button>\r\n";
			echo "					<button class=\"slider-arrow slider-next\" id=\"partners-slider-arrow-next\" title=\"" . esc_attr__( 'Листать вперёд', 'patu-next-theme' ) . "\">&rarr;</button>\r\n";
			echo "					<div class=\"partners-slider\" id=\"partners-slider\">\r\n";
			echo implode( "\r\n" , $result );
			echo "					</div>\r\n"; // .partners-slider
			echo "				</div>\r\n"; // .section__body
			echo "			</div>\r\n"; // .col-
			echo "		</div>\r\n"; // .row
			echo "	</div>\r\n"; // .container
			echo "</section>\r\n";
		}

	} // if $partners

	unset( $partners );

} // if $partners_category_id

unset( $partners_category_id );


?>