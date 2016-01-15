<?php

	/*
	 * NAOBOX
	 **************************************************************************
	 * Load the boot files
	 **************************************************************************
	 * @page			autoload.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	// If the config file exists, system can load settings
	if(file_exists(dirname(__FILE__)."/config.inc.php")) {
		require_once(dirname(__FILE__)."/config.inc.php");

		// If the dispatcher file exists, system can start the renderer
		if(file_exists(DIR_CLASSES."/Dispatcher.php")) {
			require_once(DIR_CLASSES."/Dispatcher.php");
		} else {
			echo("The file 'Dispatcher.php' cannot be found !");
		}
	} else {
		echo("The file 'config.inc.php' cannot be found !");
	}