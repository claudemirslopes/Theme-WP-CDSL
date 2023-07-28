<?php

function wpcdsl_customizer( $wp_customize ){
    // 1 Copyright Section
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' => __( 'Copyright Settings', 'wp-cdsl' ),
            'description' => __( 'Copyright Settings', 'wp-cdsl' )
        )
    );

            $wp_customize->add_setting(
                'set_copyright',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Copyright X - All Rights Reserved', 'wp-cdsl' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_copyright',
                array(
                    'label' => __( 'Copyright Information', 'wp-cdsl' ),
                    'description' => __( 'Please, type your copyright here', 'wp-cdsl' ),
                    'section' => 'sec_copyright',
                    'type' => 'text'
                )
            );
            
    // 2 Hero
    $wp_customize->add_section(
        'sec_hero',
        array(
            'title' => __( 'Hero Section', 'wp-cdsl' )
        )
    );

            // Title
            $wp_customize->add_setting(
                'set_hero_title',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Please, add some title', 'wp-cdsl' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_title',
                array(
                    'label' => __( 'Hero Title', 'wp-cdsl' ),
                    'description' => __( 'Please, type your here title here', 'wp-cdsl' ),
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );  
            
            // Subtitle
            $wp_customize->add_setting(
                'set_hero_subtitle',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Please, add some subtitle', 'wp-cdsl' ),
                    'sanitize_callback' => 'sanitize_textarea_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_subtitle',
                array(
                    'label' => __( 'Hero Subtitle', 'wp-cdsl' ),
                    'description' => __( 'Please, type your subtitle here', 'wp-cdsl' ),
                    'section' => 'sec_hero',
                    'type' => 'textarea'
                )
            );

            // Button Text
            $wp_customize->add_setting(
                'set_hero_button_text',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Learn More', 'wp-cdsl' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text',
                array(
                    'label' => __( 'Hero button text', 'wp-cdsl' ),
                    'description' => __( 'Please, type your hero button text here', 'wp-cdsl' ),
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );

            // Button link
          $wp_customize->add_setting(
              'set_hero_button_link',
              array(
                  'type' => 'theme_mod',
                  'default' => '#',
                  'sanitize_callback' => 'esc_url_raw'
              )
          );

          $wp_customize->add_control(
              'set_hero_button_link',
              array(
                  'label' => __( 'Hero button link', 'wp-cdsl' ),
                  'description' => __( 'Please, type your hero button link here', 'wp-cdsl' ),
                  'section' => 'sec_hero',
                  'type' => 'url'
              )
          ); 
          
          // Hero Height
          $wp_customize->add_setting(
              'set_hero_height',
              array(
                  'type' => 'theme_mod',
                  'default' => 800,
                  'sanitize_callback' => 'absint'
              )
          );

          $wp_customize->add_control(
              'set_hero_height',
              array(
                  'label' => __( 'Hero height', 'wp-cdsl' ),
                  'description' => __( 'Please, type your hero height', 'wp-cdsl' ),
                  'section' => 'sec_hero',
                  'type' => 'number'
              )
          );

          // Hero Background
        $wp_customize->add_setting(
            'set_hero_background',
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,
            'set_hero_background',
            array(
                'label' => __( 'Hero Image', 'wp-cdsl' ),
                'section'   => 'sec_hero',
                'mime_type' => 'image'
            )));

// 3. Blog
$wp_customize->add_section( 
    'sec_blog', 
    array(
        'title' => __( 'Blog Section', 'wp-cdsl' )
) );

        // Posts per page
        $wp_customize->add_setting( 
            'set_per_page', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( 
            'set_per_page', 
            array(
                'label' => __( 'Posts per page', 'wp-cdsl' ),
                'description' => __( 'How many items to display in the post list?', 'wp-cdsl' ),			
                'section' => 'sec_blog',
                'type' => 'number'
        ) );

        // Post categories to include
        $wp_customize->add_setting( 
            'set_category_include', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_include', 
            array(
                'label' => __( 'Post categories to include', 'wp-cdsl' ),
                'description' => __( 'Comma separated values or single category ID', 'wp-cdsl' ),
                'section' => 'sec_blog',
                'type' => 'text'
        ) );	

        // Post categories to exclude
        $wp_customize->add_setting( 
            'set_category_exclude', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_exclude', 
            array(
                'label' => __( 'Post categories to exclude', 'wp-cdsl' ),
                'description' => __( 'Comma separated values or single category ID', 'wp-cdsl' ),			
                'section' => 'sec_blog',
                'type' => 'text'
        ) );            
}
add_action( 'customize_register', 'wpcdsl_customizer' );