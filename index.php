<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 <?php echo ( is_active_sidebar( 'side_right' ) ) ? 'col-md-7 col-lg-8' : 'col-md-12 col-lg-12'; ?>">
      <div class="main__info info"><img class="lazy qr-code" src="#" data-src="//chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=100x100&amp;chl=<?php echo get_site_url(); ?>">
        <?php the_archive_title( '<h1 class="title">', '</h1>' ); ?>
        <?php the_archive_description( '<p class="lead">', '</p>' ); ?>
        <?php the_breadcrumb(); ?>
        <div class="info__box box box--share">
          <div class="heading"><?php _e( 'Поделиться:', 'pstu-next-theme' ); ?></div>
          <div class="jssocials" id="jssocials"></div>
        </div>
      </div>

      <div class="archive__list list" id="entries-container">
        <?php get_template_part( 'loops/blog' ); ?>
      </div>

      <?php get_template_part( 'parts/pagination' ); ?>

    </div>
    <?php if ( is_active_sidebar( 'side_right' ) ) : ?>
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
        <?php get_sidebar( 'right' ); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>