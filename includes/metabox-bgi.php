<?php

/**
 *	Регитсраиция метабокса для кастомного типа поста "Образовательная программа (специалызация)" (book)
 */


if ( ! defined( 'ABSPATH' ) ) {	exit; };


function call_pstuBGIMetaboxClass() {
	new pstuBGIMetaboxClass();
}


if ( is_admin() ) {
	add_action( 'load-post.php',				'call_pstuBGIMetaboxClass' );
	add_action( 'load-post-new.php',		'call_pstuBGIMetaboxClass' );
}



class pstuBGIMetaboxClass {


	/**W
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
		// Устанавливаем типы постов к которым будет добавлен блок
		$post_types = array( 'page', 'post' );
		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'pstu_bgi',																						// id атрибут HTML тега, контейнера блока
				__( 'Фоновое изображение', 'pstu-next-theme' ),				// заголовок/название блока. Виден пользователям
				array( $this, 'render_metabox_content' ),							// Функция, которая выводит на экран HTML содержание блока
				$post_type,																						// для каких типов / экранов добавляемя сетабокс
				'side',																								// Место где должен показываться блок: normal, advanced или side
				'high',																								// Приоритет блока для показа выше или ниже остальных блоков: high или low
				null																									// Аргументы, которые нужно передать в callback функцию
			);
		}
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
	public function render_metabox_content( $post ) {
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
		echo "<script src=\"" . PSTU_NEXT_THEME_URL . "scripts/admin.js\"></script>";
		echo "<link rel=\"stylesheet\" href=\"" . PSTU_NEXT_THEME_URL . "styles/bootstrap.css\">";
		$result = array();
		$result[] = "<div class=\"pstu_wrap\">";
		$result[] = "<div class=\"form-group\"><img class=\"img-responsive center-block img-bordered\" data-default-src=\"" . $default . "\" id=\"pstu_bgi_image\" src=\"" . $src . "\"></div>";
    $result[] = "<div class=\"form-group\">";
    $result[] = "  <input type=\"hidden\" name=\"pstu_bgi\" id=\"pstu_bgi_field\" value=\"" . $value . "\" />";
    $result[] = "  <div class=\"clearfix\">";
    $result[] = "    <button type=\"button\" role=\"button\" id=\"pstu_bgi_remove_image_btn\" class=\"pull-right btn btn-danger\">" . __( 'Удалить', 'pstu-next-theme' ) . "</button>";
    $result[] = "    <button type=\"button\" role=\"button\" id=\"pstu_bgi_upload_image_btn\" class=\"pull-left btn btn-default\">" . __( 'Установить', 'pstu-next-theme' ) . "</button>";
    $result[] = "  </div>";
    $result[] = "</div>"; // .form-control
    $result[] = "</div>";
		echo implode( "\r\n", $result );
	} // render_metabox_content


} // CLASS


?>