<?php
/**
 * Toposel Theme Functions
 */

// Basic Setup
function toposel_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('woocommerce'); // Support for WooCommerce
}
add_action('after_setup_theme', 'toposel_setup');

// Enqueue Styles & Scripts
function toposel_scripts() {
    // Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&family=Anton&display=swap', array(), null);
    
    // Main Style (with cache busting as requested)
    wp_enqueue_style('toposel-main-style', get_stylesheet_uri(), array(), time());
    
    // Homepage Specific Style
    if (is_page_template('page-home.php') || is_front_page()) {
        wp_enqueue_style('home-style', get_template_directory_uri() . '/css/home.css', array(), time());
    }
}
add_action('wp_enqueue_scripts', 'toposel_scripts');

// Register ACF Dynamic Fields (Professional Method)
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_65fc0d9f9a2b1',
	'title' => 'Homepage Content',
	'fields' => array(
		array(
			'key' => 'field_65fc0da02f1a6',
			'label' => 'Announcement Bar Text',
			'name' => 'announcement_bar_text',
			'type' => 'text',
			'instructions' => 'Enter text for the top black bar.',
			'required' => 0,
			'default_value' => 'Sign up and get 20% off to your first order. Sign Up Now',
		),
		array(
			'key' => 'field_65fc0db22f1a7',
			'label' => 'Hero Banner',
			'name' => 'hero_banner',
			'type' => 'group',
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_65fc0dc62f1a8',
					'label' => 'Heading',
					'name' => 'heading',
					'type' => 'text',
					'default_value' => 'FIND CLOTHES THAT MATCHES YOUR STYLE',
				),
				array(
					'key' => 'field_65fc0dd02f1a9',
					'label' => 'Subtext',
					'name' => 'subtext',
					'type' => 'textarea',
					'default_value' => 'Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.',
				),
				array(
					'key' => 'field_65fc0ddd2f1aa',
					'label' => 'Button Text',
					'name' => 'button_text',
					'type' => 'text',
					'default_value' => 'Shop Now',
				),
				array(
					'key' => 'field_65fc0de72f1ab',
					'label' => 'Button Link',
					'name' => 'button_link',
					'type' => 'url',
					'default_value' => '#',
				),
				array(
					'key' => 'field_65fc0df12f1ac',
					'label' => 'Hero Image',
					'name' => 'hero_image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
		array(
			'key' => 'field_65fc0e012f1ad',
			'label' => 'Brand Logos',
			'name' => 'brand_logos',
			'type' => 'repeater',
			'instructions' => 'Add icons for brands (GUCCI, PRADA, etc.)',
			'layout' => 'table',
			'button_label' => 'Add Brand Logo',
			'sub_fields' => array(
				array(
					'key' => 'field_65fc0e142f1ae',
					'label' => 'Logo',
					'name' => 'logo',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
		array(
			'key' => 'field_65fc0e242f1af',
			'label' => 'New Arrivals Product Category',
			'name' => 'arrivals_category',
			'type' => 'taxonomy',
			'taxonomy' => 'product_cat',
			'field_type' => 'select',
			'add_term' => 0,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'id',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-home.php',
			),
		),
	),
));

endif;
