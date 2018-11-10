<header class=" wd-menu3-header ">
	<div class="show-for-medium-up wd-menu3-logo">
		<?php
		$locksmith_logo_path = locksmith_get_option('locksmith_logo_path', 'http://themes.webdevia.com/locksmith/wp-content/themes/locksmith/images/logo-white.png') ?>
		<h1><a title="<?php echo bloginfo("name"); ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img alt="logo" src="<?php echo esc_attr($locksmith_logo_path) ?>"></a></h1>
	</div>
	<div class=" wd-menu3-nav">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="toggle-topbar menu-icon"><a href="#"><span><?php echo esc_html__('Menu','locksmith') ?></span></a></li>
			</ul>
			<section class="top-bar-section">
				<?php wp_nav_menu(array('theme_location' => 'primary','walker' => new locksmith_top_bar_walker,'fallback_cb' => 'locksmith_main_menu_fallback'))  ?>
			</section>
		</nav>
	</div>
	<div class="show-for-large-up triongle"></div>
	<div class="show-for-large-up wd-menu3-social">
		<?php if(locksmith_get_option('locksmith_show_adress_bar') == '1'){ ?>
		<ul class="social-icons inline-list">
			<?php if (locksmith_get_option('locksmith_get_option') != ""): ?>
			<li class="facebook">
				<a href="<?php echo locksmith_get_option('locksmith_get_option','') ?>"><i class="fa fa-facebook"></i></a>
			</li>
			<?php endif;
			if (locksmith_get_option('locksmith_twitter') != ""): ?>
			<li class="twitter">
				<a href="<?php echo locksmith_get_option('locksmith_twitter','') ?>"><i class="fa fa-twitter"></i></a>
			</li>
			<?php endif;
			if (locksmith_get_option('locksmith_google_plus') != ""): ?>
			<li class="googleplus">
				<a href="<?php echo locksmith_get_option('locksmith_google_plus','') ?>"><i class="fa fa-google-plus"></i></a>
			</li>
           <?php endif; ?>
		</ul>
		<?php } ?>
	</div>

</header>