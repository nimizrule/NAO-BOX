<?php

	/*
	 * Model for the Information
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class InformationModel extends Data {

		/**
		 * InformationModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of InformationModel
		 */
		public function __construct() {
			try {
				InformationModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of InformationModel (singleton)
		 *
		 * @return InformationModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new InformationModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the InformationModel class
		 */
		public function init() {
			try {
				parent::init();	
			} catch(Exception $e) {
				throw new Exception('An exception has occured during the loading: '.$e->getMessage());
			}			
		}
		
		/**
		 * Display all sensors's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Sensors() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_sensors');				
				$qry->execute();
				//put  the result into an object
				$return_qry = $qry->fetchAll();
				$qry->closeCursor();
				return $return_qry;
				
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>