<?php

	/*
	 * NAOBOX
	 **************************************************************************
	 * Application's routes
	 **************************************************************************
	 * @page			routes.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	/* Array of routes */
	$_ROUTES = array(	
		'userHome' => array(
			'file' => 'MenuController',
			'url' => '/menu'
		),		
		'userControls' => array(
			'file' => 'ControlsController',
			'url' => '/controles'
		),		
		'userSensors' => array(
			'file' => 'SensorsController',
			'url' => '/capteurs'
		),		
		'userInformations' => array(
			'file' => 'InformationsController',
			'url' => '/informations'
		),
		'userManuals' => array(
			'file' => 'ManualsController',
			'url' => '/guides'
		),
		
		// Errors routes
		'403' => array(
			'file' => '403Controller',
			'dir' => 'errors/',
			'url' => 'errors/403'
		),
		'404' => array(
			'file' => '404Controller',
			'dir' => 'errors/',
			'url' => 'errors/404'
		),
		'500' => array(
			'file' => '500Controller',
			'dir' => 'errors/',
			'url' => 'errors/500'
		)
	);