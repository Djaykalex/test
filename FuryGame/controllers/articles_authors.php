<?php

/**
* La fonction backoffice_index va permettre d'afficher en detail les auteurs des articles dans le backoffice...
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_index() {

	global $link;
	$aReturn = array (
		'articles_authors' => find(array('table' => 'authors', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'authors', 'link' => $link))
		);
	return $aReturn;
}


/**
* La fonction backoffice_add va permettre d'ajouter un auteur
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

		save(array('table' => 'authors', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/articles_authors/backoffice_index");
	}
	return array('articlesTypesList' => findList(array('table' => 'authors', 'link' => $link)));
}


/**
* La fonction backoffice_edit va permettre d'editer en detail un auteur
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

	save(array('table' => 'authors', 'link' => $link), $_POST);
	header("Location: ".BASE_URL."/articles_authors/backoffice_index");

	}
	$aReturn = array(
		'articles_authors' => findFirst(array('table' => 'authors', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'articlesTypesList' => findList(array('table' => 'authors', 'link' => $link))
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer un auteur
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'authors', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/articles_authors/backoffice_index");	

}
