<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Settings controller, uses to modify admin's settings
	 **************************************************************************
	 * @page			AdminControlsController.php
	 * @publication		11/28/15
	 * @edition			01/13/16	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/BackController.php");
	 
	class AdminSettingsController extends BackController {
		
		/**
		 * Name of template
		 */
		 private $tpl_name = "admin-settings";
		
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
							if (file_exists(DIR_VIEWS."/data/AdminModel.php")) {
								try {	
									require_once(DIR_VIEWS."/data/AdminModel.php");

									// The user asks to change the admin password
									if(isset($_POST["changePassword"])) {
										if(isset($_POST["oldPassword"]) && 
											isset($_POST["newPassword"]) && 
											isset($_POST["password"])
										) {
											if(!empty($_POST["oldPassword"]) && 
												!empty($_POST["newPassword"]) && 
												!empty($_POST["password"])
											) {
												
												// Password can be save only if it's different 
												// Than old password and if the new password equals 
												// The repetition.
												if($_POST["oldPassword"] != $_POST["newPassword"] && 
													$_POST["newPassword"] == $_POST["password"]
												) {
													
													// Password can be modify only if the old password is good.
													if(AdminModel::getInstance()->getPassword($_SESSION["admin"]) 
														== hash(HASH_ALGORITHM,$_POST["oldPassword"])
													) {
														AdminModel::getInstance()->changePassword(
															$_SESSION["admin"],
															hash(HASH_ALGORITHM,$_POST["newPassword"])
														);

														// User log out after the change
														AdminModel::getInstance()->disconnectAccount(
															$_SESSION["admin"]
														);

														$_SESSION["connected-admin"] = false;
														$_SESSION["admin"] = "";

														header("Location: /admin/connexion");
													}
												}
											}
										}

										$password = [
											"old" => $_POST["oldPassword"],
											"new" => $_POST["newPassword"],
											"rep" => $_POST["password"]
										];

									
									} else {
										$password = [
											"old" => "",
											"new" => "",
											"rep" => ""
										];
									}
									
									$this->smarty->assign("pwd", $password);
									$this->smarty->assign("nao_battery", 80);
									$this->smarty->assign("content", "password");
									
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
									"The model 'AdminModel' doesn't 
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