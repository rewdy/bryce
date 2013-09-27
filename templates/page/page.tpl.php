<?php

/**
 * Bryce Theme
 * Reset Base File
 *
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
	<div id="jump_nav"><a href="#content">Skip to Content</a></div>
	<div id="wrapper">
		<?php if ($page['preamble']): ?>

		<div id="preamble" class="row">
			<div class="grid">
				<?php print render($page['preamble']); ?>
			</div>
		</div>

		<?php endif; ?>

		<header id="site_header" class="row style-simple-center">
			<div class="flip_area">
				<a id="card" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
					<?php $title_tag = ($title) ? 'div' : 'h1'; ?>
					<<?php echo $title_tag; ?> id="site_title" class="face front">
						<?php if ($logo): ?><span id="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></span><?php endif; ?>

						<span id="site-title-text"><?php print $site_name; ?></span>
					</<?php echo $title_tag; ?>>
					<span class="face back"><i class="icon-home space"></i> home</span>
				</a>
			</div>

		</header>

		<?php if ($main_menu): ?>
		
		<nav id="main-menu" class="row">
			<div class="grid">
				<div class="full center">
				<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu-list', 'class' => array('menu')), 'heading' => t('Main menu'))); ?>
				</div>
			</div>
		</nav> <!-- /nav#main-menu -->
		<?php endif;?>

		<?php if ($page['splash_area']): ?>

		<div id="splash_holder">
			<?php print render($page['splash_area']); ?>

		</div>
		<?php endif; ?>

		<?php if ($page['highlight']): ?>

		<div id="highlight">
			<?php print render($page['highlight']); ?>

		</div>
		<?php endif; ?>

		<div id="main-row" class="row">
			<div class="grid">
				
				<?php if ($messages!=''): ?>

				<div id="messages">
					<?php print $messages; ?>
				</div>
				<?php endif; ?>

				<?php if ($breadcrumb && $show_breadcrumbs): ?>

				<div id="breadcrumbs"><?php print $breadcrumb; ?></div>
				<?php endif; ?>

				<header id="page-header" class="full">
					<?php print render($title_prefix); ?>

					<?php if ($title): ?><h1 id="page-title"><?php print $title; ?></h1><?php endif; ?>
					<?php print render($title_suffix); ?>

					<?php if ($tabs): ?><div class="tabs_holder"><?php print render($tabs); ?></div><?php endif; ?>

					<?php print render($page['help']); ?>

				</header>

				<?php if ($page['sidebar_first']): ?>
				<div id="sidebar_first" class="<?php echo $grid['sidebar_first_grid_class']; ?> sidebar">
					<?php print render($page['sidebar_first']); ?>

				</div> <!-- /#sidebar-first -->
				<?php endif; ?>

				<div id="content" class="<?php echo $grid['content_grid_class']; ?>">

					<a id="main-content"></a>

					<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

					<?php print render($page['content']); ?>

					<?php print $feed_icons; ?>

				</div> <!-- /div#content -->

				<?php if ($page['sidebar_second']): ?>

				<aside id="sidebar_second" class="<?php echo $grid['sidebar_second_grid_class']; ?> sidebar">
					<?php print render($page['sidebar_second']); ?>

				</aside> <!-- /section#sidebar-second -->
				<?php endif; ?>

			</div>
		</div>
	</div> <!-- close #wrapper -->

	<?php if ($page['prefoot']) : ?>
	<div id="prefoot">
		<div class="grid">
			<?php print render($page['prefoot']); ?>
		</div> <!-- close .grid.row -->
	</div>
	<?php endif; ?>

	<footer class="row">
		<div class="grid">
			<?php if ($page['footer']) : ?>
				<?php print render($page['footer']); ?>
			<?php endif; ?>
		</div> <!-- close .grid -->
	</footer>
