<?php

/**
 *
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$menu_locations = get_nav_menu_locations();


?>



<?php if ( $menu_locations[ 'menu_flat' ] && isset( $menu_locations[ 'menu_flat' ] ) ) : ?>
  <?php if ( is_nav_menu( $menu_locations[ 'menu_flat' ] ) ) : ?>
    <?php if ( ! is_wp_error( $flat_items = wp_get_nav_menu_items(  $menu_locations[ 'menu_flat' ] ) ) && ! empty( $flat_items ) ) : ?>

      <section class="flat" id="flat">
        <div class="row">

        <?php foreach ( (array) wp_list_filter( $flat_items, array( 'menu_item_parent' => 0 ), 'AND' ) as $item => $menu_item ) : ?>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <a class="flat__entry entry menu-item menu-item-<?php echo $menu_item->object_id; ?>" href="<?php echo $menu_item->url; ?>" title="<?php echo esc_attr( $menu_item->title ); ?>">
              <img class="wp-post-image lazy" src="#" alt="<?php echo esc_attr( $menu_item->title ); ?>" data-src="<?php echo ( ( has_post_thumbnail( $menu_item->object_id ) ) ? get_the_post_thumbnail_url( $menu_item->object_id, 'thumbnail-3x2' ) : get_rand_img_src( 'md' ) ); ?>"/>
              <h3 class="title"><?php echo apply_filters( 'the_title', $menu_item->title ); ?></h3>
              <?php if ( ! empty( $menu_item->description ) ) : ?><div class="excerpt"><?php echo apply_filters( 'the_excerpt', $menu_item->description ); ?></div><?php endif; ?>
            </a>
          </div>
        <?php endforeach; ?>

        </div>
      </section>

    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>