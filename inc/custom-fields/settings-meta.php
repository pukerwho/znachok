<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Welbrix') )
  	->add_tab( __('Главная страница'), array(
      Field::make( 'complex', 'crb_main_sliders' . crb_get_i18n_suffix(), 'Главный слайдер' )
          ->add_fields( array(
            Field::make( 'image', 'crb_main_slider_img', 'Картинка' ),
            Field::make( 'text', 'crb_main_slider_link', 'Ссылка' ),
          ) 
        ),
  		Field::make( 'rich_text', 'crb_main_text' . crb_get_i18n_suffix(), 'Текст на странице' ),
      
      Field::make( 'image', 'crb_main_cat_one_thumb', 'Картинка для категории №1' ),
      Field::make( 'text', 'crb_main_cat_one_title' . crb_get_i18n_suffix(), 'Заголовок для категории №1' ),
      Field::make( 'text', 'crb_main_cat_one_link' . crb_get_i18n_suffix(), 'Ссылка для категории №1' ),

      Field::make( 'image', 'crb_main_cat_two_thumb', 'Картинка для категории №2' ),
      Field::make( 'text', 'crb_main_cat_two_title' . crb_get_i18n_suffix(), 'Заголовок для категории №2' ),
      Field::make( 'text', 'crb_main_cat_two_link' . crb_get_i18n_suffix(), 'Ссылка для категории №2' ),

      Field::make( 'image', 'crb_main_cat_three_thumb', 'Картинка для категории №3' ),
      Field::make( 'text', 'crb_main_cat_three_title' . crb_get_i18n_suffix(), 'Заголовок для категории №3' ),
      Field::make( 'text', 'crb_main_cat_three_link' . crb_get_i18n_suffix(), 'Ссылка для категории №3' ),
      Field::make( 'complex', 'crb_main_banners' . crb_get_i18n_suffix(), 'Баннеры' )
        ->add_fields( array(
          Field::make( 'image', 'crb_main_banner_img', 'Картинка' ),
          Field::make( 'text', 'crb_main_banner_subtitle', 'Подзаголовок' ),
          Field::make( 'text', 'crb_main_banner_title', 'Заголовок' ),
          Field::make( 'text', 'crb_main_banner_link', 'Ссылка' ),
      ) ),
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