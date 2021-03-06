<?php

/**
 * This group contains all OpenLayers related files of the Maps extension.
 * 
 * @defgroup MapsOpenLayers OpenLayers
 * @ingroup Maps
 */

/**
 * This file holds the hook and initialization for the OpenLayers service. 
 *
 * @file OpenLayers.php
 * @ingroup MapsOpenLayers
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wgResourceModules['ext.maps.openlayers'] = array(
	'dependencies' => array( 'ext.maps.common' ),
	'localBasePath' => dirname(__FILE__),
	'remoteBasePath' => $egMapsScriptPath .  '/includes/services/OpenLayers',	
	'group' => 'ext.maps',
	'scripts' =>   array(
		'OpenLayers/OpenLayers.js',
		'OSM/OpenStreetMap.js',
		'jquery.openlayers.js',
		'ext.maps.openlayers.js'
	),
	'styles' => array(
		'OpenLayers/theme/default/style.css'
	),
	'messages' => array(
		'maps-markers',
        'maps-copycoords-prompt',
	)			
);

$wgAutoloadClasses['CriterionOLLayer']	 			= dirname(__FILE__) . '/CriterionOLLayer.php';
$wgAutoloadClasses['MapsOpenLayers'] 				= dirname(__FILE__) . '/Maps_OpenLayers.php';
$wgAutoloadClasses['MapsParamOLLayers'] 			= dirname(__FILE__) . '/Maps_ParamOLLayers.php';

$wgHooks['MappingServiceLoad'][] = 'efMapsInitOpenLayers';
function efMapsInitOpenLayers() {
	MapsMappingServices::registerService( 
		'openlayers',
		'MapsOpenLayers',
		array(
			'display_map' => 'MapsDisplayMapRenderer',
		)
	);
	
	return true;
}