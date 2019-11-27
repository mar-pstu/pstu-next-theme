jQuery( '#partners-slider' ).slick( {
  lazyLoad: 'ondemand',
  autoplay: true,
  autoplaySpeed: 5000,
  dots: true,
  dotsClass: 'slider-dots',
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  centerMode: true,
  variableWidth: true,
  prevArrow: jQuery( '#partners-slider-arrow-prev' ),
  nextArrow: jQuery( '#partners-slider-arrow-next' ),
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
  ],
} );