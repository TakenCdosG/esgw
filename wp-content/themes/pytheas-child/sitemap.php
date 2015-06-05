<?php

/*
Template Name: Sitemap

Template file for the Sitemap page.
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
	
	<?php get_sidebar(); ?>

	<div id="primary" class="content-area span_19 col clr">
		<div id="content" class="site-content" role="main">
			<?php wp_nav_menu( array('menu' => 'Main menu')); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>