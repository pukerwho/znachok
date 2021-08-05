<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <!-- <link rel="stylesheet" href="../css/style.css" inline> -->
  <?php
    wp_head();
  ?>
  <?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>
<body <?php echo body_class(); ?>>
  <header id="header" class="header" role="banner">
    <div class="container relative mx-auto px-4 md:px-0">
      <div class="header_container flex justify-between items-center bg-white rounded-full shadow-md py-2 px-0 lg:p-2">
        <div class="logo pl-4">
          <a href="<?php echo home_url(); ?>">
            <?php if (is_cart() || is_shop()): ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-green.svg" alt="Лого">
            <?php else: ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-yellow.svg" alt="Лого">
            <?php endif; ?>
          </a>
        </div>
        <div class="header_content flex justify-between lg:justify-start items-center">
          <div class="header_menu hidden lg:block">
            <?php wp_nav_menu([
              'theme_location' => 'head_menu',
              'container' => 'ul',
              'menu_class' => 'flex',
            ]); ?>
          </div>
          <?php if (get_locale() == 'ru_RU') { $activeRu = 'active'; } ?>
          <div class="header_lang flex <?php echo $activeRu; ?>">
            <li><a href="#">укр</a></li>
            <li><a href="#">рус</a></li>
          </div>
          <div class="header_cart relative mr-5 lg:mr-0">
            <a href="<?php echo wc_get_cart_url(); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cart.svg" alt="<?php _e('Корзина', 'znachok'); ?>" class="header_cart_icon">
            <?php 
              global $woocommerce;
              $count = $woocommerce->cart->cart_contents_count;
              if ($count != 0) {
                echo '<span>';
                echo $count;  
                echo '</span>';
              }
            ?>
          </div>
          <div class="header_toggle block lg:hidden relative cursor-pointer mr-5">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="menu_mobile w-full h-full fixed top-32">
    <div class="bg-white rounded-2xl px-6 py-8 mx-4">
      <?php wp_nav_menu([
        'theme_location' => 'head_menu',
        'container' => 'ul',
        'menu_class' => 'flex flex-col',
      ]); ?>  
    </div>
    
  </div>
  <section id="content" role="main">