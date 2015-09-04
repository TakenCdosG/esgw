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
				<?php //If you find a better way to do this, please do it ?>
				<?php $ids = array(100, 849, 990, 868); //IDs of the pages under News/Media menu ?>
				<?php $current_post_id = get_the_ID(); ?>
				<?php if (array_search($current_post_id, $ids) !== FALSE): ?>
					<?php wp_nav_menu(array('menu' => 'Top menu')); ?>
				<?php else: ?>
					<?php wp_nav_menu(array('menu' => 'Main menu')); ?>
				<?php endif; ?>
			</div>
			<?php $allowed_pages = array(718, 720, 722, 724, 726, 728, 730, 732, 734, 736, 738, 740, 742, 744, 746); ?>
			<?php if (array_search(get_the_ID(), $allowed_pages) !== FALSE): ?>
				<div id="find-location">
					<!--<form action="/location-result-search" method="post">
						<label for="zip " class=""> Find a Location</label>
						<div class="form-item">
							<input class="form-text" value="" id="zip" name="postal_code" type="text" placeholder="Enter your city or zip" />
							<button type="submit" accesskey="" class="form-submit" name="op">
								<span class="hidden">Search</span>
							</button>
						</div>
					</form>-->
					<label for="zip " class="">Find a Location</label>
					<?php echo do_shortcode('[gmw form="2"]'); ?>
					<p><a href="/shop/retail-stores-0">See All Retail Stores</a></p>
					<p><a href="/donate/donation-centers-donation-bins">See All Donation Centers</a></p>
				</div>
			<?php endif; ?>
		</div>
	</div><!-- #secondary -->
<?php } ?>