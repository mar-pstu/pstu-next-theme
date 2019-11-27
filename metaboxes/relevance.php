<?php

/**
 *	Регитсраиция метабокса для добавления даты "актуальности" записи
 */


if ( ! defined( 'ABSPATH' ) ) {	exit; };


class pstuRelevanceMetaboxClass {


	/**
	 *	Создание класса / добавление хуков для вывода метабокса
	 */
	public function __construct() {
		add_action( 'add_meta_boxes',			array( $this, 'add_meta_box' ) );
		add_action( 'save_post',					array( $this, 'save' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}


	/**
	*
	*/
	public function enqueue() {
		wp_add_inline_script( 'jquery-ui-datepicker', 'jQuery( \'input[name="pstu_relevance_start"]\' ).datepicker( { dateFormat: \'dd/mm/yy\' } );', 'after' );
		wp_add_inline_script( 'jquery-ui-datepicker', 'jQuery( \'input[name="pstu_relevance_end"]\' ).datepicker( { dateFormat: \'dd/mm/yy\' } );', 'after' );
	}


	/**
	 *	Регистрация метабокса
	 */
	public function add_meta_box( $post_type ) {
		if ( in_array( $post_type, array( 'post' ) ) ) add_meta_box(
			'pstu_relevance',
			__( 'Актуальность публикации', 'pstu-next-theme' ),
			array( $this, 'render_metabox_content' ),
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
		if ( ! isset( $_POST[ 'pstu_metabox_relevance_nonce' ] ) ) return;

		// проверяем значение nonce-поля, если не совпадает - выходим
		if ( ! wp_verify_nonce( $_POST[ 'pstu_metabox_relevance_nonce' ], 'pstu_metabox_relevance' ) ) {
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

		if ( isset( $_POST[ 'pstu_relevance_start' ] ) || ! empty( $_POST[ 'pstu_relevance_start' ] ) ) {
			update_post_meta( $post_id, '_pstu_relevance_start', sanitize_text_field( $_POST[ 'pstu_relevance_start' ] ) );
		} else {
			delete_post_meta( $post_id, '_pstu_relevance_start' );
		}

		if ( isset( $_POST[ 'pstu_relevance_end' ] ) || ! empty( $_POST[ 'pstu_relevance_end' ] ) ) {
			update_post_meta( $post_id, '_pstu_relevance_end', sanitize_text_field( $_POST[ 'pstu_relevance_end' ] ) );
		} else {
			delete_post_meta( $post_id, '_pstu_relevance_end' );
		}

	} // save



	/**
	 *	Вывод метабокса
	 */
	public function render_metabox_content( $post ) {
		wp_nonce_field( 'pstu_metabox_relevance', 'pstu_metabox_relevance_nonce' );
		$start = get_post_meta( $post->ID, '_pstu_relevance_start', true );
		$end = get_post_meta( $post->ID, '_pstu_relevance_end', true );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_localize_jquery_ui_datepicker();
		printf(
			'<label for="%3$s">%2$s</label><input type="date" style="width: 100%%;" name="pstu_relevance_start" id="%3$s" value="%1$s" />',
			esc_attr( $start ),
			__( 'Начало', 'pstu-next-theme' ),
			'pstu_relevance_field_start'
		);
		printf(
			'<label for="%3$s">%2$s</label><input type="date" style="width: 100%%;" name="pstu_relevance_end" id="%3$s" value="%1$s" />',
			esc_attr( $end ),
			__( 'Конец', 'pstu-next-theme' ),
			'pstu_relevance_field_end'
		);
	} // render_metabox_content

} // CLASS
