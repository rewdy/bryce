<?php

/**
 * @file
 * Bryce Theme template.php
 *
 * This is WHERE the magic happens!
 *
*/

function bryce_preprocess(&$vars, $hook) {
	if ($hook == "html") {

		/* Prepare Google Analytics
		 * ------------------------
		*/
		if (theme_get_setting('bryce_google_analytics')) {
			$vars['google_analytics_site_id'] = (theme_get_setting('bryce_google_analytics_site_id')!='') ? theme_get_setting('bryce_google_analytics_site_id') : false;
		} else {
			$vars['google_analytics_site_id'] = false;
		}

		/* CSS Classes to Remove
		 * ---------------------
		*/
		// Remove html class
		$classes_to_remove_from_body = array(
			'html',
			'logged-in',
			'not-logged-in',
			'two-sidebars',
			'one-sidebar',
			'one-sidebar sidebar-first',
			'one-sidebar sidebar-second',
			'no-sidebars',
			'toolbar',
			'toolbar-drawer',
			'page-node'
		);

		// remove body path classes
		$path_all = drupal_get_path_alias($_GET['q']);
		array_push($classes_to_remove_from_body, drupal_html_class('path-' . $path_all));
		array_push($classes_to_remove_from_body, drupal_html_class('page-' . $path_all));
		
		// remove body path first class
		$path = explode('/', $_SERVER['REQUEST_URI']);
		if($path['0']){
			array_push($classes_to_remove_from_body, drupal_html_class('pathone-' . $path['0']));
		}

		// remove all the bad, bad classes
		$vars['classes_array'] = array_values(array_diff($vars['classes_array'],$classes_to_remove_from_body));

		// add a centered class to the body if the page should be centered
		if (theme_get_setting('bryce_layout_page')) {
			$vars['page_layout'] = theme_get_setting('bryce_layout_page');
		}

		// Little Utility Variable
		$vars['theme_path'] = base_path() . drupal_get_path('theme', 'bryce');;

	}
	elseif ($hook == "page") {

		/* Grid Setup
		 * ----------
		*/
		
		// alias for utility
		$is_front = $vars['is_front'];
		$page = $vars['page'];

		// a view var determine whether or not to show the breadcrumbs
		$vars['show_breadcrumbs'] = theme_get_setting('bryce_layout_breadcrumbs');

		// determine header option
		$vars['page_layout'] = theme_get_setting('bryce_layout_page');

		// GRID SETUP
		// if it's the front, use 12. If it's not, use 10 b/c of the padding.
		$g_total_cols = 12;

		// main row widths
		// get config from these settings
		$g_sidebar_first_width = ($is_front) ? theme_get_setting('bryce_layout_front_sidebar_first') : theme_get_setting('bryce_layout_sidebar_first');
		$g_sidebar_second_width = ($is_front) ? theme_get_setting('bryce_layout_front_sidebar_second') : theme_get_setting('bryce_layout_sidebar_second');

		// calculations 
		$grid_main_count = $g_total_cols;
		if (!empty($page['sidebar_first'])) {
			$grid_main_count -= $g_sidebar_first_width;
		}
		if (!empty($page['sidebar_second'])) {
			$grid_main_count -= $g_sidebar_second_width;
		}
		// set widths
		$grid['sidebar_first_grid_class'] = "g" . $g_sidebar_first_width;
		$grid['sidebar_second_grid_class'] = "g" . $g_sidebar_second_width;
		$grid['content_grid_class'] = "g" . $grid_main_count;

		$vars['grid'] = $grid;
	}
	elseif ($hook == "region") {

	}
	elseif ($hook == "block") {
		$classes_to_remove_from_block = array(
			'block-' . preg_replace("/_/", '-', $vars['block']->module)
		);

		// remove all the bad, bad classes
		$vars['classes_array'] = array_values(array_diff($vars['classes_array'],$classes_to_remove_from_block));
		
	}
	elseif ($hook == "node") {

		$classes_to_remove_from_node = array(
			'node'
		);

		// remove all the bad, bad classes
		$vars['classes_array'] = array_values(array_diff($vars['classes_array'],$classes_to_remove_from_node));
		
	}
	elseif ($hook == "field") {
		
		$classes_to_remove_from_field = array(
			'clearfix',
			'field',
			'field-item',
			'field-type-' . preg_replace('/_/', '-', $vars['element']['#field_type'])
		);
		
		// remove all the bad, bad classes
		$vars['classes_array'] = array_values(array_diff($vars['classes_array'],$classes_to_remove_from_field));
		
	}

}

/* Views Tweaks
 * ------------
 * These get rid of a lot of crazy classes. Maybe added back later.
*/
function bryce_preprocess_views_view(&$vars) {
	// remove view holder classes
	$classes_to_remove_from_view = array(
		'view',
		'view-' . $vars['name'],
		'view-id-' . $vars['name'],
		'view-display-id-' . $vars['display_id'],
		'view-dom-id-' . $vars['dom_id']
	);
	
	// remove all the bad, bad classes
	$vars['classes_array'] = array_values(array_diff($vars['classes_array'],$classes_to_remove_from_view));

}
function bryce_preprocess_views_view_unformatted(&$vars) {
	foreach ($vars['rows'] as $id => $row) {
		// patterns to preg-replace; order most-specific to least specific to avoid messy replaces
		$classes_to_remove_from_row = array(
			"/views-row-last/",
			"/views-row-first/",
			"/views-row-odd/",
			"/views-row-even/",
			"/views-row-([0-9]+)/",
			"/views-row/"
		);
		foreach ($classes_to_remove_from_row as $pattern) {
			$vars['classes_array'][$id] = preg_replace($pattern, '', $vars['classes_array'][$id]);
		}
		// remove any extra space that may be left in there.
		$vars['classes_array'][$id] = trim($vars['classes_array'][$id]);
	}
}


/* CSS Removal
 * ---------
*/

function bryce_css_alter(&$css) {
	// remove various stylesheets based on theme settings
	unset($css[drupal_get_path('module', 'system') . '/system.admin.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.admin-rtl.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.base-rtl.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.menus-rtl.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme-rtl.css']);
	unset($css[drupal_get_path('module', 'user') . '/user.css']);
	//unset($css[drupal_get_path('module', 'system') . '/system.maintainance.css']);
}

/* Menu Clean Modification
 * -------------
*/

// add .blocked to menus
function bryce_menu_tree($variables) {
	return '<ul class="menu blocked">' . $variables['tree'] . '</ul>';
}

// clean up some classes on menus
function bryce_menu_link(array $variables) {
	
	// custom stuff to remove extra classes
	$classes_to_remove_from_links = array();

	//array_push($classes_to_remove_from_links, "first");
	//array_push($classes_to_remove_from_links, "last");
	array_push($classes_to_remove_from_links, "leaf");
	array_push($classes_to_remove_from_links, "collapsed");
	array_push($classes_to_remove_from_links, "expanded");
	array_push($classes_to_remove_from_links, "expandable");
	//array_push($classes_to_remove_from_links, "active");
	//array_push($classes_to_remove_from_links, "active-trail");

	// remove the classes
	if (isset($variables['element']['#attributes']['class'])){
		$variables['element']['#attributes']['class'] = array_diff($variables['element']['#attributes']['class'], $classes_to_remove_from_links);
	}

	// remove class attribute altogether if not needed for cleaner markup
	if (empty($variables['element']['#attributes']['class'])) {
		unset($variables['element']['#attributes']['class']);
	}

	return theme_menu_link($variables);
}

/* Other Misc Modification
 * -------------
*/

// Modify the feed icon ouput
function bryce_feed_icon(&$variables) {
	// build the parts
	$link_text = '<i class="icon-rss"></i>' . t('Subscribe');
	$link_title = t('Subscribe to !feed-title', array('!feed-title' => $variables['title']));
	// return the html
	return l(
		$link_text, 
		$variables['url'], 
		array(
			'html' => true, 
			'attributes' => array(
				'class' => 'feed-icon', 
				'title' => $link_title
			)
		)
	);
}
