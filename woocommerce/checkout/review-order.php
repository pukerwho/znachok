<?php defined( 'ABSPATH' ) || exit; ?>

<div class="checkout_cart px-4 py-10">
  <div class="mb-10">
    <?php  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

      if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
    ?>

    <div class="checkout_cart_item flex items-center mb-2">
      <div class="w-2/12 mr-5">
        <!-- Картинка -->
        <div class="checkout_cart_item_thumb">
          <?php
            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

            if ( ! $product_permalink ) {
              echo $thumbnail; // PHPCS: XSS ok.
            } else {
              printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
            }
          ?>  
        </div>
        <!-- END Картинка -->
      </div>

      <div class="w-10/12 flex justify-between">

        <!-- Тайтл -->
        <div class="checkout_cart_item_title pr-5">
          <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>  
        <!-- Тайтл -->

        <!-- Цена -->
        <div class="checkout_cart_item_price pr-5">
          <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </div>
        <!-- END Цена -->

      </div>

      
    </div>

    <?php }} ?>
  </div>
  <div class="checkout_cart_total flex items-center">
    <div class="mr-4">
      <?php _e('Итого', 'znachok'); ?>:
    </div>
    <div>
      <span><?php wc_cart_totals_order_total_html(); ?></span>
    </div>
  </div>
</div>
