<?php

	/*
	 * Model for the admins modifications
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/13/16
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(dirname(__FILE__)."/../../classes/ModelRenderer.php"); 

	class AdminModel extends ModelRenderer {

		/* AdminModel instance */
		public static $instance = null;
		
		/** 
		 * AdminModel builder.
		 * Initialize the objects.
		 */
		public function __construct() {}
		
		/**
		 * Get current instance of AdminModel (singleton)
		 *
		 * @param 	void.
		 * @return 	AdminModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminModel();
			}
			return self::$instance;
		}

		/**
		 * Check if the account exists.
		 *
		 * @param 	user, user to check
		 * @param 	password, password to check
		 * @return 	true, if the account is valid,
		 *			false any others cases.
		 */
		public function validAccount($user, $password) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("SELECT COUNT(usr_id) AS login FROM naobox.nb_users WHERE usr_login=? AND usr_pwd=?");				
				$qry->bindValue(1, $user, PDO::PARAM_STR);
				$qry->bindValue(2, $password, PDO::PARAM_STR);
				$qry->execute();
				$return_qry = $qry->fetch(PDO::FETCH_OBJ);
				$qry->closeCursor();

				return ($return_qry->login == 0) ? false : true;
				
			} catch(Exception $e) {
				return false;
			}
		}

		/**
		 * Connect the account.
		 *
		 * @param 	user, user to connect
		 */
		public function connectAccount($user) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("UPDATE naobox.nb_users SET usr_connected =1, usr_last_use =NOW() WHERE usr_login=?");
				$qry->bindValue(1, $user, PDO::PARAM_STR);
				$qry->execute();		

				return 0;

			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Disconnect the account.
		 *
		 * @param 	user, user to disconnect
		 */
		public function disconnectAccount($user) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("UPDATE naobox.nb_users SET usr_connected =0, usr_last_use =NOW() WHERE usr_login=?");
				$qry->bindValue(1, $user, PDO::PARAM_STR);
				$qry->execute();		

				return 0;

			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		public function getPassword($user) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("SELECT usr_pwd FROM naobox.nb_users WHERE usr_login=?");				
				$qry->bindValue(1, $user, PDO::PARAM_STR);
				$qry->execute();
				$return_qry = $qry->fetch(PDO::FETCH_OBJ);
				$qry->closeCursor();

				return $return_qry->usr_pwd;
				
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Change the password of the account.
		 *
		 * @param 	user, user
		 * @param 	password, users's password
		 */
		public function changePassword($user, $password) {
			try {
				$qry = ModelRenderer::getDbInstance()->prepare("UPDATE naobox.nb_users SET usr_pwd =? WHERE usr_login=?");
				$qry->bindValue(1, $password, PDO::PARAM_STR);
				$qry->bindValue(2, $user, PDO::PARAM_STR);
				$qry->execute();		

				return 0;

			} catch(Exception $e) {
				return $e->getMessage();
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