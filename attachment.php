<?php

if ( ! defined( 'ABSPATH' ) ) { exit; };


wp_redirect( get_permalink( $post->post_parent ), 301 );

?>