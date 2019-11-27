<?php


if ( ! defined( 'ABSPATH' ) ) { exit; }


?>




<?php if ( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<div class="<?php echo implode( ' ' , get_post_class( array( 'search__entry', 'entry' ), get_the_ID() ) ); ?>">
		  <h3 class="title"><?php the_title(); ?></h3>
		  <?php echo pstu_get_excerpt( get_post( get_the_ID() ), '<p class="excerpt">', '</p>' ); ?>
		  <?php the_date( 'd-m-Y', '<time class="small font-bold">', '</time>', true ); ?>
		  <div class="text-right">
		  	<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'Подробней', 'pstu-next-theme' ); ?> <i class="icon icon-more"></i></a>
		  </div>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<p class="lead text-warning"><?php _e( 'К сожалению ничего не найдено', 'pstu-next-theme' ); ?></p>
<?php endif; ?>