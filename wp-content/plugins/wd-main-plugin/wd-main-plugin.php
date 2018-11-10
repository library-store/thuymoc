<?php 

/**
 * Plugin Name: Webdevia main plugin
 * Plugin URI: http://www.themeforest.net/user/Mymoun
 * Description: Add features to Mymoun themes.
 * Version: 3.0
 * Author: Mymoun
 * Author URI: http://www.themeforest.net/user/Mymoun
 */




require_once(  plugin_dir_path( __FILE__ ).'post-types.php' );
require_once(  plugin_dir_path( __FILE__ ).'/import/wd-import.php' );

require_once(  plugin_dir_path( __FILE__ ).'widgets/widget.php' );
require_once(  plugin_dir_path( __FILE__ ).'widgets/adress.php' );


include_once( plugin_dir_path( __FILE__ ).'shortcode/parametre_shortcode.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_image_with_text.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_recent_blog.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_portfolio.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_icon_text.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_testimonial.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_clients.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_separator_title.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_countup.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_team.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_call_to_action.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_pricing_table.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_edge_animation.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_slider.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_empty_spaces.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-headings.php' );


function wd_wpcf7_addShortcodeText() {
	wpcf7_add_shortcode(
		array( 'text', 'text*', 'email', 'email*', 'url', 'url*', 'tel', 'tel*' ),
		'wd_wpcf7_text_shortcode_handler', true );
}