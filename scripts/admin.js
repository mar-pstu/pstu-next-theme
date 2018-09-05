jQuery( function( $ ) {
	/*
	 * действие при нажатии на кнопку загрузки изображения
	 * вы также можете привязать это действие к клику по самому изображению
	 */
	jQuery( '#pstu_bgi_upload_image_btn' ).click( function () {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery( this );
		wp.media.editor.send.attachment = function( props, attachment ) {
			jQuery( '#pstu_bgi_image' ).attr( 'src', attachment.url );
			jQuery( '#pstu_bgi_field' ).val( attachment.id );
			wp.media.editor.send.attachment = send_attachment_bkp;
		}
		wp.media.editor.open( button );
		return false;
	} );
	/*
	 * удаляем значение произвольного поля
	 * если быть точным, то мы просто удаляем value у input type="hidden"
	 */
	$( '#pstu_bgi_remove_image_btn' ).click( function () {
		var r = confirm( "Уверены?" );
		if ( r == true ) {
			var src = jQuery( '#pstu_bgi_image' ).attr( 'data-default-src' );
			jQuery( '#pstu_bgi_image' ).attr( 'src', src );
			jQuery( '#pstu_bgi_field' ).val( '' );
		}
		return false;
	} );
} );