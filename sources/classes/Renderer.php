<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Central classe for call renderers
	 **************************************************************************
	 * @page			Renderer.php
	 * @publication		12/27/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	class Renderer {

		/* Instance of renderer */
		public static $instance = null;

		/** 
		 * Renderer builder.
		 * Initialize the objects.
		 */
		public function __construct() {}
		
		/**
		 * Get the current instance of the renderer (singleton).
		 * If the instance doesn't exists, the function returns a new instance
		 * Else, the function returns the current instance.
		 *
		 * @param 	void.
		 * @return 	Renderer.
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new Renderer();
			}
			return self::$instance;
		}

		/**
		 * Get the Smarty's instance.
		 * If the instance doesn't exists, the function creates a new instance.
		 * The function imports all Smarty's dependencies.
		 *
		 * @param	adminProcess, true if the render is for an admin session, false else.
		 * @return 	Smarty, the Smarty's instance.
		 * @throws	Exception, if files doesn't exists or configuration fail.
		 */
		public function getSmartyInstance($adminProcess) {			
			try {

				// If the smarty's configuration file exists, system can start the 
				// template engine. 
				if(file_exists(dirname(__FILE__)."/../tools/smarty/Smarty.class.php")) {
					require_once(dirname(__FILE__)."/../tools/smarty/Smarty.class.php");
				
					$this->smarty = new Smarty(); 
					$this->smarty->caching = SMARTY_CACHING;
					$this->smarty->compile_dir = SMARTY_COMPILE_DIR;
					$this->smarty->compile_check = true;
					$this->smarty->debugging = false;
					$this->smarty->cache_dir = SMARTY_CACHE_DIR;
					$this->smarty->use_sub_dirs = SMARTY_CACHE_SUB_DIR;
					$this->smarty->cache_lifetime = SMARTY_CACHE_LIFETIME;
					$this->smarty->inheritance_merge_compiled_includes = true;
					
					if(!$adminProcess) {
						$this->smarty->assign(
							"settings", 
							array(
								"bootstrap" => 
									BOOTSTRAP_DIR."/css/bootstrap.min.css",
								"css" => DIR_CSS."/file.css",
								"img" => DIR_IMG,
								"jquery" => 
									JQUERY_DIR."/jquery-1.11.3.min.js",
								"functions" => DIR_SCRIPTS."/functions.js"
							)
						);
						$this->smarty->assign("session", "user");
					} else {
						$this->smarty->assign(
							"settings", 
							array(
								"bootstrap" => 
									"../".BOOTSTRAP_DIR."/css/bootstrap.min.css",
								"css" => "../".DIR_CSS."/file.css",
								"img" => "../".DIR_IMG,
								"jquery" => 
									"../".JQUERY_DIR."/jquery-1.11.3.min.js",
								"functions" => "../".DIR_SCRIPTS."/functions.js"
							)
						);
						$this->smarty->assign("session", "admin");
					}
					
					// When the debug's functions are activated, the cache system
					// can be extinguished.
					if (DEBUG_FUNCTIONS) {
						$this->smarty->compile_check = 
							SMARTY_COMPILE_CHECK_ON_DEBUG_MODE;
					}
					return $this->smarty;	
								
				} else {
					throw new Exception(
						"The file 'Smarty.class.php' cannot be found !"
					);
				}
			} catch (Exception $e) {
				throw new Exception(
					"The smarty's configuration file encountered a problem !"
				);
			}
		}
	}