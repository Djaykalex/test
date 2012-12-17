<?php

require(CONTROLLERS.DS.'controllers.php');


/**
* La fonction index permet d'envoyer un message, avec les renseignements necessaires (nom, prenom, tel...)
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

function index() {
	
	global $link;
	$errors = array();
	
	if(isset($_POST) && !empty($_POST)) {
		
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
			
			save(array('table' => 'isauth', 'link' => $link), $_POST);
			sendmail(
					array (
					'subject' => 'Confirmation de création de compte',
					'from' => array ("postmaster@fury-game.fr" => "Festival Fury-Game"),
					'to' => array ($_POST['login']), //plutot je recup l'adresse mail de la personne ($_POST['email'])
					//'bcc' => array("djaykmatt@gmail.com"), si je rajoute ca mon mail ne va pas apparaitre lors de lenvoie de mail, ca evite detre spamé par la suite, Mon adresse devient invisible 
					'layout' => 'email',
					'view' => 'confirmation_compte',
					'messagesend' => $_POST
					
					)
				);
			header("Location: ".BASE_URL."/comptes/confirmation");
			die();
		}
	}
	
	return array(
		'guildemembre' => findList(array('table' => 'role', 'link' => $link, 'conditions' => 'id !=5')),
		'comptes' => find(array('table' => 'isauth', 'link' => $link)),
		'guilde' => find(array('table' => 'guilde', 'link' => $link)),
		'guildemembres' => findList(array('table' => 'guildes', 'link' => $link)),
		'errors' => $errors
	);
}


/**
* La fonction backoffice_add va permettre d'ajouter un role
* @param 	$id 		INT 		c'est l'identifiant du role
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
			header("Location: ".BASE_URL."/articles/backoffice_index");
			die();
		}
	}
	
	return array(
		'guildemembre' => findList(array('table' => 'role', 'link' => $link)),
		'errors' => $errors
	);
}

/**
* La fonction backoffice_delete va permettre de supprimer un role
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'isauth', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/comptes/index");	

}


/**
* La fonction confirmation va permettre d'afficher un message de confirmation de creation de compte
**/

function confirmation() {
	
		
}


/**
* Function gestion_comptes permet d'afficher la compte de l'utilisateur. 
* Ainsi l'utilisateur peut modifier les informations concernant son compte. 
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function gestion_comptes() {

	global $link;
	if(isset($_POST) && !empty($_POST)) {
	
		foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
			
				delete (array ('table' => 'isauth', 'link' => $link, 'id' => $k));
				
			}
		}
	}
	$isauthguildes = findList(array('table' => 'isauth', 'link' => $link));
	$guilde = findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$_SESSION['guildes'] )); 
	// je gere l'affichage de la guilde de la personne qui est connectée mais si je modifie la guilde dans edit_compte,
	// je suis obligé de me deco / reco pour que l'affichage se mette correctement sur la nouvelle guilde que j'ai choisi, 
	// etant donné que je traite la donnée avec $_SESSION qui necessite une deco / reco .

	$aReturn = array (
		'comptes' => find(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$_SESSION['user_id'])),
		'comptes2' => findList(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$_SESSION['user_id'])),
		'guildes' => find(array('table' => 'guildes', 'link' => $link, 'conditions' =>'isauth_id ='.$_SESSION['user_id'])),
		'isauth' => $isauthguildes, // a refaire
		'guildecompte' => $guilde, // a refaire
		'role' => findList(array('table' => 'role', 'link' => $link )),
	
		);
	return $aReturn;
}


/**
* La fonction edit va permettre d'editer un compte.
* @param 	$id 		INT 		c'est l'identifiant du compte
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST 		mixed 		ce sont les données posté
**/

function edit_comptes($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'isauth', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/comptes/gestion_comptes");

	}
	
	$aReturn = array(
		'membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$_SESSION['user_id'])), // affiche les membres 
		'id' => $_SESSION['user_id'], // 
		'rolemembre' => findList(array('table' => 'role', 'link' => $link, 'conditions' => 'id != 5')), // role du membre
		'guildemembre' => findList(array('table' => 'guildes', 'link' => $link )),
		'guildes' => find(array('table' => 'guildes', 'link' => $link)), // table guilde
		
	);
	return $aReturn;
}
		

/**
* La fonction backoffice_edit va permettre d'editer un compte.
* @param 	$id 		INT 		c'est l'identifiant du compte
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST 		mixed 		ce sont les données posté
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'isauth', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/comptes/index");

	}
	$aReturn = array(
		'membres' => findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id='.$id)), // affiche les membres de la guilde ciblée
		'id' => $id, // guilde ciblée
		'guildemembre' => findList(array('table' => 'guildes', 'link' => $link)) // affiche les détails de la guilde
	);
	return $aReturn;
}
