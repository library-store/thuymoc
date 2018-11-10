<?php 

if(! function_exists('locksmith_dsm')){

  function locksmith_dsm($var){

    print "<pre>" . print_r($var, true) . "</pre>";

  }

}



function locksmith_is_blog() {

	global  $post;

	$posttype = get_post_type($post );

	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;

}

// retrieves the attachment ID from the file URL
function wd_get_image_id($locksmith_image_url) {
    global $wpdb;
    $locksmith_image_url   = esc_sql( $locksmith_image_url );
    $locksmith_attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $locksmith_image_url ));
    if (isset($locksmith_attachment[0])) {
    	return $locksmith_attachment[0];
    }
}

    function locksmith_get_categories( $taxonomy = '') {
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