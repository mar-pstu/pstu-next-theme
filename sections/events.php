<?php

/**
 *  Секция "Анонсы" главной страницы
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };

$events_entries = false;

if ( $events_category_id = get_translate_id( get_theme_mod( 'events_category_id', false ), 'category' ) ) {

  $events_entries = get_posts( array(
    'numberposts'       => get_theme_mod( 'events_entry_number', 5 ),
    'category'          => $events_category_id,
    'post_type'         => 'post',
    'suppress_filters'  => false,
    'meta_query'        => array(
      'relation'          => 'AND',
      array(
        'relation'          => 'AND',
        array(
          'key'               => '_pstu_relevance_start',
          'compare'           => 'EXISTS',
        ),
        array(
          'key'               => '_pstu_relevance_start',
          'value'             => '',
          'compare'           => '!=',
        ),
      ),
      array(
        'relation'          => 'OR',
        array(
          'key'               => '_pstu_relevance_start',
          'value'             => date( 'Y-m-d' ),
          'type'              => 'DATE',
          'compare'           => '>='
        ),
        array(
          'key'               => '_pstu_relevance_end',
          'value'             => date( 'Y-m-d' ),
          'type'              => 'DATE',
          'compare'           => '>='
        ),
      ),
    ),
    'meta_key'          => '_pstu_relevance_start',
    'orderby'           => 'meta_value',
    'order'             => 'ASC',
  ) );

}

?>




<?php if ( ( $events_entries ) && ( ! empty( $events_entries ) ) && ( ! is_wp_error( $events_entries ) ) ) : ?>
  <div class="col-xs-12 col-sm col-md col-lg">
    <section class="section section--small events text-left" id="events">
      <div class="section__heading heading">
        <h2 class="title">
          <a class="more" href="<?php echo get_category_link( $events_category_id ); ?>" title="<?php esc_attr__( 'Просмотр категории', 'pstu-next-theme' ); ?>"><span class="sr-only"><?php _e( 'Просмотр категории', 'pstu-next-theme' ); ?></span></a>
          <?php echo get_cat_name( $events_category_id ); ?> 
        </h2>
      </div>
      <div class="section__body body">
        <?php foreach ( $events_entries as $entry ) : setup_postdata( $entry ); ?>
          <a class="events__entry entry" href="<?php echo get_permalink( $entry->ID ); ?>">
            <h3 class="title"><?php echo apply_filters( 'the_title', $entry->post_title ); ?></h3>
            <?php echo pstu_get_excerpt( $entry, '<p class="excerpt">', '</p>' ); ?>
            <div class="datetime">
              <?php echo get_post_meta( $entry->ID, '_pstu_relevance_start', true ); ?>
              <?php if ( ! empty( $end = get_post_meta( $entry->ID, '_pstu_relevance_end', true ) ) ) echo '- ' . $end; ?>
            </div>
          </a>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>
  </div>
<?php endif; ?>