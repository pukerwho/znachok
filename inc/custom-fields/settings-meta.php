<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Shop Settings') )
  	->add_tab( __('Главная страница'), array(
      Field::make( 'textarea', 'crb_main_description' . crb_get_i18n_suffix(), 'Описание (Под заголовком)' ),
  		Field::make( 'rich_text', 'crb_main_text' . crb_get_i18n_suffix(), 'Текст на странице' ),
    ))
    ->add_tab( __('Контакты'), array(
      Field::make( 'text', 'crb_contact_address' . crb_get_i18n_suffix(), 'Адрес' ),
      Field::make( 'complex', 'crb_contact_phones', 'Телефоны' )
        ->add_fields( array(
          Field::make( 'text', 'crb_contact_phone', 'Номер' ),
      ) ),
      Field::make( 'text', 'crb_contact_email', 'Email' ),
      Field::make( 'text', 'crb_contact_facebook', 'Facebook' ),
      Field::make( 'text', 'crb_contact_instagram', 'Instagram' ),
      Field::make( 'text', 'crb_contact_twitter', 'Twitter' ),
      Field::make( 'text', 'crb_contact_pinterest', 'Pinterest' ),
    ) )
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' )
  ));
}

?>