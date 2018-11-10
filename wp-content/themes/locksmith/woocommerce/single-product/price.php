<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
	/*
	Tạo một file văn bản và lưu với tên index.log để lưu giá trị đếm, nội dung của file này là con số khởi đầu của bộ đếm (có thể bắt đầu bằng số 0 hoặc 	một số bất kỳ). Lưu ý không thêm dấu cách, Enter hay bất kỳ ký tự nào khác.
	*/
	?>
	<p class="price"><span class="gia">Giá: </span><?php echo $product->get_price_html(); ?></p>
	<p class="price"><?php echo "Lượt xem: ". wp_statistics_pages( 'total' , get_permalink($product->get_id()), $product->get_id()); ?>
	</p>

	<ul class="toots">
		<li>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
			<a class="zoom" href="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">Phóng to hình
				<img style="display: none;" src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
			</a>
		</li>
		<li>
			<a href="#" class="print" onclick="myFunction()">In trang này</a>
		</li>
		<li>
			<a class="saveaddthis" href="">Lưu Tin</a>
			<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_9hnr"]'); ?>
		</li>
		<li>
			<a href="#"  class="popup">Gửi cho bạn bè</a>
			<?php echo do_shortcode("[popuppress id='1947'] "); ?>
		</li>
	</ul>


	<script>
		function myFunction() {
			window.print();
		}
	</script>
	<?php wp_footer(); ?>