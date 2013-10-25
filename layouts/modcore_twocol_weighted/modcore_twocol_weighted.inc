<?php

// Plugin definition
$plugin = array(
	'title' => t('ModCore Panels Layout - Two Columns, First Weighted'),
	'category' => t('Columns: 2'),
	'icon' => 'modcore_twocol_weighted.png',
	'theme' => 'modcore_twocol_weighted',
	'admin css' => '../../only-grid.css',
	'regions' => array(
		'left' => t('Left Column'),
		'right' => t('Right Column')
	 ),
);
