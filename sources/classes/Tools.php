<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Tools for the dispatcher and the renderer
	 **************************************************************************
	 * @page			Tools.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			J�r�mie LIECHTI
	 * @copyright		3IL, J�r�mie LIECHTI
	 */

	class Tools {
		
		/* Instance of tools */
		public static $instance = null;
		
		/* Current URL */
		public $url;
		
		/* Current POST */
		public $post;

		/** 
		 * Tools builder .
		 * Initialize the objects.
		 */
		public function __construct() {
			$this->url = null;
			$this->post = null;
		}
		
		/**
		 * Get the current instance of the tools (singleton).
		 * If the instance doesn't exists, the function returns a new instance
		 * Else, the function returns the current instance.
		 *
		 * @param 	void.
		 * @return 	Tools.
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new Tools();
			}
			return self::$instance;
		}
		
		/**
		 * Put the POST variables into an object.
		 *
		 * @param post, is an array of the POST variables.
		 */
		public function postVarBuilder($post) {
			$this->post = $post;
		}
		
		/**
		 * Creates a backend URL for the url rewriting.
		 *
		 * @param controller, is the controller to insert in the url link.
		 * @param uri, is the uri to insert in the url link.
		 * @throws	Exception, if preg_*() encounter a problem.
		 */
		public function urlBuilder($controller, $uri) {
			try {
				// Here, the user ask an error page.
				if (preg_match("#errors/[0-9]{3}$#", $uri)) {
					$this->url = "index.php?controller=".$controller;
				} 
				// Here, the user ask a page with a special id.
				elseif (
					preg_match("#/[0-9]{1,}$#", $uri) || 
					preg_match("#all$#", $uri) 
				) {
					$this->url = "index.php?controller=".$controller.
					"&id=".preg_replace("#^(.+)/(.+)$#", "$2", $uri);
				} 
				// Any others cases.
				else {
					$this->url = "index.php?controller=".$controller;
				}
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
		
		/**
		 * Check if the controller exists into the URL.
		 *
		 * @param controller, the controller.
		 * @param url, the url
		 * @return 	true if the URL contains the good controller, 
					false any others cases.
		 * @throws	Exception, if preg_match() encounter a problem.
		 */
		public function isAskedController($controller, $url) {
			try {
				return preg_match("#".$controller."#", $url);
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
		
		/**
		 * Extracts the id value from the URL.
		 *
		 * @param url, the URL.
		 * @return int, the id value.
		 * @throws	Exception, if preg_replace() encounter a problem.
		 */
		public function getUrl_id($url) {
			try {
				return preg_replace("#(.+)id=(.+)$#", "$2", $url);
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
	}