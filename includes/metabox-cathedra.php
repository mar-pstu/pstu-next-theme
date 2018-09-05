<?php

/* Метабокс Кафедра */


function pstu_metabox_cathedra_init() { 
  add_meta_box('pstu_cathedra_mb', 'Настройки Кафедры', 'pstu_mb_cathedra_showup', array('page'), 'advanced', 'high'); 
}
add_action('add_meta_boxes', 'pstu_metabox_cathedra_init');

function pstu_mb_cathedra_showup($post, $box) {
  /**/
  $zkaf_foto = get_post_meta($post->ID, '_pstu_mb_cathedra_zkaf_foto', true);
  $zkaf = get_post_meta($post->ID, '_pstu_mb_cathedra_zkaf', true);
  $contacts = get_post_meta($post->ID, '_pstu_mb_cathedra_contacts', true);
  $accordio = get_post_meta($post->ID, '_pstu_mb_cathedra_accordio', true);
  /**/
  $zkaf_headings = array(
    'f' => __( 'Прізвище', 'pstu-theme' ),
    'i' => __( 'Імє\'я', 'pstu-theme' ),
    'o' => __( 'По батькові', 'pstu-theme' ),
    'd' => __( 'Посада', 'pstu-theme' ),
    'z' => __( 'Звання', 'pstu-theme' ),
  );
  $zkaf_foto = ( isset( $zkaf_foto ) ) ? $zkaf_foto : get_stylesheet_directory_uri() . '/images/user.jpg';
  foreach ($zkaf_headings as $key => $value) {
    if ( !isset( $zkaf[ $key ] ) ) {
      $zkaf[ $key ] = '-';
    } 
  }
  $contacts_headings = array(
    'adress' => 'Адреса',
    'kaf' => 'Телефон кафедри',
    'zk' => 'Телефон зав. кафедрой',
    'email' => 'Email',
    'site' => 'Сайт',
  );
  foreach ($contacts_headings as $key => $value) {
    if ( !isset( $contacts[ $key ] ) ) {
      $contacts[ $key ] = '-';
    } 
  }
  $accordio_headings = array(
    __( 'Історична довідка', 'pstu-theme' ),
    __( 'Напрями роботи', 'pstu-theme' ),
    __( 'Міжнародні зв\'язки', 'pstu-theme' ),
    __( 'Науково педагогічна діяльність', 'pstu-theme' ),
    __( 'Конкурентноспроможність випускників', 'pstu-theme' ),
    __( 'Виховна робота', 'pstu-theme' ),
  );
  for ( $i=0; $i<count($accordio_headings); $i++ ) {
    if ( !isset( $accordio[$i] ) ) {
      $accordio[$i][0] = $accordio_headings[$i];
      $accordio[$i][1] = "-";
    }
  }
?>
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/modal.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/scripts/admin-img.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-modal.css">
  <style>
    .clearfix:after { content: ''; display: table; clear: both; }
    .left { float: left; }
    .right { float: right; }
    .display--block { display: block; width: 100%; }
    .font-bold { font-weight: bold; }
    .table { width: 100%; max-width: 100%; }
    .table-striped > tbody > tr:nth-of-type(odd) { background-color: #f9f9f9; }
    .text-center { text-align: center; }
    .button-block { display: block !important; text-align: center; }
  </style>
  <p><?php _e( 'Опції блоку виводяться тільки при використанні шаблону сторінки', 'pstu-theme' ); ?> <B>"<?php _e( 'Кафедра', 'pstu-theme' ); ?>"</B>.</p>
  <table class="table table-striped">
    <caption class="font-bold"><?php _e( 'Завкафедрой', 'pstu-theme' ); ?>:</caption>
    <tr>
      <td rowspan="<?php echo count( $zkaf ) + 1; ?>"><?php if( function_exists( 'pstu_image_uploader_field' ) ) { pstu_image_uploader_field( 'pstu_mb_cathedra_zkaf_foto', get_post_meta($post->ID, '_pstu_mb_cathedra_zkaf_foto', true) ); } ?> </td>
    </tr>
    <?php foreach ($zkaf_headings as $key => $value) : ?>
      <tr>
        <td><?php echo $value; ?></td>
        <td><input class="display--block" type="text" name="pstu_mb_cathedra_zkaf[<?php echo $key; ?>]" value="<?php echo $zkaf[ $key ]; ?>"></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <table class="table table-striped" id="cathedra_contacts">
    <caption class="font-bold"><?php _e( 'Контакти', 'pstu-theme' ); ?></caption>
    <?php foreach ( $contacts_headings as $key => $value ) : ?>
      <tr>
        <td><?php echo $value; ?></td>
        <td><input class="display--block" type="text" name="pstu_mb_cathedra_contacts[<?php echo $key; ?>]" value="<?php echo $contacts[ $key ]; ?>"></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <table class="table table-striped">
    <caption class="font-bold"><?php _e( '"Гармошка" під описом:', 'pstu-theme' ); ?></caption>
    <?php for ( $i=0; $i<count($accordio); $i++ ) { ?>
      <tr>
        <td><?php echo ( $i + 1 ); ?></td>
        <td><input class="display--block" id="mb_sp_cathedra_modal_<?php echo $i; ?>_input" type="text" name="pstu_mb_cathedra_accordio[<?php echo $i; ?>][0]" value="<?php echo $accordio[$i][0]; ?>"></td>
        <td>
          <div><a class="button button-block" data-target="#mb_sp_cathedra_modal_<?php echo $i; ?>" data-toggle="modal"><span class="dashicons dashicons-edit" style="line-height: inherit;"></span> <?php _e( 'Редагувати', 'pstu-theme' ) ?></a></div>
            <div id="mb_sp_cathedra_modal_<?php echo $i; ?>" class="modal fade in">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <a class="close" type="button" data-dismiss="modal" aria-hidden="true">×</a>
                    <div class="modal-title"><b><?php echo $accordio[$i][0]; ?></b></div>
                  </div>
                  <div class="modal-body">
                    <?php
                      wp_editor(wp_specialchars_decode( $accordio[$i][1] ), "pstumbcathedraaccordio_".$i, array(
                        'wpautop'       => 1,
                        'media_buttons' => 0,
                        'textarea_name' => "pstu_mb_cathedra_accordio[$i][1]",
                        'textarea_rows' => 15,
                        'tabindex'      => null,
                        'editor_css'    => '',
                        'editor_class'  => '',
                        'teeny'         => 0,
                        'dfw'           => 0,
                        'tinymce'       => 1,
                        'quicktags'     => 1,
                        'drag_drop_upload' => false
                      ) );
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </td>
      </tr>
    <?php } ?>
  </table>
<?php
}

function pstu_meta_cathedra_save($postID) {
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
  if ( wp_is_post_revision($postID) ) return;
  /**/
  if( isset( $_POST[ 'pstu_mb_cathedra_zkaf' ] ) ) { update_post_meta($postID, '_pstu_mb_cathedra_zkaf', $_POST[ 'pstu_mb_cathedra_zkaf' ]); }
  if( isset( $_POST[ 'pstu_mb_cathedra_zkaf_foto' ] ) ) { update_post_meta($postID, '_pstu_mb_cathedra_zkaf_foto', $_POST[ 'pstu_mb_cathedra_zkaf_foto' ]); }
  if( isset( $_POST[ 'pstu_mb_cathedra_contacts' ] ) ) { update_post_meta($postID, '_pstu_mb_cathedra_contacts', $_POST[ 'pstu_mb_cathedra_contacts' ]); }
  if( isset( $_POST[ 'pstu_mb_cathedra_accordio' ] ) ) { update_post_meta($postID, '_pstu_mb_cathedra_accordio', $_POST[ 'pstu_mb_cathedra_accordio' ]); }
}
add_action('save_post', 'pstu_meta_cathedra_save');


?>