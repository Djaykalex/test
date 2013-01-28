<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction index va permettre d'afficher une page simple
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function index(){

}

/**
* La fonction backoffice_index va permettre d'afficher une page simple
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_index() {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
	
		/**foreach ($_POST as $k => $v) {
			
			$k = substr($k, 6);
			
			echo $k.": ".$v."</br>";
		}*/
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
* La fonction backoffice_add va permettre d'ajouter une info
* @param 	$id 		INT 		c'est l'identifiant de l'info
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
* La fonction backoffice_edit va permettre d'editer en detail un article, une news, une guilde...
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
* La fonction backoffice_delete va permettre de supprimer un article, une news, une guilde...
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
* la fonction plannings affiche une page simple
*/

function plannings() {

}

