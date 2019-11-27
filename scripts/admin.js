// jQuery(document).ready(function($){
// 	'use strict';
// 	// настройки по умолчанию. Их можно добавить в имеющийся js файл, 
// 	// если datepicker будет использоваться повсеместно на проекте и предполагается запускать его с разными настройками
// 	$.datepicker.setDefaults({
// 		closeText: 'Закрыть',
// 		prevText: '<Пред',
// 		nextText: 'След>',
// 		currentText: 'Сегодня',
// 		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
// 		monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
// 		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
// 		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
// 		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
// 		weekHeader: 'Нед',
// 		dateFormat: 'yyyy-mm-dd',
// 		firstDay: 1,
// 		showAnim: 'slideDown',
// 		isRTL: false,
// 		showMonthAfterYear: false,
// 		yearSuffix: ''
// 	} );

// 	// Инициализация
// 	$('input[name*="date"], .datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
	
// } );

// jQuery( function( $ ) {
// 	/*
// 	 * действие при нажатии на кнопку загрузки изображения
// 	 * вы также можете привязать это действие к клику по самому изображению
// 	 */
// 	jQuery( '#pstu_bgi_upload_image_btn' ).click( function () {
// 		var send_attachment_bkp = wp.media.editor.send.attachment;
// 		var button = jQuery( this );
// 		wp.media.editor.send.attachment = function( props, attachment ) {
// 			jQuery( '#pstu_bgi_image' ).attr( 'src', attachment.url );
// 			jQuery( '#pstu_bgi_field' ).val( attachment.id );
// 			wp.media.editor.send.attachment = send_attachment_bkp;
// 		}
// 		wp.media.editor.open( button );
// 		return false;
// 	} );
// 	/*
// 	 * удаляем значение произвольного поля
// 	 * если быть точным, то мы просто удаляем value у input type="hidden"
// 	 */
// 	$( '#pstu_bgi_remove_image_btn' ).click( function () {
// 		var r = confirm( "Уверены?" );
// 		if ( r == true ) {
// 			var src = jQuery( '#pstu_bgi_image' ).attr( 'data-default-src' );
// 			jQuery( '#pstu_bgi_image' ).attr( 'src', src );
// 			jQuery( '#pstu_bgi_field' ).val( '' );
// 		}
// 		return false;
// 	} );
// } );