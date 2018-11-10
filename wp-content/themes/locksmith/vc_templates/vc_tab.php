<?php
/** @var $this WPBakeryShortCode_VC_Tab */
$output = $title = $tab_id = $locksmith_icon = $locksmith_image = $locksmith_image_checkbox = $locksmith_bg_image = $locksmith_bg_position_h =  $locksmith_bg_repeat =  $locksmith_bg_position_v = '';

extract( shortcode_atts( array(
  'locksmith_bg_image' => '',
  'locksmith_bg_position_h' => '',
  'locksmith_bg_position_v' => '',
  'locksmith_bg_repeat' => ""
), $atts ) );


extract(shortcode_atts($this->predefined_atts, $atts));

wp_enqueue_script('jquery_ui_tabs_rotate');
$img_size="";
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix', $this->settings['base'], $atts );
$output .= "\n\t\t\t" . '<div id="tab-'. (empty($tab_id) ? sanitize_title( $title ) : $tab_id) .'" class="'.$css_class. '"';
	if (isset($locksmith_bg_image)) {
		if ($locksmith_bg_image != "") {
			$img_id    = preg_replace( '/[^\d]/', '', $locksmith_bg_image );
			$img       = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => $img_size,'thumb_size' => 'thumbnail') );
			$img_path  = $img['p_img_large'][0];
			$locksmith_bg_position_string = "";
			$locksmith_bg_repeat_string = "";
			if ($locksmith_bg_position_h != "" && $locksmith_bg_position_v != "") {
				$locksmith_bg_position_string = "background-position : " . $locksmith_bg_position_h . " " . $locksmith_bg_position_v . ";";
			}
			if ($locksmith_bg_repeat != "") {
				$locksmith_bg_repeat_string = "background-repeat : " . $locksmith_bg_repeat . ";";
			}
			$output .= ' style="background-image: url(' . $img_path .');' . $locksmith_bg_position_string . ";" . $locksmith_bg_repeat_string . ";" . '
			"';
		}
	}

	

$output .= ">";
$output .= ($content=='' || $content==' ') ? esc_html__("Empty tab. Edit page to add content here.", 'locksmith') : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment('.wpb_tab');

echo $output;