<?php

	/*
	 * Model for the AdminPeripheralModel
	 * This class handles the admin peripherals model
	 *
	 * @publication		01/12/15
	 * @edition			12/01/16
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(dirname(__FILE__)."/../../classes/ModelRenderer.php"); 

	class AdminPeripheralModel extends ModelRenderer {

		/**
		 * AdminPeripheralModel instance
		 */
		public static $instance = null;
		
		/** 
		 * AdminPeripheralModel builder.
		 * Initialize the objects.
		 */
		public function __construct() {}
		
		/**
		 * Get current instance of AdminPeripheralModel (singleton)
		 *
		 * @param 	void.
		 * @return 	AdminPeripheralModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminPeripheralModel();
			}
			return self::$instance;
		}
		
		/**
		 * Display all commands's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_peripherals() {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("SELECT * FROM naobox.nb_peripherals ORDER BY prl_id");							
				$qry->execute();
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
		public function get_peripheral($prl_id) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("SELECT * FROM  naobox.nb_peripherals WHERE nb_peripherals.prl_id =?");
				$qry->bindValue(1, $prl_id, PDO::PARAM_STR);				
				$qry->execute();				
				$return_qry = $qry->fetchAll();
				$qry->closeCursor();

				return $return_qry;

			} catch(Exception $e) {
				return $e->getMessage();
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
			$prl_name,
			$prl_mac_adress, 
			$prl_ip_adress, 
			$prl_description
		) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("INSERT INTO naobox.nb_peripherals
				   (prl_name, 
					prl_mac_adress, 
					prl_ip_adress, 
					prl_description) VALUES (?, ?, ?, ?)"
				);				
				$qry->bindValue(1, $prl_name, PDO::PARAM_STR);
				$qry->bindValue(2, $prl_mac_adress, PDO::PARAM_STR);
				$qry->bindValue(3, $prl_ip_adress, PDO::PARAM_STR);
				$qry->bindValue(4, $prl_description, PDO::PARAM_STR);
				$qry->execute();

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
		public function is_device($prl_id) {
			try {

				$qry = $this->db->prepare('SELECT naobox.nb_peripherals.prl_id FROM naobox.nb_peripherals WHERE nb_peripherals.prl_id =?');	
				$qry->bindValue(1, $prl_id, PDO::PARAM_STR);
				$qry->execute();
				$return_qry = $qry->fetch(PDO::FETCH_OBJ);
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
				$qry = ModelRenderer::getDbInstance()->prepare("DELETE FROM naobox.nb_peripherals WHERE nb_peripherals.prl_id =?");
				$qry->bindValue(1, $prl_id, PDO::PARAM_INT);
				$qry->execute();
			
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
				$qry = ModelRenderer::getDbInstance()->prepare("DELETE FROM naobox.nb_peripherals");
				$qry->execute();
			
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
		public function update_Device($prl_id, $prl_name, $prl_mac_adress, $prl_ip_adress, $prl_description) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("UPDATE naobox.nb_peripherals SET prl_name =?, prl_mac_adress =?, prl_ip_adress =?, prl_description =? WHERE nb_peripherals.prl_id =?");
				$qry->bindValue(1, $prl_name, PDO::PARAM_STR);
				$qry->bindValue(2, $prl_mac_adress, PDO::PARAM_STR);
				$qry->bindValue(3, $prl_ip_adress, PDO::PARAM_STR);
				$qry->bindValue(4, $prl_description, PDO::PARAM_STR);
				$qry->bindValue(5, $prl_id, PDO::PARAM_STR);
				$qry->execute();

			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>