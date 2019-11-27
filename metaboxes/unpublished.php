<?php

/**
 *	Регитсраиция метабокса для добавления даты снятия с публикации
 */


if ( ! defined( 'ABSPATH' ) ) {	exit; };


class pstuUnpublishedMetaboxClass {


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
		wp_add_inline_script( 'jquery-ui-datepicker', 'jQuery( \'input[name="pstu_unpublished"]\' ).datepicker( { dateFormat: \'dd/mm/yy\' } );', 'after' );
	}


	/**
	 *	Регистрация метабокса
	 */
	public function add_meta_box( $post_type ) {
		if ( in_array( $post_type, array( 'post' ) ) ) add_meta_box(
			'pstu_unpublished',
			__( 'Снять с публикации', 'pstu-next-theme' ),
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
		if ( ! isset( $_POST[ 'pstu_metabox_unpublished_nonce' ] ) ) return;

		// проверяем значение nonce-поля, если не совпадает - выходим
		if ( ! wp_verify_nonce( $_POST[ 'pstu_metabox_unpublished_nonce' ], 'pstu_metabox_unpublished' ) ) {
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

		wp_unschedule_event( get_post_meta( $post_id, '_pstu_unpublished', true ), 'pstu_next_unpublished_hook', array( $post_id ) );
		delete_post_meta( $post_id, '_pstu_unpublished' );

		if ( isset( $_POST[ 'pstu_unpublished' ] ) ) {
			$new_timestamp = strtotime( sanitize_text_field( $_POST[ 'pstu_unpublished' ] ) );
			update_post_meta( $post_id, '_pstu_unpublished', $new_timestamp );
			wp_schedule_single_event( $new_timestamp, 'pstu_next_unpublished_hook', array( $post_id ) );
		}

	} // save



	/**
	 *	Вывод метабокса
	 */
	public function render_metabox_content( $post ) {
		wp_nonce_field( 'pstu_metabox_unpublished', 'pstu_metabox_unpublished_nonce' );
		$timestamp = get_post_meta( $post->ID, '_pstu_unpublished', true );
  	wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_localize_jquery_ui_datepicker();
  	printf(
  		'<input type="date" style="width: 100%%;" name="pstu_unpublished" id="pstu_unpublished_field" value="%1$s" />',
  		( empty( $timestamp ) ) ? '' : esc_attr( date( 'Y-m-d', ( int ) $timestamp ) )
  	);
	} // render_metabox_content

} // CLASS