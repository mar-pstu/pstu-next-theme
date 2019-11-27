<?php get_header(); ?>
  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-sm-12 <?php echo ( is_active_sidebar( 'side_right' ) ) ? 'col-md-7 col-lg-8' : 'col-md-12 col-lg-12'; ?>">
        <h1><?php _e( 'Результаты поиска', 'pstu-next-theme' ); ?></h1>
        <?php if ( is_active_sidebar( 'side_search' ) ) get_sidebar( 'search' ); ?>
        <div id="entries-container" class="search__list list">
          <?php get_template_part( 'loops/search' ); ?>
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