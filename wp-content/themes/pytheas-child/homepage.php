<?php

/*
Template Name: Homepage

Template file for the Homepage.
*/

get_header(); ?>

	<?php if (!is_front_page()) { ?>
		<header class="page-header">
			<h1 class="page-header-title"><?php the_title(); ?></h1>
			<div id="donate-now">
				<a href="/donate/donate-now"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donate-now.jpg" alt="Donate Now"></a>
			</div>
		</header>
	<?php } ?>
	
	<?php
		if ( '' != of_get_option( 'slides_alt' ) ) {
		
			echo do_shortcode( of_get_option( 'slides_alt' ) );
			
		} else {
		
			// Get slides
			$wpex_query = new WP_Query(
				array(
					'post_type'			=> 'slides',
					'posts_per_page'	=> '-1',
					'no_found_rows'		=> true,
				)
			);
			// Display Slides
			if ( $wpex_query->posts ) {
				
				// Load slider scripts
				wp_enqueue_script('flexslider', get_template_directory_uri() .'/js/flexslider.js', array('jquery'), '2.0', true);
				wp_enqueue_script('home-slideshow', get_stylesheet_directory_uri() .'/js/home-slideshow.js', array('jquery','flexslider'), '1.0', true);
				
				// Set slider options
				$flex_params = array(
					'slideshow'			=> of_get_option('slides_slideshow', '0'),
					'randomize'			=> of_get_option('slides_randomize', '0'),
					'slideshowSpeed'	=> of_get_option('slideshow_speed', '7000'),
					'animationSpeed'	=> of_get_option('animation_speed', '600')
				);
				
				// Localize slider script
				wp_localize_script( 'home-slideshow', 'flexLocalize', $flex_params );?>
				<div id="home-slider-wrap" class="clr flexslider-container">
					<div id="home-slider" class="flexslider">
						<div id="home-slideshow"><i class="fa fa-spinner fa-spin"></i></div>
						<ul class="slides">
							<?php foreach( $wpex_query->posts as $post ) : setup_postdata($post); ?>
							<?php if( has_post_thumbnail() || get_post_meta( get_the_ID(), 'wpex_slides_video', true ) ){ ?>
								<li>
									<div class="slide-inner">
										<?php if( '' != get_post_meta( get_the_ID(), 'wpex_slides_video', true ) ) { ?>
											<div class="fitvids"><?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_slides_video', true ) ); ?></div>
										<?php } else {
											if( '' != get_post_meta( get_the_ID(), 'wpex_slides_url', true ) ) { ?>
											<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url', true); ?>" title="<?php the_title_attribute(); ?>" target="_<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url_target', true); ?>">
												<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'slider_width' ), wpex_img( 'slider_height' ), wpex_img( 'slider_crop' ) ); ?>" alt="<?php the_title(); ?>" />
											</a>
											<?php } else { ?>
												<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'slider_width' ), wpex_img( 'slider_height' ), wpex_img( 'slider_crop' ) ); ?>" alt="<?php the_title(); ?>" />
										<?php }
										 }
										 if( $post->post_content ) { ?>
											<div class="text green flex-caption"><?php the_content(); ?></div>
										<?php } ?>
										<?php if( get_field( "slide_submenu" ) ): ?>
											<div class="right-box">
												<?php
													// This items are from the Home slides menu, so no need to store the selected menu, or at least not yet
													$items = wp_get_nav_menu_items( 'home-slides' );
													foreach ( $items as $item ) {
														if ($item->ID == get_field( "slide_submenu" )) {
															print "<h3>" . $item->title . "</h3>";
															break;
														}
													}
													print "<div class='rightbox-text'><p>";
													foreach ( $items as $item ) {
														if ($item->menu_item_parent == get_field( "slide_submenu" )) {
															print "<a href='" . $item->url . "'>" . $item->title . "</a>";
														}
													}
													print "</p></div>";
												?>
											</div>
										<?php endif; ?>
									</div><!--/ slide-inner -->
								</li>
							<?php } ?>
							<?php endforeach; ?>
						</ul><!-- /slides -->
					</div><!-- /home-slider -->
				</div><!-- /home-slider-wrap -->
			<?php } wp_reset_postdata(); $wpex_query = NULL;
			
		}
	?>

	<div id="primary" class="content-area span_24 clr">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="frontpage-left" class="span_12 col clr clr-margin">
					<div class="body-content">
						<?php the_content(); ?>
					</div>
					<?php $buckets = get_field('home_buckets'); ?>
					<div id="news-preview" class="span_14 col clr clr-margin">
						<h3>news &amp; events</h3>
						<?php
							$args = array('cat' => 7, 'posts_per_page' => 1);
							$postslist = get_posts( $args );
							foreach ($postslist as $post) :
							setup_postdata($post);
						?>
							<p><strong><?php the_title(); ?></strong></p>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More ></a>
						<?php endforeach; ?>
					</div>
					<div id="find-location" class="span_10 col clr">
						<!--<form action="/location-result-search" method="post">
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
				</div>
				<div id="frontpage-right" class="span_12 col clr"><?php print $buckets; ?></div>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>