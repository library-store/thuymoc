<?php

$locksmith_custom_css = "";
$locksmith_custom_css .= "";
//______________ background header pages ______________________________
global $wp_query;
define ('locksmith_PAGE_ID' , 0 );
if ( is_object( $wp_query ) && is_object( $wp_query->post ) && isset( $wp_query->post->ID ) ) {
  $GLOBALS['locksmith_PageID'] = $wp_query->post->ID;
} else {
  $GLOBALS['locksmith_PageID'] = '';
}
$locksmith_page_bg_img = get_post_meta( $GLOBALS['locksmith_PageID'], 'locksmith_page_title_area_bg_img', true );
if ( $locksmith_page_bg_img != '' ) {
  $locksmith_custom_css .= "
			.wd-title-bar {
				background:url(" . $locksmith_page_bg_img . ") no-repeat #6DD676;
				background-size:cover;
			}
		";
}
$locksmith_page_title_color = get_post_meta( $GLOBALS['locksmith_PageID'], 'locksmith_page_title_color', true );
if ( $locksmith_page_title_color != '' ) {
  $locksmith_custom_css .= "
			.wd-title-bar div h2,
			.wd-title-bar div h5 {
				color: " . $locksmith_page_title_color . ";
			}
		";
}
//______________ background header single pages ______________________________

$locksmith_single_post_bg_img = locksmith_get_option( 'locksmith_bg_single_post_path','');
if($locksmith_single_post_bg_img != ''){
  $locksmith_custom_css .= "
			.single-post .wd-title-bar {
				background:url(".$locksmith_single_post_bg_img .") no-repeat #6DD676;
				background-size:cover;
			}
		";
}

//______________ Typography  ______________________________
if((locksmith_get_option('locksmith_body_font_familly','Open Sans')!='default') && (locksmith_get_option('locksmith_body_font_familly' ,'Open Sans')!= false)){
  $locksmith_custom_css .= "body ,body p {
    	font-family :'". locksmith_get_option('locksmith_body_font_familly', 'Open Sans')."';
    	font-weight :" . locksmith_get_option('locksmith_body_font_weight', '400').";
    }";
}else {
  $locksmith_custom_css .= "body ,body p {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . locksmith_get_option('locksmith_body_font_weight', '400').";
    }";
}
if((locksmith_get_option('locksmith_body-font-size','14')!='default') && (locksmith_get_option('locksmith_body-font-size','14')!= false) ){
  $locksmith_custom_css .= "body p {
    	font-size :". locksmith_get_option('locksmith_body-font-size','14')."px;
    }";
}
if((locksmith_get_option('locksmith_head_font_familly','Raleway')!='default') && (locksmith_get_option('locksmith_head_font_familly','Raleway')!= false) ){
  $locksmith_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family :'". locksmith_get_option('locksmith_head_font_familly','Raleway')."';
    	font-weight :" . locksmith_get_option('locksmith_heading-font-weight-style','700').";
    }";
}else {
  $locksmith_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . locksmith_get_option('locksmith_heading-font-weight-style','400').";
    }";
}

if( locksmith_get_option('locksmith_navigation_font_familly', 'Raleway') != "default") {
  $locksmith_custom_css .= ".top-bar-section ul li > a {
				font-family : '" . locksmith_get_option( 'locksmith_navigation_font_familly', 'Raleway' ) . "';
			}";
}
else {
  $locksmith_custom_css .= ".top-bar-section ul li > a {
				font-family: 'Open Sans', sans-serif;
			}";
}
if( locksmith_get_option('locksmith_navigation-font-weight-style', '400') != "") {
  $locksmith_custom_css .= ".top-bar-section ul li > a {
				font-weight : " . locksmith_get_option( 'locksmith_navigation-font-weight-style' ,'400') . ";
			}";
}

if( locksmith_get_option('locksmith_navigation-transform' ,'normal') != "") {
  $locksmith_custom_css .= ".top-bar-section ul li > a {
				text-transform : " . locksmith_get_option( 'locksmith_navigation-transform' ,'normal' ) . ";
			}";
}
if((locksmith_get_option('locksmith_navigation-font-size', '14')!='default') && (locksmith_get_option('locksmith_navigation-font-size', '14')!= false) ){
  $locksmith_custom_css .= ".top-bar-section ul li > a {
    	font-size :". locksmith_get_option('locksmith_navigation-font-size', '14')."px;
    }";
}
if( locksmith_get_option('locksmith_heading-transform', 'normal') != "") {
  $locksmith_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
				text-transform : " . locksmith_get_option( 'locksmith_heading-transform', 'normal') . ";
			}";
}
if( locksmith_get_option('locksmith_text-transform', 'normal') != "") {
  $locksmith_custom_css .= "body ,body p {
				text-transform : " . locksmith_get_option( 'locksmith_text-transform', 'normal') . ";
			}";
}


//_______________ background Primary color___________________________
$locksmith_custom_css .= "
					.primary-color,#filters li:hover,#filters li:first-child, #filters li:focus, #filters li:active,
					.wd-section-blog-services.style-3 .wd-blog-post h4:after,
					.box-icon img, .box-icon i,
					button:hover, button:focus, .button:hover, .button:focus,
					button, .button,
					.wd-latest-news .wd-image-date span strong,
					.wd-section-blog.style2 h4:after,
					.pricing-table.featured .title,
					.accordion .accordion-navigation > a, .accordion dd > a,
					.searchform #searchsubmit,.wd-pagination span,.blog-page .quote-format blockquote,
					.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
					.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
					.products .product .button,
					.woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt,
					.woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt,
					.woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt,
					.woocommerce-page button.button.alt, .woocommerce-page input.button.alt,
					.woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, 
					.woocommerce a.button:hover, .woocommerce button.button:hover, 
					.woocommerce input.button:hover, .woocommerce-page #content input.button:hover, 
					.woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover,
					.woocommerce-page button.button:hover, .woocommerce-page input.button:hover,
					.woocommerce span.onsale, .woocommerce-page span.onsale,
					.woocommerce-page button.button, .widget_product_search #searchsubmit, .widget_product_search #searchsubmit:hover,
					.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
					.wd-text-icon-style2 .box-icon img, .wd-text-icon-style2 .box-icon i, .wd-text-icon-style3 .box-icon img, .wd-text-icon-style3 .box-icon i,
					.wd-section-call-to-action,.wd-call-to-action-btn-invers a, .pricing-table.featured .price, .blog-page .post-left .month, 
					.creative-layout .contain-to-grid.sticky.header_layout_tow .top-bar .title-area
					{
						background:".locksmith_get_option('locksmith_primary_color','#83ca13').";
					}
	";
$locksmith_custom_css .= "
.wd-section-call-to-action-invers .call-to-action-invers {
  border-color:".locksmith_get_option('locksmith_primary_color','#83ca13').";
}
";
//_______________ svg stroke Primary color___________________________
$locksmith_custom_css .= "
	.wd-section-blog-services.style-3 .wd-blog-post .shape {
		stroke: ".locksmith_get_option('locksmith_primary_color','#83ca13')."
	}
	";

$locksmith_custom_css .= "
	.wd-menu3-logo {
		border-top: 70px solid ".locksmith_get_option('locksmith_nav_bg_color','#83ca13')."
	}
	";

$locksmith_custom_css .= "
	.triongle {
		background-color: ".locksmith_get_option('locksmith_nav_bg_color','#83ca13')."
	}
	";


//_______________ text Primary color___________________________
$locksmith_custom_css .= "
			
			.blog-page .read-more-link,
			#wp-calendar a,.wd-testimonail blockquote cite,
			.list-icon li:before
			{
				color:".locksmith_get_option('locksmith_primary_color','#83ca13').";
			}
			a:hover, a:focus,
			.wd-latest-news .hvr-pop.read-more,
			.blog-page .read-more-link, #wp-calendar a, .wd-testimonail blockquote cite, .list-icon li::before, 
			.creative-layout .contain-to-grid.sticky.header_layout_tow .top-bar .top-bar-section .creative-social ul.social-icons .call span {
				color:".locksmith_get_option('locksmith_primary_color','#83ca13').";
			}
	
	";
//_______________ background secondary Primary color___________________________
$locksmith_custom_css .= "
		.hvr-underline-from-center:before,
		.hvr-outline-in:before
			{
				border-color:".locksmith_get_option('locksmith_secondary_color','#83ca13').";
			}
	";

$locksmith_custom_css .= "
		.wd-footer {
		    background: rgb(44, 44, 44) url(".locksmith_get_option('locksmith_footer_bg_path').");
		    background-size: cover;
		    background-position: bottom;
		}
	";
//_______________ custom css ___________________________
$locksmith_custom_css .= locksmith_get_option('locksmith_theme_custom_css','');

$locksmith_custom_css .= "
  .wd-title-section_c h2::after, .wd-title-section_l h2::after, .wd-latest-news .wd-title-element::after, .hvr-underline-from-center::before  {
    background-color: ".locksmith_get_option('locksmith_primary_color', '#B6702A').";
  }
  .wd-latest-news .hvr-pop.read-more{
    color: ".locksmith_get_option('locksmith_primary_color', '#B6702A').";
  }

  button.alert, .button.alert, .wd-newsletter .newslettersubmit{
    background-color: ".locksmith_get_option('locksmith_primary_color', '#B6702A').";
    border-color: ".locksmith_get_option('locksmith_primary_color', '#B6702A').";
  }
  a:hover, a:focus {
    color: ".locksmith_get_option('locksmith_primary_color', '#B6702A').";
  }
  .wd-latest-news .wd-image-date span{
    background-color: ".locksmith_get_option('locksmith_secondary_color', '#FBD232').";
  }
  .creative-layout .contain-to-grid.sticky{
    background: linear-gradient(180deg, ".locksmith_get_option('locksmith_nav_bg_color','rgba(255,255,255,0.45)')." 0px,rgba(0,0,0,0) 97%);
  }
  .creative-layout .contain-to-grid.sticky.fixed{
    background-color: ".locksmith_get_option('navigation_bg_color_sticky', 'RGBA(0, 0, 0, 0.8)').";
  }
  .creative-layout .top-bar-section ul li > a {
    color: ".locksmith_get_option('locksmith_nav_color','#fff').";
  }
  .creative-layout .top-bar-section ul li:hover:not(.has-form) > a, .creative-layout .top-bar-section ul li.active_menu > a {
    color: ". locksmith_get_option('locksmith_nav_hover_color','rgb(240, 140, 140)') .";
  }
  .creative-layout .fixed .top-bar-section ul li > a {
    color: ".locksmith_get_option('navigation_color_sticky', '#fff').";
  }
  .creative-layout .fixed .top-bar-section ul li > a:hover, .creative-layout .fixed .top-bar-section ul li.active_menu > a {
    color: ".locksmith_get_option('navigation_color_hover_sticky', '#b6702a').";
  }

  ";
$locksmith_custom_css .= html_entity_decode(locksmith_get_option('locksmith_theme_custom_css', ''));

