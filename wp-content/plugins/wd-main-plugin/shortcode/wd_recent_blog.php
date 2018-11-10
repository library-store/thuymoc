<?php 
if(!function_exists('wd_recent_blog')){
function wd_recent_blog($atts) {

	$show_thumbnail = "";
  extract( shortcode_atts( array(
    'itemperpage' => '3',
    'columns_mobile' => '1',
    'columns_tablet' => '2',
    'columns_desktop' => '3',
    'show_thumbnail' => 'yes',
    'css_animation' => 'no'
  ), $atts ) );

  ob_start();
  $animation_classes =  "";
      $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
?>

	<ul class='simple-blog small-block-grid-<?php echo $columns_mobile; ?> medium-block-grid-<?php echo $columns_tablet; ?> large-block-grid-<?php echo $columns_desktop; ?>' >
  	<?php	$loop = new WP_Query( array( 'posts_per_page' => $itemperpage ) );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    
    	<li>
    	   <div class="wd-latest-news hvr-underline-from-center <?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
            <div class="wd-image-date">
              <?php if($show_thumbnail != "") the_post_thumbnail( 'locksmith_blog' ) ?>
              <span><strong><?php the_time('d'); ?></strong><?php the_time('M'); ?></span>
            </div>
            <h4 class="wd-title-element"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p>
              <?php echo wp_trim_words(get_the_content(),25); ?>
              <a class="hvr-pop read-more" href="<?php the_permalink() ?>">Read More →</a>
            </p>
        </div>
    	</li>
  	<?php endwhile;?>
  </ul>
  <?php return ob_get_clean();
  }
add_shortcode( 'wd_blog', 'wd_recent_blog' ); }  ?>