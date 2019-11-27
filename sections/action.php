<?php

/**
 *  Секция главйной страницы
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$menu_locations = get_nav_menu_locations();

$action_section_title = trim( wp_strip_all_tags( get_theme_mod( 'action_section_title', get_bloginfo( 'name' ) ) ) );
$action_section_subtitle =  trim( wp_strip_all_tags( get_theme_mod( 'action_section_subtitle', get_bloginfo( 'description' ) ) ) );
if ( function_exists( 'pll__' ) ) {
  $action_section_title = pll__( $action_section_title );
  $action_section_subtitle = pll__( $action_section_subtitle );
}

?>

<section class="action lazy" id="action" data-src="<?= get_theme_mod( 'action_section_logo', PSTU_NEXT_THEME_URL . 'images/action_bgi.jpg' ); ?>">
  <div class="container">
    <div class="row middle-xs">
      <div class="col-xs-12 col-sm col-md col-lg">
        <div class="action__content content">
          <h2><?= $action_section_title; ?></h2>
          <p><?= $action_section_subtitle; ?></p>
        </div>
      </div>
      <?php if ( $menu_locations[ 'menu_action' ] && isset( $menu_locations[ 'menu_action' ] ) ) : ?>
        <?php if ( is_nav_menu( $menu_locations[ 'menu_action' ] ) ) : ?>
          <?php if ( ! is_wp_error( $action_items = wp_get_nav_menu_items(  $menu_locations[ 'menu_action' ] ) ) && ! empty( $action_items ) ) : ?>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
              <ul class="action__btns btns">
                <?php foreach ( (array) wp_list_filter( $action_items, array( 'menu_item_parent' => 0 ), 'AND' ) as $item => $menu_item ) : ?>
                  <li class="menu-item menu-item-<?= $menu_item->object_id; ?> <?= ( empty( $menu_item->classes ) ) ? '' : implode( ' ', $menu_item->classes ); ?>">
                    <a class="btn btn-success btn-md btn-block" href="<?= $menu_item->url; ?>"><?= wp_strip_all_tags( $menu_item->title, true ); ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>