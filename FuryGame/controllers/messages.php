<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction backoffice_index va permettre d'afficher en detail les messages re�us
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
**/

function backoffice_index() {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
				delete (array ('table' => 'contact', 'link' => $link, 'id' => $k));
			}
		}
	}
	$aReturn = array (
		'messages' => find(array('table' => 'contact', 'link' => $link)), // messages re�us
		// 'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link))
		);
	return $aReturn;
}


/**
* La fonction backoffice_add va permettre d'ajouter un message, mais sans int�ret
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
* @param 	$errors 	varchar  	variable qui v�rifie si les donn�es post�es sont bonnes.
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs post�s sont corrects.
**/

function backoffice_add() {
	
	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'contact', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/messages/backoffice_index");
			die();
		}
	}
	
	return array(
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'errors' => $errors
	);
}


/**
* La fonction backoffice_edit va permettre d'editer en detail un message
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'contact', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/messages/backoffice_index");

	}
	$aReturn = array(
		'messages' => findFirst(array('table' => 'contact', 'link' => $link, 'conditions' => 'id='.$id)), // affiche le message cibl�
		'id' => $id, // le message selectionn�
		// 'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link))
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer message re�u
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'contact', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/messages/backoffice_index");	

}
