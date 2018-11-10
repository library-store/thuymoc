<?php 



if ( is_active_sidebar( 'sidebar_about' ) ) : ?>

<aside class="large-4 sidebar-second columns sidebar">

	<?php dynamic_sidebar( 'sidebar_about' ); ?>

</aside><!-- #secondary -->

<?php endif;