<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Ajax query process
	 **************************************************************************
	 * @page			AjaxRenderer.php
	 * @publication		12/04/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	
	require_once(dirname(__FILE__)."/Renderer.php");
	
	class AjaxRenderer extends Renderer {
		
		/* Smarty instance (template engine) */
		private $smarty = null;

		/* Instance of ajax renderer */
		public static $instance = null;

		/** 
		 * Ajax renderer builder.
		 * Initialize the objects.
		 */
		public function __construct() {}
		
		/**
		 * Get the current instance of the ajax renderer (singleton).
		 * If the instance doesn't exists, the function returns a new instance
		 * Else, the function returns the current instance.
		 *
		 * @param 	void.
		 * @return 	AjaxRenderer.
		 */
		public static function getInstance() {
			if (!self::$instance) {
				self::$instance = new AjaxRenderer();
			}
			return self::$instance;
		}
		
		/**
		 * Finds the type of the query and root to execute it.
		 * If cannot root the query, redirects to 404 page.
		 *
		 * @param	page, page to root.
		 * @return 	the query's result.
		 * @throws	Exception, if preg_match() encounter a problem.
		 */
		public function executeQuery($page, $adminProcess) {
			try {
				if($adminProcess) {
					$this->smarty = Renderer::getInstance()->getSmartyInstance(true);
				} else {
					$this->smarty = Renderer::getInstance()->getSmartyInstance(false);
				}

				if(preg_match("#control#", $page)) {
					return AjaxRenderer::controlQuery($page, $adminProcess);			
				} else if(preg_match("#manual#", $page)) {
					return AjaxRenderer::manualQuery($page, $adminProcess);
				} else if(preg_match("#sensor#", $page)) {
				 	return AjaxRenderer::sensorQuery($page, $adminProcess);
			 	} else if(preg_match("#peripheral#", $page)) {
			 		return AjaxRenderer::peripheralQuery($page, $adminProcess);
				} else if(preg_match("#information#", $page)) {
				 	return AjaxRenderer::informationQuery($page, $adminProcess);
			 	} else if(preg_match("#setting#", $page)) {
				 	return AjaxRenderer::settingQuery($page, $adminProcess);
				}
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		/**
		 * Load dynamic templates and inject variables into it.
		 *
		 * @param	page, page to root.
		 * @return 	the specific template.
		 * @throws	Exception, if smarty encounter a problem.
		 */
		private function controlQuery($page, $adminProcess) {
			try {
				switch($page) {
					case "controlFull":
						$content = "full";
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
						$this->smarty->assign("controls", $controls); 
						break;
					case "controlStep":
						$content = "step";
						break;
					case "controlList":
						$content = "list";
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
						$this->smarty->assign("controls", $controls); 
						break;
					case "controlAdd":
						$content = "add";
						break;
					default:
						break;
				}

				$this->smarty->force_compile = 1;
				$this->smarty->assign("content", $content);

				if($adminProcess) {
					return $this->smarty->fetch("../admin-controls-content.tpl");
				} else {
					return $this->smarty->fetch("../controls-content.tpl");
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		/**
		 * Load dynamic templates and inject variables into it.
		 *
		 * @param	page, page to root.
		 * @return 	the specific template.
		 * @throws	Exception, if smarty encounter a problem.
		 */
		private function manualQuery($page, $adminProcess) {
			try {
				switch($page) {
					case "manualUtilisation":
						$content = "utilisation";
						break;
					case "manualAdministration":
						$content = "administration";
						break;
					case "manualInstallation":
						$content = "installation";
						break;
					default:
						break;
				}

				$this->smarty->force_compile = 1;
				$this->smarty->assign("content", $content);

				if($adminProcess) {
					return $this->smarty->fetch("../admin-manuals-content.tpl");
				} else {
					return $this->smarty->fetch("../manuals-content.tpl");
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		/**
		 * Load dynamic templates and inject variables into it.
		 *
		 * @param	page, page to root.
		 * @return 	the specific template.
		 * @throws	Exception, if smarty encounter a problem.
		 */
		private function sensorQuery($page, $adminProcess) {
			try {
				switch($page) {
					case "sensorCameraT":
						$content = "cameraT";
						break;
					case "sensorCameraB":
						$content = "cameraB";
						break;
					default:
						break;
				}

				$this->smarty->force_compile = 1;
				$this->smarty->assign("content", $content);

				if($adminProcess) {
					return $this->smarty->fetch("../admin-sensors-content.tpl");
				} else {
					return $this->smarty->fetch("../sensors-content.tpl");
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		/**
		 * Load dynamic templates and inject variables into it.
		 *
		 * @param	page, page to root.
		 * @return 	the specific template.
		 * @throws	Exception, if smarty encounter a problem.
		 */
		private function peripheralQuery($page, $adminProcess) {
			try {
				switch($page) {
					case "peripheralList":
						$content = "list";
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
						$this->smarty->assign("controls", $controls); 
						break;
					case "peripheralAdd":
						$content = "add";
						break;
					default:
						break;
				}

				$this->smarty->force_compile = 1;
				$this->smarty->assign("content", $content);

				if($adminProcess) {
					return $this->smarty->fetch("../admin-peripherals-content.tpl");
				} else {
					return $this->smarty->fetch("../peripherals-content.tpl");
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		/**
		 * Load dynamic templates and inject variables into it.
		 *
		 * @param	page, page to root.
		 * @return 	the specific template.
		 * @throws	Exception, if smarty encounter a problem.
		 */
		private function informationQuery($page, $adminProcess) {
			try {
				switch($page) {
					case "informationNAO":
						$content = "nao";
						break;
					case "informationAdmin":
						$content = "admin";
						break;
					default:
						break;
				}

				$this->smarty->force_compile = 1;
				$this->smarty->assign("content", $content);

				if($adminProcess) {
					return $this->smarty->fetch("../admin-infos-content.tpl");
				} else {
					return $this->smarty->fetch("../infos-content.tpl");
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}

		/**
		 * Load dynamic templates and inject variables into it.
		 *
		 * @param	page, page to root.
		 * @return 	the specific template.
		 * @throws	Exception, if smarty encounter a problem.
		 */
		private function settingQuery($page, $adminProcess) {
			try {
				switch($page) {
					case "settingPassword":
						$content = "password";
						break;
					case "settingLevel":
						$content = "level";
						break;
					default:
						break;
				}

				$this->smarty->force_compile = 1;
				$this->smarty->assign("content", $content);

				if($adminProcess) {
					return $this->smarty->fetch("../admin-settings-content.tpl");
				} else {
					return $this->smarty->fetch("../settings-content.tpl");
				}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
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