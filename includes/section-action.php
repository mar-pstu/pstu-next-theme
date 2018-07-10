<?php


/**
 *  Секция главйной страницы
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo "<section class=\"action lazy\" id=\"action\" data-src=\"images/action_bgi.jpg\">\r\n";
echo "  <div class=\"container\">\r\n";
echo "    <div class=\"row middle-xs\">\r\n";
echo "      <div class=\"col-xs-12 col-sm col-md col-lg\">\r\n";
echo "        <div class=\"action__content content\">\r\n";
$action_section_title = trim( get_theme_mod( 'action_section_title', '' ) );
$action_section_subtitle = trim( get_theme_mod( 'action_section_subtitle', '' ) );
if ( ! empty( $action_section_title ) ) echo "<h2>" . ( ( function_exists( 'ppl__' ) ) ? ppl__( $action_section_title ) : $action_section_title ) . "</h2>\r\n";
if ( ! empty( $action_section_subtitle ) ) echo ( ( function_exists( 'ppl__' ) ) ? ppl__( $action_section_subtitle ) : $action_section_subtitle );
echo "        </div>\r\n";
echo "      </div>\r\n"; // .col-

$action_entryes = array();
$action_entry_number = get_theme_mod( 'action_entry_number', 2 );

switch ( get_theme_mod( 'action_entry_type', 'item' ) ) {

  case 'page':
    case 'page':
      if ( $action_parent_page_id = get_translate_id( get_theme_mod( 'action_parent_page_id', false ) ), 'page' ) {
        $action_pages = get_pages( array(
          'number'        => $action_entry_number,
          'child_of'      => $action_parent_page_id,
          'sort_column'   => 'post_date',
          'sort_order'    => 'desc',
          'hierarchical'  => 0,
        ) );
        if ( ( $action_pages ) && ( ! empty( $action_pages ) ) && ( ! is_wp_error( $action_pages ) ) ) {
          foreach ( $action_pages as $action_page ) {
            $action_entryes[] = array(
              'title'     => apply_filters( 'the_title', $action_page->post_title ),
              'link'      => get_permalink( $action_page->ID ),
            );
          } // foreach
        } // if $action_pages
        unset( $action_pages );
      }
      unset( $action_parent_page_id );
      break;

  case 'post':
    if ( $action_category_id = get_translate_id( get_theme_mod( 'action_category_id', false ), 'category' ) ) {
      $action_posts = get_posts( array(
        'number'        => $action_entry_number,
        'child_of'      => $action_category_id,
        'sort_column'   => 'post_date',
        'sort_order'    => 'desc',
        'hierarchical'  => 0,
      ) );
      if ( ( $action_posts ) && ( ! empty( $action_posts ) ) && ( ! is_wp_error( $action_posts ) ) ) {
        foreach ( $action_posts as $action_post ) {
          $action_entryes[] = array(
            'title'     => apply_filters( 'the_title', $action_post->post_title ),
            'link'      => get_permalink( $action_post->ID ),
          );
        } // foreach
      } // if $action_pages
      unset( $action_posts );
    }
    unset( $action_category_id );
    break;
  
  case 'item':
  default:
    if ( $action_nav_menu_id = get_theme_mod( 'action_nav_menu_id', false ) ) {
      $action_nav_menu_items = wp_get_nav_menu_items( $action_nav_menu_id );
      if ( ( $action_nav_menu_items ) && ( ! empty( $action_nav_menu_items ) ) ) {
        foreach ( (array) $action_nav_menu_items as $key => $menu_item ){
          $action_entryes[] = array(
            'title'     => apply_filters( 'the_title', $menu_item->title ),
            'link'      => $menu_item->url,
          );
        } // foreach
      } // if $action_nav_menu_items
      unset( $action_nav_menu_items );
    } // if $action_nav_menu_id
    unset( $action_nav_menu_id );
    break;

} // switch

if ( ( $action_entryes ) && ( ! empty( $action_entryes ) ) ) {
  echo "      <div class=\"col-xs-12 col-sm-4 col-md-3 col-lg-3\">\r\n";
  echo "        <div class=\"action__btns btns\">\r\n";

  foreach ( $action_entryes as $action_entry ) {
    echo "<p><a class=\"btn btn-success btn-md\" href=\"" . $action_entry[ 'link' ] . "\" title=\"" . sprintf( "%s - %s", __( 'Подробней', 'pstu-next-theme' ), esc_attr( $action_entry[ 'title' ] ) ) . "\">" . $action_entry[ 'title' ] . "</a></p>\r\n";
  }

  echo "        </div>\r\n"; // .action__btns
  echo "      </div>\r\n"; // col-

} // if $action_entryes


echo "    </div>\r\n"; // .row
echo "  </div>\r\n"; // .container
echo "</section>\r\n";

unset( $action_entryes );
unset( $$action_entry_number );
unset( $action_section_title );
unset( $action_section_subtitle );

?>