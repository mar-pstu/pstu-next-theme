jQuery( document ).ready( function () {

	// "похожие записи"
	( function () {
		jQuery( '#similar-slider' ).slick( {
			lazyLoad: 'ondemand',
			autoplay: true,
			autoplaySpeed: 3000,
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: false,
			prevArrow: jQuery( '#similar-slider-arrow-prev' ),
			nextArrow: jQuery( '#similar-slider-arrow-next' ),
			dots: false,
		} );
	} )();

	// "первый экран"
	( function () {
		jQuery( '#jumbotron-slider' ).slick( {
			lazyLoad: 'ondemand',
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 400,
			fade: true,
			dots: false,
			prevArrow: jQuery( '#jumbotron-slider-arrow-prev' ),
			nextArrow: jQuery( '#jumbotron-slider-arrow-next' ),
		} ).on( 'lazyLoaded', function ( e, slick, image, imageSource ) {
			imageSource = image.attr( 'src' );
			parentSlide = jQuery( image ).closest( '.jumbotron__entry.entry' );
			parentSlide.css( 'background-image', 'url("'+imageSource+'")' );
			image.attr('src',''); // remove source
		} );
	} )();

	// "Текущая тема"
	( function () {
		jQuery( '#current-slider' ).slick( {
			lazyLoad: 'ondemand',
			slidesToShow: 2,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			centerMode: true,
			variableWidth: true,
			speed: 300,
			prevArrow: jQuery( '#current-slider-arrow-prev' ),
			nextArrow: jQuery( '#current-slider-arrow-next' ),
			dots: false,
		} );
	} )();

	// люди
	( function () {
		jQuery( '#people-slider' ).slick( {
			slidesToShow: 3,
			slidesToScroll: 1,
			speed: 400,
			arrows: true,
			prevArrow: jQuery( '#people-slider-arrow-prev' ),
			nextArrow: jQuery( '#people-slider-arrow-next' ),
			fade: false,
			dots: false,
			centerMode: true,
			centerPadding: '60px',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
			],
		} );
	} )();

	// проекты
	( function () {
		jQuery( '#projects-slider' ).slick( {
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: true,
			fade: false,
			dots: true,
			prevArrow: jQuery( '#projects-slider-arrow-prev' ),
			nextArrow: jQuery( '#projects-slider-arrow-next' ),
			dotsClass: 'slider-dots',
		} );
	} )();

	// "Партнёры"
	( function () {
		jQuery( '#partners-slider' ).slick( {
			lazyLoad: 'ondemand',
			autoplay: true,
			autoplaySpeed: 2000,
			dots: true,
			dotsClass: 'slider-dots',
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			centerMode: true,
			variableWidth: true,
			prevArrow: jQuery( '#partners-slider-arrow-prev' ),
			nextArrow: jQuery( '#partners-slider-arrow-next' ),
		} );
	} )();

} );