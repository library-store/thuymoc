<?php
if(!function_exists('wd_icon_text')){
  function wd_icon_text($atts) {
              
    extract( shortcode_atts( array(
      'title' => 'Block title',
      'text'  => 'Some text should be here...',
      'icon' => '',
      'layout' => '',
      'extra_classes' => '',
      'image_checkbox' => '',
      'image' => '',
      'icon_txt_url' => '',
      'css_animation' => 'no',
    ), $atts ) );
    

    $img_size="";
    $thumb_size="thumbnail";
    $post_thumbnail="";

    $animation_classes =  "";
    $data_animated = "";

    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }


    ob_start(); ?>


<div class="wd-section-text-icon">
	<?php if($icon_txt_url != '#' or $icon_txt_url!='' ){
    $icon_txt_url_array = vc_build_link( $icon_txt_url );?>
	<a href="<?php esc_attr_e($icon_txt_url_array['url']); ?>">
	<?php } ?>
    <div class="wd-text-icon<?php echo esc_attr($layout) . ' ' . esc_attr($animation_classes) . ' ' . esc_attr($extra_classes); ?>" <?php echo esc_attr($data_animated); ?>>
      <div class="box-icon">
        <?php if ($image_checkbox =='yes'){ ?>
            <?php 
            $img_id = preg_replace( '/[^\d]/', '', $image );
            $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => $img_size,'thumb_size' => 'thumbnail') );
             ?>
            <?php
            $img_path=$img['p_img_large'][0];
             ?>
             <img src="<?php echo $img_path  ?>" alt="icon"/>
          <?php }else { ?>
            <i class="fa <?php echo $icon; ?>"></i>
          <?php } ?>
      </div>
      <div class="box-description">
        <h3><?php echo $title; ?></h3>
        <p>
          <?php echo $text; ?>
        </p>
      </div>
    </div>
	<?php if($icon_txt_url != '#' or $icon_txt_url!='' ){ ?>
		</a>
	<?php }?>
</div>
      



        
      
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_icon_text', 'wd_icon_text' );
}  
?>