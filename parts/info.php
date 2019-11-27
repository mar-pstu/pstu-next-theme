<?php

/**
 *	Блок для страниц и постов
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


$translations = false;

if ( function_exists( 'pll_the_languages' ) ) {
	$translations = pll_the_languages( array(
		'dropdown'           => 0,
		'show_names'         => '',
		'display_names_as'   => 'name',
		'show_flags'         => 0,
		'hide_if_empty'      => 0,
		'force_home'         => 0,
		'echo'               => 0,
		'hide_if_no_translation' => 0,
		'hide_current'       => 1,
		'post_id'            => get_the_ID(),
		'raw'                => 1,
	) );
}


?>




<div class="main__info info clearfix">
	<a class="fancybox" href="https://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=250x250&amp;chl=<?php echo get_permalink( get_the_ID() ); ?>">
		<img class="lazy qr-code" src="#" data-src="https://chart.apis.google.com/chart?choe=UTF-8&amp;chld=L&amp;cht=qr&amp;chs=150x150&amp;chl=<?php echo get_permalink( get_the_ID() ); ?>">
	</a>
  <div class="info__box box box--share">
		<div class="box__heading heading"><?php _e( 'Поделиться:', 'pstu-next-theme' ); ?></div>
		<div class="jssocials"></div>
  </div>
  <?php if ( has_tag() ) : ?>
		<div class="info__box box box--tags">
			<div class="box__heading heading"><?php _e( 'Метки:', 'pstu-next-theme' ); ?></div>
			<?php the_tags( '<ul class="items list-unstyled list-inline"><li>', '</li><li>', '</li></ul>' ); ?>				
		</div>
	<?php endif; ?>
  <?php if ( $translations && ! empty( $translations ) ) : ?>
		<div class="info__box box box--translations">
			<div class="box__heading heading"><?php _e( 'Переводы:', 'pstu-next-theme' ); ?></div>
			<ul class="items list-unstyled list-inline">
				<?php foreach ( $translations as $translation ) : ?>
					<li><a href="<?php echo $translation[ 'url' ]; ?>"><?php echo mb_strtolower( $translation[ 'name' ] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
	  </div>
	<?php endif; ?>
  <div class="info__box box box--publish">
		<div class="box__heading heading"><?php _e( 'Опубликовано:', 'pstu-next-theme' ); ?></div>
		<b><?php echo $publish = get_the_date( 'd.m.Y', get_the_ID() ); ?></b>
  </div>
  <?php if ( $publish != ( $refresh = get_the_modified_date( 'd.m.Y', get_the_ID() ) ) ) : ?>
	  <div class="info__box box box--refresh">
			<div class="box__heading heading"><?php _e( 'Обновлено:', 'pstu-next-theme' ); ?></div>
			<b><?php echo $refresh; ?></b>
	  </div>
	<?php endif; ?>
</div>