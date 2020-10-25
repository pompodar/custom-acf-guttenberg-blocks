<?php

add_action( 'wp_enqueue_scripts', 'enqueue_mytheme_style' );
function enqueue_mytheme_style() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'additional-style', get_template_directory_uri() . '/css/styles.css');
    }



add_action( 'acf/init', 'my_acf_init' );

function my_acf_init() {
    // Bail out if function doesn’t exist.
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }

    // Register a new block.
    acf_register_block( array(
        'name'            => 'example_block',
        'title'           => __( 'Example Block', 'your-text-domain' ),
        'description'     => __( 'A custom example block.', 'your-text-domain' ),
        'render_template' => 'block/example-block.php',
        'category'        => 'formatting',
        'icon'            => 'admin-comments',
        'keywords'        => array( 'example' ),
    ) );
}

add_theme_support( 'post-thumbnails' );



