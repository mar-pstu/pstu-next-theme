<?php

/**
 *  Блок поделиться
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


$share_title = get_theme_mod( 'share_section_title', get_bloginfo( 'name' ) );
if ( function_exists( 'pll__' ) ) $share_title = pll__( $share_title );

?>



<section class="share lazy" id="share" data-src="<?php echo get_theme_mod( 'share_section_bgi', PSTU_NEXT_THEME_URL . 'images/share_bg.jpg' ); ?>">
  <div class="section__body body">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <img class="share__qr-code qr-code lazy" src="#" alt="<?php _e( 'QR-код', 'pstu-next-theme' ); ?>" data-src="https://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=100x100&amp;chl=<?php home_url(); ?>">
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 first-sm">
          <?php if ( ! empty( $share_title ) ) : ?>
          <div class="share__title title" data-aos="fade-up"><h2><?php echo $share_title; ?></h2></div>
          <?php endif; ?>
          <div class="share__jssocials jssocials" id="jssocials"></div>
        </div>
      </div>
    </div>
  </div>
</section>