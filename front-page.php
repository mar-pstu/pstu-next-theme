<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

if ( has_nav_menu( 'menu_jumbotron' ) ) get_template_part( 'sections/jumbotron' ); 

?>


<div class="container">
  <div class="row center-xs">
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
      <?php if ( get_theme_mod( 'sticky_section_flag', false ) ) get_template_part( 'sections/sticky' ); ?>
      <?php if ( has_nav_menu( 'menu_flat' ) ) get_template_part( 'sections/flat' ); ?>
    </div>
    <?php if ( get_theme_mod( 'structure_sidebar_flag', false ) ) : ?>
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
        <?php get_sidebar( 'structure' ); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php if ( get_theme_mod( 'action_section_flag', false ) ) get_template_part( 'sections/action' ); ?>

<div class="container">
  <div class="row center-xs">
    <?php if ( get_theme_mod( 'current_section_flag', false ) ) get_template_part( 'sections/current' ); ?>
    <?php if ( get_theme_mod( 'news_section_flag', false ) ) get_template_part( 'sections/news' ); ?>
    <?php if ( get_theme_mod( 'events_section_flag', false ) ) get_template_part( 'sections/events' ); ?>
  </div>
</div>

<?php

if ( get_theme_mod( 'share_section_flag', false ) )     get_template_part( 'sections/share' );
if ( get_theme_mod( 'people_section_flag', false ) )    get_template_part( 'sections/people' );
if ( get_theme_mod( 'projects_section_flag', false ) )  get_template_part( 'sections/projects' );

get_footer();