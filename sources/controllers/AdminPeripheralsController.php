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
		
		/* Name of template */
		private $tpl_name = "admin-peripherals";
		
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
							if (file_exists(DIR_VIEWS."/data/AdminPeripheralModel.php")) {
								try {	
									require_once(DIR_VIEWS."/data/AdminPeripheralModel.php");

									// The user asks to modify the peripheral.
									if(Tools::getInstance()->getAction($uri) == "modify") {

										// The user can modify only once device in same time.
										if(Tools::getInstance()->getID_intoURL($uri) != "all") {
				
											// The user asks to save the news data into database
											if(isset($_POST["modifyPeripheral"])) {
												AdminPeripheralModel::getInstance()->update_Device(
													Tools::getInstance()->getID_intoURL($uri),
													$_POST["name"],
													$_POST["mac"],
													$_POST["ip"],
													$_POST["desc"]
												);

												header("Location: /admin/peripheriques#liste");

											// Is the first display
											} else {
												$peripheral = array();
												$buffer = AdminPeripheralModel::getInstance()->get_peripheral(
													Tools::getInstance()->getID_intoURL($uri)
												);

												$peripheral = [
													"id" => $buffer[0]["prl_id"],
													"name" => $buffer[0]["prl_name"],
													"mac" => $buffer[0]["prl_mac_adress"],
													"ip" => $buffer[0]["prl_ip_adress"],
													"desc" => $buffer[0]["prl_description"]
												];

												// For display template, we need to create a new instance
												// Of Smarty engine.
												$smarty = Renderer::getInstance()->getSmartyInstance(
													true, 
													true
												);

												$smarty->assign("nao_battery", 80);
												$smarty->assign("content", "modify");
												$smarty->assign("peripheral", $peripheral); 
												
												// After assign variables to the template, 
												// The controller show the render.
												$smarty->display(DIR_TEMPLATES."/".
												$this->tpl_name.".tpl");
											}

										} else {
											header("Location: /admin/peripheriques#liste");
										}

									// The user asks to delete the peripheral.
									} elseif (Tools::getInstance()->getAction($uri) == "delete") {
										
										// If the user asks to delete all peripherals.
										if(Tools::getInstance()->getID_intoURL($uri) == "all") {
											AdminPeripheralModel::getInstance()->delete_Peripherals();

										
										// Only once device will be deleted.
										} else {
											AdminPeripheralModel::getInstance()->delete_Peripheral(
												Tools::getInstance()->getID_intoURL($uri)
											);
										}

										header("Location: /admin/peripheriques#liste");

									// Any others cases.
									} else {

										$peripherals = array();

										// The user asks to add device into database
										if(isset($_POST["addPeripheral"])) {
											
											// Once or more fields are empties
											if(empty($_POST["name"]) || empty($_POST["mac"])) {

												$peripherals = [
													"name" => $_POST["name"],
													"mac" => $_POST["mac"],
													"ip" => $_POST["ip"],
													"desc" => $_POST["desc"]
												];
												$this->smarty->assign("content", "add");
											} else {
												AdminPeripheralModel::getInstance()->add_peripheral(
													$_POST["name"], $_POST["mac"], $_POST["ip"], $_POST["desc"]
												);

												header("Location: /admin/peripheriques#liste");
											}

										// Only display
										} else {
											$buffer = AdminPeripheralModel::getInstance()->get_peripherals();
											$i = 0;

											foreach($buffer as $peripheral) {
												$peripherals[$i]["id"] = $peripheral["prl_id"];
												$peripherals[$i]["name"] = $peripheral["prl_name"];
												$peripherals[$i]["mac"] = $peripheral["prl_mac_adress"];
												$peripherals[$i]["ip"] = $peripheral["prl_ip_adress"];
												$peripherals[$i]["desc"] = $peripheral["prl_description"];
												$i++;
											}

											$this->smarty->assign("content", "list");
										}

										$this->smarty->assign("nao_battery", 80);
										$this->smarty->assign("number", count($peripherals));
										$this->smarty->assign("peripherals", $peripherals); 
										
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