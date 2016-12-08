<?php

function saw_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'strunk-and-white');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'strunk-and-white');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'strunk-and-white');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'strunk-and-white');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'strunk-and-white');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'strunk-and-white');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'strunk-and-white');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'strunk-and-white');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'strunk-and-white');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'strunk-and-white' ),
      'description' => __( 'Controls the basic settings for the theme.', 'strunk-and-white' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'strunk-and-white' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'strunk-and-white' ),
  ) ); 
  $wp_customize->add_panel( 'color_choices', array(
      'priority' => 30,
      'theme_supports' => '',
      'title' => __( 'Color Choices', 'strunk-and-white' ),
      'description' => __( 'Controls the color settings for the theme.', 'strunk-and-white' ),
  ) ); 
  $wp_customize->add_panel( 'typography_settings', array(
      'priority' => 40,
      'theme_supports' => '',
      'title' => __( 'Typography', 'strunk-and-white' ),
      'description' => __( 'Controls the fonts for the theme.', 'strunk-and-white' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// GENERAL SETTINGS PANEL ........................................ //



// DESIGN SETTINGS PANEL ........................................ //

  // Add Custom Logo Settings

  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','strunk-and-white'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'saw_logo',
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
               'label'      => __( 'Change Logo', 'strunk-and-white' ),
               'section'    => 'custom_logo',
               'settings'   => 'saw_logo',
               'context'    => 'saw-custom-logo' 
           )
       )
   ); 



// COLOR CHOICES PANEL ........................................ //


// Text Colors

  $wp_customize->add_section( 'text_colors' , array(
    'title'      => __('Text Colors','strunk-and-white'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'saw_h_color',
      array(
          'default'         => '#333333',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_h_color',
           array(
               'label'      => __( 'Headings Color', 'strunk-and-white' ),
               'section'    => 'text_colors',
               'settings'   => 'saw_h_color' 
           )
       )
   );

  $wp_customize->add_setting(
      'saw_p_color',
      array(
          'default'         => '#333333',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_p_color',
           array(
               'label'      => __( 'Paragraph Color', 'strunk-and-white' ),
               'section'    => 'text_colors',
               'settings'   => 'saw_p_color' 
           )
       )
   );


// Accent Color

  $wp_customize->add_section( 'accent_color' , array(
    'title'      => __('Accent Color','strunk-and-white'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'saw_accent_color',
      array(
          'default'         => '#29abe2',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_accent_color',
           array(
               'label'      => __( 'Links, buttons, and rollovers', 'strunk-and-white' ),
               'section'    => 'accent_color',
               'settings'   => 'saw_accent_color' 
           )
       )
   ); 


// TYPOGRAPHY PANEL ........................................ //

// H1 Fonts

  $wp_customize->add_section( 'custom_h_fonts' , array(
    'title'      => __('Heading Styles','strunk-and-white'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  
 
$wp_customize->add_setting(
      'saw_h_font_type',
      array(
          'default'         => 'Alegreya',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_h_font_type',
            array(
                'label'          => __( 'Font', 'strunk-and-white' ),
                'section'        => 'custom_h_fonts',
                'settings'       => 'saw_h_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Lora'       => 'Lora',
                  'Droid Serif' => 'Droid Serif',
                  'Playfair Display'    => 'Playfair Display',
                  'Lato'         => 'Lato',
                  'Libre Baskerville' => 'Libre Baskerville',
                  'Alegreya' => 'Alegreya',
                  'Lora'         => 'Lora',
                  'Josefin Slab'   => 'Josefin Slab',
                  'Open Sans'      => 'Open Sans',
                  'Lato'   => 'Lato'
                )
            )
        )       
   );


// Nav Fonts

  $wp_customize->add_section( 'custom_nav_fonts' , array(
    'title'      => __('Navigation Text Styles','strunk-and-white'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  
 
  $wp_customize->add_setting(
      'saw_nav_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_nav_font_size',
            array(
                'label'          => __( 'Font Size', 'strunk-and-white' ),
                'section'        => 'custom_nav_fonts',
                'settings'       => 'saw_nav_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px'
                )
            )
        )       
   );

$wp_customize->add_setting(
      'saw_nav_font_type',
      array(
          'default'         => 'Open Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_nav_font_type',
            array(
                'label'          => __( 'Font', 'strunk-and-white' ),
                'section'        => 'custom_nav_fonts',
                'settings'       => 'saw_nav_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Lora'       => 'Lora',
                  'Droid Serif' => 'Droid Serif',
                  'Playfair Display'    => 'Playfair Display',
                  'Lato'         => 'Lato',
                  'Libre Baskerville' => 'Libre Baskerville',
                  'Alegreya' => 'Alegreya',
                  'Lora'         => 'Lora',
                  'Josefin Slab'   => 'Josefin Slab',
                  'Open Sans'      => 'Open Sans',
                  'Lato'   => 'Lato'
                )
            )
        )       
   );

 // Paragraph Fonts

   $wp_customize->add_section( 'custom_p_fonts' , array(
    'title'      => __('Paragraph Styles','strunk-and-white'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  

   $wp_customize->add_setting(
      'saw_p_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_size',
            array(
                'label'          => __( 'Font Size', 'strunk-and-white' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'saw_p_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '12'   => '12px',
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px',
                  '22'   => '22px'
                )
            )
        )       
   ); 


   $wp_customize->add_setting(
      'saw_p_font_type',
      array(
          'default'         => 'Alegreya',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_p_font_type',
            array(
                'label'          => __( 'Font', 'strunk-and-white' ),
                'section'        => 'custom_p_fonts',
                'settings'       => 'saw_p_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Lora'       => 'Lora',
                  'Droid Serif' => 'Droid Serif',
                  'Playfair Display'    => 'Playfair Display',
                  'Lato'         => 'Lato',
                  'Libre Baskerville' => 'Libre Baskerville',
                  'Alegreya' => 'Alegreya',
                  'Lora'         => 'Lora',
                  'Josefin Slab'   => 'Josefin Slab',
                  'Open Sans'      => 'Open Sans',
                  'Lato'   => 'Lato'
                )
            )
        )       
   );

  
   // Button Text Settings

  $wp_customize->add_section( 'button_styles' , array(
    'title'      => __('Button Styles','strunk-and-white'), 
    'panel'      => 'typography_settings',
    'priority'   => 120    
  ) );  
  $wp_customize->add_setting(
      'saw_button_color',
      array(
          'default'         => '#ffffff',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_button_color',
           array(
               'label'      => __( 'Text Color', 'strunk-and-white' ),
               'section'    => 'button_styles',
               'settings'   => 'saw_button_color' 
           )
       )
   ); 

   $wp_customize->add_setting(
      'saw_button_font_size',
      array(
          'default'         => '14px',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text' 
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_button_font_size',
            array(
                'label'          => __( 'Font Size', 'strunk-and-white' ),
                'section'        => 'button_styles',
                'settings'       => 'saw_button_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '12'   => '12px',
                  '14'   => '14px',
                  '16'   => '16px',
                  '18'   => '18px',
                  '20'   => '20px',
                  '22'   => '22px'
                )
            )
        )       
   ); 



  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','strunk-and-white'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'saw_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'strunk-and-white' ),
                'section'        => 'custom_css_field',
                'settings'       => 'saw_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'saw_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'saw_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function saw_style_header() {

   ?>

<style type="text/css">

h1,
h1 a,
h2,
h2 a,
h3,
h3 a,
h4,
h4 a,
h5,
h5 a,
h6,
h6 a,
h1 a:visited,
h2 a:visited,
h3 a:visited,
h4 a:visited,
h5 a:visited,
h6 a:visited {
  font-family: <?php echo get_theme_mod('saw_h_font_type'); ?>;
  color: <?php echo get_theme_mod('saw_h_color'); ?>;
}

a,
a:visited {
  color: <?php echo get_theme_mod('saw_accent_color'); ?>;
}

p,
li {
	font-size: <?php echo get_theme_mod('saw_p_font_size') . 'px'; ?>;
	color: <?php echo get_theme_mod('saw_p_color'); ?>;
	font-family: <?php echo get_theme_mod('saw_p_font_type'); ?>;
}

.main-navigation li:hover > a,
.main-navigation li.current_page_item a,
.main-navigation li.current-menu-item a,
.main-navigation ul ul a:hover,
.main-navigation ul ul :hover > a  {
  color: <?php echo get_theme_mod('saw_accent_color'); ?>;
}

.main-navigation,
.main-navigation ul,
.main-navigation li,
.main-navigation ul ul li,
.main-navigation ul ul a,
.main-navigation a,
.main-navigation a:visited {
  font-family: <?php echo get_theme_mod('saw_nav_font_type'); ?>;
  font-size: <?php echo get_theme_mod('saw_nav_font_size') . 'px'; ?>;
  color: <?php echo get_theme_mod('saw_p_color'); ?>;
}

.fa:hover {
  color: <?php echo get_theme_mod('saw_accent_color'); ?>;
}

button,
input[type=submit] {
  color: <?php echo get_theme_mod('saw_button_color'); ?>;
  background-color: <?php echo get_theme_mod('saw_accent_color'); ?>;
  font-size: <?php echo get_theme_mod('saw_button_font_size') . 'px'; ?>;
}


  <?php if( get_theme_mod('saw_custom_css') != '' ) {
    echo get_theme_mod('saw_custom_css');
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

function saw_customizer_js() {
  wp_enqueue_script(
    'saw_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'saw_customizer_js' );

?>