<?php global $product; ?>

<!-- КАРТОЧКА ПРОДУКТА -->
<div class="w-full lg:w-1/3 px-2 mb-4">
  <div class="product_card relative">
    <a href="<?php echo $product->get_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
    <div class="product_card_img">
      <?php echo $product->get_image(); ?>
    </div>
    <div class="product_card_title text-md px-5">
      <?php the_title(); ?>
    </div>
    <div class="product_card_desc mb-6 px-5">
      <?php _e('Артикул', 'welbrix'); ?>: <?php echo $product->get_sku(); ?>
    </div>
    <div class="flex justify-between items-center px-5 pb-5">
      <div class="product_card_price">
        <?php echo $product->get_price_html(); ?>
      </div>
      <div class="product_card_cart">
        <?php 
          echo apply_filters( 'woocommerce_loop_add_to_cart_link',
          sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s">%s</a>',
          esc_url( $product->add_to_cart_url() ),
          esc_attr( $product->get_id() ),
          esc_attr( $product->get_sku() ),
          $product->is_purchasable() ? 'add_to_cart_button' : '',
          esc_attr( $product->get_type() ),
          esc_html( '' )
          ),
          $product );
        ?>
      </div>
    </div>
  </div>
</div>
<!-- END КАРТОЧКА ПРОДУКТА -->