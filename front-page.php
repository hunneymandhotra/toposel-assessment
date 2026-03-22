<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all of the front page by default.
 */

get_header(); ?>

<main id="primary" class="site-main home-page">

    <!-- Hero Section -->
    <?php 
    $hero = get_field('hero_banner') ?: array(
        'heading' => 'FIND CLOTHES THAT MATCHES YOUR STYLE',
        'subtext' => 'Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.',
        'button_text' => 'Shop Now',
        'button_link' => '#',
        'hero_image' => ''
    );
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
    $brands = get_field('brand_logos') ?: array(
        array('logo' => '', 'name' => 'GUCCI'),
        array('logo' => '', 'name' => 'PRADA'),
        array('logo' => '', 'name' => 'CASIO'),
        array('logo' => '', 'name' => 'ZARA'),
        array('logo' => '', 'name' => 'GUESS'),
    );
    if($brands): ?>
    <section class="brand-bar">
        <div class="brand-container">
            <?php foreach($brands as $brand): ?>
                <div class="brand-logo">
                    <?php if($brand['logo']): ?>
                        <img src="<?php echo esc_url($brand['logo']); ?>" alt="Brand Logo">
                    <?php else: ?>
                        <span class="brand-name-text"><?php echo esc_html($brand['name']); ?></span>
                    <?php endif; ?>
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
                    // Inline SVG Fallback for "New Shirt" and "New Pent" (No internet required!)
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <!-- Shirt SVG with explicit color -->
                            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"/>
                            </svg>
                        </div>
                        <div class="product-info">
                            <h3>T-SHIRT</h3>
                            <div class="rating">
                                ★★★★★ <span>4.5/5</span>
                            </div>
                            <div class="price" style="color:#000; font-weight:700; font-size:18px;">
                                $120
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image">
                            <!-- Pants/Jeans SVG with explicit color -->
                            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 4v16M15 4v16M9 20h6M6 4h12l1 16H5L6 4zM9 8h6M9 12h6"/>
                            </svg>
                        </div>
                        <div class="product-info">
                            <h3>SKINNY FIT JEANS</h3>
                            <div class="rating">
                                ★★★★★ <span>4.5/5</span>
                            </div>
                            <div class="price" style="color:#000; font-weight:700; font-size:18px;">
                                $240 <del style="color:#616060; font-weight:400;">$260</del>
                            </div>
                        </div>
                    </div>
                    <?php
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
