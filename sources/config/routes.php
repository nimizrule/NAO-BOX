<?php

	/*
	 * NAOBOX
	 **************************************************************************
	 * Application's routes
	 **************************************************************************
	 * @page			routes.php
	 * @publication		11/28/15
	 * @edition			12/04/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	/* Array of routes */
	$_ROUTES = array(	
		
		// USER routes
		"userHome" => array(
			"file" => "MenuController",
			"url" => "/menu"
		),		
		"userControls" => array(
			"file" => "ControlsController",
			"url" => "/controles"
		),		
		"serSensors" => array(
			"file" => "SensorsController",
			"url" => "/capteurs"
		),		
		"userInformations" => array(
			"file" => "InformationsController",
			"url" => "/informations"
		),
		"userManuals" => array(
			"file" => "ManualsController",
			"url" => "/guides"
		),

		// ADMIN routes
		"adminLogin" => array(
			"file" => "AdminLoginController",
			"url" => "/admin/connexion"
		),
		"adminHome" => array(
			"file" => "AdminMenuController",
			"url" => "/admin/menu"
		),
		"adminControls" => array(
			"file" => "AdminControlsController",
			"url" => "/admin/controles"
		),	
		"adminControls-action" => array(
			"file" => "AdminControlsController",
			"url" => "/admin/controles/{id|all}"
		),	
		"adminPeripherals" => array(
			"file" => "AdminPeripheralsController",
			"url" => "/admin/peripheriques"
		),	
		"adminPeripherals-action" => array(
			"file" => "AdminPeripheralsController",
			"url" => "/admin/peripheriques/{id|all}"
		),
        "adminInformations" => array(
			"file" => "AdminInformationsController",
			"url" => "/admin/informations"
		),
		"adminManuals" => array(
			"file" => "AdminManualsController",
			"url" => "/admin/guides"
		),
		"adminSettings" => array(
			"file" => "AdminSettingsController",
			"url" => "/admin/parametres"
		),
		
		// ERRORS routes
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