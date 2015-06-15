<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>
<?php if (!is_front_page()) { ?>
	<div id="secondary" class="sidebar-container span_5 col clr-margin" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
			<div id="sidebar-navigation">
				<?php wp_nav_menu(array('menu' => 'Main menu')); ?>
			</div>
		</div>
	</div><!-- #secondary -->
<?php } ?>