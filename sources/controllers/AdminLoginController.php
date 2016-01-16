<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Admin Login controller, uses to connect user to admin page
	 **************************************************************************
	 * @page			AdminLoginController.php
	 * @publication		12/27/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */

	require_once(DIR_CLASSES."/BackController.php");
	 
	class AdminLoginController extends BackController {
		
		/* Name of template */
		private $tpl_name = "admin-login";
		
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
				if(!Tools::isConnectedAdmin()) {
					$url = Tools::getInstance()->url;
					
					// When the controller is good, the render can begin.
					if (Tools::getInstance()->isAskedController(__CLASS__, $url)) {		
						if (file_exists(DIR_TEMPLATES."/".$this->tpl_name.".tpl")) {	
							if (file_exists(DIR_VIEWS."/data/AdminModel.php")) {
								try {	
				
									// The user asks to log in.
									if(isset($_POST["connexion"])) {
										
										require_once(DIR_VIEWS."/data/AdminModel.php");

										if(!empty($_POST["login"]) && !empty($_POST["password"])) {
											if(AdminModel::getInstance()->validAccount(
												$_POST["login"], hash(HASH_ALGORITHM,$_POST["password"]))
											) {

												$_SESSION["connected-admin"] = true;
												$_SESSION["admin"] = $_POST["login"];
												AdminModel::getInstance()->connectAccount(
													$_POST["login"]
												);
												header("Location: /admin/menu");
											} 
										} 

										$login = [
											"user" => $_POST["login"],
											"password" => $_POST["password"]
										];
									} else {
										$login = [
											"user" => "",
											"password" => ""
										];
									}

									// For display template, we need to create a new instance
									// Of Smarty engine.
									$smarty = Renderer::getInstance()->getSmartyInstance(
										false, 
										false,
										true
									);

									$smarty->assign("login", $login);
									$smarty->assign("nao_battery", 80);
									
									// After assign variables to the template, 
									// The controller show the render.
									$smarty->display(DIR_TEMPLATES."/".
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
					header("Location: /admin/menu");
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