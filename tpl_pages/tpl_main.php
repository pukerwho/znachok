<?php
/*
Template Name: ГЛАВНАЯ
*/
?>

<?php get_header(); ?>

<div class="main-page">
	<div class="top-corner-img">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/top-corner-img.svg" alt="<?php _e('Значки', 'znachok'); ?>">
	</div>
	<div class="left-side-img">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/left-side-img.svg" alt="<?php _e('Значки', 'znachok'); ?>">
	</div>

	<!-- WELCOME BLOCK -->
	<div class="welcome pt-48 mb-48">
		<div class="container mx-auto px-4 md:px-0">
			<div class="w-full lg:w-6/12 welcome_content ">
				<h1 class="text-4xl lg:text-6xl font-black lg:leading-tight mb-6"><?php _e('Авторские значки и фурнитура', 'znachok'); ?></h1>
				<div class="text-lg mb-10">
					Небольшое описание на 10 слов. Lorem ipsum, dolor sit amet.
				</div>
				<div class="inline-block">
					<div class="btn red big fill font-black">
						<?php _e('Заказать', 'znachok'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WELCOME BLOCK -->

	<!-- ПОПУЛЯРНЫЕ ТОВАРЫ НА ГЛАВНОЙ -->
	<div class="popular mb-20 lg:mb-64">
		<div class="container mx-auto px-4 md:px-0">
			<div class="w-full flex items-center justify-between mb-16">
				<h2 class="text-4xl lg:text-6xl font-black leading-none"><?php _e('Популярные товары', 'znachok'); ?></h2>

				<!-- Swiper Навигация -->
				<div class="popular_arrows relative flex">
					<div class="popular_arrows_prev flex justify-center cursor-pointer mr-5">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow_next.svg" width="13" height="21">
					</div>
					<div class="popular_arrows_next flex justify-center cursor-pointer">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/arrow_next.svg" width="13" height="21">
					</div>
				</div>
				<!-- END Swiper Навигация -->

			</div>
		</div>
		
			<div class="swiper-container swiper-popular-product-container left-container">
				<div class="swiper-wrapper -mx-4">
					<?php 
						$query = new WP_Query( array( 
							'post_type' => 'product', 
							'posts_per_page' => 8,
							'order'    => 'DESC',
						) );
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
						<!-- КАРТОЧКА ПРОДУКТА -->
						<div class="swiper-slide">
							<div class="product_card relative">
								<a href="<?php echo $product->get_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
								<div class="product_card_img">
									<?php echo $product->get_image(); ?>
								</div>
								<div class="product_card_title px-5">
									<?php the_title(); ?>
								</div>
								<div class="product_card_desc mb-6 px-5">
									Бронзовый, алюменивая булавка
								</div>
								<div class="flex justify-between items-center px-5 pb-5">
									<div class="product_card_price">
										<?php echo $product->get_price_html(); ?>
									</div>
									<div class="product_card_cart big">
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
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		
	</div>
	<!-- END ПОПУЛЯРНЫЕ ТОВАРЫ НА ГЛАВНОЙ -->

	<!-- БЛОК О НАС НА ГЛАВНОЙ -->
	<div class="about bg_yellow relative py-48 mb-20">
		<!-- IMAGES (ICONS) -->
		<div class="about-top-left">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-top-left.png">
		</div>
		<div class="about-top-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-top-center.svg">
		</div>
		<div class="about-top-right">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-top-right.png">
		</div>
		<div class="about-bottom-left">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-bottom-left.png">
		</div>
		<div class="about-bottom-right">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-bottom-right.png">
		</div>
		<!-- END IMAGES (ICONS) -->
		<h2 class="text-4xl lg:text-6xl font-black leading-none text-center mb-16"><?php _e('О нас', 'znachok'); ?></h2>
		<div class="container mx-auto px-4 md:px-0">
			<div class="w-full lg:w-1/2 mx-auto">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
				<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
			</div>
		</div>
	</div>
	<!-- END БЛОК О НАС НА ГЛАВНОЙ -->

	<!-- КЛИЕНТЫ НА ГЛАВНОЙ -->
	<div class="clients mb-20">
		<div class="container mx-auto px-4 lg:px-0">
			<h2 class="text-4xl lg:text-6xl font-black leading-none text-center mb-16"><?php _e('Клиенты', 'znachok'); ?></h2>
			<div>
				Клиенты
			</div>
		</div>
	</div>
	<!-- END КЛИЕНТЫ НА ГЛАВНОЙ -->

	<!-- НОВОСТИ НА ГЛАВНОЙ -->
	<div class="news">
		<div class="container mx-auto px-4 lg:px-0 mb-16 lg:mb-32">
			<h2 class="text-4xl lg:text-6xl font-black leading-none text-center mb-24 lg:mb-48"><?php _e('Новости', 'znachok'); ?></h2>
			<div class="flex flex-wrap lg:-mx-2">
				<?php 
					$news_query = new WP_Query( array( 
						'post_type' => 'post', 
						'posts_per_page' => 3,
						'order'    => 'DESC',
					) );
				if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post(); ?>
					<!-- НОВОСТЬ -->
					<div class="news_item w-full lg:w-1/3 lg:px-2 mb-24 lg:mb-0">
						<div class="news_card relative px-4 lg:px-8 pb-20 pt-20 lg:pt-32">
							<div class="news_card_img">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="news_card_date mb-2">
								<?php echo get_the_date('d.m.Y'); ?>
							</div>
							<div class="news_card_title mb-4">
								<?php the_title(); ?>
							</div>
							<div class="news_card_desc">
								<?php 
									$content_text = wp_strip_all_tags( get_the_content() );
									echo mb_strimwidth($content_text, 0, 105, '...');
								?>
							</div>
						</div>
					</div>
					<!-- END НОВОСТЬ -->
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<!-- END НОВОСТИ НА ГЛАВНОЙ -->

	<!-- КОНТАКТЫ НА ГЛАВНОЙ -->
	<div class="contacts relative">
		<div class="container mx-auto px-4 lg:px-0 mb-6 lg:mb-20">
			<div class="flex flex-wrap items-center justify-between lg:-mx-2">
				<div class="w-full lg:w-8/12 lg:px-2">
					<div class="contacts_block">
						<div class="text-center">
							<h2 class="inline-flex relative -left-9 z-10 text-4xl lg:text-6xl font-black text-center bg-white transform -translate-y-1/2  leading-none px-4 mb-4 lg:mb-16">
								<?php _e('Контакты', 'znachok'); ?>
							</h2>	
						</div>
						
						<div class="flex items-center justify-center px-4 lg:px-16 mb-6 lg:mb-16">
							<div class="text-xl lg:text-2xl font-bold mr-8 lg:mr-20">
								<?php _e('Всегда будем рады ответить на ваши вопросы', 'znachok'); ?>
							</div>
							<div class="hidden lg:block">
								<div class="btn red big fill font-black relative transform translate-x-1/2 z-10">
									<?php _e('Связаться', 'znachok'); ?>
								</div>
							</div>
						</div>
						<div class="flex flex-col lg:flex-row lg:items-center -mx-1 pb-6 lg:pb-32 px-4 lg:px-16">
							<!-- EMAIL -->
							<div class="w-full lg:w-1/3 flex items-center px-1 mb-4 lg:mb-0">
								<div class="mr-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/email.svg">
								</div>
								<div>
									info@znachok.com.ua
								</div>
							</div>
							<!-- PHONE -->
							<div class="w-full lg:w-1/3 flex items-center px-1 mb-4 lg:mb-0">
								<div class="mr-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone.svg">
								</div>
								<div>
									+380 63 622 35 55
								</div>
							</div>
							<!-- LOCATION -->
							<div class="w-full lg:w-1/3 flex items-center px-1 mb-4 lg:mb-0">
								<div class="mr-2">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/location.svg">
								</div>
								<div>
									Берестейская 39, Киев	
								</div>
							</div>
						</div>
						<div class="flex justify-center lg:hidden pb-6">
							<div class="btn red big fill font-black relative">
								<?php _e('Связаться', 'znachok'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="contacts_icon w-full lg:w-4/12 flex items-center justify-end lg:px-2">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-dog.svg">
				</div>
			</div>
		</div>
	</div>

	<!-- END КОНТАКТЫ НА ГЛАВНОЙ -->
</div>
<?php get_footer(); ?>