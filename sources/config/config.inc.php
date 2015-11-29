<?php
	
	/*
	 * NAOBOX
	 **************************************************************************
	 * Configuration file
	 **************************************************************************
	 * @page			config.inc.php
	 * @publication		11/28/15
	 * @edition			11/28/15	
	 * @author			Jérémie LIECHTI
	 * @copyright		3IL, Jérémie LIECHTI
	 */
	 
	/* Directories */
	define("DIR_ADM", "./administration");
	define("DIR_CLASSES", "./classes");
	define("DIR_CONFIG", "./config");
	define("DIR_CONTROLLERS", "./controllers");
	define("DIR_TOOLS", "./tools");
	define("DIR_VIEWS", "./views");
	
	define("DIR_TEMPLATES", DIR_VIEWS."/templates");
	define("DIR_CSS", DIR_TEMPLATES."/css");
	define("DIR_IMG", DIR_TEMPLATES."/img");
	define("DIR_SCRIPTS", DIR_TEMPLATES."/scripts");
	
	/* Maintenance */
	define("WEBSITE_MAINTENANCE", false);
	
	/* Options for debug */
	define("DEBUG_FUNCTIONS", true);
	define("DEBUG_DIR","/NAO-BOX/sources");
	
	/* URL rewriting settings */
	define("URW_HOME", "menu");
	
	/* Bootstrap settings */
	define("BOOTSTRAP_DIR", DIR_TOOLS."/bootstrap");
	
	/* JQuery settings */
	define("JQUERY_DIR", DIR_TOOLS."/jquery_min");
	
	/* Smarty settings */
	define("SMARTY_DIR", DIR_TOOLS."/smarty/");
	define("SMARTY_CACHING", 0);
	define("SMARTY_COMPILE_DIR", DIR_VIEWS."/compile");
	define("SMARTY_CACHE_DIR", DIR_VIEWS."/cache");
	define("SMARTY_CACHE_SUB_DIR", true);
	define("SMARTY_CACHE_LIFETIME", 900);
	define("SMARTY_COMPILE_CHECK_ON_DEBUG_MODE", true);
	
	/**
	 * Twig settings
	 */
	/*define('_TWIG_AUTOLOADER_', _DEPENDENCIES_DIR_ .'/twig/lib/Twig/Autoloader.php');
	define('_TWIG_CACHE_', false);
	
	/**
	 * Bootstrap settings
	 */
	//define('_BOOTSTRAP_FILE_', '/'._PROJECT_NAME_ .'/dependencies/bootstrap/css/bootstrap.min.css'); 
	
	/**
	 * Twig views's directories
	 */
	/*define('_CARAVANS_VIEWS_', _VIEWS_DIR_ .'/caravans/templates'); 
	define('_CUSTOMERS_VIEWS_', _VIEWS_DIR_ .'/customers/templates'); 
	define('_ERRORS_VIEWS_', _VIEWS_DIR_ .'/errors/templates'); 
	define('_HOME_VIEWS_', _VIEWS_DIR_ .'/home/templates'); 
	define('_LOCATIONS_VIEWS_', _VIEWS_DIR_ .'/locations/templates'); 
	define('_RENTALS_VIEWS_', _VIEWS_DIR_ .'/rentals/templates'); 
	define('_SEASONS_VIEWS_', _VIEWS_DIR_ .'/seasons/templates'); 
	define('_SECTORS_VIEWS_', _VIEWS_DIR_ .'/sectors/templates'); 
	define('_VISITORS_VIEWS_', _VIEWS_DIR_ .'/visitors/templates'); 
	
	/**
	 * Models's directories
	 */
	/*define('_CARAVANS_MODELS_', _MODELS_DIR_ .'/caravans'); 
	define('_CUSTOMERS_MODELS_', _MODELS_DIR_ .'/customers'); 
	define('_ERRORS_MODELS_', _MODELS_DIR_ .'/errors'); 
	define('_HOME_MODELS_', _MODELS_DIR_ .'/home'); 
	define('_LOCATIONS_MODELS_', _MODELS_DIR_ .'/locations'); 
	define('_RENTALS_MODELS_', _MODELS_DIR_ .'/rentals'); 
	define('_SEASONS_MODELS_', _MODELS_DIR_ .'/seasons'); 
	define('_SECTORS_MODELS_', _MODELS_DIR_ .'/sectors'); 
	define('_VISITORS_MODELS_', _MODELS_DIR_ .'/visitors'); 
	
	/**
	 * Database settings
	 */
	/*define('_HOST_', 'localhost'); 
	define('_DATABASE_', 'camping'); 
	define('_LOGIN_', 'root'); 
	define('_PASSWORD_', ''); */