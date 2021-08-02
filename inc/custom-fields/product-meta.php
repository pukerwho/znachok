<?php

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
	function crb_post_theme_options() {
		Container::make( 'post_meta', 'Данные о продукте' )
	    ->where( 'post_type', '=', 'product' )
	  	->add_tab( __('Характеристики'), array(
	      Field::make( 'text', 'product_info_material', 'Материал' ),
	      Field::make( 'text', 'product_info_styajka', 'Тип стяжки' ),
	      Field::make( 'text', 'product_info_weight', 'Вес' ),
	      Field::make( 'text', 'product_info_size', 'Размер' ),
	      Field::make( 'text', 'product_info_pokritie', 'Покрытие' ),
	  ) );
	}

?>