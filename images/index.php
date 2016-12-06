<?php
	// define __ROOT_DIR constant which contains the absolute path on disk 
	// of the directory that contains this file (index.php)
	// e.g. http://isic.mines-douai.fr/web08/index.php => __ROOT_DIR = /home/web08/public_html
	$rootDirectoryPath = realpath(dirname(__FILE__));
	define ('__ROOT_DIR', $rootDirectoryPath );
	
	// define __BASE_URL constant which contains the URL PATH of the index.php
	// e.g. http://isic.mines-douai.fr/web08/index.php => __BASE_URL = /web08
	$base_url = explode('/',$_SERVER['PHP_SELF']);
	array_pop($base_url);
	define ('__BASE_URL', implode('/',$base_url) );
	
	// Load all application config   //pour le login mdp $_SERVEUR[user] ----> define port, adresse...
//	require_once(__ROOT_DIR . "/config/config.php");
	
	// Load the Loader class to automatically load classes when needed
	require_once(__ROOT_DIR . '/classes/AutoLoader.class.php');
	
	// Reify the current request
	$request = Request::getCurrentRequest();
	
	echo "nom du controller : ".$request->getControllerName();
	echo "<br> nom de l'action : ".$request->getActionName();
	echo "<br>";
	
	try {
		// Instantiate the adequat controller according to the current request
		$controller = Dispatcher::dispatch($request);
		//print_r($controller);
		// Execute the requested action
		$controller->execute();
	} catch (Exception $e) {
		echo 'Error : ' . $e->getMessage() . "\n";
	}
	
	
	//deboggeur
?>

