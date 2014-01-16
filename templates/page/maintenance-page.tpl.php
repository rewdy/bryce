<?php

/**
 * Bryce Theme
 * Maintenance Page
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

$theme_path = $base_path . $directory;

?><!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

	<head>
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>

		<link rel="profile" href="<?php print $grddl_profile; ?>" />

		<!-- Styles -->
		<?php print $styles; ?>
		
		<!-- IE Styles -->
		<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo $theme_path; ?>/css/style-ie.css">
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo $theme_path; ?>/font/font-awesome-plus-ie7.css">
		<![endif]-->

		<?php print $scripts; ?>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	</head>

	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		 
		<div id="jump_nav"><a href="#content">Skip to Content</a></div>
		<div id="wrapper">
			
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
			<?php endif; ?>

			<div id="main-row" class="row">
				<div class="grid">

					<header id="page-header" class="full">
						<?php print render($title_prefix); ?>

						<?php if ($title): ?><h1 id="page-title"><?php print $title; ?></h1><?php endif; ?>
						
						<?php print render($title_suffix); ?>

						<?php print $feed_icons; ?>

						<?php print render($page['help']); ?>

					</header>

					<div id="content" class="<?php echo $grid['content_grid_class']; ?> center">

						<a id="main-content"></a>

						<?php print $content; ?>

					</div> <!-- /div#content -->

				</div>
			</div>
		</div> <!-- close #wrapper -->
		
		<?php if ($google_analytics_site_id) :?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $google_analytics_site_id; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<?php endif; ?>

	</body>

</html>