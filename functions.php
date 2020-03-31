<?php
define( 'DISALLOW_FILE_EDIT', true );
add_theme_support('menus', 'post-thumbnails');
require_once dirname( __FILE__ ) . '/CMB2/init.php';
// Hook in and add metabox
function blog_register_metabox() {
  $prefix = 'cg_post_';
  $compareMetabox = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Post Customization', 'cg' ),
    'object_types'  => array( 'work', 'post'),
  ));
  $compareMetabox->add_field( array (
    'name'       => __( 'Header Gradient Colour', 'cg' ),
    'id'         => $prefix . 'header_color',
    'descriptiom'=> 'enter as three comma seperated decimal values "255,255,255"',
    'type'       => 'text',
  ));
  $compareMetabox->add_field( array (
    'name'       => __( 'Logo URL', 'cg' ),
    'id'         => $prefix . 'logo_url',
    'type'       => 'text',
  ));
  $compareMetabox->add_field( array (
    'name'       => __( 'Priority', 'cg' ),
    'descriptiom'=> 'Lower numbers appear higher on the page',
    'id'         => $prefix . 'priority',
    'type'       => 'text',
  ));
}
add_action( 'cmb2_admin_init', 'blog_register_metabox' );

function create_work() {
  register_post_type( 'work',
    array(
      'labels' => array(
        'name' => __( 'Works' ),
        'singular_name' => __( 'Work' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )

    )
  );
}
add_action( 'init', 'create_work' );

function add_work_taxonomies() {
  register_taxonomy('skill', 'work', array(
    'hierarchical' => false,
    'labels' => array(
      'name' => _x( 'Skill', 'taxonomy general name' ),
      'singular_name' => _x( 'Skill', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Skills' ),
      'all_items' => __( 'All Skills' ),
      'parent_item' => __( 'Parent Skill' ),
      'parent_item_colon' => __( 'Parent Skill:' ),
      'edit_item' => __( 'Edit Skill' ),
      'update_item' => __( 'Update Skill' ),
      'add_new_item' => __( 'Add New Skill' ),
      'new_item_name' => __( 'New Skill Name' ),
      'menu_name' => __( 'Skills' ),
    ),
    'rewrite' => array(
      'slug' => 'skill',
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
  register_taxonomy('employer', 'work', array(
    'hierarchical' => false,
    'labels' => array(
      'name' => _x( 'Employer', 'taxonomy general name' ),
      'singular_name' => _x( 'Employer', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Employers' ),
      'all_items' => __( 'All Employers' ),
      'parent_item' => __( 'Parent Employer' ),
      'parent_item_colon' => __( 'Parent Employer:' ),
      'edit_item' => __( 'Edit Employer' ),
      'update_item' => __( 'Update Employer' ),
      'add_new_item' => __( 'Add New Employer' ),
      'new_item_name' => __( 'New Employer Name' ),
      'menu_name' => __( 'Employers' ),
    ),
    'rewrite' => array(
      'slug' => 'hello',
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_work_taxonomies', 0 );

function register_theme_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu')
        )
    );
}
add_action('init', 'register_theme_menus');

function sa_theme_styles() {
  wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/reset.css'  );
  wp_enqueue_style( 'colorbox_css', get_template_directory_uri() . '/css/colorbox.min.css'  );
  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css', array( 'dashicons' ) );
  wp_enqueue_style( 'font_awesome_css', get_template_directory_uri() . '/css/fontawesome.min.css' );

  //google fonts
  wp_enqueue_style( 'google_font_1', 'https://fonts.googleapis.com/css?family=Lato:300,300i,700,700i|Montserrat:700,700i');


}
add_action( 'wp_enqueue_scripts', 'sa_theme_styles' );

function sa_theme_scripts() {
  wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', true );
  wp_enqueue_script( 'app_js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );
	wp_enqueue_script( 'colorbox_js', get_template_directory_uri() . '/js/colorbox.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'jasmin', 'https://cdnjs.cloudflare.com/ajax/libs/jasmine/3.0.0/jasmine.min.js', '', true);
}
add_action( 'wp_enqueue_scripts', 'sa_theme_scripts' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_theme_support( 'post-thumbnails' );
/*
function md_footer_enqueue_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', 'md_footer_enqueue_scripts');
*/
function add_excerpts() {
     add_post_type_support( 'page', 'excerpt' );
     add_post_type_support( 'post', 'excerpt' );
}
add_action( 'init', 'add_excerpts' );

add_action( 'widgets_init', 'sa_green_widgets_init' );
function sa_green_widgets_init() {
    register_sidebar( array(
      'name' => __( 'Footer Spot 1', 'sa-portfolio' ),
      'id' => 'footer-spot-1',
      'description' => __( 'Widgets in this area will be shown in the footer.', 'sa-portfolio' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h6>',
      'after_title'   => '</h6>',
    ) );
    register_sidebar( array(
      'name' => __( 'Footer Spot 2', 'sa-portfolio' ),
      'id' => 'footer-spot-2',
      'description' => __( 'Widgets in this area will be shown in the footer.', 'sa-portfolio' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h6>',
      'after_title'   => '</h6>',
    ) );
    register_sidebar( array(
      'name' => __( 'Footer Spot 3', 'sa-portfolio' ),
      'id' => 'footer-spot-3',
      'description' => __( 'Widgets in this area will be shown in the footer.', 'sa-portfolio' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h6>',
      'after_title'   => '</h6>',
    ) );
	register_sidebar( array(
    'name' => __( 'Main Sidebar', 'sa-portfolio' ),
    'id' => 'main-sidebar-1',
    'description' => __( 'Widgets in this area will be shown in the default sidebar.', 'sa-portfolio' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
}

class SA_Portfolio_Customize {
  public static function register ( $wp_customize ) {
    //Define Sections
    $wp_customize->add_section( 'analytics_options',
      array(
        'title' => __( 'Analytics', 'sa_portfolio' ),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'description' => __('Automatically add analytics to your site by entering your code here.', 'sa_portfolio'),
      )
    );
    $wp_customize->add_section( 'social_options',
      array(
        'title' => __( 'Contact and Social', 'sa_portfolio' ),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'description' => __('Enter your social media links here.', 'sa_portfolio'),
      )
    );
    //Add Settings
    $wp_customize->add_setting( 'cg_header_logo');
    $wp_customize->add_setting( 'header_bgcolor',
      array('default'=> '#ffffff')
    );
    $wp_customize->add_setting( 'background_color',
      array(
        'default' => '#f8f8f8',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'link_textcolor',
      array(
        'default' => '#00a6ba',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'footer_textcolor',
      array(
        'default' => '#888888',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'footer_bgcolor',
      array(
        'default' => '#444444',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );

    // Analytics
    $wp_customize->add_setting( 'ga_code',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );

    /* SOCIAL MEDIA */
    $wp_customize->add_setting( 'facebook_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'googleplus_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'twitter_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'instagram_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'pinterest_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'youtube_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_setting( 'linkedin_url',
      array(
        'default' => '',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
      )
    );
    /**
     * Define controls
     **/
    $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      'sa_portfolio_header_logo',
      array(
        'label' => __( 'Header Logo', 'sa_portfolio' ),
        'section' => 'title_tagline',
        'settings' => 'cg_header_logo',
        'priority' => 5,
      )
    ) );
    // colour controls
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      'sa_portfolio_header_bgcolor',
      array(
        'label' => __( 'Header BG Colour', 'sa_portfolio' ),
        'section' => 'colors',
        'settings' => 'header_bgcolor',
        'priority' => 6,
      )
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      'sa_portfolio_bgcolor',
      array(
        'label' => __( 'Background Color', 'sa_portfolio' ),
        'section' => 'colors',
        'settings' => 'background_color',
        'priority' => 9,
      )
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      'sa_portfolio_link_textcolor',
      array(
        'label' => __( 'Link Colour', 'sa_portfolio' ),
        'section' => 'colors',
        'settings' => 'link_textcolor',
        'priority' => 10,
      )
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      'sa_portfolio_footer_textcolor',
      array(
        'label' => __( 'Footer Text Colour', 'sa_portfolio' ),
        'section' => 'colors',
        'settings' => 'footer_textcolor',
        'priority' => 10,
      )
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      'sa_portfolio_footer_bgcolor',
      array(
        'label' => __( 'Footer Background Colour', 'sa_portfolio' ),
        'section' => 'colors',
        'settings' => 'footer_bgcolor',
        'priority' => 12,
      )
    ) );
    //Analytics
    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_ga_code',
      array(
        'label' => __( 'Google Analytics Code', 'sa_portfolio' ),
        'section' => 'analytics_options',
        'settings' => 'ga_code',
        'priority' => 9,
      )
    ) );

    /* SOCIAL MEDIA & CONTACT */

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_cg_phone',
      array(
        'label' => __( 'Phone Number', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'cg_phone',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_facebook_url',
      array(
        'label' => __( 'Facebook profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'facebook_url',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_twitter_url',
      array(
        'label' => __( 'Twitter profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'twitter_url',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_googleplus_url',
      array(
        'label' => __( 'Google Plus profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'googleplus_url',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_linkedin_url',
      array(
        'label' => __( 'Linked In profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'linkedin_url',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_youtube_url',
      array(
        'label' => __( 'Youtube profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'youtube_url',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_instagram_url',
      array(
        'label' => __( 'Instagram profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'instagram_url',
        'priority' => 9,
      )
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'sa_portfolio_pinterest_url',
      array(
        'label' => __( 'Pinterest profile URL', 'sa_portfolio' ),
        'section' => 'social_options',
        'settings' => 'pinterest_url',
        'priority' => 9,
      )
    ) );
    /* END SOCIAL MEDIA */
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
  }

  public static function header_output() {
  ?>
  <!--Customizer CSS-->
  <style type="text/css">
    <?php
    //Default Colors
    self::generate_css('.lights-on header', 'background-color', 'header_bgcolor');
    self::generate_css('.lights-on body', 'background-color', 'background_color', '#');
    self::generate_css('.lights-on a', 'color', 'link_textcolor');
    self::generate_css('.lights-on footer', 'background-color', 'footer_bgcolor');
    self::generate_css('.lights-on footer .footer-copyright span', 'color', 'footer_textcolor');
    ?>
  </style>
  <!--/Customizer CSS-->
  <?php
  }

  public static function live_preview() {
    wp_enqueue_script(
      'sa-portfolio-themecustomizer',
      get_template_directory_uri() . '/js/theme-customizer-4.js',
      array(  'jquery', 'customize-preview' ),
      '',
      true
    );
  }

  /**
   * This will generate a line of CSS for use in header output. If the setting
   * ($mod_name) has no defined value, the CSS will not be output.
   */
  public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
    $return = '';
    $mod = get_theme_mod($mod_name);
    if ( ! empty( $mod ) ) {
      $return = sprintf('%s { %s:%s; }',
        $selector,
        $style,
        $prefix.$mod.$postfix
      );
      if ( $echo ) {
        echo $return;
      }
    }

    return $return;
  }
}

function get_the_category_bytax( $id = false, $tcat = 'category' ) {
  $categories = get_the_terms( $id, $tcat );
  if ( ! $categories )
    $categories = array();

  $categories = array_values( $categories );

  foreach ( array_keys( $categories ) as $key ) {
    _make_cat_compat( $categories[$key] );
  }

  return apply_filters( 'get_the_categories', $categories );
}

add_action( 'customize_register' , array( 'SA_Portfolio_Customize' , 'register' ) );
add_action( 'wp_head' , array( 'SA_Portfolio_Customize' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'SA_Portfolio_Customize' , 'live_preview' ) );
add_action( 'init', 'exclude_images_from_search_results' );

function exclude_images_from_search_results() {
	global $wp_post_types;

	$wp_post_types['attachment']->exclude_from_search = true;
}
