<?php

/**

 * The Template for displaying product archives, including the main shop page which is a post type archive.

 *

 * Override this template by copying it to yourtheme/woocommerce/archive-product.php

 *

 * @author 		WooThemes

 * @package 	WooCommerce/Templates

 * @version   3.3.0

 */



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



get_header( 'shop' ); ?>

<?php

		/**

		 * woocommerce_before_main_content hook

		 *

		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)

		 * @hooked woocommerce_breadcrumb - 20

		 */

		do_action( 'woocommerce_before_main_content' );

		?>


		<div class="wd-title-bar">

			<div class="row">

				<div class="large-12 columns wd-title-section_l">

					<h2><?php woocommerce_page_title(); ?></h2>

					<?php 

					$locksmith_page_sub_title = get_post_meta(get_the_ID(), 'locksmith_page_sub_title', true);

					if(!empty($locksmith_page_sub_title)){

						?>

						<h5><?php echo $locksmith_page_sub_title ?></h5>

						<?php }  ?>

					</div>

				</div>

			</div>





			<div class="row">

				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>



					





				<?php endif; ?>






				<div class="large-9 columns">
					<h3 class="titleL" style="text-align: left;">Sản Phẩm</h3>
					<?php  do_action( 'woocommerce_archive_description' ); ?>



					<?php if ( have_posts() ) : ?>



						<?php

					/**

					 * woocommerce_before_shop_loop hook

					 *

					 * @hooked woocommerce_result_count - 20

					 * @hooked woocommerce_catalog_ordering - 30

					 */

					do_action( 'woocommerce_before_shop_loop' );

					?>

					<?php woocommerce_product_loop_start(); ?>



					<?php woocommerce_product_subcategories(); ?>



					<?php while ( have_posts() ) : the_post(); ?>



						<?php wc_get_template_part( 'content', 'product' ); ?>



					<?php endwhile; // end of the loop. ?>



					<?php woocommerce_product_loop_end(); ?>



					<?php

					/**

					 * woocommerce_after_shop_loop hook

					 *

					 * @hooked woocommerce_pagination - 10

					 */

					do_action( 'woocommerce_after_shop_loop' );

					?>



				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>



					<?php wc_get_template( 'loop/no-products-found.php' ); ?>



				<?php endif; ?>



			</div>
			<div class="sidebar_home large-3 columns">
				<?php get_sidebar(); ?>
			</div>


		</div>

		

		<?php

		/**

		 * woocommerce_after_main_content hook

		 *

		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)

		 */

		do_action( 'woocommerce_after_main_content' );

		?>



		<?php

		/**

		 * woocommerce_sidebar hook

		 *

		 * @hooked woocommerce_get_sidebar - 10

		 */

		// do_action( 'woocommerce_sidebar' );

		?>

		<?php get_footer( 'shop' ); ?>