<?php
///////////////////////////////////////////////////
//   DEFINITION DES VARIABLES DE L'APPLICATION   //
define('DS', DIRECTORY_SEPARATOR); //Définition du séparateur dans le cas ou l'on est sur windows ou linux

define('WEBROOT', dirname(__FILE__)); //Chemin absolu vers le dossier webroot
	define('CSS', WEBROOT.DS.'css'); //Chemin absolu vers le dossier css
	define('FILES', WEBROOT.DS.'files'); //Chemin absolu vers le dossier files
	define('IMG', WEBROOT.DS.'img'); //Chemin absolu vers le dossier img
	define('JS', WEBROOT.DS.'js'); //Chemin absolu vers le dossier js
	define('UPLOAD', WEBROOT.DS.'upload'); //Chemin absolu vers le dossier upload

define('ROOT', dirname(WEBROOT)); //Chemin absolu vers le dossier racine du site
	define('CONFIGS', ROOT.DS.'configs'); //Chemin absolu vers le dossier configs
	define('CONTROLLERS', ROOT.DS.'controllers'); //Chemin absolu vers le dossier controllers
	define('LIB', ROOT.DS.'lib'); //Chemin absolu vers le dossier lib
		define('SWIFT', LIB.DS.'swift'); //Chemin absolu vers le dossier swift
	define('MODELS', ROOT.DS.'models'); //Chemin absolu vers le dossier models
	define('VIEWS', ROOT.DS.'views'); //Chemin absolu vers le dossier include
		define('ELEMENTS', VIEWS.DS.'elements'); //Chemin absolu vers le dossier elements
		define('HELPERS', VIEWS.DS.'helpers'); //Chemin absolu vers le dossier helpers
		define('LAYOUT', VIEWS.DS.'layout'); //Chemin absolu vers le dossier layout

$baseUrl = '';
$scriptPath = preg_split("#[\\\\/]#", dirname(__FILE__), -1, PREG_SPLIT_NO_EMPTY);
$urlPath = preg_split("#[\\\\/]#", $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_NO_EMPTY);
if(isset($urlPath[0])) {
	
	$key = array_search($urlPath[0], $scriptPath);
	if(false !== $key) $baseUrl = "/".$urlPath[0];
}

define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME']))); //Chemin relatif vers l'application
///////////////////////////////////////////////////

///////////////////////////////////////////
//   INCLUSION DES LIBRAIRIES, HELPERS   //
$aLibs = array('functions');
$aHelpers = array('html', 'forms', 'paginator');


foreach($aLibs as $sLibrairie) { require_once(LIB.DS.$sLibrairie.'.php'); }
foreach($aHelpers as $sHelper) { require_once(HELPERS.DS.$sHelper.'.php'); }
///////////////////////////////////////////

////////////////////////////
//   FORMATAGE DE L'URL   //
$sUrl = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/'; //Affectation de l'url
/*
//Notation similaire
if(isset($_SERVER['PATH_INFO'])) { $sUrl = $_SERVER['PATH_INFO']; } 
else { $sUrl = '/'; }
*/
$sUrl = trim($sUrl, '/'); //On enlève les / en début et fin de chaine
$aParams = explode('/', $sUrl); //On récupère l'url sous forme de tableau

//Récupération du contrôleur
//On va tester si le premier paramètre existe et si il est non vide
if(isset($aParams[0]) && !empty($aParams[0])) {
	
	//Si il existe on le stocke dans une variable et on le supprime du tableau des paramètres
	$sController = $aParams[0]; 
	unset($aParams[0]);
	
} else { $sController = 'homes'; } //Sinon on fait appel à un contrôlleur par défaut 

//Récupération de l'action
//On va tester si le second paramètre existe et si il est non vide
if(isset($aParams[1]) && !empty($aParams[1])) {

	//Si il existe on le stocke dans une variable et on le supprime du tableau des paramètres
	$sAction = $aParams[1];
	unset($aParams[1]);

} else { $sAction = 'index'; } //Sinon on fait appel à une action par défaut
////////////////////////////


if(file_exists(CONTROLLERS.DS.$sController.'.php')) {
	
	$sModel = substr($sController, 0, -1);
	
	if(file_exists(MODELS.DS.$sModel.'.php')) {
	
		include(MODELS.DS.$sModel.'.php'); //On procède à l'inclusion du modèle
		include(CONTROLLERS.DS.$sController.'.php'); //On procède à l'inclusion du contrôleur
	
		if(function_exists($sAction)) {
			
			if(file_exists(VIEWS.DS.$sController.DS.$sAction.'.php')) {
				session_name("nomdusite");
				session_start(); 
				
				if(substr_count($sAction, 'backoffice_')) { 
				
					
			
					// si la variable de session isauth n'existe pas ou qu'elle n'a pas l'acces, dans ce cas elle reste sur la page de connexion et un message d'erreur up !
					// || !$_SESSION['isauth'] 
					// apres tous les header je fais un die(); 
					

					if(!isset($_SESSION['role']) || $_SESSION['role'] != 5 ) {
						
						header("location:".BASE_URL."/users/login");
						die();
					}  
					
					$sLayout = 'backoffice';
				}
					
				else if($sController == 'users') {$sLayout = 'users';}
				else { $sLayout = 'frontoffice'; }
			
				if(file_exists(LAYOUT.DS.$sLayout.'.php')) {
				
					$aControllerDatas = call_user_func_array($sAction, $aParams); //On fait appel à la fonction de ce contrôleur
					
					
					ob_start(); //On va récupérer dans une variable le contenu de la vue pour l'affichage dans la variable layout_for_content
					include(VIEWS.DS.$sController.DS.$sAction.'.php'); //Chargement de la vue
					$content_for_layout = ob_get_clean(); //On stocke dans cette variable le contenu de la vue
			
					include(LAYOUT.DS.$sLayout.'.php'); //Inclusion du layout
					
				} else { echo "Le layout ".$sLayout." n'existe pas!!!"; }
			} else { echo "Le controller ".$sController." n'a pas de vue ".$sAction."!!!"; }
		} else { echo "Le controller ".$sController." n'a pas de fonction ".$sAction."!!!"; }
	} else { echo "Le model ".$sModel." n'existe pas!!!"; }	
} else { echo "Le controller ".$sController." n'existe pas!!!"; }
