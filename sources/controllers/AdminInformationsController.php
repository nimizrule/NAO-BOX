<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Informations controller, uses to display NAO's informations
	 **************************************************************************
	 * @page			AdminInformationsController.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/BackController.php");

	class AdminInformationsController extends BackController {
		
		/**
		 * Name of template
		 */
		 private $tpl_name = "admin-infos";
		
		/**
		 * Name of model
		 */
		private $model_name = 'Modify';
		
		/* Allow user to use this controller */
		private $access_check = true;
		
		/* Allow user to view this controller */
		private $acceess_view = true;
		
		/** 
		 * Controller builder.
		 * Initialize the objects.
		 */
		public function __construct() {
			try {
				// If the website is in maintenance, the controller cannot
				// Be loaded.
				if(WEBSITE_MAINTENANCE) {
					$this->access_view = false;
				}
				
				$this->init();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 * Initialize the controller class and their parents
		 */
		public function init() {
			try {
				parent::init();	
			} catch (Exception $e) {
				throw new Exception(
					"An exception has occured during the loading: ".
					$e->getMessage()
				);
			}
			
			// To starting display, the tool classe must exist.
			if (file_exists (DIR_CLASSES."/Tools.php")) {
				if(Tools::isConnectedAdmin()) {
					$url = Tools::getInstance()->url;
					
					// When the controller is good, the render can begin.
					if (Tools::getInstance()->isAskedController(__CLASS__, $url)) {		
						if (file_exists(DIR_TEMPLATES."/".$this->tpl_name.".tpl")) {	
							try {	
								$this->smarty->assign("nao_battery", 80);
								$this->smarty->assign("number", 0);
								$this->smarty->assign("content", "nao");
								
								// After assign variables to the template, 
								// The controller show the render.
								$this->smarty->display(DIR_TEMPLATES."/".
								$this->tpl_name.".tpl");
				
							} catch (Exception $e) {
								throw new Exception(
									"An error has occured: ".$e->getMessage()
								);
							}
						} else {
							throw new Exception(
								"The template '".$this->tpl_name."' doesn't 
								exists !"
							);
						}
					} else {
						throw new Exception(
							"An error has occured during the routing process !"
						);
					}
				} else {
					header("Location: /admin/connexion");
				}
			} else {
				throw new Exception('The URL cannot be evaluable !');
			}
		}
		
		/**
	     * @see Controller::checkAccess()
	     */
	    public function checkAccess() {
			return true;
	    }

		/**
		 * @see Controller::viewAccess()
		 */
		public function viewAccess() {
			return true;
		}		
	}