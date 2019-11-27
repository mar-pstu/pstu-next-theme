<?php

/**
 *	Форма поиска
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<form class="searchform form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
    <div class="input-group">
      <input class="form-control" type="text" value="<?php echo get_search_query(); ?> " name="s">
      <button class="btn btn-success" type="submit"><?php _e( 'Найти', 'pstu-next-theme' ); ?></button>
    </div>
  </div>
</form>