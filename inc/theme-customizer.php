<?php

function strunk_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'strunk-and-white-free');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'strunk-and-white-free');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'strunk-and-white-free');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'strunk-and-white-free');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'strunk-and-white-free');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'strunk-and-white-free');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'strunk-and-white-free');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'strunk-and-white-free');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 
  $wp_customize->remove_control('header_image');
  $wp_customize->remove_section('colors');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'strunk-and-white-free' ),
      'description' => __( 'Controls the basic settings for the theme.', 'strunk-and-white-free' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'strunk-and-white-free' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'strunk-and-white-free' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// DESIGN SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','strunk-and-white-free'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'sawfree_logo',
      array(
          'default-image' => get_template_directory_uri() . '/images/strunk-white-logo.png',  
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'strunk-and-white-free' ),
               'section'    => 'custom_logo',
               'settings'   => 'sawfree_logo',
               'context'    => 'sawfree-custom-logo' 
           )
       )
   ); 



 // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','strunk-and-white-free'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'strunk_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'strunk-and-white-free' ),
                'section'        => 'custom_css_field',
                'settings'       => 'strunk_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'strunk_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'strunk_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function strunk_style_header() {

   ?>

<style type="text/css">

  <?php if( get_theme_mod('strunk_custom_css') != '' ) {
    echo get_theme_mod('strunk_custom_css');
  } ?>

  </style>

<?php 

}

// Add theme support for Custom Backgrounds

$defaults = array(
  'default-color' => '#ffffff',
  'default-image' => get_template_directory_uri() . '/images/pier.jpg',  
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function strunk_customizer_js() {
  wp_enqueue_script(
    'strunk_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'strunk_customizer_js' );

?>