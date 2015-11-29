<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Controls controller, uses to display the controls
	 **************************************************************************
	 * @page			ControlsController.php
	 * @publication		11/29/15
	 * @edition			11/29/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/Controller.php");
	 
	class ControlsController extends Controller {
		
		/**
		 * Name of template
		 */
		 private $tpl_name = "controls";
		
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
							$controls[0]["link"] = "test";
							$controls[0]["desc"] = "test";
							$controls[0]["name"] = "Test";
							$controls[1]["link"] = "test1";
							$controls[1]["desc"] = "test1";
							$controls[1]["name"] = "Test1";
							$controls[2]["link"] = "test2";
							$controls[2]["desc"] = "test2";
							$controls[2]["name"] = "Test2";
							$controls[3]["link"] = "test3";
							$controls[3]["desc"] = "test3";
							$controls[3]["name"] = "Test3";
							$controls[4]["link"] = "test";
							$controls[4]["desc"] = "test";
							$controls[4]["name"] = "Test";
							$controls[5]["link"] = "test1";
							$controls[5]["desc"] = "test1";
							$controls[5]["name"] = "Test1";
							$controls[6]["link"] = "test2";
							$controls[6]["desc"] = "test2";
							$controls[6]["name"] = "Test2";
							$controls[7]["link"] = "test3";
							$controls[7]["desc"] = "test3";
							$controls[7]["name"] = "Test3";
							$controls[8]["link"] = "test";
							$controls[8]["desc"] = "test";
							$controls[8]["name"] = "Test";
							$controls[9]["link"] = "test1";
							$controls[9]["desc"] = "test1";
							$controls[9]["name"] = "Test1";
							$controls[10]["link"] = "test2";
							$controls[10]["desc"] = "test2";
							$controls[10]["name"] = "Test2";
							$controls[11]["link"] = "test3";
							$controls[11]["desc"] = "test3";
							$controls[11]["name"] = "Test3";
							$controls[12]["link"] = "test1";
							$controls[12]["desc"] = "test1";
							$controls[12]["name"] = "Test1";
							$controls[13]["link"] = "test2";
							$controls[13]["desc"] = "test2";
							$controls[13]["name"] = "Test2";
							$controls[14]["link"] = "test3";
							$controls[14]["desc"] = "test3";
							$controls[14]["name"] = "Test3";
							$controls[15]["link"] = "test1";
							$controls[15]["desc"] = "test1";
							$controls[15]["name"] = "Test1";
							$controls[16]["link"] = "test2";
							$controls[16]["desc"] = "test2";
							$controls[16]["name"] = "Test2";
							$controls[17]["link"] = "test3";
							$controls[17]["desc"] = "test3";
							$controls[17]["name"] = "Test3";
							
							$this->smarty->assign("nao_battery", 80);
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