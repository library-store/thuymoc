<?php get_header(); ?>



	<div class="wd-title-bar">

		<div class="row">

			<div class="large-12 columns wd-title-section_l">

				<h2><?php the_title(); ?></h2>

			</div>

		</div>

	</div>



	<main id="l-main" class="main">

		<section class="wd-section-about-us">

			<div class="row p-t-70">

				<?php if (have_posts()) :

					while (have_posts()) : the_post(); ?>



						<div class="large-6 columns">

								<div class="owl-testimonail">

									<?php

									the_post_thumbnail( 'locksmith_blog-thumb' );



			             $portfolio_image_gallery_val = get_post_meta( $post->ID, 'locksmith_portfolio-image-gallery', true );

			             if($portfolio_image_gallery_val!='' ) $portfolio_image_gallery_array=explode(',',$portfolio_image_gallery_val);

			                 

			             if(isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array)!=0):

			             

			              foreach($portfolio_image_gallery_array as $gimg_id):

			             

			               $gimage_wp = wp_get_attachment_image_src($gimg_id,'locksmith_blog-thumb', true);

			               echo '<img src="'.$gimage_wp[0].'"/>';

			              

			              endforeach;

			              

			             endif;

             ?>

								</div>

						</div>

						<div class="large-6 columns">

							<div class="wd-title-block">

								<h4>

									<?php echo esc_html_e( 'PROJECT DETAILS', 'locksmith' ) ?>

								</h4>

							</div>

							<?php the_content(); ?>

						</div>

					<?php endwhile;

				endif; ?>

			</div>

		</section>



		<section class="wd-section-project-page">

			<div class="row animation-parent" data-animation-delay="100">

				<div class="row">

					<h4 class="m-b-15"><?php echo esc_html_e( 'RELATED PROJECTS', 'locksmith' ) ?></h4>

					<?php echo do_shortcode('[wd_vc_portfolio css_animation="flipInX" itemperpage="4" number="4" columns_desktop="4" columns_tablet="3" columns_mobile="1"]'); ?>

				</div>

			</div>

		</section>



	</main>



<?php get_footer(); ?>