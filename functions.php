<?php

add_action( 'wp_enqueue_scripts', 'enqueue_mytheme_style' );
function enqueue_mytheme_style() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'additional-style', get_template_directory_uri() . '/css/style.css');
    }



add_action( 'acf/init', 'my_acf_init' );

function my_acf_init() {
    // Bail out if function doesn’t exist.
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }

    foreach (scandir(realpath(__DIR__ . "/blocks/")) as $files) {

        if (strpos($files, 'php') !== false) {
            $phpFiles[] = $files;
        }

        // Include php file(s)
        if (count($phpFiles) > 0) {
            foreach ($phpFiles as $phpFile) {

                // Register a new block.
acf_register_block( array(
    'name'            => str_replace(".php", "", $phpFile),
    'title'           => str_replace(".php", "", $phpFile),
    'description'     => 'Svjat block.',
    'render_template' => 'blocks/' . $phpFile,
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( str_replace(".php", "", $phpFile) ),
) );
            }
        } 
    }    
}

add_theme_support( 'post-thumbnails' );



