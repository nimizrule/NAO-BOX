<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Ajax query process
	 **************************************************************************
	 * @page			AjaxRenderer.php
	 * @publication		12/04/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	class ModelRenderer {

		/* Instance of the database */
		public static $instance = null;
		
		/**
		 * Get the current instance of the database (singleton).
		 * If the instance doesn't exists, the function returns a new instance
		 * Else, the function returns the current instance.
		 *
		 * @param 	void.
		 * @return 	PDO.
		 */
		public static function getDbInstance() {
			if (!self::$instance) {
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO(
					"mysql:host=".DB_HOST.";dbname=".DB_NAME,
					DB_USER,
					DB_PASSWORD,
					$pdo_options
				);
				self::$instance->exec("SET NAMES utf8");
			}
			return self::$instance;
		}
	}