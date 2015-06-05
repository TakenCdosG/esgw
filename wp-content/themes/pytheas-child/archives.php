<?php

/*
Template Name: Archives

Template file for the News/Events page.
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
			<?php
				$args = array('category' => 7);
				$postslist = get_posts( $args );
				foreach ($postslist as $post) :
				setup_postdata($post);
			?>
				<div class="news-item">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">READ MORE></a>
   				</div>
			<?php endforeach; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>