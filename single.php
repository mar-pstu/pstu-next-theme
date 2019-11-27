<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


$side_right_flag = is_active_sidebar( 'side_right' );

?>







<?php get_header(); ?>

<div class="container">
  <div class="row">

		<div class="col-xs-12 col-sm-12 <?= ( $side_right_flag ) ? 'col-md-7 col-lg-8' : ''; ?>">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article>
						<?php get_template_part( 'parts/pageheader' ); ?>
						<div class="entry-content clearfix"> <?php
							switch ( get_post_format( get_the_ID() ) ) {
								case 'link':
									get_template_part( 'formats/link' );
									break;
								default:
									the_content();
									break;
							} ?>
						</div>
						<?php get_template_part( 'parts/info' ); ?>
					</article>
					<?php get_template_part( 'parts/pager' ); ?>
					<?php if( comments_open( get_the_ID() ) ) comments_template(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	
		<?php if ( $side_right_flag ) : ?>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<?php get_sidebar( 'right' ); ?>
			</div>
		<?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>