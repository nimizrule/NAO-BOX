<?php

	/*
	 * Model for the Menu
	 * This class handles the add  of a customer
	 *
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

		/**
		 * Modify all customer's informations from one customer 
		 *
		 * @param cust_id, customer's id
		 * @param cust_firstName, customer's firstName
		 * @param cust_lastName ,  customer's lasttName
		 * @param cust_address, customer's address
		 * @param cust_zipCode, customer's zip code
		 * @param cust_city, customer's city
		 * @param cust_phoneNumber, customer's phone number		
		 * @return 0 without errors, exception message any others cases
		 */
		public function add_customer($cust_lastName,
			$cust_address,
			$cust_zipCode, 
			$cust_city, 
			$cust_phoneNumber, 									
			$cust_firstName) {
			try {
				$qry = $this->db->prepare('INSERT INTO camping.customer (cust_lastName,
					cust_address, 
					cust_postal_code, 
					cust_city, 
					cust_phone_number, 
					cust_record_number, 
					cust_firstName) VALUES (?, ?, ?, ?, ?, UUID(), ?)');
				$qry->bindValue(1, $cust_lastName, \PDO::PARAM_STR);
				$qry->bindValue(2, $cust_address, \PDO::PARAM_STR);
				$qry->bindValue(3, $cust_zipCode, \PDO::PARAM_STR);
				$qry->bindValue(4, $cust_city, \PDO::PARAM_STR);
				$qry->bindValue(5, $cust_phoneNumber, \PDO::PARAM_STR);			
				$qry->bindValue(6, $cust_firstName, \PDO::PARAM_STR);
				
				$qry->execute();
				$qry->closeCursor();
				return 0;
				} catch(Exception $e) {
					return $e->getMessage();
			}
		}

	
		/**
		 * Modify customer's informations
		 *
		 * @param cust_id, customer's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function has_customer($cust_id) {
			try {

				$qry = $this->db->prepare('SELECT customer.cust_id FROM customer WHERE customer.cust_id =?');	
				$qry->bindValue(1, $cust_id, \PDO::PARAM_STR);
				$qry->execute();
				$return_qry = $qry->fetch(\PDO::FETCH_OBJ);
				$qry->closeCursor();
				return (!empty($return_qry->cust_id)) ? 1 : 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
	
		/**
		 * Delete a specified Customer
		 *
		 * @param cust_id, Customer's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Customer($cust_id) {
			try {
				
				$qry = $this->db->prepare('DELETE FROM customer WHERE customer.cust_id  = ?');
				$qry->bindValue(1, $cust_id, \PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete all Customer
		 *	
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Customers() {
			try {								

				$qry = $this->db->prepare('DELETE FROM customer ');


				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
		/**
		 * Display all customer's informations from one customer 
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function display_customers() {
			try {
				$qry = $this->db->prepare('SELECT * FROM customer ORDER BY cust_id');				
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
		 * return customer's id
		 *	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function display_customer($cust_id) {
			try {
				$qry = $this->db->prepare('SELECT * FROM customer WHERE customer.cust_id  =?');	

				$qry->bindValue(1, $cust_id, \PDO::PARAM_STR);				

				$qry->execute();
				//get customer's ID      put  the result into an object
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * return customer's id
		 *
		 * @param cust_firstName, customer's name
		 * @param cust_lastName, customer's name
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_customerId($cust_firstName, $cust_lastName) {
			try {

				$qry = $this->db->prepare('SELECT customer.cust_id FROM	customer
					WHERE customer.cust_firstName =? and customer.cust_lastName =?');	

				$qry->bindValue(1, $cust_firstName, \PDO::PARAM_STR);
				$qry->bindValue(2, $cust_lastName, \PDO::PARAM_STR);

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
		 * Modify all customer's informations from one customer 
		 * NOT IN ORDER
		 * @param cust_id, customer's id
		 * @param cust_lastName, customer's name
		 * @param cust_firstName, customer's name
		 * @param cust_address, customer's address
		 * @param cust_zipCode, customer's zip code
		 * @param cust_city, customer's city
		 * @param cust_phoneNumber, customer's phone number
		 * @param cust_recordNumber, customer's record number
		 * @return 0 without errors, exception message any others cases
		 */
		public function modify_customer($cust_id, $cust_lastName, $cust_firstName, $cust_address, $cust_zipCode, $cust_city, $cust_phoneNumber, $cust_addNumber) {
			try {
				$qry = $this->db->prepare('UPDATE camping.customer SET cust_lastName =?, cust_address =?, cust_postal_code =?, cust_city =?, cust_phone_number =?, cust_record_number =?, cust_firstName =? WHERE cust_id =?');
				
				$qry->bindValue(1, $cust_lastName, \PDO::PARAM_STR);
				$qry->bindValue(2, $cust_address, \PDO::PARAM_STR);
				$qry->bindValue(3, $cust_zipCode, \PDO::PARAM_STR);
				$qry->bindValue(4, $cust_city, \PDO::PARAM_STR);
				$qry->bindValue(5, $cust_phoneNumber, \PDO::PARAM_STR);
				$qry->bindValue(6, $cust_addNumber, \PDO::PARAM_STR);
				$qry->bindValue(7, $cust_firstName, \PDO::PARAM_STR);
				$qry->bindValue(8, $cust_id, \PDO::PARAM_INT);
				
				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
	}
?>