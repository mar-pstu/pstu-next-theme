<div class="mobilenav" id="mobilenav" style="display: none;">
  <button class="burger-button"><span><?php _e( 'Закрыть', 'pstu-next-theme' ); ?></span>
    <svg class="burger-button-icon" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve">
      <path d="M181.05,321.3l35.7,35.7l127.5-127.5L216.75,102l-35.7,35.7l66.3,66.3H0v51h247.35L181.05,321.3z M408,0H51    C22.95,0,0,22.95,0,51v102h51V51h357v357H51V306H0v102c0,28.05,22.95,51,51,51h357c28.05,0,51-22.95,51-51V51    C459,22.95,436.05,0,408,0z" data-original="#000000" data-old_color="#ffffff" fill="#ffffff"></path>
    </svg>
  </button>
  <div class="container">
    <?php if ( $custom_logo_url = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'medium' ) ) : ?>
      <img class="lazy logo" src="#" data-src="<?php echo $custom_logo_url; ?>" alt="<?php bloginfo( 'name' ); ?>">
    <?php endif; ?>
    <h2 class="text-center"><?php bloginfo( 'name' ); ?></h2>
    <p class="lead text-center"><?php _e( 'Меню сайта', 'pstu-next-theme' ); ?></p>

    <div id="mobile-nav-first-menu-container"></div>

    <h3><?php _e( 'Поиск', 'pstu-next-theme' ); ?></h3>
    <?php get_search_form( true ); ?>

    <div id="mobile-nav-second-menu-container"></div>

  </div>
</div> <!-- #mobilenav -->