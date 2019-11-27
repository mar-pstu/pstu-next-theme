<?php

/**
 *	Сайдбар в подвале сайта
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<aside class="aside aside--basement" id="aside-basement">
  <div class="container-fluid">
    <div class="row center-xs top-xs">

		<?php dynamic_sidebar( 'side_basement' ); ?>

    </div>
  </div>
</aside>