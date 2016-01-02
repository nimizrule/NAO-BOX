<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Central classe for the controllers
	 **************************************************************************
	 * @page			Controller.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	abstract class Controller {

		/* Smarty instance (template engine) */
		protected $smarty = null;
		
		/**
	     * Checks if the user can load this controller.
	     *
		 * @param	void.
		 * @return 	bool, true if the user can load, else false.
	     */
	    abstract protected function checkAccess();

	    /**
	     * Checks if the user can view this controller with defaults 
		 * Permissions.
		 *
		 * @param	void.
		 * @return 	bool, true if the user can view, else false.
	     */
	    abstract protected function viewAccess();
	}