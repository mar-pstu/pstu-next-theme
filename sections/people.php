<?php

/**
 *  Слайдер главной страницы "Люди"
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$people = false;


if ( $people_category_id = get_translate_id( get_theme_mod( 'people_category_id', false ), 'category' ) ) {
  $people = get_posts( array(
    'numberposts'       => get_theme_mod( 'people_posts_number', '5' ),
    'category'          => $people_category_id,
    'orderby'           => 'date',
    'order'             => 'DESC',
    'post_type'         => 'post',
    'suppress_filters'  => false,
  ) );
}

?>






<?php if ( is_array( $people ) && count( $people ) > 3 ) :
    $categories = get_terms( array(
      'taxonomy'      => 'category',
      'orderby'       => 'name', 
      'order'         => 'ASC',
      'hide_empty'    => true,
      'parent'        => $people_category_id,
    ) );
    wp_enqueue_script( 'slick' );
    wp_enqueue_style( 'slick' );
    wp_add_inline_script( 'slick', file_get_contents( PSTU_NEXT_THEME_DIR . 'scripts/section-people-init.js' ), 'after' );
  ?>
  <section class="people section" id="people">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="section__heading heading">
            <h2 class="title"><?php echo get_cat_name( $people_category_id ) ?></h2>
            <?php echo pstu_get_cat_description( $people_category_id, '<p class="desctiption">', '</p>' ); ?>
            <?php if ( is_array( $categories ) && ! empty( $categories ) ) : ?>
              <ul class="people__groups groups list-unstyled list-inline">
                <?php foreach ( $categories as $category ) : ?>
                  <li><a class="btn btn-xs btn-primary" href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo apply_filters( 'single_term_title', $category->name, $category->term_id ) ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
          <div class="section__body body">
            <button class="slider-arrow slider-prev" title="<?php esc_attr_e( 'Листать назад', 'patu-next-theme' ); ?>" id="people-slider-arrow-prev">&larr;</button>
            <button class="slider-arrow slider-next" title="<?php esc_attr_e( 'Листать вперёд', 'patu-next-theme' ); ?>" id="people-slider-arrow-next">&rarr;</button>
            <div id="people-slider">
              <?php foreach ( $people as $entry ) : setup_postdata( $entry ); $thumbnail_url = ( ( has_post_thumbnail( $entry->ID ) ) ? get_the_post_thumbnail_url( $entry->ID, 'medinum' ) : PSTU_NEXT_THEME_URL . 'images/user-md.jpg' ); ?>
                <a class="slider-for__entry entry center-block" href="<?php echo get_permalink( $entry->ID ); ?>" title="<?php esc_attr( $entry->post_title ); ?>">
                  <div class="thumbnail"><img class="wp-post-image" src="#" data-lazy="<?php echo $thumbnail_url; ?>" alt="echo esc_attr( $entry->post_title );"></div>
                  <h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></h3>
                  <?php if ( ! empty( trim( $entry->post_excerpt ) ) ) : ?><p class="excerpt"><?php echo $entry->post_excerpt; ?></p><?php endif; ?>
                </a>
              <?php endforeach; wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>