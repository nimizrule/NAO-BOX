<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Start the ajax's renderer
	 **************************************************************************
	 * @page			ajax.php
	 * @publication		12/04/15
	 * @edition			12/04/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	if(isset($_POST["adminProcess"])) {
		if(isset($_POST["query"])) {
			if(!empty($_POST["query"])) {			
				if(file_exists("../../../config/autoload-ajax.php")) {
					try {

						// If the autoload exists, system can start the renderer
						require("../../../config/autoload-ajax.php");
						echo AjaxRenderer::getInstance()->executeQuery($_POST["query"], $_POST["adminProcess"]);
					} catch(Exception $e) {
						echo($e->getMessage());
					}
				} else {
					echo("The file 'AjaxRenderer.php' cannot be found !");
				}
			} else {
				echo("The POST var query is empty !");
			}
		} else {
			echo("The POST var query doesn't exists !");
		}
	} else {
		echo("The POST var adminProcess doesn't exists !");
	}