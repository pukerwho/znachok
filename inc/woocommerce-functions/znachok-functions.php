<?php 

add_filter( 'woocommerce_checkout_fields', 'truemisha_del_fields', 25 ); 
function truemisha_del_fields( $fields ) {
 
  // оставляем эти поля
  // unset( $fields[ 'billing' ][ 'billing_first_name' ] ); // имя
  // unset( $fields[ 'billing' ][ 'billing_phone' ] ); // телефон
 
  // удаляем все эти поля
  unset( $fields[ 'billing' ][ 'billing_email' ] ); // емайл
  unset( $fields[ 'billing' ][ 'billing_last_name' ] ); // фамилия
  unset( $fields[ 'billing' ][ 'billing_company' ] ); // компания
  unset( $fields[ 'billing' ][ 'billing_country' ] ); // страна
  unset( $fields[ 'billing' ][ 'billing_address_1' ] ); // адрес 1
  unset( $fields[ 'billing' ][ 'billing_address_2' ] ); // адрес 2
  unset( $fields[ 'billing' ][ 'billing_city' ] ); // город
  unset( $fields[ 'billing' ][ 'billing_state' ] ); // регион, штат
  unset( $fields[ 'billing' ][ 'billing_postcode' ] ); // почтовый индекс
  unset( $fields[ 'order' ][ 'order_comments' ] ); // заметки к заказу
 
  return $fields;
 
}

//Удалить Детали на Доставке
add_filter('woocommerce_enable_order_notes_field', '__return_false');


// WooCommerce Checkout Fields Hook
add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');
function custom_wc_checkout_fields_no_label($fields) {
  // loop by category
  foreach ($fields as $category => $value) {
    foreach ($fields[$category] as $field => $property) {
      // remove label property
      unset($fields[$category][$field]['label']);
    }
  }
  return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_first_name']['placeholder'] = 'Имя';
    $fields['billing']['billing_phone']['placeholder'] = 'Телефон';
    $fields['billing']['billing_email']['placeholder'] = 'Email';
    return $fields;
}

add_filter( 'default_checkout_billing_country', 'truemisha_default_checkout_country' );
 
function truemisha_default_checkout_country( $country ) {
 
  if ( WC()->customer->get_is_paying_customer() ) {
    return $country;
  }
 
  return 'UA';
}

add_filter('woocommerce_cart_needs_payment', 'disabled_payment');
function disabled_payment () {
  return false;
}

add_filter('woocommerce_cart_needs_shipping', 'disabled_shipping');
function disabled_shipping () {
  return false;
}

// Change the Number of WooCommerce Products Displayed Per Page
add_filter( 'loop_shop_per_page', 'lw_loop_shop_per_page', 30 );
function lw_loop_shop_per_page( $products ) {
 $products = 15;
 return $products;
}

add_filter( 'woocommerce_pagination_args',  'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {

  $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
  $args['next_text'] = '<i class="fa fa-angle-right"></i>';

  return $args;
}

//Добавляем кнопки плюс и минус в QTY 
add_action( 'woocommerce_before_quantity_input_field', 'truemisha_quantity_minus', 25 );
add_action( 'woocommerce_after_quantity_input_field', 'truemisha_quantity_plus', 25 );

function truemisha_quantity_minus() {
  echo '<button type="button" class="quantity-down js-qty__adjust js-qty__adjust--minus woofc-item-qty-minus"></button>';
}
function truemisha_quantity_plus() {
  echo '<button type="button" class="quantity-up js-qty__adjust js-qty__adjust--plus woofc-item-qty-plus"></button>';
}

//Удаляем текст Доставка перед полями
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return;
}


//Добавляем иконки к методу доставки
add_filter( 'woocommerce_cart_shipping_method_full_label', 'filter_woocommerce_cart_shipping_method_full_label', 10, 2 ); 
function filter_woocommerce_cart_shipping_method_full_label( $label, $method ) { 
   // Use the condition here with $method to apply the image to a specific method.      

   if( $method->method_id == "flat_rate" ) {
       $label = "Your Icon Image2".$label;
   } else if( $method->method_id == "local_pickup" ) {
       $label = $label;       
   } else if( $method->method_id == "nova_poshta_shipping" ) {
       $label = '<img src="https://www.welbrix.com/wp-content/uploads/2021/04/nova_poshta_logo.png">'.$label;      
   }
   return $label; 
}