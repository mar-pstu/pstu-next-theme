jQuery( document ).ready( function () {
	jQuery( "a[href$='.jpg'] > img:only-child" ).closest( "a" ).fancybox();
	jQuery( "a[href$='.png'] > img:only-child" ).closest( "a" ).fancybox();
	jQuery( "a[href$='.svg'] > img:only-child" ).closest( "a" ).fancybox();
	jQuery( "a[href$='.bmp'] > img:only-child" ).closest( "a" ).fancybox();
	jQuery( "a[href$='.gif'] > img:only-child" ).closest( "a" ).fancybox();
	jQuery( "a[href$='.jpeg'] > img:only-child" ).closest( "a" ).fancybox();
} );