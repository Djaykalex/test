<?php

/**
* La fonction backoffice_index va permettre d'afficher en detail les type d'articles dans le backoffice...
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_index() {

	global $link;
	$aReturn = array (
		'articles_types' => find(array('table' => 'articles_types', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link))
		);
	return $aReturn;
}


/**
* La fonction backoffice_add va permettre d'ajouter un type d'article
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
* @param 	$errors 	varchar  	variable qui vérifie si les données postées sont bonnes.
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function backoffice_add() {
	
	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'articles_types', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/articles_types/backoffice_index");
	}
	return array('articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)));
}


/**
* La fonction backoffice_edit va permettre d'afficher en detail un type d'article
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

	save(array('table' => 'articles_types', 'link' => $link), $_POST);
	header("Location: ".BASE_URL."/articles_types/backoffice_index");

	}
	$aReturn = array(
		'articletype' => findFirst(array('table' => 'articles_types', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link))
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer un type d'article
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'articles_types', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/articles_types/backoffice_index");	

}
