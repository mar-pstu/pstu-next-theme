/* кнопка наверх */
jQuery( document ).ready( function () {
  var $w = jQuery( window ),
    $toTopBtn = jQuery( '<button>', {
      class: 'to-top-btn',
      id: 'toTopBtn',
      title: pstuNextThemeTranslate.toTopBtn,
    } ).appendTo( jQuery( 'body' ) );
  function _btnHide() {
    if ( $w.scrollTop() > screen.height * 0.5) {
      $toTopBtn.show();
    } else {
      $toTopBtn.hide();
    }
  }
  function _toTopBtnClick() {
    $( 'body, html' ).animate( {
      scrollTop: 0
    }, 500 );
    return false;
  }
  _btnHide();
  $w.bind( 'scroll', _btnHide );
  $toTopBtn.bind( 'click', _toTopBtnClick );
} );

/* Навигационное меню */
jQuery( document ).ready( function () {
	
		var $touch = jQuery( '#header-nav-burger' ),
			$menu 	= jQuery( '#header-nav-list' ),
			$submunus = $menu.find( '.sub-menu' );

		jQuery( $touch ).on( 'click', function( e ) {
			e.preventDefault();
			$menu.slideToggle();
		});
		
		jQuery( window ).resize( function() {
			var w = jQuery( window ).width();
			if( w > 767 && $menu.is( ':hidden' ) ) {
				$menu.removeAttr( 'style' );
			}
		});

		$submunus.each( function () {
			jQuery( this ).closest( 'li' ).find( '> a' ).append( '<i class="icon icon-down-arrow"></i>' );
		} );

} );



/* Навигационное меню */
jQuery( document ).ready( function () {
	
		var $touch = jQuery( '#top-nav-burger' ),
			$menu 	= jQuery( '#top-nav-list' ),
			$submunus = $menu.find( '.sub-menu' );

		jQuery( $touch ).on( 'click', function( e ) {
			e.preventDefault();
			$menu.slideToggle();
		});
		
		jQuery( window ).resize( function() {
			var w = jQuery( window ).width();
			if( w > 980 && $menu.is( ':hidden' ) ) {
				$menu.removeAttr( 'style' );
			}
		});

		$submunus.each( function () {
			jQuery( this ).closest( 'li' ).find( '> a' ).append( '<i class="icon icon-down-arrow"></i>' );
		} );

} );

/* автодобавление иконок к ссылкам на долкументы */
jQuery( document ).ready( function () {

	var types = [ 'pdf', 'doc', 'xls', 'csv', 'mp3', 'rar', 'zip', 'odt', 'txt', 'psd', 'rtf', 'dwg' ];

	for ( var i = 0; i < types.length; i++ ) {
		jQuery( 'a[href$=\'.' + types[ i ] + '\']' ).each( function () {
			var $link = jQuery( this );
			if ( ( $link.find( '.icon-' + types[ i ] ).length < 1 ) && ( ! $link.hasClass( 'no-doc-icon' ) ) ) $link.prepend( '<i class="icon icon-' + types[ i ] + '"></i> ' );
		} );
	}

} );

jQuery( document ).ready( function () {


	// добавление иконок типов файлов

	var alignClasses = [ 'alignleft', 'alignright' ];

	for ( var i = 0; i < alignClasses.length; i++ ) {
		jQuery( 'img.' + alignClasses[i] ).each( function() {
			var $img = jQuery( this ),
					$parent = $img.parent();
			if ( ( $parent.is( 'a' ) ) && ( ! $parent.hasClass( alignClasses[i] ) ) ) $parent.addClass( alignClasses[i] );
		} );
	}


	// открыть ссылку на новой вкладке

	jQuery( '.content a[target="_blank"]' ).each( function () {
		if ( ( jQuery( this ).find( '.icon-share' ).length == 0 ) && ( jQuery( this ).find( 'img, div, h1, h2, h3, h4, h5, h6' ).length == 0 ) ) {
			jQuery( this ).append( '<i class="icon icon-share"></i>' );
		}
	} );

} );