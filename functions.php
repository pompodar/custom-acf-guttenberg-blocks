<?php

add_action( 'wp_enqueue_scripts', 'enqueue_mytheme_style' );
function enqueue_mytheme_style() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'additional-style', get_template_directory_uri() . '/dist/style.css');
    wp_enqueue_script('services-script', get_template_directory_uri() . '/dist/main.js', array('jquery'));    
}



add_action( 'acf/init', 'my_acf_init' );

function my_acf_init() {
    // Bail out if function doesn’t exist.
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }

    foreach (scandir(realpath(__DIR__ . "/blocks/")) as $folders) {

        if (strpos($folders, 'block') !== false) {
            $files[] = $folders;
        }
        if (count($files) > 0) {
            foreach ($files as $file) {

                // Register a new block.
                acf_register_block( array(
                    'name'            => $file,
                    'title'           => str_replace("-", " ", $file),
                    'description'     => 'Svjat block.',
                    'render_template' => 'blocks/' . $file . '/' . $file . '.php',
                    'category'        => 'formatting',
                    'icon'            => 'admin-comments',
                    'keywords'        => array( str_replace("-", " ", $file) ),
                ) );
            }
        } 
    }    
}

add_theme_support( 'post-thumbnails' );



