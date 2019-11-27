<?php


/**
 * Слайдер логотипов партнёров внизу сайта
 *
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$result = array();


if ( $partners_category_id = get_translate_id( get_theme_mod( 'partners_category_id', false ), 'category' ) ) {

	$partners = get_posts( array(
		'numberposts' 				=> get_theme_mod( 'partners_posts_number', 5 ),
		'category'    				=> $partners_category_id,
		'orderby'     				=> 'date',
		'order'       				=> 'DESC',
		'post_type'   				=> 'post',
		'suppress_filters' 		=> true,
	) );

	foreach ( $partners as $partner ) {
		setup_postdata( $partner );
		if ( has_post_thumbnail( $partner->ID ) ) {
			$content_link = ( 'link' == get_post_format( $partner->ID ) ) ? get_url_in_content( $partner->post_content ) : false;
			$result[] = sprintf(
				'<a class="partners__entry entry" target="%5$s" href="%1$s" title="%2$s - %3$s"><img src="#" data-lazy="%4$s" alt="%3$s"></a>',
				( $content_link ) ? $content_link : get_permalink( $partner->ID ),
				__( 'Подробней', 'pstu-next-theme' ),
				esc_attr( $partner->post_title ),
				get_the_post_thumbnail_url( $partner->ID, 'medium' ),
				( $content_link ) ? '_blank' : '_self'
			);
		}
	} // foreach

	wp_reset_postdata();

}


?>







<?php if ( ! empty( $result ) ) : ?>
	<?php wp_enqueue_script( 'slick' ); ?>
	<?php wp_enqueue_style( 'slick' ); ?>
	<?php wp_add_inline_script( 'slick', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/section-partners-init.js' ), 'after' ); ?>
	<div class="partners" id="partners">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        <div class="section__body">
	          <button class="slider-arrow slider-prev" title="<?php esc_attr_e( 'Листать назад', 'patu-next-theme' ); ?>" id="partners-slider-arrow-prev">&larr;</button>
	          <button class="slider-arrow slider-next" title="<?php esc_attr_e( 'Листать вперёд', 'patu-next-theme' ); ?>" id="partners-slider-arrow-next">&rarr;</button>
	          <div class="partners-slider" id="partners-slider"><?php echo implode( "\r\n" , $result ); ?></div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>