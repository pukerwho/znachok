<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Купоны
// do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
  echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
  return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

  <?php if ( $checkout->get_checkout_fields() ) : ?>

    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

    <div class="flex flex-col md:flex-row bg-white md:-mx-8 mt-16">
      <div class="w-full md:w-1/2 md:px-8">
        <!-- Контактные данные -->
        <div class="checkout_box mb-12">
          <h2 class="font-black text-3xl mb-4">1. <?php _e('Контактные данные', 'welbrix'); ?></h2>
          <div>
            <?php
              $fields = $checkout->get_checkout_fields( 'billing' );

              foreach ( $fields as $key => $field ) {
                woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
              }
            ?>
          </div>
        </div>
        <!-- END Контактные данные -->

        <!-- Доставка -->
        <!-- component/checkout/delivery -->        
        <!-- END Доставка -->

        <!-- Оплата -->
        <!-- component/checkout/payment -->
        <!-- END Оплата -->
        <div>
          <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="btn red big red fill font-black px-6 py-4" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr__( 'Оформить заказ', 'znachok' ) . '" data-value="' . esc_attr__( 'Оформить заказ', 'znachok' ) . '">' . esc_html__( 'Оформить заказ', 'znachok' ) . '</button>' ); // @codingStandardsIgnoreLine ?>
        <?php do_action( 'woocommerce_review_order_after_submit' ); ?>
        <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
        </div>

      </div>
      <div class="hidden md:block w-full md:w-1/2 md:px-8">
        <div class="checkout_box bg-white rounded mb-8 p-5">
          <div class="flex justify-center">
            <h2 class="bg-white font-black text-center text-2xl transform translate-y-1/2 px-6"><?php _e('Корзина', 'znachok'); ?></h2>  
          </div>
          <?php woocommerce_order_review(); ?>
        </div>
      </div>
    </div>

    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
    
  <?php endif; ?>
  
  <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
  
  <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>