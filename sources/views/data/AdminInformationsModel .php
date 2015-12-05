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

	class AdminInformationModel extends Data {

		/**
		 * AdminInformationModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of AdminInformationModel
		 */
		public function __construct() {
			try {
				AdminInformationModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of AdminInformationModel (singleton)
		 *
		 * @return AdminInformationModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminInformationModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the AdminInformationModel class
		 */
		public function init() {
			try {
				parent::init();	
			} catch(Exception $e) {
				throw new Exception('An exception has occured during the loading: '.$e->getMessage());
			}			
		}		
	}
?>