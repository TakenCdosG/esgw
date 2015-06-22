<?php

/*
Template Name: Search

Template file for the Search page
*/

get_header(); ?>

<header class="page-header">
	<div id="donate-now">
		<a href="/donate/donate-now"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donate-now.jpg" alt="Donate Now"></a>
	</div>
</header>
	
<?php get_sidebar(); ?>

<div id="primary" class="content-area span_19 col clr">
	<div id="content" class="site-content" role="main">
		<?php get_search_form(); ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>