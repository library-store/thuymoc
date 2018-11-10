<?php
/*============================= vc-gallery =====================================*/


$attributes = array(
  'type' => 'dropdown',
  'heading' => __( 'Gallery type', 'locksmith' ),
  "category"=> esc_html__("Webdevia", 'locksmith'),
  'param_name' => 'type',
  'value' => array(
    __( 'Flex slider fade', 'locksmith' ) => 'flexslider_fade',
    __( 'Flex slider slide', 'locksmith' ) => 'flexslider_slide',
    __( 'Nivo slider', 'locksmith' ) => 'nivo',
    __( 'Image grid', 'locksmith' ) => 'image_grid',
    __('Carousel', 'locksmith') => 'Carousel',
  ),
  'description' => __( 'Select gallery type.', 'locksmith' ),
);
vc_add_param( 'vc_gallery', $attributes ); // Note: 'vc-gallery' was used as a base for "Message box" element
