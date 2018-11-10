<?php 



if ( is_active_sidebar( 'sidebar_blog' ) ) : ?>

<aside class="large-4 sidebar-second columns sidebar">

	<?php dynamic_sidebar( 'sidebar_blog' ); ?>

</aside><!-- #secondary -->

<?php endif;