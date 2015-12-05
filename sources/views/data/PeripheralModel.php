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

	class PeripheralModel extends Data {

		/**
		 * PeripheralModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of PeripheralModel
		 */
		public function __construct() {
			try {
				PeripheralModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of PeripheralModel (singleton)
		 *
		 * @return PeripheralModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new PeripheralModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the PeripheralModel class
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
		public function display_Peripherals() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_peripherals ORDER BY prl_id');				
				
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
		 * return a peripheral from an Id
		 *	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function display_Peripheral($prl_id) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_peripherals WHERE nb_peripherals.prl_id =?');

				$qry->bindValue(1, $cmd_id, \PDO::PARAM_STR);				

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