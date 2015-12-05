<?php

	/*
	 * Model for the Sensors
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class SensorsModel extends Data {

		/**
		 * SensorsModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of SensorsModel
		 */
		public function __construct() {
			try {
				SensorsModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of SensorsModel (singleton)
		 *
		 * @return SensorsModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new SensorsModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the SensorsModel class
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