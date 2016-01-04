<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Controls controller, uses to display the controls
	 **************************************************************************
	 * @page			AdminControlsController.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/BackController.php");
	 
	class AdminControlsController extends BackController {
		
		/* Name of template */
		private $tpl_name = "admin-controls";
		
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
						if (file_exists(DIR_VIEWS."/data/ControlsModel.php")) {
							try {	
								require_once(DIR_VIEWS."/data/ControlsModel.php");

								$controls = array();
								$buffer = ControlsModel::getInstance()->get_commands();
								$i = 0;

								foreach($buffer as $control) {
									$controls[$i]["id"] = $control["cmd_id"];
									$controls[$i]["name"] = $control["cmd_name"];
									$controls[$i]["file"] = $control["cmd_file"];
									$controls[$i]["desc"] = $control["cmd_description"];
									$i++;
								}
								
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
								"The model 'ConstrolsModel' doesn't 
								exists !"
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