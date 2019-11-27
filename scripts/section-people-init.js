jQuery( '#people-slider' ).slick( {
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 4000,
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