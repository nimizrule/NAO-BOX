<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Central classe for call to controllers
	 **************************************************************************
	 * @page			Controller.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	abstract class Controller {
		
		/* State of the controller classe */
		public static $initialized = false;
		
		/* Smarty instance (template engine) */
		protected $smarty = null;
		
		/**
	     * Checks if the user can load this controller.
	     *
		 * @param	void.
		 * @return 	bool, true if the user can load, else false.
	     */
	    abstract protected function checkAccess();

	    /**
	     * Checks if the user can view this controller with defaults 
		 * Permissions.
		 *
		 * @param	void.
		 * @return 	bool, true if the user can view, else false.
	     */
	    abstract protected function viewAccess();
		
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
			if (self::$initialized) {
				return;
			}
			self::$initialized = true;
			
			// If the smarty's configuration file exists, system can start the 
			// template engine. 
			if(file_exists(SMARTY_DIR."/Smarty.class.php")) {
				try {
					require_once(SMARTY_DIR."/Smarty.class.php");
				
					$this->smarty = new Smarty(); 
					$this->smarty->caching = SMARTY_CACHING;
					$this->smarty->compile_dir = SMARTY_COMPILE_DIR;
					$this->smarty->cache_dir = SMARTY_CACHE_DIR;
					$this->smarty->use_sub_dirs = SMARTY_CACHE_SUB_DIR;
					$this->smarty->cache_lifetime = SMARTY_CACHE_LIFETIME;
					
					$this->smarty->assign(
						"settings", 
						array(
							"bootstrap" => 
								BOOTSTRAP_DIR."/css/bootstrap.min.css",
							"css" => DIR_CSS."/file.css",
							"img" => DIR_IMG,
							"jquery" => 
								JQUERY_DIR."/jquery-1.11.3.min.js",
							"functions" => ""
						)
					);
					
					// When the debug's functions are activated, the cache system
					// can be extinguished.
					if (DEBUG_FUNCTIONS) {
						$this->smarty->compile_check = 
							SMARTY_COMPILE_CHECK_ON_DEBUG_MODE;
					}
				} catch (Exception $e) {
					throw new Exception(
						"The smarty's configuration file encountered a problem !"
					);
				}
			} else {
				throw new Exception(
					"The file 'Smarty.class.php' cannot be found !"
				);
			}
		}
	}