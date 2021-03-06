<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
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
			<?php if ( is_singular('page') && has_post_thumbnail() ) { ?>
				<div id="page-featured-img">
					<?php global $post; the_post_thumbnail( $post->ID ); ?>
				</div><!-- #page-featured-img -->
			<?php } ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
					<footer class="entry-footer">
						<?php edit_post_link( __( 'Edit Page', 'wpex' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>