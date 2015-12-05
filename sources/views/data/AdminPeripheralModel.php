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

	class AdminPeripheralModel extends Data {

		/**
		 * AdminPeripheralModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of AdminPeripheralModel
		 */
		public function __construct() {
			try {
				AdminPeripheralModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of AdminPeripheralModel (singleton)
		 *
		 * @return AdminPeripheralModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminPeripheralModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the ControlsModel class
		 */
		public function init() {
			try {
				parent::init();	
			} catch(Exception $e) {
				throw new Exception('An exception has occured during the loading: '.$e->getMessage());
			}			
		}

		/**
		 * Add a peripheral
		 *
		 * @param prl_id, peripheral's id
		 * @param prl_name, peripheral's  name
		 * @param prl_mac_adress ,  peripheral's mac adress
		 * @param prl_ip_adress, peripheral's ip adress
		 * @param prl_description, peripheral's description		 
		 * @return 0 without errors, exception message any others cases
		 */
		public function add_peripheral(
			$prl_id,
			$prl_name,
			$prl_mac_adress, 
			$prl_ip_adress, 
			$prl_description) {
			try {
				$qry = $this->db->prepare('INSERT INTO naobox.nb_peripherals
				   (prl_id,
					prl_name, 
					prl_mac_adress, 
					prl_ip_adress, 
					prl_description) VALUES (NULL, ?, ?, ?, ?)');				
				$qry->bindValue(1, $prl_name, \PDO::PARAM_STR);
				$qry->bindValue(2, $prl_mac_adress, \PDO::PARAM_STR);
				$qry->bindValue(3, $prl_ip_adress, \PDO::PARAM_STR);
				$qry->bindValue(4, $prl_description, \PDO::PARAM_STR);

				$qry->execute();
				$qry->closeCursor();
				return 0;
				} catch(Exception $e) {
					return $e->getMessage();
			}
		}

	
		/**
		 * Verify is a peripheral exist with the id
		 *
		 * @param prl_id, peripheral's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function has_peripheral($prl_id) {
			try {

				$qry = $this->db->prepare('SELECT naobox.nb_peripherals.prl_id FROM naobox.nb_peripherals WHERE nb_peripherals.prl_id =?');	
				$qry->bindValue(1, $prl_id, \PDO::PARAM_STR);
				$qry->execute();
				$return_qry = $qry->fetch(\PDO::FETCH_OBJ);
				$qry->closeCursor();
				return (!empty($return_qry->prl_id)) ? 1 : 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
	
		/**
		 * Delete a specified peripheral
		 *
		 * @param prl_id, peripheral's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Peripheral($prl_id) {
			try {
				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_peripherals WHERE nb_peripherals.prl_id =?');
				$qry->bindValue(1, $prl_id, \PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete all peripheral
		 *	
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Peripherals() {
			try {								

				$qry = $this->db->prepare('DELETE FROM naobox.nb_peripherals');

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
		/**
		 * Modify all peripheral's informations from one peripheral 
		 * @param prl_id, peripheral's id
		 * @param prl_name, peripheral's name
		 * @param prl_mac_adress, peripheral's file's name
		 * @param prl_ip_adress, peripheral's description
		 * @param prl_description, peripheral's description
		 * @return 0 without errors, exception message any others cases
		 */
		public function uptdate_Commands($prl_id, $prl_name, $prl_mac_adress, $prl_ip_adress, $prl_description) {
			try {
				$qry = $this->db->prepare('UPDATE naobox.nb_peripherals SET prl_name =?, prl_mac_adress =?, prl_ip_adress =?, prl_description =? WHERE nb_peripherals.prl_id =?');

				$qry->bindValue(1, $prl_name, \PDO::PARAM_STR);
				$qry->bindValue(2, $prl_mac_adress, \PDO::PARAM_STR);
				$qry->bindValue(3, $prl_ip_adress, \PDO::PARAM_STR);
				$qry->bindValue(4, $prl_id, \PDO::PARAM_STR);
				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>