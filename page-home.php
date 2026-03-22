<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>

<main id="primary" class="site-main home-page">

    <!-- Hero Section -->
    <?php 
    $hero = get_field('hero_banner');
    if($hero): ?>
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1><?php echo esc_html($hero['heading']); ?></h1>
                <p><?php echo esc_html($hero['subtext']); ?></p>
                <a href="<?php echo esc_url($hero['button_link']); ?>" class="btn-shop-now">
                    <?php echo esc_html($hero['button_text']); ?>
                </a>
            </div>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <h2>200+</h2>
                    <span>International Brands</span>
                </div>
                <div class="stat-item">
                    <h2>2,000+</h2>
                    <span>High-Quality Products</span>
                </div>
                <!-- Adding third stat to match design -->
                <div class="stat-item">
                    <h2>30,000+</h2>
                    <span>Happy Customers</span>
                </div>
            </div>

            <div class="hero-image-container">
                <?php if($hero['hero_image']): ?>
                    <img src="<?php echo esc_url($hero['hero_image']); ?>" alt="Hero Banner Style">
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Brand Logos Section -->
    <?php 
    $brands = get_field('brand_logos');
    if($brands): ?>
    <section class="brand-bar">
        <div class="brand-container">
            <?php foreach($brands as $brand): ?>
                <div class="brand-logo">
                    <img src="<?php echo esc_url($brand['logo']); ?>" alt="Brand Logo">
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- New Arrivals Section -->
    <section class="new-arrivals">
        <div class="container">
            <h2 class="section-title">NEW ARRIVALS</h2>
            
            <div class="products-grid">
                <?php
                $category_id = get_field('arrivals_category');
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 2, // Requirement: 2 product cards
                );

                if($category_id) {
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $category_id,
                        )
                    );
                }

                $products = new WP_Query($args);

                if($products->have_posts()):
                    while($products->have_posts()): $products->the_post();
                        global $product;
                        ?>
                        <div class="product-card">
                            <div class="product-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="product-info">
                                <h3><?php the_title(); ?></h3>
                                <div class="rating">
                                    ★★★★★ <span>4.5/5</span>
                                </div>
                                <div class="price">
                                    <?php echo $product->get_price_html(); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p>Please add some products to see them here.</p>';
                endif;
                ?>
            </div>
            
            <div class="view-all-container">
                <a href="#" class="btn-view-all">View All</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
