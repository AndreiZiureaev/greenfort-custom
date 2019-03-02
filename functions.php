<?php
add_action( 'wp_enqueue_scripts', 'greenfort_enqueue_style' );
function greenfort_enqueue_style() {

    $parent_style = 'twentyseventeen-style';

    wp_enqueue_style(
        $parent_style,
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'greenfortcustom-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme() -> get('Version')
    );
}

add_action ( 'after_setup_theme', 'greenfort_setup' );
function greenfort_setup() {
    add_image_size( 'greenfort-hd-image', 1280, 720, true );
}

add_action( 'customize_register', 'greenfort_customize_register' );
function greenfort_customize_register( $wp_customize ) {

    $number_of_choices = 2;

    for ( $i = 1; $i <= $number_of_choices; $i++ ) {
        // Image
        $wp_customize -> add_setting(
            "image_$i", array(
                'default' => 0,
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize -> add_control(
            new WP_Customize_Media_Control(
                $wp_customize, "image_$i", array(
                    'label' => "Header Image $i",
                    'section' => 'static_front_page',
                    'mime_type' => 'image',
                    'active_callback' => 'is_front_page',
                )
            )
        );

        // Post Link
        $wp_customize -> add_setting(
            "post_$i", array(
                'default' => 0,
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize -> add_control(
            "post_$i", array(
                'label' => "Header Link $i",
                'type' => 'dropdown-pages',
                'section' => 'static_front_page',
                'active_callback' => 'is_front_page',
            )
        );

        // Description
        $wp_customize -> add_setting(
            "description_$i", array(
                'default' => '',
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize -> add_control(
            "description_$i", array(
                'label' => "Header Description $i",
                'description' => 'Maximum length: 90 characters.',
                'type' => 'textarea',
                'section' => 'static_front_page',
                'active_callback' => 'is_front_page',
                'input_attrs' => array(
                    'maxlength' => '90',
                ),
            )
        );
    }
}
