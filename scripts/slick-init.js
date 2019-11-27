
// оповещения в шапке сайта
jQuery( '#header-alerts-list' ).slick( {
	vertical: true,
	slidesToShow: 2,
	slidesToScroll: 2,
	autoplay: true,
	autoplaySpeed: 1500,
	dots: true,
	dotsClass: 'dots',
	appendDots: jQuery( '#alerts' ),
	prevArrow: jQuery( '#header-alerts-arrow-prev' ),
	nextArrow: jQuery( '#header-alerts-arrow-next' ),
} );


// // "похожие записи"
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


// главный слайдер
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