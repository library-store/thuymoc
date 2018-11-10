<?php

$locksmith_page_title_position = get_post_meta( $GLOBALS['locksmith_PageID'], 'locksmith_page_title_position', true ); ?>

	<section class="wd-title-bar">
		<div class="row">
			<div class="large-12 columns p-t-70 text-<?php echo esc_attr($locksmith_page_title_position); ?>">
				<?php
				if (locksmith_is_blog()){
					$page_for_posts = locksmith_get_option( 'page_for_posts' ,'' ); ?>
					<h1 id="page-title" class="title"><?php echo get_the_title($page_for_posts); ?></h1>
				  <?php
				}elseif(is_search()){ ?>
					<h2 id="page-title" class="title"><?php echo esc_html__('Search Result of', 'locksmith') .': '. esc_html( get_search_query( false ) ) ?></h2>
					<?php
				}else {
					the_title( '<h2 id="page-title" class="title">', '</h2>' );
				} ?>

				<?php // Subtitle
				$locksmith_page_sub_title = get_post_meta( get_the_ID(), 'locksmith_page_sub_title', true );
				if ( ! empty( $locksmith_page_sub_title ) ) { ?>
					<h5><?php echo esc_attr($locksmith_page_sub_title) ?></h5>
				<?php } ?>
			</div>
		</div>
	</section>

