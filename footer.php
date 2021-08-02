</section>
<footer id="footer" class="footer pb-4 lg:pb-16 pt-20">
  <div class="container mx-auto px-4 lg:px-0">
    <div class="flex">
      <div class="w-full flex flex-col items-end lg:items-start lg:w-4/12">
        <div>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.svg" alt="Лого" width="110" class="block lg:hidden">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-yellow.svg" alt="Лого" width="110" class="hidden lg:block">
        </div>
        <div class="text-white lg:text-black">
          © <?php echo date('Y'); ?>
        </div>
      </div>
      <div class="hidden lg:block w-full lg:w-2/12 text-white">
        <?php wp_nav_menu([
          'theme_location' => 'footer_one_menu',
          'menu_id' => 'footer_one_menu',
          'menu_class' => ''
        ]); ?>
      </div>
      <div class="hidden lg:block w-full lg:w-2/12 text-white">
        <?php wp_nav_menu([
          'theme_location' => 'footer_two_menu',
          'menu_id' => 'footer_two_menu',
          'menu_class' => ''
        ]); ?>
      </div>
      <div class="hidden lg:block w-full lg:w-4/12">
        <div class="text-sm text-white mb-1"><?php _e('Будьте в курсе наших новостей', 'znachok'); ?></div>
        <div class="flex items-center">
          <input type="text" name="newsletters" placeholder="<?php _e('Ваш email', 'znachok'); ?>" class="rounded-l-lg py-3 px-2">
          <div class="bg_yellow text-center rounded-r-lg px-12 py-3">
            <?php _e('Подписаться', 'znachok'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="modal_bg"></div>
<?php wp_footer(); ?>

</body>
</html>