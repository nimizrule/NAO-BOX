<?php

	/*
	 * Model for the Controls
	 * This class handles the controls model
	 *
	 * @publication		01/12/15
	 * @edition			01/04/16
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(dirname(__FILE__)."/../../classes/ModelRenderer.php"); 

	class ControlsModel extends ModelRenderer {

		/**
		 * ControlsModel instance
		 */
		public static $instance = null;
		
		/** 
		 * ControlsModel builder.
		 * Initialize the objects.
		 */
		public function __construct() {}
		
		/**
		 * Get current instance of ControlsModel (singleton)
		 *
		 * @param 	void.
		 * @return 	ControlsModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new ControlsModel();
			}
			return self::$instance;
		}
		
		/**
		 * Display all commands's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_commands() {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("SELECT * FROM naobox.nb_commands ORDER BY cmd_id");				
				$qry->execute();
				$return_qry = $qry->fetchAll();
				$qry->closeCursor();

				return $return_qry;
				
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * return a command
		 *	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_command($cmd_id) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("SELECT * FROM  naobox.nb_commands WHERE nb_commands.cmd_id =?");
				$qry->bindValue(1, $cmd_id, PDO::PARAM_STR);				
				$qry->execute();				
				$return_qry = $qry->fetchAll();
				$qry->closeCursor();

				return $return_qry;
				
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
	}
?>