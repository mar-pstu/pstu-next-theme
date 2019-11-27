<?php

/**
* Цыкл блога
*/

if ( ! defined( 'ABSPATH' ) ) { exit; };
$thumbnail_size = ( wp_is_mobile() ) ? 'medium' : 'large';

?>




<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div <?php post_class( 'entry', get_the_ID() ); ?>>
      <?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
        <div class="text-center">
          <a class="display-inline" href="<?php the_permalink(); ?>">
            <img class="lazy" src="#" data-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), $thumbnail_size ); ?>" alt="<?php the_title_attribute( array( 'post' => get_the_ID() ) ); ?>"/>
          </a>
        </div>
      <?php endif; ?>
      <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title( '', '', true ); ?></a></h3>
      <?php echo pstu_get_excerpt( get_post( get_the_ID() ), '<p class="excerpt">', '</p>' ); ?>
      <time class="font-bold small"><?php the_date( 'd.m.Y', '', '', true ); ?></time>
      <div class="text-right"><a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'Подробней', 'pstu-next-theme' ); ?></a></div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>