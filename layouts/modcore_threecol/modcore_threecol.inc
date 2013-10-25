<?php

// Plugin definition
$plugin = array(
	'title' => t('ModCore - Three Columns, Equal Width'),
	'category' => t('Columns: 3'),
	'icon' => 'modcore_threecol.png',
	'theme' => 'modcore_threecol',
	'admin css' => '../../only-grid.css',
	'regions' => array(
		'left' => t('Left Column'),
		'middle' => t('Middle Column'),
		'right' => t('Right Column')
	 ),
);
