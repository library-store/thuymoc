<?php


/*///////////////////////////////// Register Panel Scripts and Styles /////////////////////////////////////////*/
function locksmith_admin_register() {

  wp_register_script('wd-admin-main', get_template_directory_uri() . '/inc/js/script.js', array('jquery',
    'jquery-ui-core',
    'jquery-ui-widget',
    'jquery-ui-mouse',
    'jquery-ui-tabs',
    'jquery-ui-droppable',
    'jquery-ui-sortable'), false, false);

    if (is_plugin_active ('wd-main-plugin/wd-main-plugin.php')) {
        wp_register_script('wd-admin-import', get_template_directory_uri() . '/inc/js/import_js.js', array('jquery',
            'jquery-ui-core',
            'jquery-ui-widget',
            'jquery-ui-mouse',
            'jquery-ui-tabs',
            'jquery-ui-droppable',
            'jquery-ui-sortable'), false, false);
    }
  wp_register_style('themify-icons', get_template_directory_uri() . '/inc/themify-icons.css', array(), '20120208', 'all');
  wp_register_style('wd-style', get_template_directory_uri() . '/inc/css/style.css', array(), '20120208', 'all');

  $font_body_name = locksmith_get_option('locksmith_body_font_familly', 'Open Sans');
  $locksmith_font_weight_style = locksmith_get_option('locksmith_font-weight-style', '400');
  $locksmith_main_text_font_subsets = locksmith_get_option('locksmith_main-text-font-subsets', 'latin');

  $font_header_name = locksmith_get_option('locksmith_head_font_familly', 'Open Sans');
  $locksmith_heading_font_weight_style = locksmith_get_option('locksmith_heading-font-weight-style', '400');
  $locksmith_heading_text_font_subsets = locksmith_get_option('locksmith_heading-text-font-subsets', 'latin');

  $locksmith_navigation_font_familly = locksmith_get_option('locksmith_navigation_font_familly', 'Open Sans');
  $locksmith_navigation_font_weight_style = locksmith_get_option('locksmith_navigation-font-weight-style', '400');
  $locksmith_navigation_text_font_subsets = locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin');
  $protocol = is_ssl() ? 'https' : 'http';


  wp_register_style('wd-google-fonts-body', $protocol . '://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $locksmith_font_weight_style . '&subset=' . $locksmith_main_text_font_subsets, false, NULL, 'all');
  wp_register_style('wd-google-fonts-heading', $protocol . '://fonts.googleapis.com/css?family=' . $font_header_name . ':' . $locksmith_heading_font_weight_style . '&subset=' . $locksmith_heading_text_font_subsets, false, NULL, 'all');
  wp_register_style('wd-google-fonts-navigation', $protocol . '://fonts.googleapis.com/css?family=' . $locksmith_navigation_font_familly . ':' . $locksmith_navigation_font_weight_style . '&subset=' . $locksmith_navigation_text_font_subsets, false, NULL, 'all');

  wp_register_style('wd-google-fonts', $protocol . '://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $locksmith_font_weight_style . '&subset=' . $locksmith_main_text_font_subsets, false, NULL, 'all');

  if (isset($_GET['page']) && $_GET['page'] == 'option panel') {


  }
  wp_enqueue_script('wd-admin-main');
    wp_enqueue_script('wd-admin-import');
  wp_enqueue_style('themify-icons');
  wp_enqueue_style('wd-style');
  wp_enqueue_style('wd-google-fonts');
  wp_enqueue_style('wd-google-fonts-body');
  wp_enqueue_style('wd-google-fonts-heading');
  wp_enqueue_style('wd-google-fonts-navigation');

}

add_action('admin_enqueue_scripts', 'locksmith_admin_register');


if (!function_exists('locksmith_load_color_picker')) {
  add_action('load-widgets.php', 'locksmith_load_color_picker');
  function locksmith_load_color_picker() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
  }
}


/*///////////////////////////////// Theme Options /////////////////////////////////////////*/
if (!function_exists('locksmith_panel_option')) {
  add_action('admin_menu', 'locksmith_panel_option');
  function locksmith_panel_option() {


    add_theme_page('Locksmith Theme Options', 'Locksmith Theme Options', 'edit_theme_options', 'locksmith-theme-option', 'locksmith_theme_option');
      if (is_plugin_active ('wd-main-plugin/wd-main-plugin.php')) {
          add_theme_page ('Import Demo Content', 'Import Demo Content', 'edit_theme_options', 'locksmith-demo-content', 'locksmith_import_demo');
      }
      if (is_plugin_active('revslider/revslider.php')) {
      add_theme_page('Import Demos Revsliders', 'Import Demos Revsliders', 'edit_theme_options', 'locksmith-revslider', 'wd_import_revslider');
    }
  }
}


if (!function_exists('locksmith_theme_option')) {
  function locksmith_theme_option() {

    wp_enqueue_media();


    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');


    wp_enqueue_script('colorpick', get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array('jquery'));
    wp_enqueue_style('colorpick', get_template_directory_uri() . "/stylesheets/bootstrap-colorpicker.min.css");
    ?>
    <script type="text/javascript">
      jQuery(document).ready(function ($) {
        $('.wd-color-picker').colorpicker(
          {format: 'rgba'}
        );

        //---------------logo script-----------
        jQuery('#locksmith_upload_btn').click(function () {
          wp.media.editor.send.attachment = function (props, attachment) {
            jQuery('#locksmith_logo_path').val(attachment.url);
          }
          wp.media.editor.open(this);

          return false;
        });

        //---------------footer bg script-----------
        jQuery('#locksmith_upload_bg_btn').click(function () {
          wp.media.editor.send.attachment = function (props, attachment) {
            jQuery('#locksmith_footer_bg_path').val(attachment.url);
          }
          wp.media.editor.open(this);

          return false;
        });

        //------single background post script-----
        jQuery('#locksmith_upload_single_post').click(function () {
          wp.media.editor.send.attachment = function (props, attachment) {
            jQuery('#locksmith_bg_single_post_path').val(attachment.url);
          }
          wp.media.editor.open(this);
          return false;
        });
        //-------------------------------------

      });
    </script>
    <?php


    if (!empty($_POST)) {

      $locksmith_allowed_html_array = array('a' => array('href' => array(),
        'title' => array()),
        'br' => array(),
        'em' => array(),
        'strong' => array(),);

      //-------------------General Setting-------------
      locksmith_save_option('locksmith_logo_path', esc_attr($_POST['locksmith_logo_path']));
      locksmith_save_option('google_map_key', esc_attr($_POST['wd_google_map_key']));

      locksmith_save_option('locksmith_bg_single_post_path', esc_attr($_POST['locksmith_bg_single_post_path']));
      //-------------------Color Setting-------------
      locksmith_save_option('locksmith_primary_color', esc_attr($_POST['locksmith_primary_color']));
      locksmith_save_option('locksmith_secondary_color', esc_attr($_POST['locksmith_secondary_color']));
      locksmith_save_option('locksmith_nav_bg_color', esc_attr($_POST['locksmith_nav_bg_color']));
      locksmith_save_option('locksmith_nav_color', esc_attr($_POST['locksmith_nav_color']));
      locksmith_save_option('locksmith_nav_hover_color', esc_attr($_POST['locksmith_nav_hover_color']));
      locksmith_save_option('navigation_bg_color_sticky', esc_attr($_POST['navigation_bg_color_sticky']));
      locksmith_save_option('navigation_color_sticky', esc_attr($_POST['navigation_color_sticky']));
      locksmith_save_option('navigation_color_hover_sticky', esc_attr($_POST['navigation_color_hover_sticky']));

      //-------------------Social Icon-------------
      locksmith_save_option('locksmith_show_adress_bar', esc_attr($_POST['locksmith_show_adress_bar']));
      locksmith_save_option('locksmith_twitter', esc_attr($_POST['locksmith_twitter']));
      locksmith_save_option('locksmith_facebook', esc_attr($_POST['locksmith_facebook']));
      locksmith_save_option('locksmith_google_plus', esc_attr($_POST['locksmith_google_plus']));
      locksmith_save_option('locksmith_phone', esc_attr($_POST['locksmith_phone']));
      //-------------------Fonts Setting ---------------

      //------------------Custom css & js ---------------
      locksmith_save_option('locksmith_theme_custom_css', str_replace("\\", "", $_POST['locksmith_theme_custom_css']));
      locksmith_save_option('locksmith_theme_custom_js', str_replace("\\", "", $_POST['locksmith_theme_custom_js']));

      //-------------------Footer Setting-------------

      locksmith_save_option('locksmith_footer_columns', esc_attr($_POST['locksmith_footer_columns']));
      locksmith_save_option('locksmith_footer_bg_path', esc_attr($_POST['locksmith_footer_bg_path']));
      locksmith_save_option('locksmith_copyright', wp_kses($_POST['locksmith_copyright'], $locksmith_allowed_html_array));

      locksmith_save_option('locksmith_body_font_familly', esc_attr($_POST['locksmith_body_font_familly']));
      locksmith_save_option('locksmith_font-weight-style', esc_attr($_POST['locksmith_font-weight-style']));
      locksmith_save_option('locksmith_main-text-font-subsets', esc_attr($_POST['locksmith_main-text-font-subsets']));
      locksmith_save_option('locksmith_text-transform', esc_attr($_POST['locksmith_text-transform']));
      locksmith_save_option('locksmith_body-font-size', esc_attr($_POST['locksmith_body-font-size']));


      locksmith_save_option('locksmith_head_font_familly', esc_attr($_POST['locksmith_head_font_familly']));
      locksmith_save_option('locksmith_heading-font-weight-style', esc_attr($_POST['locksmith_heading-font-weight-style']));
      locksmith_save_option('locksmith_heading-text-font-subsets', esc_attr($_POST['locksmith_heading-text-font-subsets']));
      locksmith_save_option('locksmith_heading-transform', esc_attr($_POST['locksmith_heading-transform']));

      locksmith_save_option('locksmith_navigation_font_familly', esc_attr($_POST['locksmith_navigation_font_familly']));
      locksmith_save_option('locksmith_navigation-font-weight-style', esc_attr($_POST['locksmith_navigation-font-weight-style']));
      locksmith_save_option('locksmith_navigation-text-font-subsets', esc_attr($_POST['locksmith_navigation-text-font-subsets']));
      locksmith_save_option('locksmith_navigation-transform', esc_attr($_POST['locksmith_navigation-transform']));
      locksmith_save_option('locksmith_navigation-font-size', esc_attr($_POST['locksmith_navigation-font-size']));

      //menu layout
      locksmith_save_option('locksmith_menu_layout', esc_attr($_POST['locksmith_menu_layout']));


    } ?>


    <?php if (!empty($_POST)): ?>
      <div id="message" class="updated fade">
        <p> Configuration updated!! </p>
      </div>
    <?php endif; ?>


    <div class="panel-logo">
      <h2>Webdevia theme options</h2>
    </div>
    <div class="wd-cpanel">
      <form id="wd-Panel" method="POST" action="">
        <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
          <ul class="ui-tabs-nav">
            <li><a href="#tabs-0"><?php echo esc_html__('Colors Setting', 'locksmith'); ?></a></li>
            <li><a href="#tabs-1"><?php echo esc_html__('General Settings', 'locksmith'); ?></a></li>
            <li><a href="#tabs-2"><?php echo esc_html__('Social Icons', 'locksmith'); ?></a></li>
            <li><a href="#tabs-3"><?php echo esc_html__('Fonts Settings', 'locksmith'); ?></a></li>
            <li><a href="#tabs-4"><?php echo esc_html__('Custom css & js', 'locksmith'); ?></a></li>
            <li><a href="#tabs-5"><?php echo esc_html__('Footer Settings', 'locksmith'); ?></a></li>
          </ul>

          <!---------------------------------- Color Setting ------------------------>
          <div id="tabs-0" class="ui-tabs-panel">
            <table class="form-table">
              <tbody>

              <tr>
                <td><strong><?php echo esc_html__('Primary Color:', 'locksmith'); ?></strong></td>
                <td
                  class='wd-color-picker'><?php $locksmith_primary_color = locksmith_get_option('locksmith_primary_color', '');
                  ?>
                  <input name="locksmith_primary_color" type="text"
                         value="<?php print $locksmith_primary_color; ?>"
                         data-default-color="#83CA13">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>

              <tr>
                <td><strong><?php echo esc_html__('Secondary Color:', 'locksmith'); ?></strong></td>
                <td
                  class='wd-color-picker'><?php $locksmith_secondary_color = locksmith_get_option('locksmith_secondary_color', '');
                  ?>
                  <input name="locksmith_secondary_color" type="text"
                         value="<?php print $locksmith_secondary_color; ?>"
                         data-default-color="#2098D1">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>

              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation background Color:', 'locksmith'); ?></strong>
                </td>
                <td
                  class='wd-color-picker'><?php $locksmith_nav_bg_color = locksmith_get_option('locksmith_nav_bg_color', '');
                  ?>
                  <input name="locksmith_nav_bg_color" type="text"
                         value="<?php print $locksmith_nav_bg_color; ?>"
                         data-default-color="rgba(255,255,255,0.45)">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Menu Color:', 'locksmith'); ?></strong></td>
                <td
                  class='wd-color-picker'><?php $locksmith_nav_color = locksmith_get_option('locksmith_nav_color', '');
                  ?>
                  <input name="locksmith_nav_color" type="text"
                         value="<?php print $locksmith_nav_color; ?>" data-default-color="#83CA13">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Menu Active/Hover Color:', 'locksmith'); ?></strong>
                </td>
                <td
                  class='wd-color-picker'><?php $locksmith_nav_hover_color = locksmith_get_option('locksmith_nav_hover_color', '');
                  ?>
                  <input name="locksmith_nav_hover_color" type="text"
                         value="<?php print $locksmith_nav_hover_color; ?>"
                         data-default-color="#FECB18">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation (sticky) background color', 'locksmith'); ?></strong>
                </td>
                <td
                  class='wd-color-picker'><?php $navigation_bg_color_sticky = locksmith_get_option('navigation_bg_color_sticky'); ?>
                  <input name="navigation_bg_color_sticky" type="text"
                         value="<?php print $navigation_bg_color_sticky; ?>"
                         data-default-color="#C0392B">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Sticky Menu Color', 'locksmith'); ?></strong>
                </td>
                <td
                  class='wd-color-picker'><?php $navigation_color_sticky = locksmith_get_option('navigation_color_sticky'); ?>
                  <input name="navigation_color_sticky" type="text"
                         value="<?php print $navigation_color_sticky; ?>"
                         data-default-color="#FECB18">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Sticky Active/Hover Color', 'locksmith'); ?></strong>
                </td>
                <td
                  class='wd-color-picker'><?php $navigation_color_hover_sticky = locksmith_get_option('navigation_color_hover_sticky'); ?>
                  <input name="navigation_color_hover_sticky" type="text"
                         value="<?php print $navigation_color_hover_sticky; ?>"
                         data-default-color="#C0392B">
                  <span class="input-group-addon"><i></i></span>
                </td>
              </tr>

              </tbody>
            </table>
          </div>
          <!---------------------------------- General Setting ------------------------>
          <div id="tabs-1">
            <table class="form-table">
              <tbody>

              <tr>
                <td>
                  <strong><?php echo esc_html__('Logo link', 'locksmith'); ?></strong>
                </td>
                <?php
                // $locksmith_default_logo_path = get_template_directory_uri().'/images/logo-white.png';
                $locksmith_logo_path = locksmith_get_option('locksmith_logo_path', '');
                ?>
                <td>
                  <input type="text" name="locksmith_logo_path" id="locksmith_logo_path"
                         value="<?php print $locksmith_logo_path ?>"/>
                  <input class="button" name="_unique_name_button" id="locksmith_upload_btn"
                         value="<?php echo esc_html__('Upload', 'locksmith') ?>"/></br>
                </td>
                <td>
                  <?php
                  if (!empty($locksmith_logo_path)): ?>
                    <img src="<?php print $locksmith_logo_path; ?>"
                         style="max-height: 70px;"/> <?php endif;
                  ?>
                </td>
              </tr>


              <tr>
                <td>
                  <strong><?php echo esc_html__('Background Title Bar for Single Post', 'locksmith'); ?></strong>
                </td>
                <?php

                $locksmith_bg_single_post_path = locksmith_get_option('locksmith_bg_single_post_path', '');
                ?>
                <td>
                  <input type="text" name="locksmith_bg_single_post_path"
                         id="locksmith_bg_single_post_path"
                         value="<?php print $locksmith_bg_single_post_path ?>"/>
                  <input class="button" name="_unique_name_button_single_post"
                         id="locksmith_upload_single_post"
                         value="<?php echo esc_html__('Upload', 'locksmith') ?>"/></br>
                </td>
                <td>
                  <?php
                  if (!empty($locksmith_bg_single_post_path)): ?>
                    <img src="<?php print $locksmith_bg_single_post_path; ?>"
                         style="max-height: 40px;"/> <?php endif;
                  ?>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Header Layout', 'locksmith'); ?></strong></td>
                <td>
                  <select name="locksmith_menu_layout" id="locksmith_menu_layout">
                    <option
                      value="1" <?php if (locksmith_get_option('locksmith_menu_layout') == '1')
                      print 'selected'; ?>>Layout 1
                    </option>
                    <option
                      value="2" <?php if (locksmith_get_option('locksmith_menu_layout') == '2')
                      print 'selected'; ?>>Layout 2
                    </option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Google Maps Key', 'locksmith'); ?></strong>
                </td>
                <td>
                  <?php
                  $locksmith_google_key = locksmith_get_option('google_map_key');
                  ?>
                  <input type="text"
                         name="wd_google_map_key"
                         value="<?php echo esc_attr($locksmith_google_key) ?>"
                         id="wd_google_map_key"
                         class=""/>
                  <label for="wd_google_map_key"></label>
                </td>
              </tr>

              </tbody>
            </table>

          </div>


          <!---------------------------------- Social Icon ------------------------>
          <div id="tabs-2">
            <table class="form-table">
              <tbody>
              <tr>
                <td><strong><?php echo esc_html__('Show Adress Bar', 'locksmith'); ?></strong></td>
                <td>
                  <input
                    type="checkbox" <?php if (locksmith_get_option('locksmith_show_adress_bar') == '1')
                    print 'checked'; ?>
                    name="locksmith_show_adress_bar" value="1" id="locksmith_show_adress_bar"
                    class="cmn-toggle cmn-toggle-round"/>
                  <label for="locksmith_show_adress_bar"></label></td>
              </tr>
              <?php
              $class_address_bar_items = (locksmith_get_option('locksmith_show_adress_bar') == '1') ? '' : 'hidden_item';
              ?>
              <tr class="address_bar_item <?php echo $class_address_bar_items ?>">
                <td>
                  <strong><?php esc_html__('facebook', 'locksmith'); ?></strong></td>
                <td><input type="text" name="locksmith_facebook"
                           placeholder="<?php echo esc_html__('Your Facebook page link', 'locksmith') ?>"
                           value="<?php echo locksmith_get_option('locksmith_facebook', ''); ?>"></td>
              </tr>
              <tr class="address_bar_item <?php echo $class_address_bar_items ?>">
                <td>
                  <strong><?php esc_html__('Twitter', 'locksmith'); ?></strong></td>
                <td><input type="text" name="locksmith_twitter"
                           placeholder="<?php echo esc_html__('Your Twitter page link', 'locksmith') ?>"
                           value="<?php echo locksmith_get_option('locksmith_twitter', ''); ?>"></td>
              </tr>
              <tr class="address_bar_item <?php echo $class_address_bar_items ?>">
                <td>
                  <strong><?php esc_html__('Google +', 'locksmith'); ?></strong></td>
                <td><input type="text" name="locksmith_google_plus"
                           placeholder="<?php echo esc_html__('Your Google-plus page link', 'locksmith') ?>"
                           value="<?php echo locksmith_get_option('locksmith_google_plus', ''); ?>">
                </td>
              </tr>
              <tr class="address_bar_item <?php echo $class_address_bar_items ?>">
                <td>
                  <strong><?php esc_html__('Phone Number', 'locksmith'); ?></strong></td>
                <td><input type="text" name="locksmith_phone"
                           placeholder="<?php echo esc_html__('Your Phone Number', 'locksmith') ?>"
                           value="<?php echo locksmith_get_option('locksmith_phone', ''); ?>"></td>
              </tr>
              </tbody>
            </table>
          </div>

          <!---------------------------------- Fonts Settings ------------------------>
          <div id="tabs-3">
            <table class="form-table">
              <tbody>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Main text font', 'locksmith'); ?></strong>
                </td>
                <td>
                  <?php
                  $locksmith_body_font_familly = locksmith_get_option('locksmith_body_font_familly', 'Open Sans');
                  $locksmith_fontArray = array('Abel',
                    'Abril Fatface',
                    'Aclonica',
                    'Actor',
                    'Adamina',
                    'Aguafina Script',
                    'Aladin',
                    'Aldrich',
                    'Alice',
                    'Alike Angular',
                    'Alike',
                    'Allan',
                    'Allerta Stencil',
                    'Allerta',
                    'Amaranth',
                    'Amatic SC',
                    'Andada',
                    'Andika',
                    'Annie Use Your Telescope',
                    'Anonymous Pro',
                    'Antic',
                    'Anton',
                    'Arapey',
                    'Architects Daughter',
                    'Arimo',
                    'Artifika',
                    'Arvo',
                    'Asset',
                    'Astloch',
                    'Atomic Age',
                    'Aubrey',
                    'Bangers',
                    'Bentham',
                    'Bevan',
                    'Bigshot One',
                    'Bitter',
                    'Black Ops One',
                    'Bowlby One SC',
                    'Bowlby One',
                    'Brawler',
                    'Bubblegum Sans',
                    'Buda',
                    'Butcherman Caps',
                    'Cabin Condensed',
                    'Cabin Sketch',
                    'Cabin',
                    'Cagliostro',
                    'Calligraffitti',
                    'Candal',
                    'Cantarell',
                    'Cardo',
                    'Carme',
                    'Carter One',
                    'Caudex',
                    'Cedarville Cursive',
                    'Changa One',
                    'Cherry Cream Soda',
                    'Chewy',
                    'Chicle',
                    'Chivo',
                    'Coda Caption',
                    'Coda',
                    'Comfortaa',
                    'Coming Soon',
                    'Contrail One',
                    'Convergence',
                    'Cookie',
                    'Copse',
                    'Corben',
                    'Cousine',
                    'Coustard',
                    'Covered By Your Grace',
                    'Crafty Girls',
                    'Creepster Caps',
                    'Crimson Text',
                    'Crushed',
                    'Cuprum',
                    'Damion',
                    'Dancing Script',
                    'Dawning of a New Day',
                    'Days One',
                    'Delius Swash Caps',
                    'Delius Unicase',
                    'Delius',
                    'Devonshire',
                    'Didact Gothic',
                    'Dorsa',
                    'Dr Sugiyama',
                    'Droid Sans Mono',
                    'Droid Sans',
                    'Droid Serif',
                    'EB Garamond',
                    'Eater Caps',
                    'Expletus Sans',
                    'Fanwood Text',
                    'Federant',
                    'Federo',
                    'Fjord One',
                    'Fondamento',
                    'Fontdiner Swanky',
                    'Forum',
                    'Francois One',
                    'Gentium Basic',
                    'Gentium Book Basic',
                    'Geo',
                    'Geostar Fill',
                    'Geostar',
                    'Give You Glory',
                    'Gloria Hallelujah',
                    'Goblin One',
                    'Gochi Hand',
                    'Goudy Bookletter 1911',
                    'Gravitas One',
                    'Gruppo',
                    'Hammersmith One',
                    'Herr Von Muellerhoff',
                    'Holtwood One SC',
                    'Homemade Apple',
                    'IM Fell DW Pica SC',
                    'IM Fell DW Pica',
                    'IM Fell Double Pica SC',
                    'IM Fell Double Pica',
                    'IM Fell English SC',
                    'IM Fell English',
                    'IM Fell French Canon SC',
                    'IM Fell French Canon',
                    'IM Fell Great Primer SC',
                    'IM Fell Great Primer',
                    'Iceland',
                    'Inconsolata',
                    'Indie Flower',
                    'Irish Grover',
                    'Istok Web',
                    'Jockey One',
                    'Josefin Sans',
                    'Josefin Slab',
                    'Judson',
                    'Julee',
                    'Jura',
                    'Just Another Hand',
                    'Just Me Again Down Here',
                    'Kameron',
                    'Kelly Slab',
                    'Kenia',
                    'Knewave',
                    'Kranky',
                    'Kreon',
                    'Kristi',
                    'La Belle Aurore',
                    'Lancelot',
                    'Lato',
                    'League Script',
                    'Leckerli One',
                    'Lekton',
                    'Lemon',
                    'Limelight',
                    'Linden Hill',
                    'Lobster Two',
                    'Lobster',
                    'Lora',
                    'Love Ya Like A Sister',
                    'Loved by the King',
                    'Luckiest Guy',
                    'Maiden Orange',
                    'Mako',
                    'Marck Script',
                    'Marvel',
                    'Mate SC',
                    'Mate',
                    'Maven Pro',
                    'Meddon',
                    'MedievalSharp',
                    'Megrim',
                    'Merienda One',
                    'Merriweather',
                    'Metrophobic',
                    'Michroma',
                    'Miltonian Tattoo',
                    'Miltonian',
                    'Miss Fajardose',
                    'Miss Saint Delafield',
                    'Modern Antiqua',
                    'Molengo',
                    'Monofett',
                    'Monoton',
                    'Monsieur La Doulaise',
                    'Montez',
                    'Mountains of Christmas',
                    'Mr Bedford',
                    'Mr Dafoe',
                    'Mr De Haviland',
                    'Mrs Sheppards',
                    'Muli',
                    'Neucha',
                    'Neuton',
                    'News Cycle',
                    'Niconne',
                    'Nixie One',
                    'Nobile',
                    'Nosifer Caps',
                    'Nothing You Could Do',
                    'Nova Cut',
                    'Nova Flat',
                    'Nova Mono',
                    'Nova Oval',
                    'Nova Round',
                    'Nova Script',
                    'Nova Slim',
                    'Nova Square',
                    'Numans',
                    'Nunito',
                    'Old Standard TT',
                    'Open Sans Condensed',
                    'Open Sans',
                    'Orbitron',
                    'Oswald',
                    'Over the Rainbow',
                    'Ovo',
                    'PT Sans Caption',
                    'PT Sans Narrow',
                    'PT Sans',
                    'PT Serif Caption',
                    'PT Serif',
                    'Pacifico',
                    'Passero One',
                    'Patrick Hand',
                    'Paytone One',
                    'Permanent Marker',
                    'Petrona',
                    'Philosopher',
                    'Piedra',
                    'Pinyon Script',
                    'Play',
                    'Playfair Display',
                    'Podkova',
                    'Poller One',
                    'Poly',
                    'Pompiere',
                    'Prata',
                    'Prociono',
                    'Puritan',
                    'Quattrocento Sans',
                    'Quattrocento',
                    'Questrial',
                    'Quicksand',
                    'Radley',
                    'Raleway',
                    'Rammetto One',
                    'Rancho',
                    'Rationale',
                    'Redressed',
                    'Reenie Beanie',
                    'Ribeye Marrow',
                    'Ribeye',
                    'Righteous',
                    'Rochester',
                    'Rock Salt',
                    'Rokkitt',
                    'Rosario',
                    'Ruslan Display',
                    'Salsa',
                    'Sancreek',
                    'Sansita One',
                    'Satisfy',
                    'Schoolbell',
                    'Shadows Into Light',
                    'Shanti',
                    'Short Stack',
                    'Sigmar One',
                    'Signika Negative',
                    'Signika',
                    'Six Caps',
                    'Slackey',
                    'Smokum',
                    'Smythe',
                    'Sniglet',
                    'Snippet',
                    'Sorts Mill Goudy',
                    'Special Elite',
                    'Spinnaker',
                    'Spirax',
                    'Stardos Stencil',
                    'Sue Ellen Francisco',
                    'Sunshiney',
                    'Supermercado One',
                    'Swanky and Moo Moo',
                    'Syncopate',
                    'Tangerine',
                    'Tenor Sans',
                    'Terminal Dosis',
                    'The Girl Next Door',
                    'Tienne',
                    'Tinos',
                    'Titillium Web',
                    'Tulpen One',
                    'Ubuntu Condensed',
                    'Ubuntu Mono',
                    'Ubuntu',
                    'Ultra',
                    'UnifrakturCook',
                    'UnifrakturMaguntia',
                    'Unkempt',
                    'Unlock',
                    'Unna',
                    'VT323',
                    'Varela Round',
                    'Varela',
                    'Vast Shadow',
                    'Vibur',
                    'Vidaloka',
                    'Volkhov',
                    'Vollkorn',
                    'Voltaire',
                    'Waiting for the Sunrise',
                    'Wallpoet',
                    'Walter Turncoat',
                    'Wire One',
                    'Yanone Kaffeesatz',
                    'Yellowtail',
                    'Yeseva One',
                    'Zeyada',
                    'Montserrat');
                  ?>
                  <table>
                    <tbody>
                    <tr>
                      <td>
                        <label
                          for="locksmith_body_font_familly"><?php esc_html__('Font family :', 'locksmith') ?></label>
                      </td>
                      <td>
                        <select name="locksmith_body_font_familly"
                                id="locksmith_body_font_familly" class="font_familly">
                          <option
                            value="default"><?php esc_html__('Default', 'locksmith') ?></option>
                          <?php foreach ($locksmith_fontArray as $pititablo) {
                            $font_name = $pititablo;
                            ?>
                            <option
                              value="<?php echo esc_attr($pititablo) ?>" <?php if (locksmith_get_option('locksmith_body_font_familly', 'Open Sans') == $font_name)
                              echo "selected='selected'" ?> ><?php echo esc_attr($pititablo) ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_font-weight-style"><?php esc_html__('Font weight and style :', 'locksmith') ?></label>
                      </td>
                      <td>
                        <select name="locksmith_font-weight-style"
                                id="locksmith_font-weight-style" class="font_weight">
                          <option
                            value="400" <?php if (locksmith_get_option('locksmith_font-weight-style', '400') == 400) {
                            echo 'selected';
                          } ?>><?php echo esc_html__('Normal 400', 'locksmith') ?></option>
                          <option
                            value="300" <?php if (locksmith_get_option('locksmith_font-weight-style', '300') == 300) {
                            echo 'selected';
                          } ?>><?php echo esc_html__('Light 300', 'locksmith') ?></option>
                          <option
                            value="600" <?php if (locksmith_get_option('locksmith_font-weight-style', '600') == 600) {
                            echo 'selected';
                          } ?>><?php echo esc_html__('Semi-bold 600', 'locksmith') ?></option>
                          <option
                            value="700" <?php if (locksmith_get_option('locksmith_font-weight-style', '700') == 700) {
                            echo 'selected';
                          } ?>><?php echo esc_html__('Bold 700', 'locksmith') ?></option>
                          <option
                            value="800" <?php if (locksmith_get_option('locksmith_font-weight-style', '800') == 800) {
                            echo 'selected';
                          } ?>><?php echo esc_html__('Extra-Bold 800', 'locksmith') ?></option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_text-transform"><?php echo esc_html__('Text Transform', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_text-transform" id="locksmith_text-transform"
                                class="text_transform">
                          <option
                            value="none" <?php if (locksmith_get_option('locksmith_text-transform', 'none') == 'none') {
                            echo 'selected';
                          } ?>><?php echo esc_html__('Normal', 'locksmith') ?></option>
                          <option
                            value="uppercase" <?php if (locksmith_get_option('locksmith_text-transform', 'none') == 'uppercase') {
                            echo 'selected';
                          } ?>><?php echo esc_html__('UPPERCASE', 'locksmith') ?></option>
                          <option
                            value="lowercase" <?php if (locksmith_get_option('locksmith_text-transform', 'none') == 'lowercase') {
                            echo 'selected';
                          } ?>><?php echo esc_html__('lowercase', 'locksmith') ?></option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_body-font-size"><?php echo esc_html__('Font size', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <?php $locksmith_body_font_size = locksmith_get_option('locksmith_body-font-size', '14');
                        $fontsizeArray = array('12',
                          '14',
                          '13',
                          '15',
                          '16',
                          '17',
                          '18',
                          '19',
                          '20',
                          '22',
                          '24',
                          '26',
                          '28',
                          '30',
                          '32',
                          '34',
                          '36',
                          '38',
                          '40');
                        ?>
                        <select name="locksmith_body-font-size" id="locksmith_body-font-size"
                                class="text_size">
                          <option
                            value="default"><?php echo esc_html__('Default', 'locksmith') ?></option>
                          <?php foreach ($fontsizeArray as $font_size_item) {
                            $font_size = $font_size_item;
                            ?>
                            <option
                              value="<?php echo esc_attr($font_size_item) ?>" <?php if (locksmith_get_option('locksmith_body-font-size', '14') == $font_size)
                              echo "selected='selected'" ?> ><?php echo esc_attr($font_size_item) ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_main-text-font-subsets"><?php echo esc_html__('Font subsets', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select id="locksmith_main-text-font-subsets"
                                name="locksmith_main-text-font-subsets" class="font_subsets">
                          <option
                            value="latin"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'latin') {
                            echo "selected";
                          } ?>>Latin
                          </option>
                          <option
                            value="cyrillic-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'cyrillic-ext') {
                            echo "selected";
                          } ?>>Cyrillic Extended
                          </option>
                          <option
                            value="greek-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'greek-ext') {
                            echo "selected";
                          } ?>>Greek Extended
                          </option>
                          <option
                            value="greek"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'greek') {
                            echo "selected";
                          } ?>>Greek
                          </option>
                          <option
                            value="vietnamese"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'vietnamese') {
                            echo "selected";
                          } ?>>Vietnamese
                          </option>
                          <option
                            value="latin-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'latin-ext') {
                            echo "selected";
                          } ?>>Latin Extended
                          </option>
                          <option
                            value="cyrillic"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'cyrillic') {
                            echo "selected";
                          } ?>>Cyrillic
                          </option>
                        </select>
                        <br>
                        <p class="body_font_result"
                           style="font-family: '<?php echo locksmith_get_option('locksmith_body_font_familly', 'Open Sans'); ?>'; font-weight: <?php locksmith_get_option('locksmith_font-weight-style', '400'); ?>;">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                          eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                          veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                          commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                          esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                          cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est
                          laborum.</p>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Heads(h1,h2,h3..) font family', 'locksmith'); ?></strong>
                </td>
                <td>
                  <table>
                    <tbody>
                    <tr>
                      <td>
                        <label
                          for="locksmith_head_font_familly"><?php echo esc_html__('Font family', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_head_font_familly"
                                id="locksmith_head_font_familly" class="font_familly">
                          <option
                            value="default"><?php echo esc_html__('Default', 'locksmith') ?></option>
                          <?php
                          $locksmith_head_font_familly = locksmith_get_option('locksmith_head_font_familly', 'Open Sans');
                          foreach ($locksmith_fontArray as $pititablo) {
                            $font_name = $pititablo; ?>

                            <option
                              value="<?php echo esc_attr($font_name) ?>" <?php if ($locksmith_head_font_familly == $font_name)
                              echo "selected='selected'" ?> ><?php echo esc_attr($font_name) ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_heading-font-weight-style"><?php echo esc_html__('Font weight and style', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_heading-font-weight-style"
                                id="locksmith_heading-font-weight-style" class="font_weight">
                          <option
                            value="400" <?php if (locksmith_get_option('locksmith_heading-font-weight-style', '700') == 400) {
                            echo 'selected';
                          } ?>>Normal 400
                          </option>
                          <option
                            value="300" <?php if (locksmith_get_option('locksmith_heading-font-weight-style', '700') == 300) {
                            echo 'selected';
                          } ?>>Light 300
                          </option>
                          <option
                            value="600" <?php if (locksmith_get_option('locksmith_heading-font-weight-style', '700') == 600) {
                            echo 'selected';
                          } ?>>Semi-bold 600
                          </option>
                          <option
                            value="700" <?php if (locksmith_get_option('locksmith_heading-font-weight-style', '700') == 700) {
                            echo 'selected';
                          } ?>>Bold 700
                          </option>
                          <option
                            value="800" <?php if (locksmith_get_option('locksmith_heading-font-weight-style', '700') == 800) {
                            echo 'selected';
                          } ?>>Extra-Bold 800
                          </option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_heading-transform"><?php echo esc_html__('Text Transform', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_heading-transform"
                                id="locksmith_heading-transform" class="text_transform">
                          <option
                            value="none" <?php if (locksmith_get_option('locksmith_text-transform', 'none') == 'none') {
                            echo 'selected';
                          } ?>>Normal
                          </option>
                          <option
                            value="uppercase" <?php if (locksmith_get_option('locksmith_text-transform', 'none') == 'uppercase') {
                            echo 'selected';
                          } ?>>UPPERCASE
                          </option>
                          <option
                            value="lowercase" <?php if (locksmith_get_option('locksmith_text-transform', 'none') == 'lowercase') {
                            echo 'selected';
                          } ?>>lowercase
                          </option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_heading-text-font-subsets"><?php echo esc_html__('Font subsets ', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select id="locksmith_heading-text-font-subsets"
                                name="locksmith_heading-text-font-subsets" class="font_subsets">
                          <option
                            value="latin"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'latin') {
                            echo "selected";
                          } ?>>Latin
                          </option>
                          <option
                            value="cyrillic-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'cyrillic-ext') {
                            echo "selected";
                          } ?>>Cyrillic Extended
                          </option>
                          <option
                            value="greek-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'greek-ext') {
                            echo "selected";
                          } ?>>Greek Extended
                          </option>
                          <option
                            value="greek"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'greek') {
                            echo "selected";
                          } ?>>Greek
                          </option>
                          <option
                            value="vietnamese"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'vietnamese') {
                            echo "selected";
                          } ?>>Vietnamese
                          </option>
                          <option
                            value="latin-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'latin-ext') {
                            echo "selected";
                          } ?>>Latin Extended
                          </option>
                          <option
                            value="cyrillic"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'cyrillic') {
                            echo "selected";
                          } ?>>Cyrillic
                          </option>
                        </select>
                        <h2 class="heading_font_result"
                            style="font-family: '<?php echo locksmith_get_option('locksmith_head_font_familly', 'Open Sans'); ?>'; font-weight: <?php locksmith_get_option('locksmith_heading-font-weight-style', '400'); ?>;">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation font family', 'locksmith'); ?></strong>
                </td>
                <td>
                  <table>
                    <tbody>
                    <tr>
                      <td>
                        <label
                          for="locksmith_navigation_font_familly"><?php echo esc_html__('Font family', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_navigation_font_familly"
                                id="locksmith_navigation_font_familly" class="font_familly">
                          <option
                            value="default"><?php esc_html__('Default', 'locksmith'); ?></option>
                          <?php
                          $locksmith_navigation_font_familly = locksmith_get_option('locksmith_navigation_font_familly', 'Open Sans');
                          foreach ($locksmith_fontArray as $pititablo) {
                            $font_name = $pititablo; ?>

                            <option
                              value="<?php echo esc_attr($font_name) ?>" <?php if (locksmith_get_option('locksmith_navigation_font_familly', 'Open Sans') == $font_name)
                              echo "selected='selected'" ?> ><?php echo esc_attr($font_name) ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_navigation-font-weight-style"><?php echo esc_html__('Font weight and style', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_navigation-font-weight-style"
                                id="locksmith_navigation-font-weight-style" class="font_weight">
                          <option
                            value="400" <?php if (locksmith_get_option('locksmith_navigation-font-weight-style', '400') == 400) {
                            echo 'selected';
                          } ?>>Normal 400
                          </option>
                          <option
                            value="300" <?php if (locksmith_get_option('locksmith_navigation-font-weight-style', '400') == 300) {
                            echo 'selected';
                          } ?>>Light 300
                          </option>
                          <option
                            value="600" <?php if (locksmith_get_option('locksmith_navigation-font-weight-style', '400') == 600) {
                            echo 'selected';
                          } ?>>Semi-bold 600
                          </option>
                          <option
                            value="700" <?php if (locksmith_get_option('locksmith_navigation-font-weight-style', '400') == 700) {
                            echo 'selected';
                          } ?>>Bold 700
                          </option>
                          <option
                            value="800" <?php if (locksmith_get_option('locksmith_navigation-font-weight-style', '400') == 800) {
                            echo 'selected';
                          } ?>>Extra-Bold 800
                          </option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_navigation-transform"><?php echo esc_html__('Text Transform', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select name="locksmith_navigation-transform"
                                id="locksmith_navigation-transform" class="text_transform">
                          <option
                            value="none" <?php if (locksmith_get_option('locksmith_navigation-transform', 'none') == 'none') {
                            echo 'selected';
                          } ?>>Normal
                          </option>
                          <option
                            value="uppercase" <?php if (locksmith_get_option('locksmith_navigation-transform', 'none') == 'uppercase') {
                            echo 'selected';
                          } ?>>UPPERCASE
                          </option>
                          <option
                            value="lowercase" <?php if (locksmith_get_option('locksmith_navigation-transform', 'none') == 'lowercase') {
                            echo 'selected';
                          } ?>>lowercase
                          </option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_navigation-font-size"><?php echo esc_html__('Font size', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <?php $locksmith_body_font_size = locksmith_get_option('locksmith_navigation-font-size', '14');
                        ?>
                        <select name="locksmith_navigation-font-size"
                                id="locksmith_navigation-font-size" class="text_size">
                          <option
                            value="default"><?php echo esc_html__('Default', 'locksmith') ?></option>
                          <?php foreach ($fontsizeArray as $font_size_item) {
                            $font_size = $font_size_item;
                            ?>
                            <option
                              value="<?php echo esc_attr($font_size_item) ?>" <?php if (locksmith_get_option('locksmith_navigation-font-size', '14') == $font_size)
                              echo "selected='selected'" ?> ><?php echo esc_attr($font_size_item) ?></option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label
                          for="locksmith_navigation-text-font-subsets"><?php echo esc_html__('Font subsets', 'locksmith') ?>
                          :</label>
                      </td>
                      <td>
                        <select id="locksmith_navigation-text-font-subsets"
                                name="locksmith_navigation-text-font-subsets"
                                class="font_subsets">
                          <option
                            value="latin"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'latin') {
                            echo "selected";
                          } ?>>Latin
                          </option>
                          <option
                            value="cyrillic-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'cyrillic-ext') {
                            echo "selected";
                          } ?>>Cyrillic Extended
                          </option>
                          <option
                            value="greek-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'greek-ext') {
                            echo "selected";
                          } ?>>Greek Extended
                          </option>
                          <option
                            value="greek"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'greek') {
                            echo "selected";
                          } ?>>Greek
                          </option>
                          <option
                            value="vietnamese"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'vietnamese') {
                            echo "selected";
                          } ?>>Vietnamese
                          </option>
                          <option
                            value="latin-ext"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'latin-ext') {
                            echo "selected";
                          } ?>>Latin Extended
                          </option>
                          <option
                            value="cyrillic"<?php if (locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin') == 'cyrillic') {
                            echo "selected";
                          } ?>>Cyrillic
                          </option>
                        </select>
                        <ul class="navigation-list"
                            style="font-family: '<?php echo locksmith_get_option('locksmith_navigation_font_familly', 'Open Sans'); ?>'; font-weight: <?php locksmith_get_option('locksmith_navigation-font-weight-style', '400'); ?>;">
                          <li>Home</li>
                          <li>About</li>
                          <li>Services</li>
                        </ul>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </td>
              </tr>

              </tbody>
            </table>
          </div>

          <!---------------------------------- Custom css & js ------------------------>
          <div id="tabs-4">
            <table class="form-table">
              <tbody>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Custom css', 'locksmith'); ?></strong>
                </td>
                <td>
                                    <textarea rows="10" cols="70" name="locksmith_theme_custom_css"
                                              placeholder="<?php echo esc_html__('Put your style here', 'locksmith') ?>"><?php echo locksmith_get_option('locksmith_theme_custom_css', ''); ?></textarea>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Custom JavaScript', 'locksmith') ?></strong>
                </td>

                <td>
                                    <textarea rows="10" cols="70" name="locksmith_theme_custom_js"
                                              placeholder="<?php echo esc_html__('Put your JavaScript here', 'locksmith') ?>"><?php echo locksmith_get_option('locksmith_theme_custom_js', ''); ?></textarea>
                </td>
              </tr>
              </tbody>
            </table>
          </div>

          <!---------------------------------- Footer Settings ------------------------>
          <div id="tabs-5">
            <table class="form-table">
              <tbody>
              <tr>
                <td><strong><?php echo esc_html__('Footer columns', 'locksmith'); ?></strong></td>
                <td class="locksmith_footer_columns">
                  <?php $locksmith_footer_columns = locksmith_get_option('locksmith_footer_columns', 'three_columns');

                  ?>
                  <input type="radio" id="locksmith_footer1" name="locksmith_footer_columns"
                         value="one_columns"
                         checked="<?php if ($locksmith_footer_columns == 'one_columns') {
                           echo 'checked';
                         } ?>"/>
                  <label for="locksmith_footer1"
                         class="locksmith_footer1 <?php if ($locksmith_footer_columns == 'one_columns') {
                           echo 'label_selected ';
                         } ?>"></label>

                  <input type="radio" id="locksmith_footer2" name="locksmith_footer_columns"
                         value="tow_a_columns"
                         checked="<?php if ($locksmith_footer_columns == 'tow_a_columns') {
                           echo 'checked';
                         } ?>"/>
                  <label for="locksmith_footer2"
                         class="locksmith_footer2 <?php if ($locksmith_footer_columns == 'tow_a_columns') {
                           echo 'label_selected ';
                         } ?>"></label>

                  <input type="radio" id="locksmith_footer3" name="locksmith_footer_columns"
                         value="tow_b_columns"
                         checked="<?php if ($locksmith_footer_columns == 'tow_b_columns') {
                           echo 'checked';
                         } ?>"/>
                  <label for="locksmith_footer3"
                         class="locksmith_footer3 <?php if ($locksmith_footer_columns == 'tow_b_columns') {
                           echo 'label_selected ';
                         } ?>"></label>

                  <input type="radio" id="locksmith_footer4" name="locksmith_footer_columns"
                         value="tow_c_columns"
                         checked="<?php if ($locksmith_footer_columns == 'tow_c_columns') {
                           echo 'checked';
                         } ?>"/>
                  <label for="locksmith_footer4"
                         class="locksmith_footer4 <?php if ($locksmith_footer_columns == 'tow_c_columns') {
                           echo 'label_selected ';
                         } ?>"></label>

                  <input type="radio" id="locksmith_footer5" name="locksmith_footer_columns"
                         value="three_columns"
                         checked="<?php if ($locksmith_footer_columns == 'three_columns') {
                           echo 'checked';
                         } ?>"/>
                  <label for="locksmith_footer5"
                         class="locksmith_footer5 <?php if ($locksmith_footer_columns == 'three_columns') {
                           echo 'label_selected';
                         } ?>"></label>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Footer Background', 'locksmith'); ?></strong>
                </td>
                <?php
                //$locksmith_footer_bg_path = get_template_directory_uri().'/images/footer-bg.jpg';
                $locksmith_footer_path = locksmith_get_option('locksmith_footer_bg_path', '');
                ?>
                <td>
                  <input type="text" name="locksmith_footer_bg_path" id="locksmith_footer_bg_path"
                         value="<?php print $locksmith_footer_path ?>"/>
                  <input class="button" name="_locksmith_upload_bg_btn" id="locksmith_upload_bg_btn"
                         value="<?php echo esc_html__('Upload', 'locksmith') ?>"/></br>
                </td>
                <td>
                  <?php
                  if (!empty($locksmith_footer_path)): ?>
                    <img src="<?php print $locksmith_footer_path; ?>"
                         style="max-height: 70px;"/> <?php endif;
                  ?>
                </td>
              </tr>

              <tr>
                <td>
                  <strong><?php echo esc_html__('Footer Copyright text', 'locksmith'); ?></strong>
                </td>
                <td>
                  <?php
                  $locksmith_copyright = locksmith_get_option('locksmith_copyright', '');
                  $locksmith_copyright = (!empty($locksmith_copyright)) ? locksmith_get_option('locksmith_copyright', '') : ''; ?>
                  <input type="text" class="locksmith_txt_big" name="locksmith_copyright"
                         placeholder="<?php echo esc_html__('Footer Copyright text', 'locksmith') ?>"
                         value="<?php echo esc_attr($locksmith_copyright); ?>"></td>
              </tr>
              </tbody>
            </table>
          </div>

        </div>
    </div>
    <div class="eight columns wp-core-ui">
      <p>
        <button type="submit" name="search" value="Update Options" class="button success button-primary"/>
        <?php echo esc_html__('Update Options', 'locksmith'); ?></button></p>
    </div>
    </form>
    </div>


    <div style="clear: both;">
      <br/><br/><br/><br/><br/><br/>
    </div>


    <div class="wb-item">
      <div class="icon-themes">

      </div>
    </div>
    <?php
  }
}


if (!function_exists ('locksmith_import_demo')) {
    function locksmith_import_demo () {
        ?>
        <div id="tabs-6">
            <div id="wd-metaboxes-general" class="wrap wd-page wd-page-info" style="padding: 20px;background-color: #FFF;">
                <table class="form-table">
                    <tbody>
                    <tr>
                        <td style="display: none;"></td>
                        <td class="import-demo-screenshot" style="padding-left: 250px;">
                            <em class="wd-field-description"><?php echo esc_html__ ('Select demo to import', 'locksmith'); ?> : </em>
                            <select name="Demo_selector" id="Demo_selector" class="form-control wd-form-element">
                                <option value="demo-1">Demo 1</option>
                                <option value="demo-2">Demo 2</option>
                            </select><br>
                            <label class="demo-1 demos_label" for="demo-1"></label>
                            <label class="demo-2 demos_label" for="demo-2" style="display: none"></label>
                            <label class="demo-3 demos_label" for="demo-3" style="display: none"></label>
                        </td>
                    </tr>
                    <tr>
                        <td style="display:none;"></td>
                        <td style="padding-left: 250px;">
                            <em class="wd-field-description"><?php echo esc_html__ ('Import Type', 'locksmith'); ?> : </em>
                            <select name="import_option" id="import_option" class="form-control wd-form-element">
                                <option value=""><?php echo esc_html__ ('Please Select', 'locksmith'); ?></option>
                                <option value="complete_content"><?php echo esc_html__ ('All', 'locksmith'); ?></option>
                                <option value="content"><?php echo esc_html__ ('Content', 'locksmith'); ?></option>
                                <option value="widgets"><?php echo esc_html__ ('Widgets', 'locksmith'); ?></option>
                                <option value="options"><?php echo esc_html__ ('Options', 'locksmith'); ?></option>
                                <option value="menus"><?php echo esc_html__ ('Menus', 'locksmith'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr id="tr_import_attachments" style="display:none;">
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <p><?php echo esc_html__ ('Do you want to import media files?', 'locksmith'); ?></p>
                            <input type="checkbox" value="1" class="wd-form-element" name="import_attachments" id="import_attachments"/>
                        </td>
                    </tr>
                    <tr id="tr_delete_menus" style="display:none;">
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <p><?php echo esc_html__ ('Do you want to delete all existing menus?', 'locksmith'); ?></p>
                            <input type="checkbox" value="1" class="wd-form-element" name="delete_menus" id="delete_menus"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <input type="submit" class="button button-primary" value="<?php echo esc_html__ ('Import', 'locksmith'); ?>" name="import" id="import_demo_data"/>
                            <img id="loading_gif" src="<?php echo get_template_directory_uri () . '/images/loading_import.gif'; ?>" style="margin-left:20px; display:none"/>
                            <img id="OK_result" src="<?php echo get_template_directory_uri () . '/images/OK_result.png'; ?>" style="margin-left:20px; display:none"/>
                            <img id="NOK_result" src="<?php echo get_template_directory_uri () . '/images/NOK_result.png'; ?>" style="margin-left:20px; display:none"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="padding-left: 250px;">
                            <span><?php esc_html_e ('The import process may take some time. Please be patient.', 'locksmith') ?> </span><br/>
                            <div class="import_load">
                                <div class="wd-progress-bar-wrapper html5-progress-bar">
                                    <div class="progress-bar-wrapper">
                                        <progress id="progressbar" value="0" max="100"></progress>
                                    </div>
                                    <div class="progress-value">0%</div>
                                    <div class="progress-bar-message"></div>
                                    <div class="error-message" style="color:#990000; font-weight:bold;"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="text-align: center;">
                            <div class="alert alert-warning">
                                <strong><?php esc_html_e ('Important notes:', 'locksmith') ?></strong>
                                <ul>
                                    <li><?php esc_html_e ('Please note that import process will take time needed to download all attachments from demo web site.', 'locksmith'); ?></li>
                                    <li> <?php _e ('If you plan to use shop, please install <b>WooCommerce</b> before you run import.', 'locksmith') ?></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <?php
    }
}

if (!function_exists('locksmith_import_revslider')) {
  function locksmith_import_revslider() {

    wp_enqueue_media();

    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');


    wp_enqueue_script('colorpick', get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array('jquery'));
    wp_enqueue_style('colorpick', get_template_directory_uri() . "/css/bootstrap-colorpicker.min.css");
    ?>

    <div class="panel-logo">
      <h2>Locksmith Revsliders Import</h2>
    </div>
    <div class="wd-cpanel">
      <div id="wd-Panel" method="POST" action="">
        <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
          <div id="tabs-7">
            <form action="<?php echo admin_url("admin-ajax.php"); ?>" enctype="multipart/form-data"
                  method="post">
              <div id="wd-metaboxes-general" class="wrap wd-page wd-page-info"
                   style="padding: 20px;background-color: #FFF;">
                <table class="form-table">
                  <tbody>
                  <tr>
                    <td style="display:none;">
                      <input type="hidden" name="action" value="revslider_ajax_action">
                      <input type="hidden" name="client_action" value="import_slider_slidersview">
                      <input type="hidden" name="nonce"
                             value="<?php echo wp_create_nonce("revslider_actions"); ?>">
                    </td>
                    <td style="padding-left: 250px;">
                      <?php _e("Choose the import file : You can select the demo file zip that's part of theme package when purchased", 'locksmith'); ?>
                      :
                      <br><br>
                      <input type="file" size="60" name="import_file" class="input_import_slider"
                             id="input_import_slider"><br><br>

                      <span
                        style="font-weight: 700;"><?php esc_html_e("Note: styles templates will be updated if they exist!", 'locksmith'); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="display: none;">
                    </td>
                    <td style="padding-left: 250px;"><?php esc_html_e("Custom Animations:", 'locksmith'); ?>
                      <br><br>
                      <input type="radio" name="update_animations" value="true"
                             checked="checked"> <?php esc_html_e("overwrite", 'locksmith'); ?>
                      <input type="radio" name="update_animations" value="false"
                             style="margin-left:30px;"> <?php esc_html_e("append", 'locksmith'); ?>
                      <br><br>
                      <?php esc_html_e("Custom Navigations:", 'locksmith'); ?><br><br>
                      <input type="radio" name="update_navigations" value="true"
                             checked="checked"> <?php esc_html_e("overwrite", 'locksmith'); ?>
                      <input type="radio" name="update_navigations" value="false"
                             style="margin-left:30px;"> <?php esc_html_e("append", 'locksmith'); ?>
                      <br><br>
                      <?php esc_html_e("Static Styles:", 'locksmith'); ?><br><br>
                      <input type="radio" name="update_static_captions"
                             value="true"> <?php esc_html_e("overwrite", 'locksmith'); ?>
                      <input type="radio" name="update_static_captions" value="false"
                             style="margin-left:30px;"> <?php esc_html_e("append", 'locksmith'); ?>
                      <input type="radio" name="update_static_captions" value="none"
                             checked="checked"
                             style="margin-left:30px;"> <?php esc_html_e("ignore", 'locksmith'); ?>
                    </td>
                  </tr>
                  <td style="display: none;">
                  </td>
                  <td style="padding-left: 250px;">
                    <br> <input type="submit" class="button button-primary revblue tp-be-button"
                                value="<?php esc_html_e("Import Slider", 'locksmith'); ?>"><br>
                  </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </form>
          </div>


          <script type="text/javascript">
            jQuery(document).ready(function () {
              jQuery(".revblue.tp-be-button").on('click', function (e) {
                if (jQuery("#input_import_slider").val() == '') {
                  alert("Please select the revslider file");
                  e.preventDefault();
                  return false;
                }
              });
            });
          </script>
        </div>
      </div>
    </div>
    </div>


    <div style="clear: both;">
      <br/><br/><br/><br/><br/><br/>
    </div>


    <div class="wb-item">
      <div class="icon-themes">

      </div>
    </div>
    <?php
  }
}