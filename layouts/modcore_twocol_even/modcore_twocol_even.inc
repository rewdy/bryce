<?php

// Plugin definition
$plugin = array(
	'title' => t('ModCore - Two Columns, Equal Width'),
	'category' => t('Columns: 2'),
	'icon' => 'modcore_twocol_even.png',
	'theme' => 'modcore_twocol_even',
	'admin css' => '../../only-grid.css',
	'regions' => array(
		'left' => t('Left Column'),
		'right' => t('Right Column')
	 ),
);
