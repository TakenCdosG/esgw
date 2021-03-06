<?php

/*
Template Name: Subpage

Template file for the pages of the second level navigation
*/
get_header(); ?>

	<?php if (!is_front_page()) { ?>
		<header class="page-header">
			<?php
				$items = wp_get_nav_menu_items('Main menu');
				$current_id = get_the_ID();
				$current_ancestor = null;
				foreach ($items as $menu_item) {
					if ($menu_item->object_id == $current_id) {
						$current_ancestor = $menu_item;
						break;
					}
				}
				while ($current_ancestor->menu_item_parent != 0) {
					foreach ($items as $menu_item) {
						if ($current_ancestor->menu_item_parent == $menu_item->db_id) {
							$current_ancestor = $menu_item;
							break;
						}
					}
				}
			?>
			<h1 class="page-header-title"><?php echo $current_ancestor->title; ?></h1>
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
			<h2><?php the_title(); ?></h2>
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