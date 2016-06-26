<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

  <meta charset="<?php echo esc_url( ( 'charset' ) ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php echo esc_url( home_url( 'pingback_url' ) ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head() ?>

  </head>

<body <?php body_class(); ?>>

<div class="full-container">
      <!-- Header Items -->

  <div class="main-header group">

      <div class="page-container">

        <div class="logo">

          <a href="<?php echo esc_url( home_url() ); ?>">
          <?php if( get_theme_mod( 'sawfree_logo' ) != "" ): ?>
            <img src="<?php echo get_theme_mod( 'sawfree_logo' ); ?>">
          <?php endif; ?>
          </a>

        </div>

          <div class="main-navigation" role="navigation">

                  <?php
                  wp_nav_menu( array(
                    'menu'              => 'header-menu',
                    'theme_location'    => 'header-menu',
                    'depth'             => 3,
                    'container'         => '',
                    'container_id'      => 'main-navigation',
                    'menu_class'        => '')
                  );
                  ?>
          </div>

      </div>

  </div>

</div> <!-- end of full container -->