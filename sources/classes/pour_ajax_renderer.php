<?php

	/*
	 * Model for the SensorsModel
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

		//

		/**
		 * Check All scaptors status
		 */
		public function get_Captors_Status() {
			try {		

				// List of all element
				$array_head =
				array("HeadPitch", "HeadYaw");
				$array_right_arm = 
				array("RShoulderRoll", "RShoulderPitch", "RElbowYaw", "RElbowRoll", "RWristYaw", "RHand");
				$array_left_arm = 
				array("LShoulderRoll", "LShoulderPitch", "LElbowYaw", "LElbowRoll", "LWristYaw", "LHand");
				$array_right_leg = 
				array("RHipPitch", "RHipRoll", "RKneePitch", "RAnklePitch", "RAnkleRoll");
				$array_left_leg =
				 array("LHipYawPitch", "LHipPitch", "LHipRoll", "LKneePitch", "LAnklePitch", "LAnkleRoll");

				$array_global = 
				array($array_head, $array_right_arm, $array_left_arm, $array_right_leg, $array_left_leg);

				//Déclaration tableau temporaire
				// Récupérer toute les valeurs au niveau 2
				// PUIS pour toute ces valeurs le mettre dans les points d'interrogation du code en dessous
				

				mem = ALProxy( "ALMemory" )
				listData =
				 [
					"Device/SubDeviceList/?/Position/Actuator/Value"      , // Position/Actuator (rad)
					"Device/SubDeviceList/?/Position/Sensor/Value"        , // Position/Sensor (rad)
					"Device/SubDeviceList/?/ElectricCurrent/Sensor/Value" , // Current (A)
					"Device/SubDeviceList/?/Temperature/Sensor/Value"     ; // Temperature (°C)
					"Device/SubDeviceList/?/Hardness/Actuator/Value" 	    , // Stiffness (%)
					"Device/SubDeviceList/?/Temperature/Sensor/Status"  	, // Temperature status
				]

				listVal = mem.getListData( listData )
				
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}				
	}
?>