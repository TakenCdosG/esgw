<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>

<!DOCTYPE html>

<!-- WordPress Theme by WPExplorer (http://www.wpexplorer.com) -->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class('body'); ?>>
	
	<div id="top-navigation-wrapper">
		<div id="top-navigation" class="container">
			<div id="home-logo" class="left">
				<a id="home-link" href="/">HOME</a>
			</div>
			<div class="right">
				<?php wp_nav_menu( array('menu' => 'Social networks' )); ?>
				<?php wp_nav_menu( array('menu' => 'Top menu' )); ?>
				<div id="header-language">
					<select onchange="var w = window.top?window.top:window; var url = 'http://www.eastersealsgoodwill.org/node/18'; if(this.value=='es'){ w.location = 'http://translate.google.com.do/translate?js=n&amp;prev=_t&amp;hl=en&amp;ie=UTF-8&amp;layout=2&amp;eotf=1&amp;sl=en&amp;tl=es&amp;u='+url+'&amp;act=url'; }else{ w.location = url; }">
					   <option value="">--Select Language--</option>
					   <option value="en">English</option>
					   <option value="es">Español</option>
					</select>
				</div>
				<div id="header-search">
					<form action="/" accept-charset="UTF-8" method="post" id="search-block-form">
						<div>
							<div class="container-inline">
								<div class="form-item" id="edit-search-block-form-1-wrapper">
									<label for="edit-search-block-form-1" class="hidden">Search this site: </label>
									<input maxlength="128" name="search_block_form" id="edit-search-block-form-1" size="15" value="search" title="Enter the terms you wish to search for." class="form-text" type="text">
								</div>
								<input name="op" id="edit-submit-1" value="Search" class="form-submit" type="submit">
								<input name="form_build_id" id="form-3ON5LUUAdHJvXAaMFa6rhhvLAKLk22N2dOF8iu4JSeg" value="form-3ON5LUUAdHJvXAaMFa6rhhvLAKLk22N2dOF8iu4JSeg" type="hidden">
								<input name="form_id" id="edit-search-block-form" value="search_block_form" type="hidden">
							</div>
						</div>
					</form>
				</div>
				<div id="mobile-menu-wrapper">
					<div class="mobile-menu-icon">Menu</div>
					<div class="mobile-menu">
						<?php wp_nav_menu( array('menu' => 'Main menu', 'depth' => 1)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="main-navigation-wrapper" class="container">
		<div class="logo">
			<?php if ( of_get_option('custom_logo') ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php echo get_bloginfo( 'name' ) ?>" /></a>
			<?php } else { ?>
				<?php if ( is_front_page() ) { ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
				<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
				<?php }
				if ( get_bloginfo('description') ) {
					echo '<p class="site-description">'. get_bloginfo('description') .'</p>';
				} ?>
			<?php } ?>
		</div><!-- .logo -->
		<div id="header-slogan" class="left">
			<p class="hidden">Enhancing employment, educational, social and recreational opportunities for people with disabilities and other challenges.</p>
		</div>
		<div id="main-navigation" class="left">
			<?php wp_nav_menu( array('menu' => 'Main menu', 'depth' => 1)); ?>
		</div>
		<div id="find-location-mobile">
			<form action="/location-result-search" method="post">
				<label for="zip " class=""> Find a Location</label>
				<div class="form-item">
					<input class="form-text" value="" id="zip" name="postal_code" type="text" placeholder="Enter your city or zip" />
					<button type="submit" accesskey="" class="form-submit" name="op">
						<span class="hidden">Search</span>
					</button>
				</div>
			</form>
		</div>
	</div>

	<div id="wrap" class="container clr">
		<header id="masthead" class="site-header clr" role="banner">
			<div class="masthead-right">
				<?php if ( of_get_option('masterhead_right','<i class="fa fa-phone"></i>Call us: 999-99-99') !== '' ) { ?>
					<div class="masthead-right-content">
						<?php echo of_get_option('masterhead_right','<i class="fa fa-phone"></i>Call us: 999-99-99'); ?>
					</div><!-- .masterhead-right-content -->
				<?php } ?>
				<?php if ( of_get_option('masthead_search','1') ) { ?>
					<div class="masthead-search clr">
						<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php _e( 'Search', 'wpex' ); ?>&hellip;" />
							<button type="submit" class="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
						</form>
					</div><!-- /masthead-search -->
				<?php } ?>
			</div><!-- .masthead-right -->
		</header><!-- .header -->
		<?php
		//show header image only if defined
		if( get_header_image() !='' ) {
			$wpex_show_header_image = ( of_get_option('headerimg_front_page_exclude', '1') == '1' && is_front_page() ) ? 'no' : 'yes';
			if( $wpex_show_header_image == 'yes' ) { ?>
				<img src="<?php header_image(); ?>" alt="<?php get_bloginfo( 'name' ); ?>" id="header-image" />
		<?php
			} $wpex_show_header_image = NULL;
		} ?>

		<div id="navbar" class="navbar clr">
			<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
				<span class="nav-toggle"><?php _e( 'Menu', 'wpex' ); ?><i class="toggle-icon fa fa-arrow-down"></i></span>
				<?php wp_nav_menu( array(
					'theme_location'	=> 'main_menu',
					'sort_column'		=> 'menu_order',
					'menu_class'		=> 'nav-menu dropdown-menu',
					'fallback_cb'		=> false,
					'walker'			=> new WPEX_Dropdown_Walker_Nav_Menu()
				) ); ?>
			</nav><!-- #site-navigation -->
			<?php if ( of_get_option('social','1') == '1') wpex_display_social(); ?>
		</div><!-- #navbar -->
		
	<div id="main" class="site-main row clr fitvids">
		<?php
		//Yoast SEO breadcrumbs
		if ( !is_front_page() && !is_404() ) {
			if( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<nav id="breadcrumbs">','</nav>');
			}
		} ?>