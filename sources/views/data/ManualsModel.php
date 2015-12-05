<?php

	/*
	 * Model for the manuals
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class ManualsModel extends Data {

		/**
		 * ManualsModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of ManualsModel
		 */
		public function __construct() {
			try {
				ManualsModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of ManualsModel (singleton)
		 *
		 * @return ManualsModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new ManualsModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the ManualsModel class
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