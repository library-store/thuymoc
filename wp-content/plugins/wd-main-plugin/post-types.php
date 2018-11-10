<?php

define("PLUGIN_NAME", "wd_main");

/*-------------- portfolio custom posttyp -----------------------*/
 if( ! function_exists('wd_portfolio_posttype')):
  function wd_portfolio_posttype() {
    register_post_type( 'portfolio',
      array(
        'labels' => array(
          'name' => __( 'Portfolio', PLUGIN_NAME ),
          'singular_name' => __( 'portfolio', PLUGIN_NAME ),
          'add_new' => __( 'Add New Portfolio Item', PLUGIN_NAME ),
          'add_new_item' => __( 'Add New Portfolio Item', PLUGIN_NAME ),
          'edit_item' => __( 'Edit portfolio', PLUGIN_NAME ),
          'new_item' => __( 'Add New Portfolio Item', PLUGIN_NAME ),
          'view_item' => __( 'View Portfolio Item', PLUGIN_NAME ),
          'search_items' => __( 'Search Portfolio Item', PLUGIN_NAME ),
          'not_found' => __( 'No Portfolio Item found', PLUGIN_NAME ),
          'not_found_in_trash' => __( 'No Portfolio Item found in trash', PLUGIN_NAME )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'thumbnail', 'comments','editor'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "portfolio"), // Permalinks format
        'menu_position' => 5
      )
    );
    register_taxonomy( 'projet', 'portfolio', array( 'hierarchical' => true,
											                               'label' => 'Categories',
											                               'query_var' => true,
											                               'show_ui' => true,
											                               'rewrite' => true ) );
  }
  add_action( 'init', 'wd_portfolio_posttype' );
endif;

//----------------------- Custom type Slider -----------------
if( ! function_exists('wd_slider_posttype')):
  function wd_slider_posttype() {
    register_post_type( 'wd-slider',
      array(
        'labels' => array(
          'name' => __( 'slides', PLUGIN_NAME ),
          'singular_name' => __( 'Slide', PLUGIN_NAME ),
          'add_new' => __( 'Add New Slide', PLUGIN_NAME ),
          'add_new_item' => __( 'Add New Slide', PLUGIN_NAME ),
          'edit_item' => __( 'Edit Slide', PLUGIN_NAME ),
          'new_item' => __( 'Add New Slider', PLUGIN_NAME ),
          'view_item' => __( 'View Slide', PLUGIN_NAME ),
          'search_items' => __( 'Search Slide', PLUGIN_NAME ),
          'not_found' => __( 'No Slide found', PLUGIN_NAME ),
          'not_found_in_trash' => __( 'No Slide found in trash', PLUGIN_NAME )
        ),
        'public' => true,
        'menu_icon'           =>      'dashicons-slides',
        'supports' => array( 'title'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "wd-slider"), // Permalinks format
        'menu_position' => 5
      )
    );
    /*register_taxonomy( 'projet', 'portfolio', array( 'hierarchical' => true,
                               'label' => 'categories', 
                               'query_var' => true, 
                               'rewrite' => true ) );*/
  }
  add_action( 'init', 'wd_slider_posttype' );
endif;

//----------------------- Custom type Team Member -----------------
if( ! function_exists('wd_teammember_posttype')):
  function wd_teammember_posttype() {
    register_post_type( 'team-member',
      array(
        'labels' => array(
          'name' => __( 'Team Members', PLUGIN_NAME ),
          'singular_name' => __( 'team member', PLUGIN_NAME ),
          'add_new' => __( 'Add New Team Member', PLUGIN_NAME ),
          'add_new_item' => __( 'Add New Team Member', PLUGIN_NAME ),
          'edit_item' => __( 'Edit Team Member', PLUGIN_NAME ),
          'new_item' => __( 'Add New Team Member', PLUGIN_NAME ),
          'view_item' => __( 'View Team Member', PLUGIN_NAME ),
          'search_items' => __( 'Search Team Member', PLUGIN_NAME ),
          'not_found' => __( 'No Team Member found', PLUGIN_NAME ),
          'not_found_in_trash' => __( 'No Team Member found in trash', PLUGIN_NAME )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array( 'title'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "team-member"), // Permalinks format
        'menu_position' => 5
      )
    );
  }
  add_action( 'init', 'wd_teammember_posttype' );
endif;
//----------------------- Custom type Testimonials -----------------
if( ! function_exists('wd_testimonials_posttype')):
  function wd_testimonials_posttype() {
    register_post_type( 'testimonials',
      array(
        'labels' => array(
          'name' => __( 'Testimonials', PLUGIN_NAME ),
          'singular_name' => __( 'testimonial', PLUGIN_NAME ),
          'add_new' => __( 'Add New Testimonial', PLUGIN_NAME ),
          'add_new_item' => __( 'Add New Testimonial', PLUGIN_NAME ),
          'edit_item' => __( 'Edit Testimonial', PLUGIN_NAME ),
          'new_item' => __( 'Add New Testimonial', PLUGIN_NAME ),
          'view_item' => __( 'View Testimonial', PLUGIN_NAME ),
          'search_items' => __( 'Search Testimonial', PLUGIN_NAME ),
          'not_found' => __( 'No Testimonials found', PLUGIN_NAME ),
          'not_found_in_trash' => __( 'No Testimonials found in trash', PLUGIN_NAME )
        ),
        'public' => true,
        'menu_icon' 					=> 			'dashicons-format-quote',
        'supports' => array( 'title', 'excerpt'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "testimonials"), // Permalinks format
        'menu_position' => 5
      )
    );
  }
  add_action( 'init', 'wd_testimonials_posttype' );
endif;