<?php

/**
 *	Список в виде аккордеона
 */


class pstuAccordioListClass {


	private $name = 'accordio_list';


	function __construct() {
		add_shortcode( $this->name, array( $this, 'render_content' ) );
		add_shortcode( strtoupper( $this->name ), array( $this, 'render_content' ) );
		remove_filter( 'the_content', 'wpautop' );
		add_filter( 'the_content', 'wpautop', 12 );
	}


	public function render_content( $atts, $content ) {
		$atts = shortcode_atts( array(
			'headers'   => 'h2',
			'style'     => 'primary'
		), $atts, $this->name );
		return force_balance_tags( sprintf(
			'<div class="accordio is-style-accordio-%3$s" data-heading="%1$s" data-build="1">%2$s</div>',
			esc_attr( $atts[ 'headers' ] ),
			do_shortcode( $content ),
			$atts[ 'style' ]
		) );
	}


}