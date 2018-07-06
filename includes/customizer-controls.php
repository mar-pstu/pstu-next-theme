<?php


/**
 *	кастомные єлементы управления
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! class_exists( 'pstuCustomizerEntriesControl' ) ) {

	class pstuCustomizerEntriesControl extends WP_Customize_Control {

		public $type = 'pstu_entries';

		public function render_content() {

			$result = "";

			$result .= "<div>\r\n";
			if ( ! empty( $this->description ) ) $result .= "  <div id=\"" . esc_attr( $description_id ) . "\" class=\"customize-control-description\">" . $this->description . "</div>";
			$result .= "</div>\r\n";
			$result .= "<a role=\"button\">" . __( 'Добавить', 'pstu-next-theme' ) . "</a>\r\n";
			$result .= "\r\n";
			$result .= "\r\n";
			$result .= "\r\n";
			$result .= "\r\n";
			$result .= "\r\n";

			echo $result;

		} // function render_content

	} // class

} // if pstuCustomizerEntriesControl



// class pstuCustomizerEntryControl extends WP_Customize_Control {
// 		public $type = 'textarea';
 
// 		public function render_content() {
// 				
// 						<label>
// 								<span class="customize-control-title"><?php echo esc_html( $this->label ); </span>
// 								<textarea rows="5" style="width:100%;" $this->link();  echo esc_textarea( $this->value() ); </textarea>
// 						</label>
// 				
// 		}
// }





?>