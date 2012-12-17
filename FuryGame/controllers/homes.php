<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction contacts permet d'envoyer un message, avec les renseignements necessaires (nom, prenom, tel...)
* On recupere les données posté dans le formulaire de contact, on verifie si les champs de validation ne sont pas vide
* et qu'ils ne contiennent pas d'erreurs.
* Si il n'y a pas d'erreurs dans ce cas on sauvegarde les données dans la base de donnée 
* Et on envoye le mail.
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$errors 	varchar  	variable qui vérifie si les données postées sont bonnes.
* @param 	$_POST 		mixed 		ce sont les données posté
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function contacts() {
	
	global $link, $table;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		if (empty($errors)) {
			save(array('table' => $table, 'link' => $link), $_POST);
			sendmail(
					array (
					'subject' => 'Ma premier newsletter',
					'from' => array ("postmaster@fury-game.fr" => "Festival Fury-Game"),
					'to' => array ("helldjayk@gmail.com"), //plutot je recup l'adresse mail de la personne ($_POST['email'])
					//'bcc' => array("djaykmatt@gmail.com"), si je rajoute ca mon mail ne va pas apparaitre lors de lenvoie de mail, ca evite detre spamé par la suite, Mon adresse devient invisible 
					'layout' => 'email',
					'view' => 'contact',
					'messagesend' => $_POST
					)
				);
			header("Location: ".BASE_URL."/homes/confirmation");
			die();
		}
	}
	return array(
		'errors' => $errors
	);
}


/**
* La fonction index va permettre d'afficher une liste d'articles ou un article.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST	 	mixed 		Données posté
**/

function index() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
			
				delete(array ('table' => 'articles', 'link' => $link, 'id' => $k));
				
			}
		}
	}

	$idArticle = find(array('table' => 'articles', 'link' => $link));
	$idCommentaires = FindCount(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id ='.$idArticle));
	$idcom = find(array('table' => 'commentaires', 'link' => $link));
	
	$aReturn = array (
		
		'article_resume' => find(array('table' => 'articles', 'link' => $link, 'conditions' => array('Online' => 1))),
		'articlesTypesList' => findList2(array('table' => 'articles_types', 'link' => $link)),
		
		/** commentaires d'un article */
		'commentaires' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id = commentaires.id')),
		'com' => $idCommentaires,
		'commentaire_nbr' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id='.$idcom )),
		/** commentaire_nbr compte le nombre total de commentaires*/
		'totalarticles' => FindFirst(array('fields' => 'COUNT(id)', 'table' => 'articles', 'link' => $link, 'conditions' => array('Online' => 1))),
		'test' => FindCount(array('table' => 'articles', 'link' => $link)),
		'nbr_commentaires' => FindCount(array('fields' => 'COUNT(id)', 'table' => 'commentaires', 'link' => $link, 'conditions' => 'online = 1 AND article_id = 20')),
		'jeux_tournoi' => find(array('table' => 'jeux_tournois', 'link' => $link )), // affiche les 4 premiers jeux qui seront présentés au tournoi F-G

		);
	return $aReturn;
}


/**
* La fonction add va permettre de rajouter un article.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST 		mixed 		ce sont les données posté
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
* La fonction edit va permettre d'editer un article.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST 		mixed 		ce sont les données posté
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
* La fonction deletes va permettre de supprimer un article.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
**/

function deletes($id) {
	
	global $link;
	
	delete (array ('table' => 'articles', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/articles/backoffice_index");	

}


/**
* La fonction deletes va permettre de supprimer un article.
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'commentaires', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/homes/backoffice_commentaires");	

}


/**
* La fonction confirmation affiche un message de confirmation
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
**/

function confirmation() {
	


}

/**
* La fonction detail va permettre d'afficher en detail les commentaires postés mais pas validé
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST 		mixed 		ce sont les données posté
**/

function backoffice_commentaires() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'commentaires', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/homes");

	}
	$aReturn = array(
	
		'commentaires' => find(array('table' => 'commentaires', 'link' => $link)),
		'isauth' => findList5(array('table' => 'isauth', 'link' => $link)),
		
	);
	return $aReturn;
}

/**
* La fonction detail va permettre d'afficher en detail les commentaires postés mais pas validé
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST 		mixed 		ce sont les données posté
**/

function backoffice_edit_commentaires($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'commentaires', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/homes/backoffice_commentaires");

	}
	$aReturn = array(
		'article' => findFirst(array('table' => 'articles', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)),
		'commentaires' => findFirst(array('table' => 'commentaires', 'link' => $link, 'conditions' => 'id='.$id)),
	);
	return $aReturn;
}


/**
 * Mode test
 * Fonction qui affiche la page d'accueil
 */
 
function indexs() {
	
	/**sendmail(
		array (
			'subject' => 'Ma premier newsletter',
			'from' => array ("testmail@webinmove.com" => "WEBINMOVE"),
			'to' => array ("djaykmatt@gmail.com"),
			'layout' => 'news'.DS.'news001'
			
		)
	);
	**/
}

