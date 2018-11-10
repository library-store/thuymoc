<?php 
function wd_vc_portfolio($atts) {
           
  extract( shortcode_atts( array(
    'itemperpage' => '10',
    'category'=>'',
    'layout' =>'1',
    'columns_mobile' => '1',
    'columns_tablet' => '2',
    'columns_desktop' => '3',
    'css_animation' => 'no'
  ), $atts ) );

  ob_start();
  $animation_classes =  "";
      $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
 if($layout=='2') {
 	 $style = 'wd-section-portfolio'; 
 		}else {
 		$style = 'masque portfolio-grid';
 		}
  ?>
  
<div class="wd-section-project">
  

<?php if (isset($layout) && $layout == 1){ ?>
	<ul class='<?php echo esc_attr( $style ); ?> small-block-grid-<?php echo esc_attr( $columns_mobile ); ?>
	 medium-block-grid-<?php echo esc_attr( $columns_tablet ); ?> large-block-grid-<?php echo esc_attr( $columns_desktop ); ?>'>
		<?php

		$loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $itemperpage ) );

		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li class="<?php echo esc_attr( $animation_classes ); ?>" <?php echo esc_attr( $data_animated ); ?>>
				<div class="wd-project hvr-underline-from-center">
					<?php the_post_thumbnail( 'locksmith_portfolio' ) ?>
					<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>

					<p><?php
						$terms = get_terms( "projet" );

						foreach ( $terms as $term ) {
							?> <?php echo esc_attr( $term->name ); ?><span>- </span> <?php
						}
						?></p>
				</div>

			</li>
		<?php endwhile; ?>
	</ul>
<?php } else { ?>
  <ul class='<?php echo esc_attr($style); ?> small-block-grid-<?php echo esc_attr($columns_mobile); ?> medium-block-grid-<?php echo esc_attr($columns_tablet); ?> large-block-grid-<?php echo esc_attr($columns_desktop); ?>'>
    <?php 
    
    $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $itemperpage ) );
  
   while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li>

					<div class="image-wrapper overlay-slide-in-left">

						 <?php the_post_thumbnail( 'locksmith_portfolio_760x500' ) ?>

						<div class="image-overlay-content">
							<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							
						</div>

					</div>

				</li>
      
    <?php endwhile;?>
  </ul>
<?php } ?>
</div>
  
  
  
  
  <?php return ob_get_clean();
  
}
add_shortcode( 'wd_vc_portfolio', 'wd_vc_portfolio' );