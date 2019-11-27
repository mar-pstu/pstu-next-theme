<?php

/**
 *  Слайдер "Актуальное". Выводится на главной и на внутрених страницах
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };

$current_entries = false;

if ( $current_category_id = get_translate_id( get_theme_mod( 'current_category_id', false ), 'category' ) ) {
  $current_entries = get_posts( array(
    'numberposts'       => get_theme_mod( 'current_posts_number', '5' ),
    'category'          => $current_category_id,
    'orderby'           => 'date',
    'order'             => 'DESC',
    'post_type'         => 'post',
    'suppress_filters'  => false,
    'meta_query'        => array(
      'relation'          => 'OR',
      array(
        'key'               => '_pstu_relevance_end',
        'type'              => 'DATE',
        'value'             => date( 'Y-m-d' ),
        'compare'           => '>',
      ),
      array(
        'key'               => '_pstu_relevance_end',
        'compare'           => 'NOT EXISTS',
      ),
      array(
        'key'               => '_pstu_relevance_end',
        'value'             => '',
        'compare'           => '=',
      ),
    ),
  ) );
}

?>


<?php if ( ( $current_entries ) && ( ! empty( $current_entries ) ) && ( ! is_wp_error( $current_entries ) ) ) : ?>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg">
    <section class="section section--small current flat" id="current">
      <div class="section__heading heading">
        <h2 class="title">
          <a class="more" href="<?php echo get_category_link( $current_category_id ); ?>"><span class="sr-only"><?php _e( 'Просмотр категории', 'pstu-next-theme' ); ?></span></a>
          <?php echo get_cat_name( $current_category_id ); ?>
        </h2>
      </div>
      <div class="section__body body">
        <div class="row center-xs">
          <?php foreach ( $current_entries as $entry ) : setup_postdata( $entry ); ?>
            <div class="col-xs-12 col-sm-10 col-md-4 col-lg-12">
              <a class="current__entry flat__entry entry" href="<?php the_permalink( $entry->ID ); ?>" title="<?php echo esc_attr( $entry->post_title ); ?>">
                <img class="wp-post-image lazy" src="#" data-src="<?php echo ( has_post_thumbnail( $entry->ID ) ) ? get_the_post_thumbnail_url( $entry->ID, 'thumbnail-3x2' ) : get_rand_img_src(); ?>" alt="<?php echo esc_attr( $entry->post_title ); ?>">
                <h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title ); ?></h3>
                <?php echo pstu_get_excerpt( $entry, '<div class="excerpt">', '</div>' ); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
<?php endif; ?>