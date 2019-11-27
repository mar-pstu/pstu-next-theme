<?php

/**
 *  Блон кновостей на главной странице
 */


if ( ! defined( 'ABSPATH' ) ) { exit; }

$news_entries = false;

if ( $news_category_id = get_translate_id( get_theme_mod( 'news_category_id', false ), 'category' ) ) {
  $badge = get_theme_mod( 'news_section_badge', 'Live' );
  if ( function_exists( 'pll__' ) ) $badge = pll__( $badge );
  $news_entries = get_posts( array(
    'numberposts'       => get_theme_mod( 'news_posts_number', '5' ),
    'category'          => $news_category_id,
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


<?php if ( is_array( $news_entries ) && ! empty( $news_entries ) ) : ?>
  <div class="col-xs-12 col-sm col-md col-lg">
    <section class="section section--small news" id="news">
      <div class="section__heading heading">
        <h2 class="title">
          <a class="more" href="<?php echo get_category_link( $news_category_id ); ?>" title="<?php esc_attr__( 'Просмотр категории', 'pstu-next-theme' ); ?>"><span class="sr-only"><?php _e( 'Просмотр категории', 'pstu-next-theme' ); ?></span></a>
          <?php echo get_cat_name( $news_category_id ); ?> 
        </h2>
      </div>
      <div class="section__body body text-left">
        <?php foreach ( $news_entries as $entry ) : setup_postdata( $entry ); ?>
          <a class="<?= join( ' ', get_post_class( 'news__entry entry', $entry->ID ) ); ?>" href="<?= get_the_permalink( $entry->ID ); ?>">
            <h3 class="title"><span class="badge"><?php echo $badge; ?></span> <?= apply_filters( 'the_title', $entry->post_title ) ?></h3>
            <?php echo pstu_get_excerpt( $entry, '<p class="excerpt">', '</p>' ); ?>
            <div class="datetime"><?php echo date( 'd.m.Y', strtotime( $entry->post_date ) ); ?></div>
          </a>
        <?php endforeach; wp_reset_postdata(); ?>
      </div>
    </section>
  </div>
<?php endif; ?>