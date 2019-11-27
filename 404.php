<?php

get_header();

$error404_title = get_theme_mod( 'error404_title', 'Ошибка 404' );
$error404_subtitle = get_theme_mod( 'error404_subtitle', '' );

if ( function_exists( 'ppl__' ) ) {
  $error404_title = ppl__( $error404_title );
  $error404_subtitle = ppl__( $error404_subtitle );
}


?>


<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h1><?php echo $error404_title; ?></h1>
      <?php if ( ! empty( trim( $error404_subtitle ) ) ) : ?> <div class="lead"><?php echo $error404_subtitle; ?></div><?php endif; ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 first-sm">
      <img class="lazy error404__logo logo" src="#" data-src="<?php echo get_theme_mod( 'error404_logo', PSTU_NEXT_THEME_URL . 'images/error-logo.png' ); ?>">
    </div>
  </div>
</div>

<?php get_footer(); ?>