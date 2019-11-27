<?php

/**
 *  Главная страница
 *  сайдбар "Структура"
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( $structure_parent_page_id = get_translate_id( get_theme_mod( 'structure_parent_page_id', false ), 'page' ) ) $structure_entries = get_pages( array(
  'number'        => get_theme_mod( 'structure_pages_number', 10 ),
  'parent'        => $structure_parent_page_id,
  'sort_column'   => 'post_title',
  'sort_order'    => 'ASC',
  'hierarchical'  => 0,
) );


?>



<aside class="structure">

  <div class="row">
    
    <?php if ( ( $structure_entries ) && ( ! empty( $structure_entries ) ) && ( ! is_wp_error( $structure_entries ) ) ) : ?>
      <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
        <div class="list clearfix text-center">
          <?php foreach ( $structure_entries as $structure_entry ) : setup_postdata( $structure_entry ); ?>
            <a class="structure__unit unit" href="<?php the_permalink( $structure_entry->ID ); ?>" title="<?php echo esc_attr( $structure_entry->post_title ); ?>">
              <?php if ( $pstu_bgi = get_post_meta( $structure_entry->ID, 'pstu_bgi', true ) ) : ?>
                <img class="wp-post-thumbnail lazy" src="#" data-src="<?php echo wp_get_attachment_image_url( $pstu_bgi, 'post-thumbnail' ); ?>" alt="<?php echo esc_attr( $structure_entry->post_title ); ?>">
              <?php endif; ?>
              <h4 class="title"><?php echo apply_filters( 'the_title', $structure_entry->post_title ); ?></h4>
            </a>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( has_nav_menu( 'menu_structure' ) ) wp_nav_menu( array(
      'theme_location'  => 'menu_structure',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => 'col-xs-12 col-sm-6 col-md-12 col-lg-12',
      'container_id'    => '',
      'menu_class'      => 'structure__list list text-left',
      'menu_id'         => '',
      'echo'            => true,
      'depth'           => 2,
    ) ); ?>

  </div>

</aside>