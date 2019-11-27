<?php

/**
 *	Регитсраиция метабокса для добавления фонового изображения на страницу
 */


if ( ! defined( 'ABSPATH' ) ) {	exit; };


class pstuBGIMetaboxClass {


	/**
	 *	Создание класса / добавление хуков для вывода метабокса
	 */
	public function __construct() {
		add_action( 'add_meta_boxes',			array( $this, 'add_meta_box' ) );
		add_action( 'save_post',					array( $this, 'save' ) );
	}



	static function get_translation_id( $post_id ) {
		$result = false;
		// проверяем работает ли плагин переводов
		if ( defined( "POLYLANG_FILE" ) ) {
			$result = ( isset( $_GET[ 'from_post' ] ) ) ? $_GET[ 'from_post' ] : $result;
		}
		return $result;
	}


	/**
	 *	Регистрация метабокса
	 */
	public function add_meta_box( $post_type ) {
		if ( in_array( $post_type, array( 'page', 'post' ) ) ) add_meta_box(
			'pstu_bgi',
			__( 'Фоновое изображение', 'pstu-next-theme' ),
			array( $this, 'render_content' ),
			$post_type,
			'side',
			'high',
			null
		);
	}


	/**
	 *	ПРоверка и сохранение данных
	 */
	public function save ( $post_id ) {

		// проверяем существует ли nonce-поле, если нет - выходим
		if ( ! isset( $_POST[ 'pstu_metabox_bgi_nonce' ] ) ) {
			// wp_nonce_ays();
			return;
		}

		// проверяем значение nonce-поля, если не совпадает - выходим
		if ( ! wp_verify_nonce( $_POST[ 'pstu_metabox_bgi_nonce' ], 'pstu_metabox_bgi' ) ) {
			wp_nonce_ays();
			return;
		}

		// исключаем автосохранение и ревизии
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( wp_is_post_revision( $post_id ) ) return;	

		// проверяем права пользователя
		if ( 'page' == $_POST[ 'post_type' ] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) return $post_id;
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			wp_nonce_ays();
			return;
		}

		if ( isset( $_POST[ 'pstu_bgi' ] ) ) {
			update_post_meta( $post_id, 'pstu_bgi', sanitize_key( $_POST[ 'pstu_bgi' ] ) );
		} else {
			delete_post_meta( $post_id, 'pstu_bgi' );
		}

	} // save



	/**
	 *	Вывод метабокса
	 */
	public function render_content( $post ) {
		wp_nonce_field( 'pstu_metabox_bgi', 'pstu_metabox_bgi_nonce' );
		$src = false;
		$default = PSTU_NEXT_THEME_URL . 'images/pstu-bgi-default.png';
		$value = get_post_meta( $post->ID, 'pstu_bgi', true );
		if ( empty( $value ) ) {
			$translation_id = self::get_translation_id( $post->ID );
			if ( $translation_id ) get_post_meta( $translation_id, 'pstu_bgi', true );
		} else {
			$src = wp_get_attachment_image_url( $value, 'full' );
		}
  	$src = ( $src ) ? $src : $default;
  	wp_enqueue_media(); ?>
		<div class="pstu_wrap">
			<div class="form-group">
				<img class="img-responsive center-block img-bordered" data-default-src="<?php echo $default; ?>" id="pstu_bgi_image" src="<?php echo $src; ?>">
			</div>
	    <div class="form-group">
	      <input type="hidden" name="pstu_bgi" id="pstu_bgi_field" value="<?php echo $value; ?>" />
	      <div class="clearfix">
	        <button type="button" role="button" id="pstu_bgi_remove_image_btn" class="button button-link-delete"><?php _e( 'Удалить', 'pstu-next-theme' ); ?></button>
	        <button type="button" role="button" id="pstu_bgi_upload_image_btn" class="button button-primary"><?php _e( 'Установить', 'pstu-next-theme' ); ?></button>
	      </div>
	    </div>
    </div>
    <script>
    	jQuery( function( $ ) {
				jQuery( '#pstu_bgi_upload_image_btn' ).click( function () {
					var send_attachment_bkp = wp.media.editor.send.attachment;
					var button = jQuery( this );
					wp.media.editor.send.attachment = function( props, attachment ) {
						jQuery( '#pstu_bgi_image' ).attr( 'src', attachment.url );
						jQuery( '#pstu_bgi_field' ).val( attachment.id );
						wp.media.editor.send.attachment = send_attachment_bkp;
					}
					wp.media.editor.open( button );
					return false;
				} );
				jQuery( '#pstu_bgi_remove_image_btn' ).click( function () {
					var r = confirm( "Уверены?" );
					if ( r == true ) {
						var src = jQuery( '#pstu_bgi_image' ).attr( 'data-default-src' );
						jQuery( '#pstu_bgi_image' ).attr( 'src', src );
						jQuery( '#pstu_bgi_field' ).val( '' );
					}
					return false;
				} );
			} );
    </script> <?php
	} // render_metabox_content

} // CLASS