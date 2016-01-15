<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Controls controller, uses to display the controls
	 **************************************************************************
	 * @page			AdminControlsController.php
	 * @publication		11/28/15
	 * @edition			01/09/16	
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
				if(Tools::isConnectedAdmin()) {
					$url = Tools::getInstance()->url;
					$uri = Tools::getInstance()->uri;
					
					// When the controller is good, the render can begin.
					if (Tools::getInstance()->isAskedController(__CLASS__, $url)) {		
						if (file_exists(DIR_TEMPLATES."/".$this->tpl_name.".tpl")) {	
							if (file_exists(DIR_VIEWS."/data/ControlsModel.php") &&
								file_exists(DIR_VIEWS."/data/AdminControlsModel.php")
							) {
								try {	
									require_once(DIR_VIEWS."/data/ControlsModel.php");

									// The user asks to modify the action.
									if(Tools::getInstance()->getAction($uri) == "modify") {

										// The user can modify only once control in same time.
										if(Tools::getInstance()->getID_intoURL($uri) != "all") {
											
											// The user asks to save the news data into database
											if(isset($_POST["modifyControl"])) {
												require_once(DIR_VIEWS."/data/AdminControlsModel.php");
												AdminControlsModel::getInstance()->update_Command(
													Tools::getInstance()->getID_intoURL($uri),
													$_POST["name"],
													$_POST["desc"]
												);

												header("Location: /admin/controles#liste");

											// Is the first display
											} else {
												$control = array();
												$buffer = ControlsModel::getInstance()->get_command(
													Tools::getInstance()->getID_intoURL($uri)
												);

												$control = [
													"id" => $buffer[0]["cmd_id"],
													"name" => $buffer[0]["cmd_name"],
													"file" => $buffer[0]["cmd_file"],
													"desc" => $buffer[0]["cmd_description"]
												];

												// For display template, we need to create a new instance
												// Of Smarty engine.
												$smarty = Renderer::getInstance()->getSmartyInstance(
													true, 
													true
												);

												$smarty->assign("nao_battery", 80);
												$smarty->assign("content", "modify");
												$smarty->assign("control", $control); 
												
												// After assign variables to the template, 
												// The controller show the render.
												$smarty->display(DIR_TEMPLATES."/".
												$this->tpl_name.".tpl");
											}

										} else {
											header("Location: /admin/controles#liste");
										}

									// The user asks to delete the action.
									} elseif (Tools::getInstance()->getAction($uri) == "delete") {

										require_once(DIR_VIEWS."/data/AdminControlsModel.php");
										
										// If the user asks to delete all controls.
										if(Tools::getInstance()->getID_intoURL($uri) == "all") {
											AdminControlsModel::getInstance()->delete_Commands();

										
										// Only once control will be deleted.
										} else {
											
											// File's deletion
											if(is_dir(
												DIR_DOWNLOADS."/".Tools::getInstance()->getID_intoURL($uri))
											) {
												rmdir(
													DIR_DOWNLOADS."/".Tools::getInstance()->getID_intoURL($uri)
												);
											} 

											AdminControlsModel::getInstance()->delete_Command(
												Tools::getInstance()->getID_intoURL($uri)
											);
										}

										header("Location: /admin/controles#liste");

									// Any others cases.
									} else {

										$controls = array();

										// The user asks to add action into database
										if(isset($_POST["addControl"])) {
											
											// Once or more fields are empties
											if(empty($_POST["name"]) || empty($_POST["file"])) {

												$controls = [
													"name" => $_POST["name"],
													"file" => $_POST["file"],
													"desc" => $_POST["desc"]
												];
												$this->smarty->assign("content", "add");
											} else {

											}

										// Only display
										} else {
											$buffer = ControlsModel::getInstance()->get_commands();
											$i = 0;

											foreach($buffer as $control) {
												$controls[$i]["id"] = $control["cmd_id"];
												$controls[$i]["name"] = $control["cmd_name"];
												$controls[$i]["file"] = $control["cmd_file"];
												$controls[$i]["desc"] = $control["cmd_description"];
												$i++;
											}

											$this->smarty->assign("content", "list");
										}

										$this->smarty->assign("nao_battery", 80);
										$this->smarty->assign("controls", $controls); 
										
										// After assign variables to the template, 
										// The controller show the render.
										$this->smarty->display(DIR_TEMPLATES."/".
										$this->tpl_name.".tpl");
									}
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