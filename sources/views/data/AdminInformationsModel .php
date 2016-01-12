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
		 * return a package
		 *	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Sensors_From_Specific_Nao($id_nao) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_sensors WHERE nb_sensors.id_nao =?');

				$qry->bindValue(1, $id_nao, PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Modify all peripheral's informations from one peripheral 
		 * @param id_nao, nao's id
		 * @param CPU, the cpu is in the head
		 * @param RShoulderPitch, the right shoulder
		 * @param LShoulderPitch, the left shoulder
		 * @param RElbowYaw, the right elbow
		 * @param LElbowYaw, the left elbow
		 * @param RHipPitch, the right hip
		 * @param LHipPitch, the left hip
		 * @param RKneePitch, the right knee
		 * @param LKneePitch, the right knee
		 * @param LFoot, the right foot
		 * @param RFoot, the left foot
		 * @return 0 without errors, exception message any others cases
		 */
		public function update_sensors_values
			($id_nao, $CPU
			, $RShoulderPitch, $LShoulderPitch
			, $RElbowYaw, $LElbowYaw
			, $RHipPitch, $LHipPitch
			, $RKneePitch, $LKneePitch
			, $LFoot, $RFoot) {
			try {
				$qry = $this->db->prepare
				('UPDATE naobox.nb_sensors SET CPU =?, RShoulderPitch =?, LShoulderPitch =?, RElbowYaw =?, LElbowYaw =?, RHipPitch =?, LHipPitch =?, RKneePitch =?, LKneePitch =?, LFoot =?, RFoot =? WHERE nb_sensors.id_nao =?');

				$qry->bindValue(1, $CPU, PDO::PARAM_STR);
				$qry->bindValue(2, $RShoulderPitch, PDO::PARAM_STR);
				$qry->bindValue(3, $LShoulderPitch, PDO::PARAM_STR);
				$qry->bindValue(4, $RElbowYaw, PDO::PARAM_STR);
				$qry->bindValue(5, $LElbowYaw, PDO::PARAM_STR);
				$qry->bindValue(6, $RHipPitch, PDO::PARAM_STR);
				$qry->bindValue(7, $LHipPitch, PDO::PARAM_STR);
				$qry->bindValue(8, $RKneePitch, PDO::PARAM_STR);
				$qry->bindValue(9, $LKneePitch, PDO::PARAM_STR);
				$qry->bindValue(10, $LFoot, PDO::PARAM_STR);
				$qry->bindValue(11, $RFoot, PDO::PARAM_STR);

				$qry->bindValue(11, $id_nao, PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

	}
?>

