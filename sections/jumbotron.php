<?php

/**
 *  Секция "первый экран" главйной страницы
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$menu_locations = get_nav_menu_locations();


?>


<?php if ( $menu_locations[ 'menu_jumbotron' ] && isset( $menu_locations[ 'menu_jumbotron' ] ) ) : ?>
  <?php if ( is_nav_menu( $menu_locations[ 'menu_jumbotron' ] ) ) : ?>
    <?php if ( ! is_wp_error( $jumbotron_items = wp_get_nav_menu_items(  $menu_locations[ 'menu_jumbotron' ] ) ) && ! empty( $jumbotron_items ) ) : ?>

      <div class="jumbotron" id="jumbotron">
        <div class="jumbotron-slider" id="jumbotron-slider">

          <?php foreach ( (array) wp_list_filter( $jumbotron_items, array( 'menu_item_parent' => 0 ), 'AND' ) as $item => $menu_item ) : ?>
            <div class="jumbotron__entry entry">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                    <?php $thumbnail_url = ( ( has_post_thumbnail( $menu_item->object_id ) ) ? get_the_post_thumbnail_url( $menu_item->object_id, ( wp_is_mobile() ) ? 'large' : 'full' ) : get_rand_img_src( 'lg' ) ); ?>
                    <img class="wp-post-image" src="#" data-lazy="<?php echo $thumbnail_url; ?>" alt="<?php esc_attr( $menu_item->title ); ?>">
                    <div class="overlay">
                      <h3 class="title"><?php echo apply_filters( 'the_title', $menu_item->title ); ?></h3>
                      <?php if ( ! empty( $menu_item->description ) ) : ?><p class="excerpt"><?php echo $menu_item->description; ?></p><?php endif; ?>
                      <a class="btn btn-md btn-success" href="<?php echo $menu_item->url; ?>"><?php _e( 'Подробней', 'pstu-next-theme' ); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
          <div class="jumbotron-arrows" id="jumbotron-arrows">
            <div class="container">
               <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                  <button class="slider-arrow slider-prev" id="jumbotron-slider-arrow-prev">&larr;</button>
                  <button class="slider-arrow slider-next" id="jumbotron-slider-arrow-next">&rarr;</button>
                </div>
              </div>
            </div>
          </div>
      </div>

    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>