<?php

	/*
	 * Model for the Controls
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class ControlsModel extends Data {

		/**
		 * ControlsModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of ControlsModel
		 */
		public function __construct() {
			try {
				ControlsModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of ControlsModel (singleton)
		 *
		 * @return ControlsModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new ControlsModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the ControlsModel class
		 */
		public function init() {
			try {
				parent::init();	
			} catch(Exception $e) {
				throw new Exception('An exception has occured during the loading: '.$e->getMessage());
			}			
		}

		
		/**
		 * Display all commands's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_commands() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_commands ORDER BY cmd_id');				
				$qry->execute();
				//put  the result into an object
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
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_commands WHERE nb_commands.cmd_id =?');

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