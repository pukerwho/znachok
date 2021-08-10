<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="pt-40 lg:pt-64 mb-20">
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
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php global $wp; echo home_url( $wp->request ); ?>">
                <span itemprop="name"><?php _e( 'Магазин', 'restx' ); ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
              <span itemprop="name"><?php the_title(); ?></span>
              <meta itemprop="position" content="3" />
            </li>
          </ul>
        </div>
        <!-- Title -->
        <h1 class="text-3xl text-6xl font-black mb-2"><?php the_title(); ?></h1>
      </div>
      <div class="w-full mb-20">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
<?php endwhile; else: ?>
  <p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?> 

<?php get_footer(); ?>