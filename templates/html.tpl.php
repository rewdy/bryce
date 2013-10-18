<?php

/**
 * Bryce Theme
 * Reset Base File
 *
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
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

		<?php /*
		<!-- Favicon & App Icons -->
		<link rel="shortcut icon" href="<?php echo $theme_path; ?>/img/icons/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo $theme_path; ?>/img/icons/app-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $theme_path; ?>/img/icons/app-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $theme_path; ?>/img/icons/app-icon-114x114.png">
		*/ ?>

	</head>

	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		 
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
		
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
