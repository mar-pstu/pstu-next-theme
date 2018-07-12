<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( ! function_exists( 'pstu_next_comment' ) ) {
	function pstu_next_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		$result = array();
		$result[] = "<div class=\"media comment\" id=\"comment-" . $comment->comment_ID . "\">";
		$result[] = "	<div class=\"media-left pull-left\">";
		$result[] = "		<a href=\"\"><img class=\"lazy media-object comment__foto hidden-xs\" src=\"#\" data-src=\"images/user-xs.jpg\" alt=\"Иванов Иван\"></a>";
		$result[] = "	</div>";
		$result[] = "	<div class=\"media-body\">";
		$result[] = "		<h4 class=\"media-heading\"></h4>";
		$result[] = "		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>";
		$result[] = "		<div class=\"clearfix\">";
		$result[] = "			<date class=\"small pull-left text-info\">" . printf( __( '%1$s %2$s', 'pstu-next-theme' ), get_comment_date(), get_comment_time() ) . "</date>";
		$result[] = "			<div class=\"alignright\">";
		$result[] = "				<div class=\"btn btn-link\" href=\"" . get_edit_post_link( $comment->comment_ID, '' ) . "\" role=\"button\"><i class=\"glyphicon glyphicon-pencil\"></i> " . __( 'Редактировать', 'pstu-next-theme' ) . "</div>";
		$result[] = get_comment_reply_link( array(
			'add_below'		=> 'comment',
			'respond_id'	=> 'commentform',
			'reply_text'	=> __( 'Ответить', 'pstu-next-theme' ),
			'login_text'	=> __( 'Войдите, чтобы ответить', 'pstu-next-theme' ),
			'depth'				=> 3,
			'before'			=> '',
			'after'				=> '',
		), $comment->comment_ID, get_the_ID() );
		$result[] = "				<div class=\"btn btn-link\" href=\"\" role=\"button\"><i class=\"glyphicon glyphicon-share-alt\"></i> " . __( 'Ответить' ) . "</div>";
		$result[] = "			</div>";
		$result[] = "		</div>";
		return implode( "\r\n" , $result );
	}
}


if ( ! function_exists( 'pstu_next_comment_close' ) ) {
	function pstu_next_comment_close() {
		$result = array();
		$result[] = "	</div>"; // .media-body
		$result[] = "</div>"; // .media comment
		return implode( "\r\n" , $result );
	}
}


$result = array();

$comment_form_args = array(
	'fields'               => array(
		'author' => '<div class="form-group"><label for="comment-user">' . __( 'Ваше имя', 'pstu-next-theme' ) . '</label><input class="form-control" id="comment-user" type="text" placeholder="Name"></div>',
		'email'  => '<div class="form-group"><label for="comment-email">' . __( 'Ваш email', 'pstu-next-theme' ) . '</label><input class="form-control" id="comment-email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="email@example.com" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"></div>',
		'url'    => '<div class="form-group"><label for="comment-site">' . __( 'Ваш сайт', 'pstu-next-theme' ) . '</label><input class="form-control" id="comment-site url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' name="site" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="http://example.com"></div>',
	),
	'comment_field'        => '<div class="form-group"><label for="contacts-msg">' . __( 'Комментарий', 'pstu-next-theme' ) . '</label><textarea class="form-control" id="comment-msg" name="msg" placeholder="remarknce, pronouncement, judgement, reflection, opinion, view, criticism" required></textarea></div>',
	'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'Вам необходимо <a href="%s">авторизироваться</a> чтобы оставить комментарий.', 'pstu-next-theme' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '<a href="%1$s">Вы авторизировались как %2$s</a>. <a href="%3$s">Выйти?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Ваш электронный адрес не будет опубликован.', 'pstu-next-theme' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'class_form'           => 'comment-form comments__form form',
	'class_submit'         => 'btn btn-block btn-success',
	'name_submit'          => 'submit',
	'title_reply'          => __( 'Оставите комментарий', 'pstu-next-theme' ),
	'title_reply_to'       => __( 'Оставить комментарий к %s', 'pstu-next-theme' ),
	'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h3>',
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' ),
	'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
	'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
	'format'               => 'xhtml',
);

$comments_args = array(
	'walker'            => null,
		'max_	depth'         => '',
		'style'             => 'div',
		'callback'          => 'pstu_next_comment',
		'end-callback'      => 'pstu_next_comment_close',
		'type'              => 'all',
		'reply_text'        => '<i class="glyphicon glyphicon-share-alt"></i> ' . __( 'Ответить', 'pstu-next-theme' ),
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