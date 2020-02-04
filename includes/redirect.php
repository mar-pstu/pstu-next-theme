<?php












add_shortcode( 'pstu_redirect', function () {


	$result = __return_empty_array();


	// $entries = get_posts( array(
	// 	'numberposts' => -1,
	// 	'post_type'   => 'any',
	// 	'suppress_filters' => true,
	// ) );


	// if ( is_array( $entries ) && ! empty( $entries ) ) {

		// foreach ( $entries as $entry ) {
			
		// 	$result[] = sprintf(
		// 		'%1$s %2$s',
		// 		$entry->ID,
		// 		get_permalink( $entry->ID )
		// 	);

		// }


		if ( isset( $_POST[ 'entries' ] ) ) {
			$lines = preg_split( '/\\r\\n?|\\n/', $_POST[ 'entries' ] );
			if ( is_array( $lines ) ) {
				$result[] = '<textarea>';
				foreach ( $lines as $line ) {
					$line_param = wp_parse_list( $line );
					$line_param[ 1 ] = urldecode( $line_param[ 1 ] );
					$permalink = get_permalink( $line_param[ 0 ] );
					if ( trim( $line_param[ 1 ] ) != $permalink ) {
						$result[] = sprintf(
							'Redirect 301 %1$s %2$s',
							$line_param[ 1 ],
							$permalink
						);
					}
				}
				$result[] = '</textarea>';
			}
		} else {
			ob_start();
			?>
				<form method="post">
					<textarea name="entries" cols="30" rows="30"></textarea>
					<input type="submit" value="Отправить" >
				</form> 
			<?php
			$result[] = ob_get_contents();
			ob_end_clean();
		}

	// }


	return implode( "\r\n", $result );


} );
