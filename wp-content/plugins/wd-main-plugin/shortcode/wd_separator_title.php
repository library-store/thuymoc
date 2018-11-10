<?php 
function wd_separator_title($atts) {
           
  extract( shortcode_atts( array(
  
    'wd_title' => 'this is a title',
    'wd_subtitle'=>'this is a subtitle',
    'wd_separator_layout' => 'wd-layout_1',
    'wd_separator_title_color' => '#222',
    'wd_separator_sub_title_color' => '#ff0000',
    'wd_separator_style' => 'wd-title-section_c',
    'css_animation' => 'no'
    
  ), $atts ) );

    $wd_title = str_replace("/n","<br/>", $wd_title);

  $animation_classes =  "";
    $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

  ob_start(); ?>


<div class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
  <div class="large-12 <?php if($wd_separator_layout == "wd-layout_1"){ echo "columns";}?> <?php echo esc_attr($animation_classes) . ' ' . esc_attr($wd_separator_style). ' ' . esc_attr($wd_separator_layout) ; ?>" <?php echo esc_attr($data_animated); ?><?php if($wd_separator_layout == "wd-layout_1"){ echo "columns";}?>>
  <?php if($wd_separator_layout == "wd-layout_1") {?>

    <?php if ($wd_title != "") { ?>
    <h2><?php echo $wd_title ?></h2>
  <?php  } ?>
  <?php if ($wd_title != "") { ?>
    <h5><?php echo $wd_subtitle ?></h5>

  <?php } } else {?>
    <?php if ($wd_title != "") { ?>
      <div class="subtitle-content">
        <h5 style="color:<?php echo $wd_separator_sub_title_color;?>"><?php echo $wd_subtitle ?></h5>
        <hr>
      </div>
      <?php  } ?>
    <?php if ($wd_title != "") { ?>
      <h2 style="color:<?php echo $wd_separator_title_color;?>"><?php echo $wd_title ?></h2>
  <?php } }?>
  
  </div>
</div>

  
<?php return ob_get_clean();
}
add_shortcode( 'wd_separator_title', 'wd_separator_title' );