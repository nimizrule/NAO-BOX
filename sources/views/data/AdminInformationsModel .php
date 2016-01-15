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

		/**
		 * Display all sensors's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Sensors() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_sensors ORDER BY id_nao');				
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
		 * update temperature from one sensors
		 * @param id_nao, nao's id
		 * @param srs_value, temp value of the sensors
		 * @return 0 without errors, exception message any others cases
		 */
		public function update_sensor_value
			($id_nao, $srs_value) {
			try {
				$qry = $this->db->prepare
				('UPDATE naobox.nb_sensors SET srs_value =? WHERE nb_sensors.id_nao =?');

				$qry->bindValue(1, $srs_value, PDO::PARAM_INT);
				$qry->bindValue(2, $id_nao, PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * update temperature from one sensors
		 * @param id_nao, nao's id
		 * @param srs_lvl, temp value of the sensors
		 * @return 0 without errors, exception message any others cases
		 */
		public function update_sensor_lvl
			($id_nao, $srs_lvl) {
			try {
				$qry = $this->db->prepare
				('UPDATE naobox.nb_sensors SET srs_lvl =? WHERE nb_sensors.id_nao =?');

				$qry->bindValue(1, $srs_lvl, PDO::PARAM_INT);
				$qry->bindValue(2, $id_nao, PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

	}
?>

