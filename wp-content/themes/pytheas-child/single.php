<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */

get_header(); ?>

<header class="page-header">
	<h1 class="page-header-title"><?php the_title(); ?></h1>
	<div id="donate-now">
		<a href="/donate/donate-now"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/donate-now.jpg" alt="Donate Now"></a>
	</div>
</header>

<?php get_sidebar(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="post-navigation">
		<nav class="single-nav clr"> 
			<?php next_post_link('<div class="single-nav-left">%link</div>', '<span class="fa fa-chevron-left"></span>', false); ?>
			<?php previous_post_link('<div class="single-nav-right">%link</div>', '<span class="fa fa-chevron-right"></span>', false); ?>
		</nav><!-- .page-header-title --> 
	</div>
	
	<div id="primary" class="content-area span_19 col clr">
		<div id="content" class="site-content" role="main">
			<?php if ( !post_password_required() ) { ?>
				<ul class="meta single-meta clr">
					<li><span class="fa fa-clock-o"></span><?php echo get_the_date(); ?></li>
					<li><span class="fa fa-folder-open"></span><?php the_category(' / '); ?></li>
					<?php if( comments_open() ) { ?>
						<li class="comment-scroll"><span class="fa fa-comment"></span> <?php comments_popup_link(__('Leave a comment', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link', __('Comments closed', 'wpex')); ?></li>
					<?php } ?>
					<li><span class="fa fa-user"></span><?php the_author_posts_link(); ?></li>
				</ul><!-- .meta -->
			<?php get_template_part('content', get_post_format() ); ?>
			<?php } ?>
			<article class="entry clr">
				<?php the_content(); ?>
			</article><!-- /entry -->
			<?php
			// Post pagination
			wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			<?php
			// Tags
			if ( of_get_option( 'blog_tags', '1' ) ) { ?>
				<?php the_tags('<div class="post-tags clr">','','</div>'); ?>
			<?php } ?>
			<?php
			// Author bio
			if ( of_get_option('blog_bio', '1' ) && get_the_author_meta( 'description' ) ) { ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php } ?>
			<?php comments_template(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php endwhile; ?>
<?php get_footer(); ?>