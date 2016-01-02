<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Central classe for the back controllers
	 **************************************************************************
	 * @page			BackController.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/Controller.php");

	abstract class BackController extends Controller {
		
		/* State of the controller classe */
		public static $initialized = false;

		/**
		 * Initializes the controller's core.
		 * The function imports the template engine's configuration.
		 * If the import is done without errors, the configuration is
		 * loaded into the system.
		 *
		 * @param	void.
		 * @return 	void.
		 * @throws	Exception, if files don't exist or configuration fail.
		 */
		public function init() {
			try {
				if (self::$initialized) {
					return;
				}
				self::$initialized = true;

				if(file_exists(dirname(__FILE__)."/Renderer.php")) {
					require(dirname(__FILE__)."/Renderer.php");
					$this->smarty = Renderer::getInstance()->getSmartyInstance(true);
				} else {
					throw new Exception(
						"The file 'Renderer.php' cannot be found !"
					);
				}				
			} catch (Exception $e) {
				throw new Exception(
					"The smarty's configuration file encountered a problem !"
				);
			}
		}
	}