<?php 
function wd_pricing_table($atts) {
           
  extract( shortcode_atts( array(
    'title'       => 'Standard',
    'tible_services' => '',
    'button_text' => 'Buy Now',
    'button_link' => '#',

    'css_animation' => 'no'
  ), $atts ) );

    $animation_classes =  "";
    $data_animated = "";
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }
  
  ob_start();
  $services = vc_param_group_parse_atts( $tible_services );
$service_link = vc_build_link($button_link);

  ?>
  <ul class="pricing-table <?php  esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
    <li class="title"><?php echo $title; ?></li>
    <?php
    foreach ($services as $value=>$keys) {
      ?>
      <li class="row locksmith-services" >
        <div class="large-8 small-8 columns service-name"><?php echo esc_html($keys['service_name']) ?></div>
        <div class="large-4 small-4 columns service-price" ><?php echo esc_html($keys['service_price']) ?></div>
      </li>

    <?php
    }

    ?>

    
    <li class="cta-button columns">
      <a href="<?php echo $service_link['url']; ?>" class="button"><?php echo $button_text; ?></a>
    </li>
  </ul>
<?php return ob_get_clean();
}
add_shortcode( 'wd_pricing_table', 'wd_pricing_table' );