<?php

	/*
	 * Model for the AdminControlsModel
	 * This class handles the add  of a customer
	 *
	 * @publication		01/12/15
	 * @edition			01/12/15
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
	 */

	require_once(DIR_CLASSES."/Data.php"); 

	class AdminControlsModel extends Data {

		/**
		 * AdminControlsModel instance
		 */
		public static $instance = null;
		
		/**
		 * The constructor of AdminControlsModel
		 */
		public function __construct() {
			try {
				AdminControlsModel::init();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Get current instance of AdminControlsModel (singleton)
		 *
		 * @return AdminControlsModel
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AdminControlsModel();
			}
			return self::$instance;
		}
		
		/**
		 * Initialize the AdminControlsModel class
		 */
		public function init() {
			try {
				parent::init();	
			} catch(Exception $e) {
				throw new Exception('An exception has occured during the loading: '.$e->getMessage());
			}			
		}

		/**
		 * Add an controls
		 *
		 * @param cmd_id, commands's id
		 * @param cmd_name, commands's  name
		 * @param cmd_file ,  commands's file n'ames
		 * @param cmd_description, commands's description
		 * @param cmd_package_id, commands's package id		 
		 * @return 0 without errors, exception message any others cases
		 */
		public function add_commands(
			$cmd_id,
			$cmd_name,
			$cmd_file, 
			$cmd_description, 
			$cmd_package_id) {
			try {
				$qry = $this->db->prepare('INSERT INTO naobox.nb_commands
				   (cmd_id,
					cmd_name, 
					cmd_file, 
					cmd_description, 
					cmd_package_id) VALUES (NULL, ?, ?, ?, NULL)');				
				$qry->bindValue(1, $cmd_name, \PDO::PARAM_STR);
				$qry->bindValue(2, $cmd_file, \PDO::PARAM_STR);
				$qry->bindValue(3, $cmd_description, \PDO::PARAM_STR);
				$qry->execute();
				$qry->closeCursor();
				return 0;
				} catch(Exception $e) {
					return $e->getMessage();
			}
		}

	
		/**
		 * Verify is a command exist with the id
		 *
		 * @param cmd_id, commands's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function has_command($cmd_id) {
			try {

				$qry = $this->db->prepare('SELECT naobox.nb_commands.cmd_id FROM commands WHERE nb_commands.cmd_id =?');	
				$qry->bindValue(1, $cmd_id, \PDO::PARAM_STR);
				$qry->execute();
				$return_qry = $qry->fetch(\PDO::FETCH_OBJ);
				$qry->closeCursor();
				return (!empty($return_qry->cmd_id)) ? 1 : 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
	
		/**
		 * Delete a specified commands
		 *
		 * @param cmd_id, command's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Command($cmd_id) {
			try {
				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_commands WHERE nb_commands.cmd_id =?');
				$qry->bindValue(1, $cmd_id, \PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete all commands
		 *	
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Commands() {
			try {								

				$qry = $this->db->prepare('DELETE FROM naobox.nb_commands');

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
		/**
		 * Modify all commands's informations from one command 
		 * @param cmd_id, command's id
		 * @param cmd_name, command's name
		 * @param cmd_file, command's file's name
		 * @param cmd_description, command's description
		 * @return 0 without errors, exception message any others cases
		 */
		public function uptdate_Commands($cmd_id, $cmd_name, $cmd_file, $cmd_description) {
			try {
				$qry = $this->db->prepare('UPDATE naobox.nb_commands SET cmd_name =?, cmd_file =?, cmd_description =? WHERE nb_commands.cmd_id =?');

				$qry->bindValue(1, $cmd_name, \PDO::PARAM_STR);
				$qry->bindValue(2, $cmd_file, \PDO::PARAM_STR);
				$qry->bindValue(3, $cmd_description, \PDO::PARAM_STR);
				$qry->bindValue(4, $cmd_id, \PDO::PARAM_STR);
				
				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Add à command to a package 
		 * "you have to write the name of the package and the name of the path"
		 * @param pkg_id, package's id
		 * @param pkg_name, package's name
		 * @param pkg_path, command's file's name
		 * @return 0 without errors, exception message any others cases
		 */
		public function create_Package($pkg_id, $pkg_name, $pkg_path, $cmd_description) {
			try {
				$qry = $this->db->prepare('INSERT INTO naobox.nb_packages
				   (pkg_id,	pkg_name, pkg_path) VALUES (NULL, ?, ?)');				
				$qry->bindValue(1, $pkg_name, \PDO::PARAM_STR);
				$qry->bindValue(2, $pkg_path, \PDO::PARAM_STR);
				// INSERT INTO `naobox`.`nb_packages` (`pkg_id`, `pkg_name`, `pkg_path`) VALUES (NULL, 'thename', 'the path ');
				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
		/**
		 * Display all packages's informations
		 *
	     * @return return_qry : result into an object, exception message any others cases
		 */
		public function display_Packages() {
			try {
				$qry = $this->db->prepare('SELECT * FROM naobox.nb_packages ORDER BY pkg_id');				
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
		public function display_Package($pkg_id) {
			try {
				$qry = $this->db->prepare('SELECT * FROM  naobox.nb_packages WHERE nb_packages.pkg_id =?');

				$qry->bindValue(1, $cmd_id, \PDO::PARAM_STR);				

				$qry->execute();				
				$return_qry = $qry->fetchAll();

				$qry->closeCursor();
				return $return_qry;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete a specified package
		 *
		 * @param pkg_id, command's id
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Package($pkg_id) {
			try {
				
				$qry = $this->db->prepare('DELETE FROM naobox.nb_packages WHERE nb_packages.pkg_id =?');
				$qry->bindValue(1, $pkg_id, \PDO::PARAM_INT);

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}

		/**
		 * Delete all commands
		 *	
		 * @return 0 without errors, exception message any others cases
		 */
		public function delete_Packages() {
			try {								

				$qry = $this->db->prepare('DELETE FROM naobox.nb_packages');

				$qry->execute();
				$qry->closeCursor();
				return 0;
			} catch(Exception $e) {
				return $e->getMessage();
			}
		}
		
	}
?>