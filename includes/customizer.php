<?php

/**
 *	Настройки темы
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'customize_register', function ( $wp_customize ) {

	// Регистрация панели "Настройки портфолио"
	$wp_customize->add_panel(
		'pstu_next_theme_options',
		array(
			'capability'		=> 'edit_theme_options',
			'title'					=> __( 'Настройки темы "ПГТУ Next"', 'pstu-next-theme' ),
			'priority'			=> 200
		)
	);

} );

if ( ! class_exists( 'pstuCustomizerEntriesControl' ) ) {

	class pstuCustomizerEntriesControl extends WP_Customize_Control {

		public $type = 'pstu_entries';

		public function enqueue () {
				wp_enqueue_style(
					'bootstrap',
					PSTU_NEXT_THEME_URL . '/styles/bootstrap.css',
					array(),
					'3.3.7'
				); /**/

				wp_enqueue_script(
					'bootstrap',
					PSTU_NEXT_THEME_URL . '/scripts/bootstrap.js',
					array( 'jquery' ),
					'3.3.7',
					'in_footer'
				); /**/
		}

		public function render_content () {

			$result = "";

			?>



<div class="pstu_wrap">
	
	<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Открыть модальное окно</a>
	 
	<!-- HTML-код модального окна-->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></div>
				<div class="modal-body">
					<form class="form">

						<div class="form-group">
							<p>Выберите тип записи</p>
							<div class="radio"><label><input type="radio" name="entry_type">Страница</label></div>
							<div class="radio"><label><input type="radio" name="entry_type">Пост</label></div>
							<div class="radio"><label><input type="radio" name="entry_type">Категория</label></div>
							<div class="radio"><label><input type="radio" name="entry_type">Ссылка</label></div>
						</div>
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-toggle="collapse" href="#entry-type-page">Страница</a></h4>
								</div>
								<div class="panel-collapse collapse" id="entry-type-page">
									<div class="panel-body">
										<div class="form-group">
											<label for="">Выберите странице из списка</label>
											<select name="" id="" class="form-control"></select>
										</div>
										<div class="form-group">
											<label for="">Заголовок</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Подзаголовок</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-toggle="collapse" href="#entry-type-post">Пост</a></h4>
								</div>
								<div class="panel-collapse collapse" id="entry-type-post">
									<div class="panel-body">
										<div class="form-group">
											<label for="">Выберите пост из списка</label>
											<select name="" id="" class="form-control"></select>
										</div>
										<div class="form-group">
											<label for="">Заголовок</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Подзаголовок</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-toggle="collapse" href="#entry-type-post">Категория</a></h4>
								</div>
								<div class="panel-collapse collapse" id="entry-type-category">
									<div class="panel-body">
										<div class="form-group">
											<label for="">Выберите категорию из списка</label>
											<select name="" id="" class="form-control"></select>
										</div>
										<div class="form-group">
											<label for="">Заголовок</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Подзаголовок</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-toggle="collapse" href="#entry-type-link">Сылка</a></h4>
								</div>
								<div class="panel-collapse collapse" id="entry-type-link">
									<div class="panel-body">
										<div class="form-group">
											<label for="">Вставьте url</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Заголовок</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Подзаголовок</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button></div>
			</div>
		</div>
	</div>

</div>

			<?php

			echo $result;

		} // function render_content

	} // class

} // if pstuCustomizerEntriesControl



?>