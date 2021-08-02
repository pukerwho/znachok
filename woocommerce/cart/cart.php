
<div class="pb-3">
  <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <div class="cart woocommerce-cart-form__contents">
      <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
      ?>

        <!-- CART ITEM -->
        <div class="cart_item woocommerce-cart-form__cart-item bg-white flex items-start lg:items-center justify-between mb-5 <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

          <!-- THUMB AND TITLE -->
          <div class="w-6/12 flex flex-col lg:flex-row lg:items-center mb-5 md:mb-0">

            <!-- THUMB -->
            <div class="cart_item_thumb w-full lg:w-3/12 mr-5 mb-5 lg:mb-0">
              <?php
                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                if ( ! $product_permalink ) {
                  echo $thumbnail; // PHPCS: XSS ok.
                } else {
                  printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                }
              ?>  
            </div>
            <!-- END THUMB -->

            <div class="w-full lg:w-9/12">
              <!-- TITLE -->
              <div class="cart_item_title color_dark font-bold mb-2 px-4 lg:px-0">
                <?php
                  if ( ! $product_permalink ) {
                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                  } else {
                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                } ?>
              </div>
              <!-- END TITLE -->

              <!-- SKU -->
              <div class="cart_item_code text-sm color_gray">
                <?php echo $_product->get_sku(); ?>
              </div>
              <!-- END SKU -->
            </div>

          </div>
          <!-- END THUMB AND TITLE -->

          <!-- QTY PRICE DELETE -->
          <div class="w-6/12 relative flex flex-col-reverse lg:flex-row lg:items-center lg:justify-between py-3 lg:py-0 px-3 md:px-0 mb-3 md:mb-0">

            <!-- QTY -->
            <div class="product_qty mr-0 md:mr-20" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
              <?php
                if ( $_product->is_sold_individually() ) {
                  $product_quantity = sprintf( '<input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                } else {
                  $product_quantity = woocommerce_quantity_input(
                    array(
                      'input_name'   => "cart[{$cart_item_key}][qty]",
                      'input_value'  => $cart_item['quantity'],
                      'max_value'    => $_product->get_max_purchase_quantity(),
                      'min_value'    => '0',
                      'product_name' => $_product->get_name(),
                    ),
                    $_product,
                    false
                  );
                }

                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                ?>
            </div>
            <!-- END QTY -->

            <!-- PRICE -->
            <div class="cart_item_price font-bold mr-0 md:mr-20 mb-5 lg:mb-0">
              <?php
                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
              ?>
            </div>
            <!-- END PRICE -->

            <!-- TRASH -->
            <div class="cart_item_trash absolute lg:relative right-3 lg:right-0 top-3 lg:top-0 md:px-5 md:py-8">
              <?php
                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                  'woocommerce_cart_item_remove_link',
                  sprintf(
                    '<a href="%s" class="trash_link" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                    esc_html__( 'Remove this item', 'woocommerce' ),
                    esc_attr( $product_id ),
                    esc_attr( $_product->get_sku() )
                  ),
                  $cart_item_key
                );
              ?>
            </div>
            <!-- END TRASH -->

          </div>
          <!-- END QTY PRICE DELETE -->

        </div>
      <?php }} ?>
      <button type="submit" class="button opacity-0 invisible" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
      
      <?php do_action( 'woocommerce_cart_actions' ); ?>
      <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

      <div class="cart_total cart-collaterals flex justify-end items-center mb-10 md:mb-32">
        <div class="font-bold text-sm mr-5">
          <?php _e('Итого', 'welbrix'); ?>: 
        </div>  
        <div class="price cart_totals font-bold <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
          <span><?php echo WC()->cart->get_cart_total(); ?></span>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="cart_buttons flex flex-col md:flex-row md:justify-between md:items-center">
  <div class="btn red rounded-2xl text-white relative px-8 py-5 mb-5 md:mb-0">
    <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="w-full h-full absolute top-0 left-0"></a>
    <?php _e('Продолжить покупки', 'welbrix'); ?>
  </div>
  <div class="btn red fill rounded-2xl text-white relative px-8 py-5">
    <a href="<?php echo wc_get_checkout_url(); ?>" class="w-full h-full absolute top-0 left-0"></a>
    <?php _e('Оформить заказ', 'welbrix'); ?>
  </div>
</div>
