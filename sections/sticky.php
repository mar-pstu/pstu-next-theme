<?php

/**
 *  Закреплённый пост
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };

$label = get_theme_mod( 'sticky_label_text', __( 'Важное', 'pstu-next-theme' ) );
if ( function_exists( 'pll__' ) ) $label = pll__( $label );

?>


<?php if ( ( $sticky_entries = get_option( 'sticky_posts', array() ) ) && ( ! empty( $sticky_entries ) ) ) : ?>
  <?php if ( ( $entry = get_post( $sticky_entries[ count( $sticky_entries ) - 1 ], OBJECT ) ) && ( ! empty( $entry ) ) && ( ! is_wp_error( $entry ) ) ) : ?> 
    <section class="sticky" id="sticky">
      <div class="sticky__entry entry">
        <div class="row center-xs">
          <?php if ( has_post_thumbnail( $entry->ID ) ) : ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <a class="thumbnail" href="<?php echo get_permalink( $entry->ID ); ?>">
                <img class="wp-post-image lazy" src="#" data-src="<?php echo get_the_post_thumbnail_url( $entry->ID, 'post-thumbnail' ); ?>" alt="<?php echo esc_attr( $entry->post_title ); ?>">
                <?php if ( get_theme_mod( 'sticky_label_flag', false ) ) : ?><div class="label"><?php echo $label; ?></div><?php endif; ?>
              </a>
            </div>
          <?php endif; ?>
          <div class="col-xs-12 col-sm col-md col-lg">
            <h3 class="title"><a href="<?php echo get_permalink( $entry->ID ); ?>"><?php echo apply_filters( 'the_title', $entry->post_title, $entry->ID ); ?></a></h3>
            <?php echo pstu_get_excerpt( $entry, '<p class="excerpt">', '</p>' ); ?>
            <a class="btn btn-block btn-success" href="<?php echo get_permalink( $entry->ID ); ?>"><?php _e( 'Подробней', 'pstu-next-theme' ); ?></a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>