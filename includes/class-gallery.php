<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
*	Класс замены стандартной галлереи на 
*/


class pstuGallerySlick {

	function __construct () {
		add_filter( 'post_gallery', array( $this, 'render_content' ), 10, 3 );
	}

	public function render_content ( $cotput, $attr, $instance ) {
		$size = ( wp_is_mobile() ) ? 'medium' : 'large';
		$result = '';
		$result .= sprintf( '<div class="gallery gallery-%1$s slider" id="gallery-%1$s">', $instance );
		$result .= sprintf( '  <button class="slider-arrow slider-prev" id="gallery-%1$s-arrow-prev">&larr;</button>', $instance );
		$result .= sprintf( '  <button class="slider-arrow slider-next" id="gallery-%1$s-arrow-next">&rarr;</button>', $instance );
		$result .= sprintf( '  <div class="gallery-wrap" id="gallery-%1$s-wrap">', $instance );
		foreach ( array_map( 'trim', explode( ',', $attr[ 'ids' ] ) ) as $id ) {
			if ( wp_attachment_is_image( $id ) ) {
				$alt = wp_get_attachment_caption( $id );
				if ( ! $alt ) {
					$alt = the_title_attribute( array(
						'before'		=> '',
						'after'			=> ' - ' . $id,
						'post'			=> get_the_ID(),
						'echo'			=> false,
					) );
				}
				$result .= sprintf(
					'<a class="gallery__item item" href="%1$s"><img src="%2$s" alt="%3$s"></a>',
					wp_get_attachment_image_url( $id, 'full', false ),
					wp_get_attachment_image_url( $id, $size ),
					$alt
				);
			}
		}
		$result .= '  </div>';
		$result .= '</div>';
		// wp_enqueue_script( 'slick' );
		wp_enqueue_style( 'slick' );
		wp_add_inline_script( 'slick', "jQuery( document ).ready( function () { jQuery( '#gallery-{$instance}-wrap' ).slick( {lazyLoad:'ondemand',autoplay:true,autoplaySpeed:2000,dots:true,dotsClass:'slider-dots',infinite:1,slidesToShow:1,speed:300,prevArrow:'#gallery-{$instance}-arrow-prev',nextArrow:'#gallery-{$instance}-arrow-next'} ); } );", 'after' );
		return $result;
	}

}

new pstuGallerySlick();
