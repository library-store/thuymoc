<?php 
if ( !class_exists('locksmith_myCustomFields') ) {

	class locksmith_myCustomFields {
		/**
		* @var  string  $greenenergy_prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $locksmith_prefix = '';
		/**
		* @var  array  $greenenergy_postTypes  An array of public custom post types, plus the standard "post" and "page" - add the custom types you want to include here
		*/
		var $locksmith_postTypes = array( "page", "post", "portfolio", "testimonials", "team-member", "wd-slider");
		/**
		* @var  array  $greenenergy_customFields  Defines the custom fields available
		*/
		var $locksmith_customFields =	array(

		// ---------------------Pages---------------------
			array(
				"name"			=> "locksmith_page_show_title_area",
				"title"			=> "Show title area",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					"yes"		=>	"Yes",
					"no"	=>	"No"
				),
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_page_sub_title",
				"title"			=> "Sub Title",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "text",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_page_title_area_bg_img",
				"title"			=> "Title area background image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-image",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_page_title_position",
				"title"			=> "Title position",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					"left"		=>	"Left",
					"center"	=>	"Center",
					"top"			=>	"Top"
				),
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=>	"locksmith_page_title_color",
				"title"			=>	"<br/> Title color",
				"description"	=>	"",
				"float_left" 	=>	"yes",
				"clear_after" 	=>	"",
				"type"			=>	"colorpicker",
				"scope"			=>	array("page"),
				"capability"	=>	"manage_options",
				"dependency" 	=> ""
			),

			
			
			
		// ---------------------Pages/>---------------------
		// ---------------------Team---------------------
			array(
				"name"			=> "picture",
				"title"			=> "Picture",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-image",
				"scope"			=>	array("team-member"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "description",
				"title"			=> "Description",
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "textarea",
				"scope"			=>	array("team-member"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			
			// ---------------------team/>---------------------
			// ---------------------testimonail---------------------
			array(
				"name"			=> "testimonail_image",
				"title"			=> "Image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-image",
				"scope"			=>	array("testimonials"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "job_title",
				"title"			=> "Job title",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("testimonials"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			// ---------------------testimonail/>---------------------
			// ---------------------video---------------------
			array(
				"name"			=> "video_type",
				"title"			=> "Video type",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					"youtube"		=>	"Youtube",
					"vimeo"	=>	"Vimeo",
					"self_hosted"	=>	"Self Hosted"
				),
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_youtube_link",
				"title"			=> "youtube link",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_youtube_link",
				"title"			=> "youtube link",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_vimeo_id",
				"title"			=> "vimeo",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_video_webm",
				"title"			=> "Video webm",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_video_mp4",
				"title"			=> "Video mp4",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "locksmith_video_ogv",
				"title"			=> "Video ogv",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),

			
			
			// ---------------------video/>---------------------

			// ---------------------Slider---------------------
			array(
				"name"			=> "slide_subtitle",
				"title"			=> "Slide Subtitle",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("wd-slider"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide_description",
				"title"			=> "Slide Description",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "textarea",
				"scope"			=>	array("wd-slider"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide_image",
				"title"			=> "Image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-image",
				"scope"			=>	array("wd-slider"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			
			// ---------------------Slider/>---------------------


		);
		


		function __construct() {
			add_action( 'admin_menu', array( &$this, 'locksmith_createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'locksmith_saveCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			add_action( 'do_meta_boxes', array( &$this, 'locksmith_removeDefaultCustomFields' ), 10, 3 );
			
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function locksmith_removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				foreach ( $this->locksmith_postTypes as $postType ) {
					remove_meta_box( 'postcustom', $postType, $context );
				}
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function locksmith_createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				foreach ( $this->locksmith_postTypes as $postType ) {
					if($postType == "page") {
						add_meta_box( 'my-custom-fields', 'Header Setting', array( &$this, 'locksmith_displayCustomFields' ), 'page', 'advanced', 'high' );
						//add_action( 'edit_form_after_title',  array( &$this,'displayCustomFields') );
						
					}
					if($postType == "team-member") {
						add_meta_box( 'my-custom-fields', 'Team informations', array( &$this, 'locksmith_displayCustomFields' ), 'team-member', 'advanced', 'high' );
					}
					if($postType == "testimonials") {
						add_meta_box( 'my-custom-fields', 'Testimonials image', array( &$this, 'locksmith_displayCustomFields' ), 'testimonials', 'advanced', 'high' );
					}
					if($postType == "post") {
						add_meta_box( 'my-custom-fields', 'Video post format', array( &$this, 'locksmith_displayCustomFields' ), 'post', 'advanced', 'high' );
					}
					if($postType == "wd-slider") {
						add_meta_box( 'my-custom-fields', 'Slide', array( &$this, 'locksmith_displayCustomFields' ), 'wd-slider', 'advanced', 'high' );
					}
				}
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
	
		function locksmith_displayCustomFields() {
			
			global $post;
			global $wdoptions_proya;
			global $fontArrays;
			?>
			<div class="form-wrap">
				<?php
				wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
				foreach ( $this->locksmith_customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$dependency = $customField[ 'dependency' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							default: {
								if ( $post->post_type == $scopeItem ){
									if($dependency != ""){
										foreach ( $dependency as $dependencyKey => $dependencyValue ) {
											foreach ( $dependencyValue as $dependencyVal ) {
												if(isset($wdoptions_proya[$dependencyKey]) && $wdoptions_proya[$dependencyKey] == $dependencyVal){
													$output = true;
													break;
												}
											}
										}
									}else{
										$output = true;
									}
								}else{
									break;
								}
							}
						}
						if ( $output ) break;
					}
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
							<?php
							switch ( $customField[ 'type' ] ) {
								case "checkbox": {
									// Checkbox
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<input type="checkbox" name="' . $this->locksmith_prefix . $customField['name'] . '" id="' . $this->locksmith_prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->locksmith_prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '</div>';
									break;
								}

								case "selectbox": {
									// Selectbox
									if ( $customField[ 'float_left' ] == 'yes' ) {$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left . ' form-required">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<select name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '"> ';
									?>
										<?php foreach ($customField['values'] as $valuesKey => $valuesValue) { ?>
											<option value="<?php echo esc_attr($valuesKey); ?>" <?php if (get_post_meta( $post->ID, $this->locksmith_prefix . $customField['name'], true ) == $valuesKey ) { ?> selected="selected" <?php } ?>><?php echo esc_attr($valuesValue); ?></option>
										<?php } ?>

									<?php
									echo '</select>';
									echo '</div>';
									break;
								}
								case "selectbox-category": {
									$categories = get_categories();
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<select name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '"> ';
										echo '<option value=""></option>';
										foreach($categories as $category) :
											echo '<option value="'. $category->term_id .'"';
											if (get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) == $category->term_id ) { echo 'selected="selected"';}
											echo '>';
											echo esc_attr($category->name);
											?>&nbsp;&nbsp;&nbsp;<?php
											echo '</option>';

										endforeach;
									echo '</select>';
									echo '</div>';
									break;
								}
								case "image-title-image": {
								wp_enqueue_media();

									?>
							    <script type="text/javascript">
							    jQuery(document).ready(function($) {

							    	jQuery('.upload_button').click(function(){
									  wp.media.editor.send.attachment = function(props, attachment){
									    jQuery('.title_image').val(attachment.url);
									  }
									  wp.media.editor.open(this);

									  return false;
									  });

							    });
							    </script>

					    <?php

									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									$locksmith_page_bg_img = get_post_meta($post->ID, 'locksmith_page_title_area_bg_img', true);
									//print $greenenergy_page_bg_img;
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="' . $this->locksmith_prefix . $customField[ 'name' ] .'" name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" class="title_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button button-primary" type="button" value="Upload file"></div>';
									echo '</div>';
									break;
								}
								case "font-family": {
									// Selectbox
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' ">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<select name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '"> ';
									?>
										<option value="" <?php if (get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) == "-1" ) { ?> selected="selected" <?php } ?>>Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									<?php
									echo '</select>';
									echo '</div>';
									break;
								}
								case "colorpicker": {
									

									add_action( 'load-widgets.php', 'locksmith_load_color_picker' );
						      wp_enqueue_style( 'wp-color-picker' );
						      wp_enqueue_script( 'wp-color-picker' );
						      //Colorpicker
									wp_enqueue_media();

							    wp_enqueue_script('wp-color-picker');
							    wp_enqueue_style( 'wp-color-picker' );
							    										    
							    wp_enqueue_script('colorpick',    get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array( 'jquery' ) );
							    wp_enqueue_style ('colorpick',    get_template_directory_uri() . "/stylesheets/bootstrap-colorpicker.min.css");

							    ?>
							    <script type="text/javascript">
							    jQuery(document).ready(function($) {

							    	$('.wd-color-picker').colorpicker(
						          {format: 'rgba'}
						        );

							    	jQuery('#locksmith_upload_btn').click(function(){
									  wp.media.editor.send.attachment = function(props, attachment){
									    jQuery('#locksmith_logo_filed').val(attachment.url);
									  }
									  wp.media.editor.open(this);

									  return false;
									  });

							    });
							    </script>

					    <?php


									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' colorpicker_input">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="colorSelector"><div style="background-color:'.htmlspecialchars( get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) ) .'"></div></div>';
									echo '<input type="text" class="wd-color-picker" data-default-color="#C0392B" name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) ) . '" size="10" maxlength="10" />';
									echo '</div>';
									break;
								}
								case "textarea":
								case "wysiwyg": {
									// Text area
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<textarea name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									// WYSIWYG
									if ( $customField[ 'type' ] == "wysiwyg" ) { ?>
										<script type="text/javascript">
											jQuery( document ).ready( function() {
												jQuery( "<?php echo esc_js($this->locksmith_prefix . $customField[ 'name' ]); ?>" ).addClass( "mceEditor" );
												if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
													tinyMCE.execCommand( "mceAddControl", false, "<?php echo esc_js($this->locksmith_prefix . $customField[ 'name' ]); ?>" );
												}
											});
										</script>
									<?php }
									echo '</div>';
									break;
								}
								case "short-text-200": {
									// Plain text field
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' short_text_200">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '</div>';
									break;
								}
								case "hidden": {

									break;
								}
								default: {
									// Plain text field
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->locksmith_prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->locksmith_prefix . $customField[ 'name' ] . '" id="' . $this->locksmith_prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->locksmith_prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '</div>';
									break;
								}
							}
							?>
							<?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
							<?php if ( $customField[ 'clear_after' ] == 'yes' ) echo '<div class="clear"></div>'; ?>

					<?php
					}
				} ?>
			</div>
			<?php
		}
		


		/**
		* Save the new Custom Fields values
		*/
		function locksmith_saveCustomFields( $post_id, $post ) {
			if ( !isset( $_POST[ 'my-custom-fields_wpnonce' ] ) || !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( ! in_array( $post->post_type, $this->locksmith_postTypes ) )
				return;
			foreach ( $this->locksmith_customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) ) {

					if ( isset( $_POST[ $this->locksmith_prefix . $customField['name'] ] ) && trim( $_POST[ $this->locksmith_prefix . $customField['name'] ] !== '') ) {

						$value = $_POST[ $this->locksmith_prefix . $customField['name'] ];
						// Auto-paragraphs for any WYSIWYG
						if ( $customField['type'] == "wysiwyg" ) $value = wpautop( $value );
						update_post_meta( $post_id, $this->locksmith_prefix . $customField[ 'name' ], $value );
					} else {
						delete_post_meta( $post_id, $this->locksmith_prefix . $customField[ 'name' ] );
					}
				}
			}


		}
		
		

		

	} // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('locksmith_myCustomFields') ) {
	$locksmith_myCustomFields_var = new locksmith_myCustomFields();
}
?>