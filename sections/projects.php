<?php

/**
  * Секция "Проекты". Публикуется на главной странице.
  */

if ( ! defined( 'ABSPATH' ) ) { exit; };


$projects_entries = false;
$projects_category = get_category( get_translate_id( get_theme_mod( 'projects_category_id', false ), 'category' ), OBJECT );
if ( ( $projects_category ) && ( ! empty( $projects_category ) ) && ( ! is_wp_error( $projects_category ) ) ) {
  $projects_entries = get_posts( array(
    'numberposts'       => get_theme_mod( 'projects_posts_number', 6 ),
    'category'          => $projects_category->term_id,
    'orderby'           => 'post_date',
    'order'             => 'DESC',
    'post_type'         => 'post',
    'suppress_filters'  => false,
  ) );
}

?>


<?php if ( $projects_entries && ! empty( $projects_entries ) && ! is_wp_error( $projects_entries ) ) : ?>
  <section class="section projects" id="projects">
    <div class="section__bgi bgi lazy" data-src="<?php echo get_theme_mod( 'projects_section_bgi', PSTU_NEXT_THEME_URL . 'images/projects-bg.jpg' ); ?>" style="opacity: 0.3;"></div>
    <div class="container-fluid">
      <?php if ( get_theme_mod( 'projects_heading_flag', true ) ) : ?>
        <div class="section__heading heading">
        <div class="row center-xs">
          <div class="col-xs-12 col-sm-11 col-md-10 col-lg-10">
          <h2 class="title"><a href="<?php echo get_category_link( $projects_category->term_id ); ?>"><?php echo apply_filters( 'the_title', $projects_category->name ); ?></a></h2>
          <?php if ( ! empty( trim( $projects_category->description ) ) ) : ?><p class="desctiption"><?php echo $projects_category->description; ?></p><?php endif; ?>
          </div>
        </div>
        </div>
      <?php endif; ?>
      <div class="section__body body">
      <div class="row center-xs top-xs">
        <?php foreach ( $projects_entries as $entry ) : setup_postdata( $entry ); ?>
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <a class="projects__entry entry" href="<?php echo get_permalink( $entry->ID ); ?>" title="<?php echo esc_attr( $entry->post_title ); ?>">
            <div class="row center-xs">
              <?php if ( has_post_thumbnail( $entry->ID ) ) : ?>
                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-4">
                <img class="center-block wp-post-image lazy" src="#" data-src="<?php echo get_the_post_thumbnail_url( $entry->ID, 'post-thumbnail' ); ?>" alt="<?php echo esc_attr( $entry->post_title ); ?>">
                </div>
               <?php endif; ?>
              <div class="col-xs-12 col-sm col-md-12 col-lg">
              <h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title ); ?></h3>
              <?php echo pstu_get_excerpt( $entry, '<p class="excerpt">', '</p>' ); ?>
              </div>
            </div>
            </a>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      </div>
    </div>
  </section>
<?php endif; ?>