<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Configuration file
	 **************************************************************************
	 * @page			config.inc.php
	 * @publication		11/28/15
	 * @edition			12/27/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	 
	/* Directories */
	define("DIR_CLASSES", "classes");
	define("DIR_CONFIG", "config");
	define("DIR_CONTROLLERS", "controllers");
	define("DIR_TOOLS", "tools");
	define("DIR_VIEWS", "views");
	define("DIR_DOWNLOADS", "downloads");
	
	define("DIR_TEMPLATES", DIR_VIEWS."/templates");
	define("DIR_CSS", DIR_TEMPLATES."/css");
	define("DIR_IMG", DIR_TEMPLATES."/img");
	define("DIR_SCRIPTS", DIR_TEMPLATES."/scripts");
	
	/* Maintenance */
	define("WEBSITE_MAINTENANCE", false);
	
	/* Options for debug */
	define("DEBUG_FUNCTIONS", false);
	define("DEBUG_DIR","/NAO-BOX/sources");
	
	/* URL rewriting settings */
	define("URL_HOME", "menu");
	define("URL_ADMIN_HOME", "admin/menu");
	
	/* Bootstrap settings */
	define("BOOTSTRAP_DIR", DIR_TOOLS."/bootstrap");
	
	/* JQuery settings */
	define("JQUERY_DIR", DIR_TOOLS."/jquery_min");
	
	/* Smarty settings */
	define("SMARTY_CACHING", 0);
	define("SMARTY_COMPILE_DIR", dirname(__FILE__)."../views/compile");
	define("SMARTY_COMPILE_INCLUDES", true);
	define("SMARTY_CACHE_DIR", dirname(__FILE__)."../views/cache");
	define("SMARTY_CACHE_SUB_DIR", true);
	define("SMARTY_CACHE_LIFETIME", 900);
	define("SMARTY_COMPILE_CHECK_ON_DEBUG_MODE", true);
	
	/* Database settings */
	define("DB_HOST", "localhost"); 
	define("DB_NAME", "naobox"); 
	define("DB_USER", "naobox"); 
	define("DB_PASSWORD", "naobox");