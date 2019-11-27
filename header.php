<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>



<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php wp_head(); ?>
  </head>
  <body class="<?php echo join( ' ', get_body_class() ); ?>">
    <?php get_template_part( 'parts/mobilenav' ); ?>
    <div class="wrapper" id="wrapper">

      <header class="wrapper__item header" id="header">

        <div class="header__top top clearfix">
          <div class="container">
            <?php get_template_part( 'parts/languages' ); ?>
            <a class="search-button" id="search-button" href="#search-modal" role="button" data-fancybox=""><div class="sr-only"><?php _e( 'Поиск', 'patu-next-theme' ); ?></div></a>
            <div style="display: none;">
              <div class="search-modal" id="search-modal" style="min-width: 300px;">
                <?php get_search_form( true ); ?>
                <?php if ( is_active_sidebar( 'side_search' ) && ! is_search() ) get_sidebar( 'search' ); ?>
              </div>
            </div>
            <?php if ( ! empty( trim( $pstu_header_help_modal_content = get_theme_mod( 'header_help_content', '' ) ) ) ) : ?>
              <a class="help-button" id="help-button" href="#help-modal" role="button" data-fancybox=""><div class="sr-only">Вопросы-ответы</div></a>
              <div style="display: none;">
                <div class="help-modal" id="help-modal">
                  <?php echo do_shortcode( force_balance_tags( $pstu_header_help_modal_content ) ); ?>
                </div>
              </div>
            <?php endif; ?>
            <?php wp_nav_menu( array(
              'theme_location'  => 'menu_second',
              'menu'            => '',
              'container'       => 'nav',
              'container_class' => 'nav',
              'container_id'    => '',
              'menu_class'      => 'nav__list list',
              'menu_id'         => 'top-nav-list',
              'echo'            => true,
              'depth'           => 3,
            ) ); ?>
          </div>
        </div>

        <div class="container">
          <div class="row middle-xs center-xs">
            <?php if ( has_custom_logo() ) : ?>
              <div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
                <?php the_custom_logo(); ?>
              </div>
            <?php endif; ?>
            <div class="col-xs-8 col-sm-8 col-md-6 col-lg-4">
              <?php printf(
                '<%1$s class="bloginfo-name"><a href="%2$s">%3$s</a></%1$s>',
                ( is_front_page() ) ? 'h1' : 'div',
                get_home_url(),
                get_bloginfo( 'name' )
              ); ?>
              <p class="bloginfo-description"><?php bloginfo( 'description' ); ?></p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 small top-xs">
              <?php if ( ( $address = get_theme_mod( 'pstu_next_address', false ) ) && ( ! pstu_mods_empty( $address ) ) ) : ?>
                <?php if ( function_exists( 'ppl_' ) ) ?>
                <a class="header__address address fancybox-frame" id="header-address" href="<?php echo $address[ 'map_url' ]; ?>"><?= $address[ 'title' ]; ?></a>
              <?php endif; ?>
              <?php if ( ( $socials = get_theme_mod( 'pstu_next_socials', false ) ) && ( ! pstu_mods_empty( $socials ) ) ) : ?>
                <ul class="header__social text-left">
                  <?php foreach ( $socials as $key => $value ) : if ( ! empty( $value ) ) ?>
                    <li><a class="<?php echo esc_attr( $key ); ?>" href="<?php echo ( ( 'email' == $key ) ? 'mailto:' : '' ) . esc_attr( $value ); ?>"><span class="sr-only"><?php echo $key; ?></span></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-3 small top-xs text-left">
              <?php if ( get_theme_mod( 'alerts_section_flag', false ) ) get_template_part( 'sections/alerts' ); ?>
            </div>
          </div>
        </div>

        <div class="header__nav nav">
          <div class="container clearfix">
            <?php wp_nav_menu( array(
              'theme_location'  => 'menu_main',
              'menu'            => '',
              'container'       => 'nav',
              'container_class' => 'container',
              'container_id'    => '',
              'menu_class'      => 'nav__list list',
              'menu_id'         => 'header-nav-list',
              'echo'            => true,
              'depth'           => 3,
            ) ); ?>
            <a class="burger-button" href="#mobilenav" role="button">
              <svg class="burger-button-icon" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve">
                <path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z" data-original="#000000" data-old_color="#ffffff" fill="#ffffff"></path>
              </svg>
              <span><?php _e( 'Меню', 'pstu-next-theme' ); ?></span>
            </a>
          </div>
        </div>

      </header>

      <main class="wrapper__item wrapper__item--main main" id="main">
        <?php
          if ( ! wp_is_mobile() && is_singular( array( 'page', 'post' ) ) )
            if ( $main_bgi_id = get_post_meta( get_the_ID(), 'pstu_bgi', true ) )
              if ( $main_bgi_src = wp_get_attachment_image_url( $main_bgi_id, ( wp_is_mobile() ? 'medium' : 'large' ) ) ) {
                echo "<div id=\"main-bgi\" class=\"main-bgi lazy\" data-src=\"" . $main_bgi_src . "\"></div>";
              }
