<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! function_exists( 'pstu_next_comment' ) ) {
	function pstu_next_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		$result = array();
		$result[] = "<div class=\"" . implode( ' ', get_comment_class( 'media comment', $comment->comment_ID, get_the_ID() ) ) . "\" id=\"comment-" . $comment->comment_ID . "\">";
		$result[] = force_balance_tags( sprintf(
			"	<div class=\"media-left pull-left\"> %s<img class=\"lazy media-object comment__foto hidden-xs\" src=\"#\" data-src=\"%s\" alt=\"%s\">",
			( empty( trim( $comment->comment_author_url ) ) ) ? " " : "<a href=\"" . $comment->comment_author_url . "\">",
			get_avatar_url( $comment->comment_author_email, array( 'size' => $comment->avatar_size ) ),
			( empty( trim( $comment->comment_author ) ) ) ? __( 'Аноним', 'pstu-next-theme' ) : $comment->comment_author
		) );
		$result[] = "	<div class=\"media-body\">";
		$result[] = force_balance_tags( sprintf(
			"<h4 class=\"media-heading\"> %s %s",
			( empty( trim( $comment->comment_author_url ) ) ) ? " " : "<a href=\"" . $comment->comment_author_url . "\">",
			( empty( trim( $comment->comment_author ) ) ) ? __( 'Аноним', 'pstu-next-theme' ) : $comment->comment_author
		) );
		if ( $comment->comment_approved == '0' ) $result[] = sprintf( "<i class=\"text-warning\">%s</i>", __( 'Ваш комментарий ожидает модерацию', 'pstu-next-theme' ) );
		if ( ! empty( trim( $comment->comment_content ) ) ) $result[] = $comment->comment_content;
		$result[] = "		<div class=\"clearfix\">";
		$result[] = "			<date class=\"small pull-left text-info\">" . sprintf( __( '%s %s', 'pstu-next-theme' ), get_comment_date(), get_comment_time() ) . "</date>";
		$result[] = "			<div class=\"alignright\">";
		if ( current_user_can( 'edit_comment', $comment->comment_ID ) ) $result[] = "<a class=\"btn btn-link\" href=\"" . get_edit_comment_link( $comment->comment_ID ) . "\" role=\"button\"> " . __( 'Редактировать', 'pstu-next-theme' ) . "</a>";
		$result[] = get_comment_reply_link( array(
			'add_below'		=> 'comment',
			'respond_id'	=> 'commentform',
			'reply_text'	=> $args[ 'reply_text' ],
			'login_text'	=> __( 'Войдите, чтобы ответить', 'pstu-next-theme' ),
			'depth'				=> 3,
			'before'			=> '',
			'after'				=> '',
		), $comment->comment_ID, get_the_ID() );
		$result[] = "			</div>";
		$result[] = "		</div>";
		echo implode( "\r\n" , $result );
	}
}


if ( ! function_exists( 'pstu_next_comment_close' ) ) {
	function pstu_next_comment_close( $comment, $args, $depth ) {
		$result = array();
		$result[] = "	</div>"; // .media-body
		$result[] = "</div>"; // .media comment
		echo implode( "\r\n" , $result );
	}
}


$result = array();

$comment_form_args = array(
	'class_form'           => 'comment-form comments__form form',
	'class_submit'         => 'btn btn-block btn-success',
	'title_reply'          => __( 'Оставите комментарий', 'pstu-next-theme' ),
	'title_reply_to'       => __( 'Оставить комментарий к %s', 'pstu-next-theme' ),
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' ),
	'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
	'format'               => 'html5',
);

$comments_args = array(
	'walker'            => null,
	'max_	depth'        => '',
	'style'             => 'div',
	'callback'          => 'pstu_next_comment',
	'end-callback'      => 'pstu_next_comment_close',
	'type'              => 'all',
	'reply_text'        => __( 'Ответить', 'pstu-next-theme' ),
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 32,
	'reverse_top_level' => null,
	'reverse_children'  => '',
	'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
	'short_ping'        => false,    // С версии 3.6,
	'echo'              => false,     // true или false
);

$result[] = "<div class=\"comments\" id=\"comments\">";
$result[] = "  <hr class=\"separeted\">";
$result[] = sprintf(
	"  <div class=\"clearfix\"><h3 class=\"alignleft\">%s: <div class=\"alignright small font-normal\">%s %d</div></h3></div>",
	__( 'Комментарии', 'pstu-next-theme' ),
	__( 'всего', 'pstu-next-theme' ),
	get_comments_number( get_the_ID() )
);
$result[] = "  <div class=\"media-list\">" .  wp_list_comments( $comments_args ) . "</div>";
comment_form( $comment_form_args, get_the_ID() );
$result[] = "</div>"; // #comments

echo implode( "\r\n", $result );

unset( $comment_form_args );

?>