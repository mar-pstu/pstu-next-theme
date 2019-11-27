jQuery( document ).ready( function () {
  if ( typeof pstuNextThemeAjaxPagination !== "undefined" ) {
    var $container = jQuery( '#entries-container' ),
        $button = jQuery( '<button>', {
          class: 'loadmore btn btn-link',
          id: 'loadmore',
          text: pstuNextThemeTranslate.loadMore,
          click: LoadEntries,
        } ).appendTo( '#pagination-ajax' ),
        $icon = jQuery( '<div>', {
            class: 'loadingicon',
            id: 'loadingicon'
        } );
    function LoadEntries() {
        var data = {
            'action': 'pstu_pagination',
            'part': pstuNextThemeAjaxPagination.part,
            'query': pstuNextThemeAjaxPagination.query_vars,
            'page' : pstuNextThemeAjaxPagination.paged,
        };
        jQuery.ajax( {
          url: pstuNextThemeAjaxPagination.ajaxurl,
          data: data,
          type:'POST',
          beforeSend: function ( xhr ) {
              $button.text( pstuNextThemeTranslate.loading );
              $container.append( $icon );
              $button.unbind( 'click' );
          },
          success: function( data ) {
            $icon.detach();
            $button.text( pstuNextThemeTranslate.loadMore );
            $button.on( 'click', LoadEntries );
            if( data ) {
                $button.text( pstuNextThemeTranslate.loadMore );
                $container.append( data );
                pstuNextThemeAjaxPagination.paged++;
                $container.find( '[data-src]' ).lazy();
                if ( pstuNextThemeAjaxPagination.paged == pstuNextThemeAjaxPagination.max_num_pages ) {
                    $button.remove();
                }
            } else {
                $button.remove();
            }
          }
      } );
    }
  }
} );

/* автодобавление иконок к ссылкам на долкументы */



jQuery.each( [ 'pdf', 'doc', 'xls', 'zip', 'ppt', 'odt', 'psd' ], function( i, type ) {
	var selector;
	switch( type ) {
		case 'doc':
			selector = 'a[href$=".doc"], a[href$=".docx"], a[href$=".docm"], a[href$=".rtf"]';
			break;
		case 'xls':
			selector = 'a[href$=".xls"], a[href$=".xlsx"], a[href$=".ods"], a[href$=".csv"], a[href$=".xlsm"]';
			break;
		case 'zip':
			selector = 'a[href$=".zip"], a[href$=".rar"], a[href$=".7z"]';
			break;
		case 'ppt':
			selector = 'a[href$=".ppt"], a[href$=".pptx"], a[href$=".odp"], a[href$=".pptm"]';
			break;
		default:
			selector = 'a[href$=".' + type + '"]';
			break;
	}
	jQuery( selector ).each( function ( index, element ) {
		var $link = jQuery( element );
		if (
			$link.find( '.file, .file-' + type ).length < 1 &&
			! $link.hasClass( 'no-file-icon' ) &&
			! $link.hasClass( 'button' ) &&
			! $link.hasClass( 'btn' ) &&
			! $link.hasClass( 'wp-block-file__button' ) &&
			$link.children( 'img' ).length < 1
		) {
			$link.prepend( jQuery( '<span>', {
				class: 'file file-' + type
			} ) );
		}
	} );
} );

/* Навигационное меню */
jQuery( document ).ready( function () {

	jQuery( 'body' ).on( 'click', '.burger-button', function() {
		jQuery( 'body' ).toggleClass( 'mobilenav-active' );
	} )

	jQuery( '#header-nav-list' ).clone()
		.attr( 'class', 'mobile-menu lead' ).attr( 'id', 'mobile-menu-main' )
		.appendTo( '#mobile-nav-first-menu-container' )
		.find( 'ul ul' ).remove().end()
		.find( 'li' ).removeAttr( 'id' ).end()
		.find( 'a[href=""], a:not([href])' ).closest( 'li' ).remove();

	jQuery( '#top-nav-list' ).clone()
		.attr( 'class', 'mobile-menu lead' ).attr( 'id', 'mobile-menu-second' )
		.appendTo( '#mobile-nav-second-menu-container' )
		.find( 'ul ul' ).remove().end()
		.find( 'li' ).removeAttr( 'id' ).end()
		.find( 'a[href=""], a:not([href])' ).closest( 'li' ).remove();

} );

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

	// jQuery( '.content a[target="_blank"]' ).each( function () {
	// 	if ( ( jQuery( this ).find( '.icon-share' ).length == 0 ) && ( jQuery( this ).find( 'img, div, h1, h2, h3, h4, h5, h6' ).length == 0 ) ) {
	// 		jQuery( this ).append( '<i class="icon icon-share"></i>' );
	// 	}
	// } );

} );

( function () {


	/**
	*	"Аккордеоны"
	*/

		
	function toggle( e ) {
		e.preventDefault();
		var $heading = jQuery( this ),
			$section = $heading.parent( '.accordio__listitem' ),
			$content = $heading.siblings( '.listitem__content' );
		if ( $section.hasClass( 'active' ) ) {
			$section.removeClass( 'active' );
			$content.slideUp();
		} else {
			$section.addClass( 'active' );
			$content.slideDown();
		}

	}

	function add_section( el, image ) {
		var $panel,
			$content,
			$section;
		$section = jQuery( '<div>', { 'class': 'accordio__listitem listitem', 'role': 'listitem' } );
		$panel = jQuery( '<div>', { 'class': 'listitem__panel panel', click: toggle } );
		if ( image ) jQuery( '<div>', { 'class': 'thumbnail' } )
			.append( image.attr( 'class', 'lazy' ) )
			.appendTo( $panel );
		el.attr( 'class', 'title' ).appendTo( $panel );
		$content = jQuery( '<div>', { 'class': 'listitem__content content' } ).css( 'display', 'none' );
		$section.append( $panel );
		$section.append( $content );
		return $section;
	}


	function build( index, accordio ) {
		var $accordio = jQuery( accordio ),
			selector = $accordio.attr( 'data-heading' ),
			$section;
		$accordio.children().each( function( i, el ) {
			var  $el = jQuery( el );
			if ( $el.is( selector ) ) {
				$section = add_section( $el, false );
				$accordio.append( $section );
			} else {
				if ( $el.is( '.heading' ) && $el.find( selector ).length > 0 ) {
					$section = add_section( $el.find( '.title' ), $el.find( 'img.heading__thumbnail' ) );
					$accordio.append( $section );
				} else {
					if ( $section != undefined ) $el.appendTo( $section.children( '.content' ).eq( 0 ) );
				}
			}
		} );
	}

	jQuery( '.accordio[ data-heading ]' ).each( build );


} )();