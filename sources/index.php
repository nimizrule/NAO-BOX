<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Start the website's renderer
	 **************************************************************************
	 * @page			index.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	if(file_exists(dirname(__FILE__)."/config/autoload.php")) {
		try {
			
			// If the autoload exists, system can start the renderer
			require(dirname(__FILE__)."/config/autoload.php");
			Dispatcher::getInstance()->dispatch();
		} catch(Exception $e) {
			echo($e->getMessage());
		}
	} else {
		echo("The file 'autoload.php' cannot be found !");
	}