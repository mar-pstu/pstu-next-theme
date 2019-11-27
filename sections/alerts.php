<?php

/**
 *  Блок важных сообщений в шапке
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


$alerts = false;

if ( $alerts_category_id = get_translate_id( get_theme_mod( 'alerts_category_id', false ), 'category' ) ) {
  $alerts = array_merge(
    get_posts( array(
      'numberposts' => get_theme_mod( 'alerts_entry_number', 5 ),
      'category'    => $alerts_category_id,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'post',
    ) ),
    get_posts( array(
      'post_type'   => 'post',
      'meta_query'  => array(
        'relation'    => 'OR',
        array(
          'key'         => '_pstu_relevance_start',
          'value'       => date( 'Y-m-d' ),
          'type'        => 'DATE',
          'compare'     => '='
        ),
        array(
          'relation'      => 'AND',
          array(
            'key'         => '_pstu_relevance_start',
            'value'       => date( 'Y-m-d' ),
            'type'        => 'DATE',
            'compare'     => '<='
          ),
          array(
            'key'         => '_pstu_relevance_end',
            'value'       => date( 'Y-m-d' ),
            'type'        => 'DATE',
            'compare'     => '>='
          ),
        ),
      ),
      'meta_key'          => '_pstu_relevance_start',
      'orderby'           => 'meta_value',
      'order'             => 'DESC',
    ) )
  );
}

?>


<?php if ( ( $alerts ) && ( ! empty( $alerts ) ) && ( ! is_wp_error( $alerts ) ) ) : ?>
  <section class="alerts" id="alerts">
    <div class="arrow arrow--prev" role="button" id="header-alerts-arrow-prev"><span class="sr-only"><?php _e( 'Предыдущий слайд', 'pstu-next-theme' ); ?></span></div>
    <div class="arrow arrow--next" role="button" id="header-alerts-arrow-next"><span class="sr-only"><?php _e( 'Следующий слайд', 'pstu-next-theme' ); ?></span></div>
    <div class="alerts__list list" id="header-alerts-list">
      <?php foreach ( $alerts as $alert ) : setup_postdata( $alert ); ?>
        <a class="alerts__entry entry" href="<?php echo get_permalink( $alert->ID ); ?>" title="<?php echo esc_attr( $alert->post_title ) ?>">
          <div class="overlay">
            <h3 class="title"><?php echo apply_filters( 'the_title', $alert->post_title ); ?></h3>
          </div>
        </a>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  </section>
<?php endif; ?>