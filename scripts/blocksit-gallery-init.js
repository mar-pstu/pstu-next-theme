( function () {
	function BlocksItInit ( obj ) {
		jQuery( obj ).BlocksIt( {
			numOfCol: 3,
			offsetX: 5,
			offsetY: 5,
			blockElement: jQuery( obj ).attr( 'data-block-element' ),
		} );
	}
	function GalleriesInit () {
		jQuery( '.gallery' ).each( function () {
			var $gallery = jQuery( this ),
					$imgs = $gallery.find( 'img.lazy' );
			$imgs.unbind( 'load' ).on( 'load', function () {
				BlocksItInit ( $gallery );
			} );
			BlocksItInit ( $gallery );
		} );
	}
	jQuery( window ).load( GalleriesInit );
	jQuery( window ).resize( GalleriesInit );
} )();