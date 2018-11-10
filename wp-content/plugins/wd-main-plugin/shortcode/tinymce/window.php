<?php
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-widget');
wp_enqueue_script('jquery-ui-position');
wp_enqueue_script('jquery');
global $wp_scripts;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
    <script language="javascript" type="text/javascript" 
      src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>

    <script language="javascript" type="text/javascript" 
      src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>

    <script language="javascript" type="text/javascript" src="<?php echo site_url() . '/wp-content/plugins/wd-main-plugin/shortcode/tinymce/shortcodes.js'; ?>"></script>
    
    <base target="_self" />
    <?php wp_print_scripts(); ?>
  </head>

  <body id="link">
    
    <?php 
    if( isset($_GET['shortcode'])): 
    
    ?>
      <input type="hidden" name="shortcode-name" id="shortcode-name" value="<?php echo $_GET['shortcode']; ?>"/>   <?php  
      switch ($_GET['shortcode']) {
        case 'portfolio': 
          $terms = get_terms( array('projet'), array('hide_empty' => FALSE) ); 
          ?>
        
          <form name="wd_shortcodes" action="#">
            <table border="0" cellpadding="4" cellspacing="0">
              <tr>
                <td><?php _e("Project Categoties", THEME_NAME); ?>:</td>
                <td><small>
                  <?php foreach ($terms as $key => $term) { ?>
                    <label class="portoflio-category">
                      <input type="checkbox" checked="checked" name="portoflio-category" value="<?php echo $term->term_id; ?>"> <?php echo $term->name; ?></label>
                  <?php } ?>
                  </small>
                </td>
              </tr>              
              <tr>
                  <td><?php _e("Items Per Page", THEME_NAME); ?>:</td>
                  <td><input type="text" name="item-per-page" value="20" id="item-per-page"/></td>
              </tr> 
              
              <tr>
                  <td><?php _e("Columns", THEME_NAME); ?>:</td>
                  <td>
                    <select id="columns">
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4" selected>4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select></td>
              </tr>
              
              <tr>
                  <td><?php _e("Layout", THEME_NAME); ?>:</td>
                  <td>
                    <select id="layout">
                      <option value="1">grid</option>
                      <option value="2">Carousel</option>
                    </select></td>
              </tr>
              
              <tr>
                <td><?php _e("Width", THEME_NAME); ?>:</td>
                <td>
                  <label class="full-width">
                    <input type="checkbox" checked="checked" name="full-width" id="full-width"> <?php _e("Full Width", THEME_NAME); ?>
                  </label>
                </td>
              </tr>
            </table>
            <br/><br/>
            <div>
              <div style="float: left">
                <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", THEME_NAME); ?>" onClick="tinyMCEPopup.close();" />
              </div>
      
              <div style="float: right">
                <input type="submit" id="insert" name="insert" value="<?php _e("Insert", THEME_NAME); ?>" onClick="insertshortcode();" />
              </div>
            </div>
          </form> 

          <?php break;
					/*******---------------Maps ---------------------************/
        case 'wd_google_map':?>
        
          <form name="wd_shortcodes" action="#">
            <table border="0" cellpadding="4" cellspacing="0">
            	<tr>
            		<td><?php _e("Block Title", THEME_NAME); ?>:</td>
            		<td>
            			<input type="text"  name="wd_map_title" id="wd_map_title">
            		</td>
            	</tr>
            	<tr>
            		<td><?php _e("Company Name", THEME_NAME); ?>:</td>
            		<td>
            			<input type="text"  name="wd_map_company_name" id="wd_map_company_name">
            		</td>
            	</tr>
            	<tr>
            		<td><?php _e("Description", THEME_NAME); ?>:</td>
            		<td>
            			<input type="text"  name="wd_map_description" id="wd_map_description">
            		</td>
            	</tr>
            	<tr>
            		<td><?php _e("Latitude", THEME_NAME); ?>:</td>
            		<td>
            			<input type="text"  name="wd_map_latitude" id="wd_map_latitude">
            		</td>
            	</tr>
            	<tr>
            		<td><?php _e("Longitude", THEME_NAME); ?>:</td>
            		<td>
            			<input type="text"  name="wd_map_longitude" id="wd_map_longitude">
            		</td>
            	</tr>
            	<tr>
            		<td><?php _e("Zoom", THEME_NAME); ?>:</td>
            		<td>
            			<select id="wd_zoom">
            				<option value="0">0</option>
            				<option value="1">1</option>
            				<option value="2">2</option>
            				<option value="3">3</option>
            				<option value="4">4</option>
            				<option value="5">5</option>
            				<option value="6">6</option>
            				<option value="7">7</option>
            				<option value="8">8</option>
            				<option value="9">9</option>
            				<option value="10">10</option>
            				<option value="11">11</option>
            				<option value="12">12</option>
            				<option value="13">13</option>
            				<option value="14" selected>14</option>
            				<option value="15">15</option>
            				<option value="16">16</option>
            				<option value="17">17</option>
            				<option value="18">18</option>
            				<option value="19">19</option>
            			</select>
            		</td>
            	</tr>
            	<tr>
            		<td><?php _e("Map height", THEME_NAME); ?>:</td>
            		<td>
            			<input type="text"  name="wd_map_height" id="wd_map_height">
            		</td>
            	</tr>
            </table>
            <br/><br/>
            <div>
              <div style="float: left">
                <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", THEME_NAME); ?>" onClick="tinyMCEPopup.close();" />
              </div>
      
              <div style="float: right">
                <input type="submit" id="insert" name="insert" value="<?php _e("Insert", THEME_NAME); ?>" onClick="insertshortcode();" />
              </div>
            </div>
          </form>  
          <?php break;
        /*
				 * ---------------team -----------------
				 */
				 case 'wd_team':
          ?>
          <form name="wd_shortcodes" action="#">
            <table border="0" cellpadding="4" cellspacing="0">
              <tr>
                  <td><?php _e("Columns", THEME_NAME); ?>:</td>
                  <td>
                    <select id="columns">
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4" selected>4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select></td>
              </tr>
              <tr>
              	<td>
              		<?php _e("Item per page", THEME_NAME); ?>:
              	</td>
              	<td>
              		<td><input type="text" name="item-per-page" value="20" id="item-per-page"/></td>
              	</td>
              </tr>
            </table>
            <br/><br/>
            <div>
              <div style="float: left">
                <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", THEME_NAME); ?>" onClick="tinyMCEPopup.close();" />
              </div>
      
              <div style="float: right">
                <input type="submit" id="insert" name="insert" value="<?php _e("Insert", THEME_NAME); ?>" onClick="insertshortcode();" />
              </div>
            </div>
          </form> 

          <?php break;
        /*
				 * ---------------testimonial -----------------
				 */
				 case 'wd_testimonial':
          ?>
          <form name="wd_shortcodes" action="#">
            <table border="0" cellpadding="4" cellspacing="0">
              <tr>
              	<td>
              		<?php _e("Item per page", THEME_NAME); ?>:
              	</td>
              	<td>
              		<td><input type="text" name="item-per-page" value="20" id="item-per-page"/></td>
              	</td>
              </tr>
            </table>
            <br/><br/>
            <div>
              <div style="float: left">
                <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", THEME_NAME); ?>" onClick="tinyMCEPopup.close();" />
              </div>
      
              <div style="float: right">
                <input type="submit" id="insert" name="insert" value="<?php _e("Insert", THEME_NAME); ?>" onClick="insertshortcode();" />
              </div>
            </div>
          </form> 

          <?php break;
        default:
          break;
      }
      ?>
      
    
    <?php endif; ?>
    
  </body>
</html>