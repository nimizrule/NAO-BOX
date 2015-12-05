<?php

	/*
	 * Model for the Menu
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class MenuModel extends Data {

		/**
		 * MenuModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of MenuModel
		 */
		public function __construct() {
			try {
				MenuModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of MenuModel (singleton)
		 *
		 * @return MenuModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new MenuModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the MenuModel class
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