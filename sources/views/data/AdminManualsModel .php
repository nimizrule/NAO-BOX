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

	class AdminManualsModel extends Data {

		/**
		 * AdminManualsModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of AdminManualsModel
		 */
		public function __construct() {
			try {
				AdminManualsModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of AdminManualsModel (singleton)
		 *
		 * @return AdminManualsModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminManualsModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the AdminManualsModel class
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