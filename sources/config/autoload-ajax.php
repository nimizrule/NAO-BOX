<?php

	/*
	 * NAOBOX
	 **************************************************************************
	 * Load the boot files
	 **************************************************************************
	 * @page			autoload-ajax.php
	 * @publication		12/04/15
	 * @edition			12/04/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	// If the config file exists, system can load settings
	if(file_exists(dirname(__FILE__)."/config.inc.php")) {
		require_once(dirname(__FILE__)."/config.inc.php");
		
		// If the ajax file exists, functions can start the renderer
		if(file_exists(dirname(__FILE__)."/../classes/AjaxRenderer.php")) {
			require_once(dirname(__FILE__)."/../classes/AjaxRenderer.php");
		} else {
			echo("The file 'AjaxRenderer.php' cannot be found !");
		}
	} else {
		echo("The file 'config.inc.php' cannot be found !");
	}