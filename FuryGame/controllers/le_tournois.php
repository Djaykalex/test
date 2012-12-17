<?php

/**
* La fonction index va permettre d'afficher une liste des jeux.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST	 	mixed 		Données posté
**/
function index() {

}


/**
* La fonction backoffice_index va permettre d'afficher en detail les jeux
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
				delete (array ('table' => 'articles', 'link' => $link, 'id' => $k));
			}
		}
	}
	$aReturn = array (
		'articles' => find(array('table' => 'articles', 'link' => $link)),
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link))
		);
	return $aReturn;
}


/**
* La fonction backoffice_add va permettre d'ajouter une liste des jeux.
* @param 	$id 		INT 		c'est l'identifiant de l'article
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
		
			save(array('table' => 'articles', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/articles/backoffice_index");
			die();
		}
	}
	
	return array(
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'errors' => $errors
	);
	
	
}


/**
* La fonction detail va permettre d'editer en detail un jeu
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'articles', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/articles/backoffice_index");

	}
	$aReturn = array(
		'article' => findFirst(array('table' => 'articles', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link))
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer un jeux
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'articles', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/articles/backoffice_index");	

}

/**
* La fonction Liste_des_jeux va permettre d'afficher une liste de jeux pour le tournoi F-G.
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function Liste_des_jeux() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
				delete(array ('table' => 'jeux_tournois', 'link' => $link, 'id' => $k));
			}
		}
	}
	$aReturn = array (
		
		'jeux_tournoi' => find(array('table' => 'jeux_tournois', 'link' => $link)), // affiche les jeux qui seront présentés au tournoi F-G
		);
	return $aReturn;
}

/**
* La fonction details_jeux va permettre d'afficher en detail les jeux
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function details_jeux($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
	
		save(array('table' => 'commentaires', 'link' => $link), $_POST);
		//header("Location: ".BASE_URL."/homes");
	}
	$aReturn = array(
		
		'article' => findFirst(array('table' => 'jeux_tournois', 'link' => $link, 'conditions' => 'id='.$id)), // affiche le jeu ciblé présent au tournoi F-G
		'id' => $id,
	);
	return $aReturn;
}


/**
* La fonction les_points va permettre d'afficher en detail les points de tous les jeux du tournoi
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function les_points() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
	
		save(array('table' => 'commentaires', 'link' => $link), $_POST);
		//header("Location: ".BASE_URL."/homes");
	}
	$aReturn = array(
		
		'les_points' => find(array('table' => 'jeux_tournois ORDER BY nb_points_class ASC', 'link' => $link)), // affiche le jeu ciblé présent au tournoi F-G
		
	);
	return $aReturn;
}
