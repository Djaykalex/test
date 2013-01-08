<?php
require(CONTROLLERS.DS.'controllers.php');
/**
* La fonction index va permettre d'afficher une la 1er page de l'onglet fury-game.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function index() {

}


/**
* La fonction backoffice_index va permettre d'afficher une liste des jeux.
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
		'jeux_demos' => find(array('table' => 'jeux_demos', 'link' => $link)),
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

function backoffice_add1() {
	
	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'jeux_demos', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/fury_games/backoffice_index");
			die();
		}
	}

	return array(
		'jeux_demos' => findList(array('table' => 'jeux_demos', 'link' => $link)), 
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'errors' => $errors
	);
}

function backoffice_add() {
	
	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'jeux_demos', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/fury_games/backoffice_index");
			die();
		}
	}
	
	return array(
		
		'errors' => $errors
	);
}

/**
* La fonction backoffice_edit va permettre d'éditer une liste des jeux.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		DonnÃ©es postÃ©
**/

function backoffice_edit($id) {

	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
	
	global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'jeux_demos', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/fury_games/backoffice_index");
		}
	}
	$aReturn = array(
		'jeux_demos' => findFirst(array('table' => 'jeux_demos', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'errors' => $errors,
	);
	return $aReturn;
}

/**
* La fonction backoffice_delete va permettre de supprimer une liste des jeux.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		DonnÃ©es postÃ©
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'jeux_demos', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/fury_games/backoffice_index");	

}


/**
* La fonction news va permettre d'afficher tous les articles.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function news() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
			
				delete(array ('table' => 'articles', 'link' => $link, 'id' => $k));
				
			}
		}
	}
	$idArticle = find(array('table' => 'articles', 'link' => $link));
	$idCommentaires = FindCount(array('table' => 'commentaires', 'link' => $link, 'conditions' => 'article_id='.$idArticle ));
	$idcom = find(array('table' => 'commentaires', 'link' => $link));
	$aReturn = array (
		
		'article_resume' => find(array('table' => 'articles', 'link' => $link, 'conditions' => array('Online' => 1))), // affiche les articles valider
		'articlesTypesList' => findList2(array('table' => 'articles_types', 'link' => $link)), // affiche les types d'articles
		
		/** commentaires d'un article */
		'commentaires' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id = commentaires.id')), 
		// affiche les commentaires sur l'article avec un compte du nombre de commentaires.
		
		/** Compte le nombre d'articles en 2 façon*/
		'com' => $idCommentaires,
		
		
		/** commentaire_nbr compte le nombre total de commentaires*/
		'commentaire_nbr' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id='.$idcom )),
		
		/** Compte le nombre d'articles en 2 façon*/
		'totalarticles' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'articles', 'link' => $link, 'conditions' => array('Online' => 1))), // compte le nombre d'articles
		

		);
	return $aReturn;
}


/**
* La fonction detail va permettre d'afficher en detail un article, une news, une guilde...
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST 		mixed 		ce sont les données postées
**/

function details($id) {

	global $link;

	if(isset($_POST) && !empty($_POST)) {
	
	save(array('table' => 'commentaires', 'link' => $link), $_POST);
		//header("Location: ".BASE_URL."/homes");
	}
	// paginate(array($totalPages => 'totalpages', $currentPage => 'currentpages', $adjacent = 3));
	
	$commentaires = find(array('table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id ='.$id ));
	/** le ORDER BY id DESC ne fonctionne pas si je le rajoute dans mes conditions, le problème vient de la condition article_id ='.$id, à voir pourquoi..*/ 
	$isauth_com =  find(array('table' => 'isauth', 'link' => $link));
	
	/** $guildename cherche dans la table guildes l'isauth_id = a $_SESSION['user_id'] si il est connecté dans ce cas il s'affiche sinon $guildename = a rien, cela 
	evite d'avoir un UNDEFINED VARIABLE de $_SESSION['user_id']*/ 
	if(isset($_SESSION['user_id'])){
		$guildename = find(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id']));
	}
	else{
		$guildename ="";
	}
	$paginationCommentaires = paginationCommentaires(array('table' => 'commentaires', 'link' => $link, 'messagesParPage' => '20', 'premierepage'=> '1', 'test' => 1, 'conditions' => 'online = 1 AND article_id ='.$id ));
	
	
	$aReturn = array(
		'article' => findFirst(array('table' => 'articles', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'isauth' => findList5(array('table' => 'isauth', 'link' => $link)),
		'isauth2' => find(array('table' => 'isauth', 'link' => $link)),
		'com' => find(array('table' => 'commentaires', 'link' => $link, 'conditions' => 'isauth_id='.$isauth_com)),/** com affiche le nombre total de commentaires pour cet article*/
		'commentaires' => $commentaires,
		'commentaire_nbr' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id ='.$id)),/** commentaire_nbr compte le nombre total de commentaires*/
		'guildes' => findList(array('table' => 'guildes', 'link' => $link)),
		'guildes2' => $guildename,
		'paginationCommentaires' => $paginationCommentaires,
	
	);
	return $aReturn;
}


/**
* La fonction guildes_vs_guildes va permettre d'afficher une liste de jeux pour le tournoi F-G.
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function guildes_vs_guildes() {

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
* La fonction details_tournois va permettre d'afficher en detail un jeu ciblé
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST 		mixed 		ce sont les données postées
**/

function details_tournois($id) {

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
* @param 	$_POST 		mixed 		ce sont les données postées
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


/**
* La fonction tournois_rapide va permettre d'afficher une page
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST 		mixed 		ce sont les données postées
**/

function tournois_rapide() {

}


/**
* La fonction demonstration va permettre d'afficher tous les jeux en démonstrations.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function demonstrations() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
			
				delete(array ('table' => 'articles', 'link' => $link, 'id' => $k));
				
			}
		}
	}
	$aReturn = array(
		
		'jeux_demos' => find(array('table' => 'jeux_demos', 'link' => $link)), // affiche les jeux en démos
	
		/** commentaires d'un article */
		// 'commentaires' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id = commentaires.id')), 
		// affiche les commentaires sur l'article avec un compte du nombre de commentaires.
		
		/** Compte le nombre d'articles en 2 façon*/
		// 'com' => $idCommentaires,
		
		/** commentaire_nbr compte le nombre total de commentaires*/
		// 'commentaire_nbr' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id='.$idcom )),
		
		/** Compte le nombre d'articles en 2 façon*/
		// 'totalarticles' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'articles', 'link' => $link, 'conditions' => array('Online' => 1))), // compte le nombre d'articles
	
		);
	return $aReturn;
}

