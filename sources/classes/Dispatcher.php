<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * URL routing process
	 **************************************************************************
	 * @page			Dispatcher.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	 
	class Dispatcher {
		
		/* Instance of dispatcher */
		public static $instance = null;

		/* Current URI */
		private $uri;
		
		/* Current controller */
		private $controller = array("file", "url");

		/** 
		 * Dispatcher builder.
		 * Initialize the objects.
		 */
		public function __construct() {
			$this->uri = null;
			$this->controller = null;
		}
		
		/**
		 * Get the current instance of the dispatcher (singleton).
		 * If the instance doesn't exists, the function returns a new instance
		 * Else, the function returns the current instance.
		 *
		 * @param 	void.
		 * @return 	Dispatcher.
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new Dispatcher();
			}
			return self::$instance;
		}
		
		/**
		 * Finds the controller and creates a new instance.
		 * Checks all the routes to find the associate controller from the URL.
		 * If a controller was found, the system creates a new instance of it.
		 * If the user cannot check or view it, the system loads the 403 
		 * controller.
		 * For the others cases, the system loads the 404 controller.
		 *
		 * @param	void.
		 * @return 	void.
		 * @throws	Exception, if files don't exist.
		 */
		public function dispatch() {
			try {
				// If the routes file exists, system can load the routes.
				if(file_exists(DIR_CONFIG."/routes.php")) {
					require(DIR_CONFIG."/routes.php"); 
				} else {
					throw new Exception(
						"The file 'routes.php' cannot be found !"
					);
				}
				
				Dispatcher::getURI();
				
				// Search the correct controller.
				foreach ($_ROUTES as $key => $value) {
					if (Dispatcher::isRoute($_ROUTES[$key]["url"])) {						
						$this->controller["file"] = $_ROUTES[$key]["file"];
						$this->controller["url"] = $_ROUTES[$key]["url"];						
						break;
					}
				}
				
				// When the debug's functions are activated and the URI is
				// Null, the function redirects the user to home.
				if ($this->uri == null) {
					if (DEBUG_FUNCTIONS) {
						header("Location: ".DEBUG_DIR."/".URW_HOME);
					} else {
						header("Location: ./".URW_HOME);
					}
				}
				
				// If the controller cannot be found, the function selects
				// The controller 404 error.
				if($this->controller == null) {
					$this->controller["file"] = $_ROUTES["404"]["file"];
					$this->controller["url"] = $_ROUTES["404"]["url"];
				}
				
				// If the tools file exists, system can load the tools.
				if (file_exists(DIR_CLASSES."/Tools.php")) {
					require_once(DIR_CLASSES."/Tools.php");		
				} else {
					throw new Exception(
						"The file 'Tools.php' cannot be found !"
					);
				}	
				
				// If the controller file exists, system can start the 
				// Controller renderer.
				if (
					file_exists(
						DIR_CONTROLLERS."/".$this->controller["file"].".php"
					)
				) {
					require_once(
						DIR_CONTROLLERS."/".$this->controller["file"].".php"
					);		
				} else {
					throw new Exception(
						"The file '".$this->controller["file"].".php' 
						cannot be found !"
					);
				}
				
				// Generates a new URL and a new instance for the controller.
				Tools::getInstance()->postVarBuilder($_POST); 
				Tools::getInstance()->urlBuilder(
					$this->controller["file"], $this->uri
				);
				$controller = new $this->controller["file"]();
				
				// Checks the user access for this controller.
				// If the user cannot open or view this controller, the system
				// Redirects the user to 403 controller.
				if(!$controller->checkAccess() || !$controller->viewAccess()) {
					$this->controller["file"] = $_ROUTES["403"]["file"];
					$this->controller["url"] = $_ROUTES["403"]["url"];
					
					if (
						file_exists(
						   DIR_CONTROLLERS."/".$this->controller["file"].".php"
						)
					) {
						require_once(
						   DIR_CONTROLLERS."/".$this->controller["file"].".php"
						);	
						$controller = new $this->controller["file"]();						
					} else {
						throw new Exception(
							"The file '".$this->controller["file"].".php' 
							cannot be found !"
						);
					}
				}
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
		
		/**
		 * Get the URI of the request.
		 * The function executes a different control if the server is 
		 * A IIS server because REQUEST_URI no exists on IIS systems. 
		 * This constant was replaced by HTTP_X_REWRITE_URL in this case.
		 *
		 * An option for the debug was included only on local computer to clean
		 * The name of the project folder.
		 *
		 * @param	void.
		 * @return 	void.
		 * @throws	Exception, if $_SERVER or substr() encounter a problem.
		 */
		private function getURI() {
			try {
				// Extract the URI.
				if (isset($_SERVER["REQUEST_URI"])) { 
					$this->uri = $_SERVER["REQUEST_URI"];
				} elseif (isset($_SERVER["HTTP_X_REWRITE_URL"])) { 
					$this->uri = $_SERVER["HTTP_X_REWRITE_URL"];
				} else {
					$this->uri = null;
				}
				
				// When the debug's functions are activated, the function 
				// Removes the DEBUG_DIR from the URL.
				if (DEBUG_FUNCTIONS) {
					$this->uri = substr($this->uri, strlen(DEBUG_DIR));
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
		
		/**
		 * Check if the route exists.
		 * There are 3 types of URI:
		 * 1) - The user ask an error page.
		 * 2) - The user ask a page with a special id.
		 * 3) - Any others cases.
		 *
		 * @param 	route, route to test.
		 * @return 	true if the URI exists, false any others cases.
		 * @throws	Exception, if preg_*() encounter a problem.
		 */
		private function isRoute($route) {
			try {
				// Here, the user ask an error page.
				if (preg_match("#errors/[0-9]{3}$#", $this->uri)) {
					return (
						preg_match("#^".$this->uri ."$#", $route)
					) ? true : false;
				} 
				// Here, the user ask a page with a special id.
				elseif (
					preg_match("#/[0-9]{1,}$#", $this->uri) || 
					(
						preg_match("#all$#", $this->uri) && 
						preg_match("#{(.*)all(.*)}$#", $route)
					)
				) {
					// Extraction of the URI body for distinguish the body 
					// And the id.
					$body = preg_replace(
						"#^(.+)/(.+)$#", "$1", $this->uri
					);
					return (
						preg_match("#^".$body."/(.+)#", $route)
					) ? true : false;
				} 
				// Any others cases.
				else {
					return (
						preg_match("#^".$this->uri ."$#", $route)
					) ? true : false;
				}
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}	
	}