<header class='l-header creative-layout row'>
	<div class="button_menu"><img src="<?php bloginfo('stylesheet_directory'); ?>/inc/images/white-menu-icon.png" alt=""></div>
	<div class="box_top">
		<p class="cart"><a href="http://kimhoangphat.vn/cart/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cart.png" alt=""> <?php echo WC()->cart->get_cart_contents_count(); ?> sản phẩm trong giỏ hàng</a></p>
		<form action="http://devsite.club/inoxsaigon/" class="searchform" id="searchform" method="get">
			<div>
				<input type="text" id="s" name="s" value="" placeholder="Từ khóa">
				<input type="submit" value="Tìm" id="searchsubmit">
			</div>
		</form>
	<?php echo do_shortcode('[social_icons_group id="2053"]'); ?>
	</div>

	<div class="box_img">
		<div class="banner">
			<?php get_sidebar('header' ) ?>
		</div>
		<div class="menu"><?php wp_nav_menu(array('menu'=>'menu_content', 'container'=>'', 'menu_class' => 'menu_content')); ?></div>
	</div>
</header>