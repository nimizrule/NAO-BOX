<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Shutdown controller, uses to shutdown the raspberry
	 **************************************************************************
	 * @page			ShutdownController.php
	 * @publication		01/14/16
	 * @edition			01/14/16	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	 
	class ShutdownController {
		
		/** 
		 * Controller builder.
		 * Initialize the objects.
		 */
		public function __construct() {
			try {
				$this->init();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Initialize the controller class and their parents
		 */
		public function init() {
			
			// To starting display, the tool classe must exist.
			if (file_exists (DIR_CLASSES."/Tools.php")) {
				$url = Tools::getInstance()->url;
				
				// When the controller is good, the render can begin.
				if (Tools::getInstance()->isAskedController(__CLASS__, $url)) {	
					shell_exec('/usr/bin/sudo -u www-data sh /var/www/tools/shutdown.sh >> /var/www/tools/shell-errors.log');
					header("Location: /menu");
				} else {
					throw new Exception(
						"An error has occured during the routing process !"
					);
				}
			} else {
				throw new Exception('The URL cannot be evaluable !');
			}
		}
		
		/**
	     * @see Controller::checkAccess()
	     */
	    public function checkAccess() {
			return true;
	    }

		/**
		 * @see Controller::viewAccess()
		 */
		public function viewAccess() {
			return true;
		}		
	}