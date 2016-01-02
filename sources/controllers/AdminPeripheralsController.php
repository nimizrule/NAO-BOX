<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Peripherals controller, uses to display the peripherals
	 **************************************************************************
	 * @page			AdminPeripheralsController.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/BackController.php");
 
	class AdminPeripheralsController extends BackController {
		
		/**
		 * Name of template
		 */
		 private $tpl_name = "admin-peripherals";
		
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
							$controls[0]["name"] = "test";
							$controls[0]["mac"] = "test";
							$controls[0]["ip"] = "Test";
							$controls[1]["name"] = "test1";
							$controls[1]["mac"] = "test1";
							$controls[1]["ip"] = "Test1";
							$controls[2]["name"] = "test2";
							$controls[2]["mac"] = "test2";
							$controls[2]["ip"] = "Test2";
							$controls[3]["name"] = "test3";
							$controls[3]["mac"] = "test3";
							$controls[3]["ip"] = "Test3";

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