<?php

	/*
	 * Model for the admins modifications
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class AdminModel extends Data {

		/**
		 * AdminModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of AdminModel
		 */
		public function __construct() {
			try {
				AdminModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of AdminModel (singleton)
		 *
		 * @return AdminModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the AdminModel class
		 */
		public function init() {
			try {
				parent::init();	
			} catch(Exception $e) {
				throw new Exception('An exception has occured during the loading: '.$e->getMessage());
			}			
		}

		/**
		 * Add à command to a package
		 * @param pkg_name, profile's name
		 * @return 0 without errors, exception message any others cases
		 */
		public function create_Profile($prf_name) {
			try {
				$qry = $this->db->prepare('INSERT INTO naobox.nb_profiles
				   (pkg_id,	pkg_name, pkg_path) VALUES (NULL, ?, ?)');				
				$qry->bindValue(1, $pkg_name, PDO::PARAM_STR);
				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Update a profile name with an ID
		 * @param prf_id, profile's iID
		 * @param prf_name, profile's name
		 * @return 0 without errors, exception message any others cases
		 */
		public function update_Profile($prf_name,$prf_id) {
			try {
				$qry = $this->db->prepare
				('UPDATE naobox.nb_profiles SET prf_name =? WHERE nb_profiles.prf_id =?');				
				$qry->bindValue(1, $prf_name, PDO::PARAM_STR);
				$qry->bindValue(1, $prf_id, PDO::PARAM_STR);
				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
		/**
		 * Display all profile's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Profiles() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_profiles ORDER BY prf_id');				
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
		 * return a profile from an ID
		 * @param prf_id, profile's id	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Profile_From_ID($prf_id) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_profiles WHERE nb_profiles.prf_id =?');
				$qry->bindValue(1, $prf_id, PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * return a profile from a Name
		 * @param prf_name, profile's name	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Profile_From_Name($prf_name) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_profiles WHERE nb_profiles.prf_name =?');
				$qry->bindValue(1, $prf_name, PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * return a profile from a Name	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function delete_Profiles() {
			try {				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_profiles');
			
				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * return a profile from a Name
		 * @param pkg_id, profile's name	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function delete_Profile($pkg_id) {
			try {				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_profiles WHERE nb_profiles.pkg_id =?');
				$qry->bindValue(1, $pkg_id, PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Create a user
		 * @param usr_login, user's  login
		 * @param usr_pwd ,  user's password
		 * @return 0 without errors, exception message any others cases
		 */
		public function Create_User($usr_login,$usr_pwd,$profile_id) 
		{
			/** Check if admin parameter is used or notand set the value **/
			$choice = 0;
			if (isset($profile_id)) {
				// 2 is the admin value in profile
			   $choice = '2';
			}
			else {
				// 1 is the user value in profile
			   $choice = '1';
			}
			try {
				$qry = $this->db->prepare('INSERT INTO naobox.nb_users
				   (usr_id,
					usr_login, 
					usr_pwd, 
					usr_connected, 
					usr_last_use, 
					usr_profile_id) VALUES (NULL, ?, ?, 0, NULL, ?)');				
				$qry->bindValue(1, $usr_login, PDO::PARAM_STR);
				$qry->bindValue(2, $usr_pwd, PDO::PARAM_STR);
				$qry->bindValue(3, $choice, PDO::PARAM_STR);
			
				$qry->execute();
				$qry->closeCursor();
				return 0;
				} catch(Exception $e) {
					return $e->getMessage();
			}
		}

		/**
		 * Update a user		
		 * @param usr_pwd ,  user's password
		 * @param usr_login, user's  login
		 * @return 0 without errors, exception message any others cases
		 */
		public function Update_User($usr_login,$usr_pwd) 
		{
			try {
				$qry = $this->db->prepare
				('UPDATE naobox.nb_users SET usr_login =?, usr_pwd =? WHERE nb_users.usr_id =1');

				$qry->bindValue(1, $usr_login, PDO::PARAM_STR);
				$qry->bindValue(2, $usr_pwd, PDO::PARAM_STR);
				
				$qry->execute();
				$qry->closeCursor();
				return 0;
				} catch(Exception $e) {
					return $e->getMessage();
			}
		}
				
		
		/**
		 * Display all profile's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_users() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_users ORDER BY usr_profile_id');				
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
		 * return a profile from an ID
		 * @param prf_id, profile's id	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Profile_With_ID($prf_id) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_profiles WHERE nb_profiles.prf_id =?');

				$qry->bindValue(1, $cmd_id, PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * return a profile from a Name
		 * @param prf_name, profile's name	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function get_Profile_With_Name($prf_name) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_profiles WHERE nb_profiles.prf_name =?');

				$qry->bindValue(1, $cmd_id, PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * delete all the users (not admin)
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function delete_Users() {
			try {				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_users WHERE nb_users.usr_profile_id=1');
			 
				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete all the admin
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function delete_Admins() {
			try {				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_users WHERE nb_users.usr_profile_id=2');
			 
				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete the user
		 * @param usr_id, user's id	
		 * @return return_qry : result into an object, exception message any others cases
		 */
		public function delete_Specific_User($usr_id) {
			try {				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_users WHERE nb_users.usr_id =?');
				$qry->bindValue(1, $pkg_id, PDO::PARAM_STR);				

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