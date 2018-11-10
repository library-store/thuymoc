<?php

/**

 *----------------- include ------------------------------------------

 */





include_once( get_template_directory() .'/inc/tools.php' );

include_once( get_template_directory() .'/inc/plugins/plugins.php' );

include_once( get_template_directory() .'/inc/panel.php' );

include_once(get_template_directory() .'/inc/meta-box.php');

include_once(get_template_directory() .'/inc/walker/webdevia_walker.php');



load_theme_textdomain( "locksmith", get_template_directory().'/languages' );





/**

 *--------------------------------------------------------------------

 */

/**

 * Sets up the content width value based on the theme's design and stylesheet.

 */

if ( ! isset( $content_width ) )

	$content_width = 625;



/* Add post formats */



if ( function_exists( 'add_theme_support' ) ) {

	add_theme_support( 'post-thumbnails' );

	add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

	add_theme_support('automatic-feed-links');

	add_theme_support('custom-background');

	add_theme_support( 'title-tag' );

	add_theme_support( 'html5', array( 'search-form' ) );

	add_theme_support('woocommerce');

	$defaults = array(

		'default-image' => '',

		'random-default' => false,

		'width' => 0,

		'height' => 0,

		'flex-height' => false,

		'flex-width' => false,

		'default-text-color' => '',

		'header-text' => true,

		'uploads' => true,

		'wp-head-callback' => '',

		'admin-head-callback' => '',

		'admin-preview-callback' => '',

		'video' => false,

		'video-active-callback' => 'is_front_page',

	);

	add_theme_support( 'custom-header', $defaults );



	

}



/**

 *--------------- Image presets-----------

 */



add_image_size( 'locksmith_blog-thumb',            840, 424, true );

add_image_size( 'locksmith_blog',            368, 193, true );

add_image_size( 'locksmith_portfolio',      380, 254, true );

add_image_size( 'locksmith_portfolio_760x500',  760, 500, true );

add_image_size( 'locksmith_testimonial',      250, 250, true );

add_image_size( 'locksmith_team',      445, 445, true );







/**

 *-----------------add sidebar------------------------------------------

 */



function locksmith_widgets_init() {

	register_sidebar(array(

		'name' => esc_html__('Sidebar','locksmith'),

		'id' => 'sidebar',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>', 

		'before_title' => '<h2 class="block-title">', 

		'after_title' => '</h2>', 

	));

	register_sidebar(array(

		'name' => esc_html__('Sidebar_blog','locksmith'),

		'id' => 'sidebar_blog',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>', 

		'before_title' => '<h2 class="block-title">', 

		'after_title' => '</h2>', 

	));


	register_sidebar(array(

		'name' => esc_html__('Sidebar_about','locksmith'),

		'id' => 'sidebar_about',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>', 

		'before_title' => '<h2 class="block-title">', 

		'after_title' => '</h2>', 

	));


	register_sidebar(array(

		'name' => esc_html__('Sidebar_header','locksmith'),

		'id' => 'sidebar_header',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>', 

		'before_title' => '<h2 class="block-title">', 

		'after_title' => '</h2>', 

	));


	register_sidebar(array(

		'name' => esc_html__('Footer 1','locksmith'),

		'id' => 'footer-1',

		'before_widget' => '<li>',

		'after_widget' => '</li>',

		'before_title' => '<h2 class="block-title">',

		'after_title' => '</h2>',

	));



	register_sidebar(array(

		'name' => esc_html__('Footer 2','locksmith'),

		'id' => 'footer-2',

		'before_widget' => '<li>',

		'after_widget' => '</li>',

		'before_title' => '<h2 class="block-title">',

		'after_title' => '</h2>',

	));

	register_sidebar(array(

		'name' => esc_html__('Footer 3','locksmith'),

		'id' => 'footer-3',

		'before_widget' => '<li>',

		'after_widget' => '</li>',

		'before_title' => '<h2 class="block-title">',

		'after_title' => '</h2>',

	));

	register_sidebar(array('name' => esc_html__( 'Woocommerce Sidebar','locksmith' ),

		'id' => 'shop-widgets',

		'description' => esc_html__( 'Appears on the shop page of your website.', 'locksmith' ),

		'before_widget' => '<div id="%1$s" class="widget %2$s shop-widgets sidebar">',

		'after_widget' => '</div>',

		'before_title' => '<h2 class="block-title">',

		'after_title' => '</h2>',

	));

}

add_action( 'widgets_init', 'locksmith_widgets_init' );





//____________navigation____________



register_nav_menus( array(  

	'primary' => esc_html__( 'Primary Navigation', 'locksmith' ),

) );

function locksmith_main_menu_fallback() {

	echo '<div class="empty-menu">';

	echo __( 'Please assign a menu to the primary menu location under ', 'locksmith' ); ?>

	<a href="<?php echo get_admin_url( get_current_blog_id(), 'nav-menus.php' ) ?>"><?php echo esc_html__('Menus Settings','locksmith'); ?></a>

	</div> <?php

}



function locksmith_register_locksmith_menu() {

	register_nav_menu('footer',esc_html__( 'Footer', 'locksmith'));

}

add_action( 'init', 'locksmith_register_locksmith_menu' );

//--------load css and js----------------------------

function locksmith_theme_add_editor_styles() {

	add_editor_style( 'custom-editor-style.css' );

}

add_action( 'admin_init', 'locksmith_theme_add_editor_styles' );



function locksmith_fonts_url($font_body_name, $locksmith_font_weight_style, $locksmith_main_text_font_subsets) {

	$font_url = '';



	/*

	Translators: If there are characters in your language that are not supported

	by chosen font(s), translate this to 'off'. Do not translate into your own language.

	 */

	if ( 'off' !== _x( 'on', 'Google font: on or off', 'locksmith' ) ) {

		$font_url = add_query_arg( 'family', urlencode( $font_body_name . ':' . $locksmith_font_weight_style . '&subset=' . $locksmith_main_text_font_subsets ), "//fonts.googleapis.com/css" );

	}

	return $font_url;

}





function locksmith_load_js_css_file() {

	



	$font_body_name =locksmith_get_option('locksmith_body_font_familly','Open Sans');

	$locksmith_font_weight_style = locksmith_get_option('locksmith_body_font_weight', '400');

	$locksmith_main_text_font_subsets = locksmith_get_option('locksmith_main-text-font-subsets', 'latin');



	$font_header_name = locksmith_get_option('locksmith_head_font_familly','Raleway');

	$locksmith_heading_font_weight_style = locksmith_get_option('locksmith_heading-font-weight-style', '400');

	$locksmith_heading_text_font_subsets = locksmith_get_option('locksmith_heading-text-font-subsets', 'latin');



	$locksmith_navigation_font_familly = locksmith_get_option('locksmith_navigation_font_familly','Raleway');

	$locksmith_navigation_font_weight_style = locksmith_get_option('locksmith_navigation-font-weight-style', '400');

	$locksmith_navigation_text_font_subsets = locksmith_get_option('locksmith_navigation-text-font-subsets', 'latin');





	// Enqueue body font

	if($font_body_name != "default"){

		wp_enqueue_style( 'wd-fonts-body', locksmith_fonts_url($font_body_name, $locksmith_font_weight_style, $locksmith_main_text_font_subsets), array(), '1.0.0' );

	}else{

		wp_enqueue_style('wd-fonts-body',locksmith_fonts_url('Open+Sans','400,300,700','latin,latin-ext'), array(), '1.0.0' );

	}

	// Enqueue headers font

	if($font_header_name != "default"){

		wp_enqueue_style( 'wd-fonts-header', locksmith_fonts_url($font_header_name, $locksmith_heading_font_weight_style, $locksmith_main_text_font_subsets), array(), '1.0.0' );

	}

	// Enqueue navigation font

	if($locksmith_navigation_font_familly != "default"){

		wp_enqueue_style( 'wd-fonts-navigation', locksmith_fonts_url($locksmith_navigation_font_familly, $locksmith_navigation_font_weight_style, $locksmith_navigation_text_font_subsets), array(), '1.0.0' );

	}





	//________________________css______________________________

	wp_enqueue_style( 'owl-carousel',          get_template_directory_uri() . "/stylesheets/owl.carousel.css" );

	wp_enqueue_style( 'owl-theme',             get_template_directory_uri() . "/stylesheets/owl.theme.css" );

	wp_enqueue_style( 'animate',               get_template_directory_uri() . "/stylesheets/animate.css" );

	wp_enqueue_style( 'swiper',                get_template_directory_uri() . "/stylesheets/swiper.min.css" );

	wp_enqueue_style( 'font-awesome',          get_template_directory_uri() . "/stylesheets/font-awesome/font-awesome.min.css" );

	wp_enqueue_style( 'locksmith-app',         get_template_directory_uri() . "/stylesheets/app.css" );

	wp_enqueue_style( 'locksmith-woocommerce', get_template_directory_uri() . "/stylesheets/woocommerce.css");

	wp_enqueue_style( 'locksmith-custom-style',  get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'slick',  get_template_directory_uri() . '/inc/css/slick-theme.css');
	wp_enqueue_style( 'slick-theme',  get_template_directory_uri() . '/inc/css/slick.css');
	wp_enqueue_style( 'custom',  get_template_directory_uri() . '/inc/css/custom.css');


	

	//________________________js______________________________



	$locksmith_google_key = locksmith_get_option('google_map_key');

	wp_enqueue_script( 'googlemaps',          "https://maps.googleapis.com/maps/api/js?key=".$locksmith_google_key, array('jquery'), '4.4.2', true);

	wp_enqueue_script( 'foundation',           get_template_directory_uri() . '/js/plugins/foundation.min.js',array( 'jquery' ));

	wp_enqueue_script( 'owl-carousel',         get_template_directory_uri() . '/js/plugins/owl_carousel.min.js',array( 'jquery' ));

	wp_enqueue_script( 'swiper',               get_template_directory_uri() . '/js/plugins/swiper.min.js',array( 'jquery' ));

	wp_enqueue_script( 'counter',              get_template_directory_uri() . '/js/plugins/counter.min.js',array( 'jquery' ));

	wp_enqueue_script( 'is-mobile',            get_template_directory_uri() . '/js/plugins/is_mobile.min.js',array( 'jquery' ));

	wp_enqueue_script( 'smoothscroll',         get_template_directory_uri() . '/js/plugins/smoothscroll.min.js',array( 'jquery' ));

	wp_enqueue_script( 'appear',               get_template_directory_uri() . '/js/plugins/appear.min.js',array( 'jquery' ));

	wp_enqueue_script( 'waypoints',            get_template_directory_uri() . '/js/plugins/waypoints.min.js',array( 'jquery' ));

	wp_enqueue_script( 'locksmith-shortcodes', get_template_directory_uri() . "/js/shortcode/script-shortcodes.js", array( 'jquery' ) );

	wp_enqueue_script( 'parallax',             get_template_directory_uri() . '/js/plugins/parallax.min.js',array( 'jquery' ));

	wp_enqueue_script( 'isotope',              get_template_directory_uri() . '/js/plugins/isotope.min.js',array( 'jquery' ));

	wp_enqueue_script( 'modernizr',            get_template_directory_uri() . '/js/plugins/modernizr.min.js',array( 'jquery' ));

	wp_enqueue_script( 'locksmith-wd_owlcarousel', get_template_directory_uri() . "/js/wd_owlcarousel.js", array( 'jquery' ) );

	wp_enqueue_script( 'slick-scripts',     get_template_directory_uri() . '/inc/js/slick.min.js',array( 'jquery' ));

	wp_enqueue_script( 'locksmith-scripts',     get_template_directory_uri() . '/js/scripts.js',array( 'jquery' ));

	wp_enqueue_script( 'custom-scripts',     get_template_directory_uri() . '/inc/js/custom.js',array( 'jquery' ));

	if ( is_singular() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );

	

	//________________________inline style______________________________

	wp_enqueue_style( 'locksmith_inline_style',  get_template_directory_uri() . '/inc/custom-style.php');

	// include_once( get_template_directory() .  '/inc/custom-style.php');

	wp_add_inline_style( 'locksmith_inline_style', $locksmith_custom_css );

}

add_action( 'wp_enqueue_scripts', 'locksmith_load_js_css_file' );











// initialize options

if (!function_exists('locksmith_initialize_options')) {

	function locksmith_initialize_options() {

		$options_arrays = array();

		$options_arrays = get_option( "locksmith_options_array" );

		if( !$options_arrays ) {



			$options_array = array(



				'locksmith_primary_color' => "",

				'locksmith_secondary_color' => "",

				'locksmith_logo_path' => "",

				'locksmith_menu_layout' => "",

				'locksmith_favicon_icon_path' => "",

				'locksmith_menu_style' => "",

				'locksmith_facebook' => "",

				'locksmith_twitter' => "",

				'locksmith_google_plus' => "",

				'locksmith_body_font_familly' => "",

				'locksmith_body_font_weight' => "",

				'locksmith_main-text-font-subsets' => "",

				'locksmith_head_font_familly' => "",

				'locksmith_heading-font-weight-style' => "",

				'locksmith_heading-text-font-subsets' => "",

				'locksmith_navigation_font_familly' => "",

				'locksmith_navigation-font-weight-style' => "",

				'locksmith_navigation-text-font-subsets' => "",

				"locksmith_theme_custom_css" => "",

				'locksmith_theme_custom_js' => "",

				'locksmith_footer_columns' => "",

				'locksmith_nav_bg_color' => '',

				'locksmith_copyright' => "",

			);

			update_option("locksmith_options_array",$options_array);

		}

	}

}





// get options value

if (!function_exists('locksmith_get_option')) {

	function locksmith_get_option($locksmith_option_key , $locksmith_option_default_value = null) {

		locksmith_initialize_options();

		$options_array = get_option("locksmith_options_array");

		$locksmith_meta_value = "";



		// for demo purpose

		if(function_exists("wd_custom_options")) {

			$options_array = wd_custom_options($options_array);

		}



		if (array_key_exists($locksmith_option_key, $options_array)) {

			if (isset($options_array[$locksmith_option_key]) && !empty($options_array[$locksmith_option_key])) {

				$locksmith_meta_value = esc_attr($options_array[$locksmith_option_key]);

			}



			if ($locksmith_meta_value == "") {

				$locksmith_meta_value = $locksmith_option_default_value;

			}

		}

		

		return $locksmith_meta_value;

	}

}



// get options value

if (!function_exists('locksmith_save_option')) {

	function locksmith_save_option($locksmith_option_key, $locksmith_option_value) {

		$options_array = get_option("locksmith_options_array");

		$options_array[$locksmith_option_key] = $locksmith_option_value;

		update_option("locksmith_options_array",$options_array);

	}

}







/*---------wooocomerce---------*/

//Reposition WooCommerce breadcrumb 

function locksmith_woocommerce_remove_breadcrumb(){

	remove_action( 

		'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

}

add_action(

	'woocommerce_before_main_content', 'locksmith_woocommerce_remove_breadcrumb'

);



function locksmith_woocommerce_custom_breadcrumb(){

	woocommerce_breadcrumb();

}



add_action( 'woo_custom_breadcrumb', 'locksmith_woocommerce_custom_breadcrumb' );





// Display 16 products per page.

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 16;' ), 20 );









// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)

add_filter( 'woocommerce_add_to_cart_fragments', 'locksmith_woocommerce_header_add_to_cart_fragment' );



function locksmith_woocommerce_header_add_to_cart_fragment( $fragments ) {

	ob_start();

	?>

	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart','locksmith' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'locksmith' ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>

	<?php

	

	$fragments['a.cart-contents'] = ob_get_clean();

	

	return $fragments;

}









/*--------------------meta box multi image uploade-------------------*/

// add meta box

function locksmith_multiple_image () {

	add_meta_box('locksmith_meta_box_multiple_image', 'Multiple Image', 'locksmith_upload_image','portfolio');

}

add_action( 'add_meta_boxes', 'locksmith_multiple_image' );

function locksmith_upload_image() {

	global $post; ?>



	<div class="add_portfolio_images">

		<h3>Portfolio Images (multiple upload)</h3>

		<div class="add_portfolio_images_inner">



			<button class="wd-gallery-upload button button-primary button-large">Browse</button>

			<ul class="wd-gallery-images-holder clearfix">

				<?php

				$portfolio_image_gallery_val = get_post_meta( $post->ID, 'locksmith_portfolio-image-gallery', true );



				if($portfolio_image_gallery_val!='' ) $portfolio_image_gallery_array=explode(',',$portfolio_image_gallery_val);



				if(isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array)!=0):



					foreach($portfolio_image_gallery_array as $gimg_id):



						$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);

						echo '<li class="wd-gallery-image-holder"><img src="'.$gimage_wp[0].'"/></li>';



					endforeach;



				endif;

				?>

			</ul>

			<input type="hidden" value="<?php echo esc_attr($portfolio_image_gallery_val); ?>" id="locksmith_portfolio-image-gallery" name="locksmith_portfolio-image-gallery">

		</div>

	</div>

	<?php

}

//save meta box

function locksmith_save_meta_box_image( $post_id ) {

	if ( isset( $_POST['locksmith_portfolio-image-gallery'] ) ) {

		update_post_meta( $post_id, 'locksmith_portfolio-image-gallery', $_POST['locksmith_portfolio-image-gallery'] );

	}

}

add_action('save_post', 'locksmith_save_meta_box_image' );

//ajax 

if (!function_exists('locksmith_gallery_upload_get_images')){

	function locksmith_gallery_upload_get_images(){

		$ids=$_POST['ids'];

		$ids=explode(",",$ids);

		foreach($ids as $id):

			$image = wp_get_attachment_image_src($id,'thumbnail', true);

			echo '<li class="wd-gallery-image-holder"><img src="'.$image[0].'"/></li>';

		endforeach;

		exit;  

	}

}

add_action( 'wp_ajax_locksmith_gallery_upload_get_images', 'locksmith_gallery_upload_get_images');





function locksmith_theme_custom_js() { ?>

<script type="text/javascript">

	<?php echo locksmith_get_option('locksmith_theme_custom_js') ?>

</script>

<?php

}



add_action( 'wp_footer', 'locksmith_theme_custom_js' );



if(!class_exists('portfolio_cats')) {

	class portfolio_cats {

		function return_cat_list($taxonomy = ''){

			$args = array(

				'type' => 'post',

				'hide_empty' => 0

			);



			$output = array();



			$args['taxonomy'] = $taxonomy;

			$categories = get_categories( $args);



			if(!empty($categories) && is_array($categories)) {

				foreach( $categories as $category ) {

					if(is_object($category)) {

						$output[$category->name] = $category->slug;

					}

				}

			}



			return $output;

		}

	}

}


// filter the Gravity Forms button type
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
	return "<button class='gform_button button' id='gform_submit_button_{$form['id']}'><span>Gửi</span></button> 
	<input type='reset' class='gform_button button reset' value='Làm lại'>";
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
function shortcode_slide($args) { ?>
<section class=" recent">
	<h3>Sản phẩm mới </h3>
	<div  class="slider">
		<?php
		$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4, 'orderby' =>'date','order' => 'DESC' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
		<div>    
			<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
				<p class="title"><?php the_title(); ?></p>
			</a>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
</div><!-- /row-fluid -->
</section><!-- /recent -->	
<?php  }
add_shortcode( 'shortcode_slides', 'shortcode_slide' );


function shortcode_menu($args) { ?>
<h3>Dịch vụ</h3>
<?php wp_nav_menu(array('menu'=>'custom_link', 'container'=>'', 'menu_class' => 'custom_link')); ?>
<?php  }
add_shortcode( 'shortcode_menus', 'shortcode_menu' );



function shortcode_product_cat($args) { ?>
<div class="box">
	<h3>Giới Thiệu</h3>
	<?php wp_nav_menu(array('menu'=>'menu_about', 'container'=>'', 'menu_class' => 'menu_about')); ?>
</div>




<?php  }
add_shortcode( 'shortcode_product_cats', 'shortcode_product_cat' );



function shortcode_product_blog($args) { ?>
<div class="box">
	<h3>Tin tức</h3>
	<ul>
		<?php
		$parent_terms = get_terms( 'category', array( 'hide_empty' => false, 'parent' => 0 ));
		foreach($parent_terms as $parent_term ) { ?>
		<li><a  class="parent" href="<?php echo  get_category_link($parent_term->term_id) ?>"><?php echo $parent_term->name; ?></a>
			<?php
			$child_terms = get_terms( 'category', array( 'hide_empty' => false, 'parent' => $parent_term->term_id ) ) ; 
			foreach( $child_terms as $child_term ) { 	?>
			<ul>
				<li  class="child"><a href="<?php  echo  get_category_link($child_term->term_id) ?>"><?php echo $child_term->name; ?></a></li>
			</ul>
			<?php } 	?>
		</li>

		<?php	} ?>

	</ul>
</div>


<?php  }
add_shortcode( 'shortcode_product_blogs', 'shortcode_product_blog' );



add_filter( 'woocommerce_product_subcategories_args', 'remove_uncategorized_category' );
/**
 * Remove uncategorized category from shop page.
 *
 * @param array $args Current arguments.
 * @return array
 **/
function remove_uncategorized_category( $args ) {
	$uncategorized = get_option( 'default_product_cat' );
	$args['exclude'] = $uncategorized;
	return $args;
}

function woo_related_products_limit() {
	global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 5; // 4 related products
	$args['columns'] = 5; // arranged in 2 columns
	return $args;
}

add_filter('woocommerce_empty_price_html', 'custom_call_for_price');

function custom_call_for_price() {
return 'Liên hệ';
}
