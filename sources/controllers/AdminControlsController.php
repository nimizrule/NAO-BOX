<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Controls controller, uses to display the controls
	 **************************************************************************
	 * @page			AdminControlsController.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			J�r�mie LIECHTI
	 * @copyright		3IL, J�r�mie LIECHTI
	 */

	require_once(DIR_CLASSES."/BackController.php");
	 
	class AdminControlsController extends BackController {
		
		/**
		 * Name of template
		 */
		 private $tpl_name = "admin-controls";
		
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
				$url = Tools::getInstance()->url;
				
				// When the controller is good, the render can begin.
				if (Tools::getInstance()->isAskedController(__CLASS__, $url)) {		
					if (file_exists(DIR_TEMPLATES."/".$this->tpl_name.".tpl")) {	
						try {	
							$controls = array();
							$controls[0]["file"] = "test";
							$controls[0]["desc"] = "test";
							$controls[0]["name"] = "Test";
							$controls[1]["file"] = "test1";
							$controls[1]["desc"] = "test1";
							$controls[1]["name"] = "Test1";
							$controls[2]["file"] = "test2";
							$controls[2]["desc"] = "test2";
							$controls[2]["name"] = "Test2";
							$controls[3]["file"] = "test3";
							$controls[3]["desc"] = "test3";
							$controls[3]["name"] = "Test3";
							
							$this->smarty->assign("nao_battery", 80);
							$this->smarty->assign("content", "list");
							$this->smarty->assign("controls", $controls); 
							
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