<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction backoffice_index va permettre d'afficher en detail les types de r�les
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
**/

function backoffice_index() {

	global $link;
	$aReturn = array (
		'articles_types' => find(array('table' => 'role', 'link' => $link)), // table r�le
		'articlesTypesList' => findList(array('table' => 'role', 'link' => $link)) // affiche le nom des r�les
		);
	return $aReturn;
}


/**
* La fonction backoffice_add va permettre d'ajouter un type de r�le
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
* @param 	$errors 	varchar  	variable qui v�rifie si les donn�es post�es sont bonnes.
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs post�s sont corrects.
**/

function backoffice_add() {
	
	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
		// � commenter et � revoir pour mieux le comprendre
		$crud = $_POST['crud'];
		unset ($_POST['crud']);
		$last_id = save(array('table' => 'role', 'link' => $link), $_POST);
		
		foreach($crud as $controller => $controllerValue) {
			foreach($controllerValue as $action => $isauth){
			$tableau = array('controller' => $controller, 'action' => $action, 'isauth' => $isauth, 'role_id' =>$last_id);
			save(array('table'=> 'acls', 'link' => $link),$tableau);
			}
		}
		header("Location: ".BASE_URL."/types_roles/backoffice_index");
		die();
	}
	
	return array(
		'articlesTypesList' => findList(array('table' => 'role', 'link' => $link)),
		'articles_types' => find(array('table' => 'role', 'link' => $link)),
		'articletype' => find(array('table' => 'role', 'link' => $link)),
		'crud' => find(array('table' => 'acls', 'link' => $link)) // table acls, � revoir 
	);
}


/**
* La fonction backoffice_edit va permettre d'afficher en detail un type de r�le
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'role', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/types_roles/backoffice_index");

	}
	
	$aReturn = array(
		'articletype' => findFirst(array('table' => 'role', 'link' => $link, 'conditions' => 'id='.$id)), // table r�le cibl�
		'id' => $id, // lien
		'articles_types' => find(array('table' => 'role', 'link' => $link)), // table r�le
		'articlesTypesList' => findList(array('table' => 'role', 'link' => $link)) // affiche le nom du r�le � �diter
		
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer un type de r�le
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Donn�es post�
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'role', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/types_roles/backoffice_index");	

}