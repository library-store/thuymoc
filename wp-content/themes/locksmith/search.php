<?php get_header();



get_template_part( 'parts/titlebar' ); ?>



	<main id="l-main" class="row ">

		<div class="large-9 main columns search-result">

			<?php if ( have_posts() ) { ?>

				<?php while ( have_posts() ) {

					the_post(); ?>

					<article <?php post_class( 'result' ); ?>>



						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>



						<div class="body">

							<?php the_content(); ?>

						</div>

					</article>

				<?php }

			}else {



				if ( is_search() ) {

                    ?>

					<div class="no-result large-push-3 large-6">

						<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'locksmith' ); ?></p>

						<?php get_search_form(); ?>

					</div>



				<?php }else { ?>

					<div class="no-result large-push-3 large-6">

						<p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'locksmith' ); ?></p>

						<?php get_search_form(); ?>

					</div>

					<?php

				}

	    }

			 ?>

		</div>
<div class="sidebar_home large-3 columns">
		<?php get_sidebar(); ?>
</div>
	</main>



<?php get_footer(); ?>