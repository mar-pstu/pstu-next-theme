( function () {
	function BlocksItInit ( obj ) {
		jQuery( obj ).BlocksIt( {
			numOfCol: jQuery( obj ).attr( 'data-block-columns' ),
			offsetX: 5,
			offsetY: 5,
			blockElement: jQuery( obj ).attr( 'data-block-element' ),
		} );
	}
	function GalleriesInit () {
		jQuery( '.gallery' ).each( function () {
			var $gallery = jQuery( this ),
					$imgs = $gallery.find( 'img.lazy' );
			$imgs.unbind( 'load' ).on( 'load', function ( event ) {
				BlocksItInit ( $gallery );
			} );
			BlocksItInit ( $gallery );
		} );
	}
	frame.onresize = function () {
		GalleriesInit();
	}
	jQuery( window ).load( GalleriesInit );
	jQuery( window ).resize( GalleriesInit );
} )();