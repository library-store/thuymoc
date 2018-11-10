<?php
/**
 * The template for displaying search forms in Solar
 *
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform" id="searchform" method="get">
				<div>
					
					<input type="text" id="s" name="s" value="" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'locksmith' ); ?>">
					<input type="submit" value="<?php echo esc_html__('Search','locksmith') ?>" id="searchsubmit">
				</div>
</form>