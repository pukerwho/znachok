<?php 
  get_header(); 
  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }
  global $product;
?>

<?php while ( have_posts() ) : ?>
  <?php the_post(); ?>
  <div class="pt-32 lg:pt-48 mb-20">
    <div class="container mx-auto px-4 md:px-0">
      
      <div class="mb-8">
        <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <ul class="flex items-center flex-wrap">
            <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
              <a itemprop="item" href="<?php echo home_url(); ?>">
                <span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <?php 
            $current_term = wp_get_post_terms(  get_the_ID() , 'product_cat', array( 'parent' => 0 ) );
            foreach (array_slice($current_term, 0,1) as $myterm); {
            } ?>
            <?php if ($myterm): ?>
              <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
                <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'product_cat') ?>">
                  <span itemprop="name"><?php echo $myterm->name; ?></span>
                </a>                        
                <meta itemprop="position" content="2">
              </li>
            <?php endif; ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
              <span itemprop="name"><?php the_title(); ?></span>
              <meta itemprop="position" content="3" />
            </li>
          </ul>
        </div>
        <!-- Title -->
        <h1 class="text-3xl lg:text-6xl font-black mb-2"><?php the_title(); ?></h1>
        <!-- END Title -->

        <!-- Артикул -->
        <div class="text-sm color_gray">
          <?php _e('Артикул', 'znachok'); ?>: <?php echo $product->get_sku(); ?>
        </div>
        <!-- END Артикул -->
      </div>

      <div class="w-full">
        <?php do_action( 'woocommerce_before_single_product' ); ?>
      </div>

      <div class="flex flex-col lg:flex-row bg-white rounded-r-3xl lg:-mx-4 mb-20">
        <div class="w-full lg:w-7/12 lg:px-4">
          <?php get_template_part('blocks/gallery/single-product-image'); ?>
        </div>
        <div class="w-full lg:w-5/12 lg:px-4 py-4">

          <div class="h-full flex flex-col justify-between">
            <!-- Top -->
            <div>
              <!-- Price -->
              <div>
                <?php 
                  $currency_symbols = get_woocommerce_currency_symbol();
                  $sale_price = $product->get_sale_price();
                  $regular_price = $product->get_regular_price(); 
                ?>

                <!-- Если есть скидка -->
                <?php if ($sale_price): ?>
                  <div class="mb-2">
                    <div class="product_single_price old inline-block">
                      <?php echo $regular_price; ?>
                      <span class="currency"><?php echo $currency_symbols; ?></span>
                    </div>
                  </div>

                  <div class="product_single_price new inline-block px-4 py-2 mb-5">
                    <?php echo $sale_price; ?>
                    <span class="currency"><?php echo $currency_symbols; ?></span>
                  </div>
                <!-- END Если есть скидка -->

                <!-- Если скидки нет -->
                <?php else: ?>
                  <div class="product_single_price new inline-block px-4 py-2 mb-5">
                    <?php echo $regular_price; ?>
                    <span class="currency"><?php echo $currency_symbols; ?></span>
                  </div>
                <!-- END Если скидки нет -->

                <?php endif; ?>
              </div>
              <!-- END Price -->

              <!-- Short Description -->
              <div class="product_single_description mb-8">
                <?php echo $product->get_short_description(); ?>
              </div>
              <!-- END Short Description -->

              <!-- Meta -->
              <div>
                <?php if(carbon_get_the_post_meta('product_info_material')): ?>
                <div class="flex items-center text-sm mb-5">
                  <div class="w-2/5 md:w-1/5 font-bold pr-3">
                    <span><?php _e('Материал', 'welbrix'); ?></span>:
                  </div>
                  <div class="w-3/5 md:w-4/5">
                    <?php echo carbon_get_the_post_meta('product_info_material'); ?>
                  </div>
                </div>
                <?php endif; ?> 

                <?php if(carbon_get_the_post_meta('product_info_styajka')): ?>
                <div class="flex items-center text-sm mb-5">
                  <div class="w-2/5 md:w-1/5 font-bold pr-3">
                    <span><?php _e('Тип стяжки', 'welbrix'); ?></span>:
                  </div>
                  <div class="w-3/5 md:w-4/5">
                    <?php echo carbon_get_the_post_meta('product_info_styajka'); ?>
                  </div>
                </div>
                <?php endif; ?> 

                <?php if(carbon_get_the_post_meta('product_info_weight')): ?>
                <div class="flex items-center text-sm mb-5">
                  <div class="w-2/5 md:w-1/5 font-bold pr-3">
                    <span><?php _e('Вес', 'welbrix'); ?></span>:
                  </div>
                  <div class="w-3/5 md:w-4/5">
                    <?php echo carbon_get_the_post_meta('product_info_weight'); ?>
                  </div>
                </div>
                <?php endif; ?> 

                <?php if(carbon_get_the_post_meta('product_info_size')): ?>
                <div class="flex items-center text-sm mb-5">
                  <div class="w-2/5 md:w-1/5 font-bold pr-3">
                    <span><?php _e('Размер', 'welbrix'); ?></span>:
                  </div>
                  <div class="w-3/5 md:w-4/5">
                    <?php echo carbon_get_the_post_meta('product_info_size'); ?>
                  </div>
                </div>
                <?php endif; ?> 

                <?php if(carbon_get_the_post_meta('product_info_pokritie')): ?>
                <div class="flex items-center text-sm mb-5">
                  <div class="w-2/5 md:w-1/5 font-bold pr-3">
                    <span><?php _e('Покрытие', 'welbrix'); ?></span>:
                  </div>
                  <div class="w-3/5 md:w-4/5">
                    <?php echo carbon_get_the_post_meta('product_info_pokritie'); ?>
                  </div>
                </div>
                <?php endif; ?> 
              </div>
              <!-- END Meta -->
            </div>
            <!-- END Top -->

            <!-- Bottom -->
            <div>
              <!-- Qty -->

              <!-- END Qty -->

              <!-- Btn buy -->
              <?php 
                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="product_single_buy p-4 %s product_type_%s">%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                $product->is_purchasable() ? 'add_to_cart_button' : '',
                esc_attr( $product->get_type() ),
                esc_html( $product->add_to_cart_text() )
                ),
                $product );
              ?>
              <!-- END Btn buy -->
            </div>
            <!-- END Bottom -->

          </div>
        </div>
      </div>

      <!-- Big Description -->
      <h2 class="text-3xl lg:text-5xl font-black mb-12"><?php _e('Описание', 'znachok'); ?></h2>
      <div class="flex flex-col lg:flex-row justify-between lg:-mx-4">
        <div class="w-full lg:w-8/12 lg:px-4 mb-12 lg:mb-0">
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="w-full lg:w-4/12 lg:px-4 lg:ml-20">
          <div class="bg_dark_gray rounded-3xl px-6 py-10">
            <div class="flex items-center mb-6">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nova_poshta.svg" alt="<?php _e('Новая почта', 'znachok'); ?>" class="mr-3">
              <div class="text-sm">
                <?php _e('Бесплатная доставка Новой Почтой от 500 грн', 'znachok'); ?>
              </div>
            </div>
            <div class="flex items-center mb-6">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/credit.svg" alt="<?php _e('Кредитная карта', 'znachok'); ?>" class="mr-3">
              <div class="text-sm">
                <?php _e('Оплата наличными или картой', 'znachok'); ?>
              </div>
            </div>
            <div class="flex items-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/obmen.svg" alt="<?php _e('Обмен', 'znachok'); ?>" class="mr-3">
              <div class="text-sm">
                <?php _e('Обмен и возврат в течении 14 дней', 'znachok'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Big Description -->
    </div>
  </div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>