<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction index va permettre d'afficher une liste de guilde.
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$errors 	varchar  	variable qui vérifie si les données sont bonnes.
* @param 	$_POST	 	mixed 		Données posté
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function index() {

	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
			
			$guildeId = save(array('table' => 'guildes', 'link' => $link), $_POST);
			$guildeId .= save(array('table' => 'isauth', 'link' => $link), $_POST);
			//save_assoc(array('table' => 'membres', 'link' => $link), array('isauth_id' => $_POST['isauth_id'], 'guildes_id' => $guildeId));
			save_assoc(array('table' => 'membres', 'link' => $link), array('isauth_id' => $_SESSION['user_id'], 'guildes_id' => $guildeId));
			// on sauvegarde à la fois dans la table isauth lorsque c'est un membre et dans la table guilde lorsque c'est un guild master, grâce à la fonction save_assoc (dossier models, fichier model)
			
			header("Location: ".BASE_URL."/creation_guildes/confirmation");
			
			die();
		}
	}
	
	$aReturn = array (
		'guildes' => find(array('table' => 'guildes', 'link' => $link)), // table guilde
		'guildes2' => find(array('table' => 'guildes', 'link' => $link)), // table guilde
		'isauths' => find(array('table' => 'isauth', 'link' => $link)), // table isauth
		'logo' => findList(array('table' => 'logo', 'link' => $link)), // logo de la guilde
		'isauth' => findList5(array('table' => 'isauth', 'link' => $link, 'conditions' => 'guilde_id=0 AND role_id !=5')), // Statut rang 5 uniquement
		'guildemembre' => findList(array('table' => 'guildes', 'link' => $link)), // membres de la guilde 
		'errors' => $errors,
		'guildeban' => findList(array('table' => 'banniere', 'link' => $link)) // banniere de la guilde
		);
	return $aReturn;
}


/**
* La fonction add va permettre de rajouter une guilde.
* @param 		$id 		INT 		c'est l'identifiant de la guilde
* @param 		$table 		varchar  	variable qui contient le nom de la table
* @param 		$link 		varchar  	c'est le connecteur
* @param 		$errors 	varchar  	variable qui vérifie si les données postées sont bonnes.
* @param 		$_POST 		mixed 		ce sont les données posté
* @param 		$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function add() {
	
	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'guildes', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/creation_guildes/index");
			die();
		}
	}
	
	return array(
		'logo' => findList(array('table' => 'logo', 'link' => $link)),
		'errors' => $errors
	);
}


/**
* La fonction edit va permettre d'editer une guilde.
* @param 		$id 		INT 		c'est l'identifiant de la guilde
* @param 		$table 		varchar 	variable qui contient le nom de la table
* @param 		$link 		varchar  	c'est le connecteur
* @param 		$_POST 		mixed 		ce sont les données posté
**/

function edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

	save(array('table' => 'guildes', 'link' => $link), $_POST);
	header("Location: ".BASE_URL."/creation_guildes/backoffice_index");

	}
	$aReturn = array(
		'guildes' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)), // affiche la guilde ciblée
		'id' => $id, // guilde ciblée
		'guildemembre' => findList(array('table' => 'guildes', 'link' => $link)) // membre de la guilde
	);
	return $aReturn;
}


/**
* La fonction deletes va permettre de supprimer une guilde.
* @param 		$id 		INT 		c'est l'identifiant de la guilde
* @param 		$table 		varchar  	variable qui contient le nom de la table
* @param 		$link 		varchar  	c'est le connecteur
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'guildes', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/creation_guildes/backoffice_index");	

}


/**
* La fonction confirmation va permettre d'afficher un message de confirmation lors de la création de la guilde
**/

function confirmation() {

}


/**
* La fonction erreur va permettre d'afficher un message d'erreur si une personne essaie de créer une autre guilde
**/

function erreur() {

}


/**
* La fonction fatal_erreur va permettre d'afficher un message d'erreur si une personne essaie de se connecter à une autre guilde que la sienne
**/

function fatal_erreur() {

}


/**
* La fonction gestion_guildes va permettre d'afficher les éléments de la guildes et ainsi les gérer.
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$table 		varchar  		variable qui contient le nom de la table
* @param 		$_POST 		mixed 			ce sont les données postées
**/

function gestion_guildes() {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
			if($v == 1 ) {
				delete (array ('table' => 'guildes', 'link' => $link, 'id' => $k));
			}
		}
	}
	$guilde = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'])); // table guildes
	$logo = findFirst(array('table' => 'logo', 'link' => $link, 'conditions' => 'id ='.$guilde['logo_id'])); // logo de la guilde
	$banniere = findFirst(array('table' => 'banniere', 'link' => $link, 'conditions' => 'id ='.$guilde['banniere_id'])); // couleur de la banniere de guilde
	$name_guilde_master = findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id ='.$_SESSION['user_id'])); // affichage du nom du Guilde master
	$guildetest = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'] )); // affiche les noms des joueurs qui appartiennent à la même guilde que le Guild Master
	$membres_guilde = findList(array('table' => 'isauth', 'link' => $link, 'conditions' => 'guildes_id ='.$guildetest['id'])); // Nom des membres de la guilde
	//pr($guildetest);
	//pr($membre_guilde);
	
	$aReturn = array (
		'guildes' => $guilde, // table guildes
		'guildelogo' => $logo, // logo de la guilde
		'guildeban' => $banniere, // couleur de la banniere de guilde
		'name_guilde_master' => $name_guilde_master, // affichage du nom du Guilde master
		'membres_guilde' => $membres_guilde, // Nom des membres de la guilde
		);
	return $aReturn;

}


/**
* La fonction gestion_membres_guildes va permettre d'afficher les membres de la guildes et ainsi les gérer
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$_POST 		mixed 			ce sont les données postées
* @param 		$table 		varchar  	variable qui contient le nom de la table
**/

function gestion_membres_guildes() {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
			if($v == 1 ) {
				delete (array ('table' => 'guildes', 'link' => $link, 'id' => $k));
			}
		}
	}
	$guilde = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'])); // table guildes
	$logo = findFirst(array('table' => 'logo', 'link' => $link, 'conditions' => 'id ='.$guilde['logo_id'])); // logo de la guilde
	$banniere = findFirst(array('table' => 'banniere', 'link' => $link, 'conditions' => 'id ='.$guilde['banniere_id'])); // couleur de la banniere de guilde
	$name_guilde_master = findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id ='.$_SESSION['user_id'])); // affichage du nom du Guilde master
	$guildetest = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'] )); // affiche les noms des joueurs qui appartiennent à la même guilde que le Guild Master
	$membre_guilde = findList(array('table' => 'isauth', 'link' => $link, 'conditions' => 'guildes_id ='.$guildetest['id'])); // Nom des membres de la guilde
	//pr($guildetest);
	//pr($membre_guilde);
	
	$aReturn = array (
		'guildes' => $guilde, // table guildes
		'guildelogo' => $logo, // logo de la guilde
		'guildeban' => $banniere,  // couleur de la banniere de guilde
		'name_guilde_master' => $name_guilde_master, // affichage du nom du Guilde master
		'membre_guilde' => $membre_guilde, // Nom des membres de la guilde
		);
	return $aReturn;
}

 
/**
* La fonction editer_guildes($id) permet d'editer sa propre guilde et de modifier les différentes infos.
* @param 		$id 		INT 			c'est l'identifiant de l'article
* @param 		$table 		varchar  		variable qui contient le nom de la table
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$errors 	varchar  		variable qui vérifie si les données postées sont bonnes.
* @param 		$_POST 		mixed 			ce sont les données postées
* @param 		$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function editer_guildes($id) {
	global $link;
	$errors = array();
	
	if(isset($_POST) && !empty($_POST)) {
	
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
			save(array('table' => 'guildes', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/creation_guildes/gestion_guildes");
		}
	}
	
	$guilde = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)); // table guildes
	$logo = findList(array('table' => 'logo', 'link' => $link)); // logo de la guilde
	$banniere = findList(array('table' => 'banniere', 'link' => $link)); // couleur de la banniere de guilde
	
	$aReturn = array(
		'guildes' => $guilde, // table guildes
		'logo' => $logo, // logo de la guilde
		'guildeban' => $banniere, // couleur de la banniere de guilde
		'id' => $id, // L'id de la guilde
		'errors' => $errors, // gestion des erreurs
	);
	return $aReturn;


}


/**
* Function editer_guildes permet d'editer les membres de sa propre guilde et de modifier juste l'appartenance à la guilde.
* @param 		$id 		INT 			c'est l'identifiant de l'article
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$table 		varchar  		variable qui contient le nom de la table
* @param 		$_POST 		mixed 			ce sont les données postées
**/

function editer_membres_guildes($id) {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
		foreach($_POST['delete'] as $k => $v){
			if($v == 1 ) {
				delete (array ('table' => 'isauth', 'link' => $link, 'id' => $k));
			}
		}
	}
	$guilde = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'])); // table guildes
	$logo = findFirst(array('table' => 'logo', 'link' => $link, 'conditions' => 'id ='.$guilde['logo_id'])); // logo de la guilde
	$banniere = findFirst(array('table' => 'banniere', 'link' => $link, 'conditions' => 'id ='.$guilde['banniere_id'])); // couleur de la banniere de guilde
	$membres = find(array('table' => 'isauth', 'link' => $link, 'conditions' => 'guildes_id='.$id )); // On affiche les membres qui appartiennent à la guilde de la page ciblée
	$aReturn = array (
		
		'guildes' => $guilde, // table guildes
		'guildelogo' => $logo, // logo de la guilde
		'guildeban' => $banniere, // couleur de la banniere de guilde
		'id' => $id, // l'id de la guilde
		'isauth' => $membres, // On affiche les membres qui appartiennent à la guilde de la page
		'guildes_connextion' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)), // securise l'acces aux autres guildes
		'isauthguildes' => find(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)), // securise l'acces aux autres guildes
		'guildemembres' => findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'] )),
		'son_role' => findList(array('table' => 'role', 'link' => $link)),
		
		);
	return $aReturn;
}


/**
* Function editer_membres permet d'editer les membres de la guilde.
* @param 		$id 		INT 			c'est l'identifiant de l'article
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$table 		varchar  		variable qui contient le nom de la table
* @param 		$_POST 		mixed 			ce sont les données postées
**/

function editer_membres($id) {
	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'isauth', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/creation_guildes/gestion_membres_guildes");

	}
	$guilde_id = find(array('table' => 'guildes', 'link' => $link));
	$guilde_membres = find(array('table' => 'isauth', 'link' => $link));
	
	$aReturn = array(
		'membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id)),
		'securite_guildes_membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id)), // securise l'acces aux autres guildes
		'GM_guilde' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'])), // securise l'acces aux autres guildes
		'id' => $id,
		'rolemembre' => findList(array('table' => 'role', 'link' => $link)),
		'guildemembre' => $guilde_membres,
		'guildemembre_test' => findList(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id )), // Guilde du membre
		'guildemembre_test2' => findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$_SESSION['guildes']  )), // Guilde du membre
	
	);
	return $aReturn;
}


/**
* Function ajouter_membres permet d'afficher les membres qui n'ont pas de guilde et ainsi avoir la possibilité de les rajouter.
* @param 		$id 		INT 			c'est l'identifiant de l'article
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$table 		varchar  		variable qui contient le nom de la table
* @param 		$_POST 		mixed 			ce sont les données postées
**/

function ajouter_membres(){

	global $link;
	if(isset($_POST) && !empty($_POST)) {
		foreach($_POST['delete'] as $k => $v){
			if($v == 1 ) {
				delete (array ('table' => 'isauth', 'link' => $link, 'id' => $k));
			}
		}
	}
	$guilde = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'])); // table guildes
	$logo = findFirst(array('table' => 'logo', 'link' => $link, 'conditions' => 'id ='.$guilde['logo_id'])); // logo de la guilde
	$banniere = findFirst(array('table' => 'banniere', 'link' => $link, 'conditions' => 'id ='.$guilde['banniere_id'])); // couleur de la banniere de guilde
	$membres = find(array('table' => 'isauth', 'link' => $link, 'conditions' => 'guildes_id = 0 AND role_id =2' )); // On affiche les membres qui appartiennent à la guilde de la page
	$aReturn = array (
		
		'guildes' => $guilde, // table guildes
		'guildelogo' => $logo, // logo de la guilde
		'guildeban' => $banniere, // couleur de la banniere de guilde
		'isauth' => $membres, // On affiche les membres qui appartiennent à la guilde de la page
		
	
		);
	return $aReturn;

}


/**
* Function ajouter permet d'ajouter les membres ciblés
* @param 		$id 		INT 			c'est l'identifiant de l'article
* @param 		$link 		varchar  		c'est le connecteur
* @param 		$table 		varchar  		variable qui contient le nom de la table
* @param 		$_POST 		mixed 			ce sont les données postées
**/

function ajouter($id){

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'isauth', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/creation_guildes/gestion_membres_guildes");

	}
	$guilde_id = find(array('table' => 'guildes', 'link' => $link));
	$guilde_membres = find(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id']));
	
	$aReturn = array(
		'membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id)),
		'securite_guildes_membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id)), // securise l'acces aux autres guildes
		'GM_guilde' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'])), // securise l'acces aux autres guildes
		'id' => $id,
		'rolemembre' => findList(array('table' => 'role', 'link' => $link)),
		'guildemembre' => $guilde_membres,
		'guildemembre_test' => findList(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id )), // Guilde du membre
		'guildemembre_test2' => findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$_SESSION['guildes']  )), // Guilde du membre
		'comptes' => find(array('table' => 'isauth', 'link' => $link)),
		'guildemembres' => findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id'] )),
	);
	return $aReturn;

}