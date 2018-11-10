<?php 

/*

Template Name: no sider bar

*/



get_header();



if(!(is_front_page())) {

	$locksmith_page_show_title_area = get_post_meta(get_the_ID(), 'locksmith_page_show_title_area', true);



	if($locksmith_page_show_title_area != 'no'){

		get_template_part('titlebar');

	}

}  ?>



<!-- content  -->

<main class="l-main row">
	

<div class="main large-12 columns">	

	<?php if (have_posts()) :

	while (have_posts()) : the_post(); ?>    

	<article>

		<div class="body field clearfix">

			<?php the_content(); ?>

		</div>

	</article>

<?php endwhile;

endif; ?>

<?php if (comments_open() && !is_front_page()){

	comments_template( '', true ); 

} ?>

</div>  

</main>

<!-- /content  -->



<?php get_footer(); ?>