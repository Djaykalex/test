<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction backoffice_index va permettre d'afficher en detail les membres dans le backoffice...
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_index() {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
			
				delete (array ('table' => 'isauth', 'link' => $link, 'id' => $k));
				
			}
		}
	}
	$aReturn = array (
		'isauth' => find(array('table' => 'isauth', 'link' => $link)), // table isauth
		'roles' => find(array('table' => 'role', 'link' => $link)), // affiche les membres
		'rolemembre' => findList(array('table' => 'role', 'link' => $link)), // role des membres
		'guilde' => findList(array('table' => 'guildes', 'link' => $link)), // affiche le nom de la guilde
		'guildes' => find(array('table' => 'guildes', 'link' => $link)), // table guilde
		// role affiche l'attribut 'name' de la table role
		);
	return $aReturn;
}


/**
* La fonction backoffice_add va permettre d'ajouter un membre
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
* @param 	$errors 	varchar  	variable qui vérifie si les données postées sont bonnes.
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function backoffice_add() {
	
	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'isauth', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/membres/backoffice_index");
			die();
		}
	}
	
	return array(
		'guildemembre' => findList(array('table' => 'guildes', 'link' => $link)),
		'rolemembre' => findList(array('table' => 'role', 'link' => $link)),
		'errors' => $errors
	);
}


/**
* La fonction backoffice_edit va permettre d'editer en detail un membre
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'isauth', 'link' => $link), $_POST); 
		// attention si le membre est un GM dans ce cas si on veux changer son statut de GM il faut l'enregistrer dans la table guilde !! voir fonction save_assoc
		header("Location: ".BASE_URL."/membres/backoffice_index");

	}
	$aReturn = array(
		'membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'rolemembre' => findList(array('table' => 'role', 'link' => $link)),
		'guildemembre' => findList(array('table' => 'guildes', 'link' => $link))
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer un membre
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'isauth', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/membres/backoffice_index");	

}
