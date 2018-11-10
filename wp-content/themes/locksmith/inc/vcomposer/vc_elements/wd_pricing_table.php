<?php 

global $vc_add_css_animation;
vc_map( array(
    "name"            => esc_html__("Pricing Table", 'locksmith'), // add a name
    "base"            => "wd_pricing_table", // bind with our shortcode
  "category"=> esc_html__("Webdevia", 'locksmith'),
    "description"     => "You can add a prince table",
    "content_element" => true, // set this parameter when element will has a content
    "is_container"    => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'locksmith'),
            "param_name" => "title",
        ),

      array(
        "type" => "param_group",
        "heading" => esc_html__("Service Name & Price", 'locksmith'),
        "param_name" => "tible_services",
        'value' => urlencode( json_encode( array(
          array(
            'Service_name' => 'Lock Re-Keys',
            'service_price' => '$35',
          ),
          array(
            'Service_name' => 'Lock Re-Keys',
            'service_price' => '$35',
          ),


        ) ) ),
        'params' => array(
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Service Name', 'locksmith' ),
            'param_name' => 'service_name',
            'description' => esc_html__( 'Enter Line text.', 'locksmith' ),
            'admin_label' => true,
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Service Price', 'locksmith' ),
            'param_name' => 'service_price',
            'description' => esc_html__( 'Enter Price.', 'locksmith' ),
            'admin_label' => true,
          ),
        ),
      ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", 'locksmith'),
            "param_name" => "button_text",
            "value" => "Buy Now",
        ), 
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Button Link", 'locksmith'),
            "param_name" => "button_link",
        ), 


        $vc_add_css_animation
    )
) );