<?php
global $vc_add_css_animation;
global $painting_fonts_array;

vc_map( array(
     "name" => esc_html__("Headings", 'locksmith'),
     "base" => "painting_headings",
     "content_element" => true,
  "category"=> esc_html__("Webdevia", 'locksmith'),
     "is_container" => FALSE,
     "params" => array(
          array(
               "heading" => esc_html__("Title", 'locksmith'),
               "type" => "textfield",
               'value' => 'I am a title change me',
               "param_name" => "headings_title",
          ),
          array(
               "heading" => esc_html__("Title Tag", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_title_tag",
               "value" => array( 'H2 (Default)' => 'h2',
                                 'H1' => 'h1',
                                 'H3' => 'h3',
                                 'H4' => 'h4',
                                 'H5' => 'h5',
                                 'H6' => 'h6'),
          ),
          array(
               "heading" => esc_html__("subtitle", 'locksmith'),
               "type" => "textfield",
               'value' => 'I am a subtitle change me',
               "param_name" => "headings_subtitle",
          ),
          array(
               "heading" => esc_html__("Subtitle Tag", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_subtitle_tag",
               "value" => array('H4 (Default)' => 'h4',
                                                       'H1' => 'h1',
                                                       'H2' => 'h2',
                                                       'H3' => 'h3',
                                                       'H5' => 'h5',
                                                       'H6' => 'h6',
                                                       'P' => 'p',
                                                       'Div' => 'div'),
          ),
          array(
               "heading" => esc_html__("Layout", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_layout",
               "value" => array('Subtitle under the title' => "s-under-t",
                                   'Title under the subtitle' => "t-under-s",
                                   'Subtitle behind the  title' => "s-behind-t",
                                   'Title only' => "t-only"),
          ),
          array(
               "heading" => esc_html__("Alignment", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_alignment",
               "value" => array('Center' => "center",
                                'Left' => "left",
                                                        'Right' => "right" ),
          ),
          array(
               "heading" => esc_html__("Separator Type", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_separator",
               "value" => array('No separator' => "none",
                                'Border' => "border",
                                                        'Image' => "image" )
          ),
          
		  array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'locksmith' ),
			'param_name' => 'painting_separateur_image',
			"dependency" => Array("element" => "headings_separator", "value" => array('image')),
		),
          array(
               "heading" => esc_html__("Separator Position", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_separator_position",
               "value" => array('Center' => "center",
                                'Top' => "top",
                                                        'Bottom' => "bottom" ),
               "dependency" => Array("element" => "headings_separator", "value" => array('border', 'image')),
          ),
          array(
               "heading" => esc_html__("Border Style", 'locksmith'),
               "type" => "dropdown",
               "param_name" => "headings_separator_border_style",
               "value" => array('Solid' => "solid",
                                'Dashed' => "dashed",
                                                        'Dotted' => "dotted" ),
               "dependency" => Array("element" => "headings_separator", "value" => array('border')),
          ),
          array(
               "type" => "colorpicker",
               "heading" => esc_html__("Border Color", 'locksmith'),
               "param_name" => "headings_separator_border_color",
               "value" => "#DB4436",
               "dependency" => Array("element" => "headings_separator", "value" => array('border')),
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Border Width", 'locksmith'),
               "param_name" => "headings_separator_border_width",
               "value" => "3px",
               "dependency" => Array("element" => "headings_separator", "value" => array('border')),
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Margin between Title and subtitle", 'locksmith'),
               "param_name" => "painting_heading_spacing",
          ),



          //////////// Typography
          array(
               "type" => "dropdown",
               "heading" => esc_html__("Font Family", 'locksmith'),
               "param_name" => "painting_heading_font_family",
               'value' => $painting_fonts_array,
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Style", 'locksmith'),
               "param_name"   =>   "painting_heading_font_style",
               'value' => array(
                    esc_html__('Normal', 'locksmith')  =>   'normal',
                    esc_html__('Italic','locksmith')        =>   'italic',
                    esc_html__('Inherit','locksmith')       =>   'inherit',
                    esc_html__('Initial','locksmith')       =>   'initial',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Weight", 'locksmith'),
               "param_name"   =>   "painting_heading_font_weight",
               'value' => array(
                    esc_html__('Default', 'locksmith') =>   '400',
                    '100'     =>   '100',
                    '200'     =>   '200',
                    '300'     =>   '300',
                    '500'     =>   '500',
                    '600'     =>   '600',
                    '700'     =>   '700',
                    '800'     =>   '800',
                    '900'     =>   '900',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Font Size", 'locksmith'),
               "param_name" => "painting_heading_font_size",
               "min" => 14,
               "suffix" => "px",
               "group" => "Typography",
          ),
          array(
               "type" => "colorpicker",
               "class" => "",
               "heading" => esc_html__("Font Color", 'locksmith'),
               "param_name" => "painting_heading_color",
               "value" => "",
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading" => esc_html__("Text Transform", 'locksmith'),
               "param_name" => "painting_heading_text_transform",
               'value' => array(
                    esc_html__('Default', 'locksmith') =>   'None',
                    'lowercase'    =>   'Lowercase',
                    'uppercase'    =>   'Uppercase',
                    'capitalize'   =>   'Capitalize',
                    'inherit' =>   'Inherit',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Line Height", 'locksmith'),
               "param_name" => "painting_heading_line_height",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Letter spacing", 'locksmith'),
               "param_name" => "painting_heading_letter_spacing",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),
          /////// Sub Title
          array(
               "type" => "dropdown",
               'value' => $painting_fonts_array,
               "heading" => esc_html__("Font Family", 'locksmith'),
               "param_name" => "painting_sub_heading_font_family",
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Style", 'locksmith'),
               "param_name"   =>   "painting_sub_heading_font_style",
               'value' => array(
                    esc_html__('Normal', 'locksmith')  =>   'normal',
                    esc_html__('Italic','locksmith')        =>   'italic',
                    esc_html__('Inherit','locksmith')       =>   'inherit',
                    esc_html__('Initial','locksmith')       =>   'initial',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Weight", 'locksmith'),
               "param_name"   =>   "painting_sub_heading_font_weight",
               'value' => array(
                    esc_html__('Default', 'locksmith') =>   '400',
                    '100'     =>   '100',
                    '200'     =>   '200',
                    '300'     =>   '300',
                    '500'     =>   '500',
                    '600'     =>   '600',
                    '700'     =>   '700',
                    '800'     =>   '800',
                    '900'     =>   '900',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Font Size", 'locksmith'),
               "param_name" => "painting_sub_heading_font_size",
               "min" => 14,
               "suffix" => "px",
               "group" => "Typography",
          ),
          array(
               "type" => "colorpicker",
               "class" => "",
               "heading" => esc_html__("Font Color", 'locksmith'),
               "param_name" => "painting_sub_heading_color",
               "value" => "",
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading" => esc_html__("Text Transform", 'locksmith'),
               "param_name" => "painting_sub_heading_text_transform",
               'value' => array(
                    esc_html__('Default', 'locksmith') =>   'None',
                    'lowercase'    =>   'Lowercase',
                    'uppercase'    =>   'Uppercase',
                    'capitalize'   =>   'Capitalize',
                    'inherit' =>   'Inherit',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Line Height", 'locksmith'),
               "param_name" => "painting_sub_heading_line_height",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Letter spacing", 'locksmith'),
               "param_name" => "painting_sub_heading_letter_spacing",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),

          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Extra class name", 'locksmith'),
               "param_name" => "heading_extraclass",
               "value" => "",
          ),


          $vc_add_css_animation

     )
) );