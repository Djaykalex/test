<?php
require(CONTROLLERS.DS.'controllers.php');

/**
* La fonction index va permettre d'afficher une page simple 
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$_POST	 	mixed 		Données posté
**/

function index() {

	
}


/**
* La fonction backoffice_add va permettre d'ajouter une guilde
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
		'guildelogo' => findList2(array('table' => 'logo', 'link' => $link)),
		'errors' => $errors // messages d'erreurs
	);
}


/**
* La fonction backoffice_edit va permettre d'editer une guilde...
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_edit($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'guildes', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/guildes/backoffice_index");

	}
	$aReturn = array(
		'guildes' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		'guildelogo' => findList(array('table' => 'logo', 'link' => $link))
	);
	return $aReturn;
}


/**
* La fonction backoffice_delete va permettre de supprimer une guilde...
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_delete($id) {
	
	global $link;
	
	delete (array ('table' => 'guildes', 'link' => $link, 'id' => $id));
	header("location:".BASE_URL."/guildes/backoffice_index");	

}


/**
* La fonction list_guildes va permettre d'afficher toutes les guildes
* @param 	$id 		INT 		c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
* @param 	$errors 	varchar  	variable qui vérifie si les données postées sont bonnes.
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
**/

function list_guildes() {

	global $link;
	$errors = array();
	if(isset($_POST) && !empty($_POST)) {
		
		global $validate;
		
		if(!empty($validate)) { $errors = validates($validate, $_POST);	}
		
		if (empty($errors)) {
		
			save(array('table' => 'guildes', 'link' => $link), $_POST);
			header("Location: ".BASE_URL."/creation_guildes/index");
			
			die();
		}
	}
	//if(isset($_POST) && !empty($_POST)) {
	
		/**foreach ($_POST as $k => $v) {
			
			$k = substr($k, 6);
			
			echo $k.": ".$v."</br>";
		}*/
		/**foreach($_POST['delete'] as $k => $v){
		
			if($v == 1 ) {
			
				delete (array ('table' => 'guildes', 'link' => $link, 'id' => $k));
				
			}
		}**/
	//}
	
	
	$aReturn = array (
		'guildes' => find(array('table' => 'guildes', 'link' => $link)), // table guilde
		'guildes2' => find(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id !=0' )), // affiche les guildes dont l'id de la table guilde est différent de 0
		'guildemembre' => findList(array('table' => 'logo', 'link' => $link)), // a revoir
		'errors' => $errors, // messages d'erreurs
		'guildelogo' => findList2(array('table' => 'logo', 'link' => $link)), // affiche le logo de la guilde
		'guildeban' => findList4(array('table' => 'banniere', 'link' => $link)) // affiche la couleur de la guilde
	
		);
	return $aReturn;
}


/**
* la fonction details permet d'afficher le detail d'une guilde. Avec son nom, sa presentation, son logo, sa banniere, son dicton, son content. 
* Ensuite on y affiche la liste des membres de la guilde
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$errors 	varchar  	variable qui vérifie si les données postées sont bonnes.
* @param 	$_POST 		mixed 		ce sont les données posté
* @param 	$validate 	varchar 	variable qui verifie grace aux fonctions dans le fichier validation si les champs postés sont corrects.
*/

function details($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
		save(array('table' => 'commentaires_guildes', 'link' => $link), $_POST);
	}
	
	$commentaires_guildes = find(array('table' => 'commentaires_guildes', 'link' => $link, 'conditions' => 'id ='.$id )); 
	/** Si je met id=$id j'ai le bon lien commentaire a la bonne guilde, si je met guildes_id = $id jai bien les commentaires qui saffichent mais pas le bon lien commentaires /guildes */
	
	/** le ORDER BY id DESC ne fonctionne pas si je le rajoute dans mes conditions, le problème vient de la condition article_id ='.$id, à voir pourquoi..*/ 
	$guilde = findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id ='.$id));
	$isauthguildes = findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => 'id ='.$id));
	
	$logo = findList2(array('table' => 'logo', 'link' => $link, 'conditions' => 'id ='.$guilde['logo_id']));
	$banniere = findList4(array('table' => 'banniere', 'link' => $link, 'conditions' => 'id ='.$guilde['banniere_id']));
	
	$membresIdTmp = find(array('table' => 'membres', 'link' => $link, 'conditions' => 'guildes_id ='.$guilde['id']));
	$membresId = array();
	
	foreach ($membresIdTmp as $k => $v) { $membresId[] = $v['isauth_id']; }
	$membres = findList(array('table' => 'isauth', 'link' => $link, 'conditions' => "id IN (".implode(', ' , $membresId).")"));
	$isauth_com =  find(array('table' => 'isauth', 'link' => $link));

	/** $auteur_guilde_guildMaster cherche dans la table guildes l'isauth_id = a $_SESSION['user_id'] si il est connecté dans ce cas il s'affiche sinon $auteur_guilde_guildMaster = a rien, cela evite d'avoir un UNDEFINED VARIABLE de $_SESSION['user_id']*/ 
	
	if(isset($_SESSION['user_id'])){
		$auteur_guilde_guildMaster = findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id ='.$_SESSION['user_id']));
	}
	else{
		$auteur_guilde_guildMaster ="";
	}
	
	/** $auteur_guilde_membre cherche dans la table guildes l'isauth_id = a $_SESSION['user_id'] si il est connecté dans ce cas il s'affiche sinon $auteur_guilde_membre = a rien, cela evite d'avoir un UNDEFINED VARIABLE de $_SESSION['user_id']*/ 
	if(isset($_SESSION['user_id'])){
		$auteur_guilde_membre = findList(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$_SESSION['guildes'] ));
	}
	else{
		$auteur_guilde_membre ="";
	}

	$aReturn = array(
		'membres' => $membres, // membres de la guilde
		'isauthguildes' => $isauthguildes, // affiche les membres 
		'guildelogo' => $logo, // logo de la guilde
		'guildeban' => $banniere, // couleur de la guilde
		'isauthguilde' => findList(array('table' => 'isauth', 'link' => $link)), // membre de la guilde
		'guilde' => findList(array('table' => 'isauth', 'link' => $link, 'conditions' => 'guildes_id = '.$id)), 
		'guildes' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)),
		'id' => $id,
		
		/** Session commentaires **/ 

		/** commentaire_nbr compte le nombre total de commentaires*/
		'commentaire_nbr' => findFirst(array('fields' => 'COUNT(id)', 'table' => 'commentaires_guildes', 'link' => $link, 'conditions' => 'online = 1 AND guildes_id ='.$id)),
		
		// Enregistrement des commentaires OK //
		'lien_guilde_commentaires' => findFirst(array('table' => 'guildes', 'link' => $link, 'conditions' => 'id='.$id)), 
		'pseudo_auteur' => find(array('table' => 'isauth', 'link' => $link)),
		// Si je suis un GuildMaster //
		'auteur_guilde_guildMaster' => $auteur_guilde_guildMaster,
		// Si je suis un membre //
		'auteur_guilde_membre' => $auteur_guilde_membre,
		'content_Commentaires' => find(array('table' => 'commentaires_guildes', 'link' => $link )),
	
		/** Affichage des commentaires OK **/
		'affichage_commentaires' => find(array('table' => 'commentaires_guildes', 'link' => $link, 'conditions' => 'online = 1 AND guildes_id='.$id )),

	);
	return $aReturn;
}


/**
* La fonction backoffice_commentaires_guildes va permettre d'afficher en detail les commentaires postés mais pas validé
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_commentaires_guildes() {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {
		save(array('table' => 'commentaires_guildes', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/homes");
	}
	$aReturn = array(
	
		'commentaires_guildes' => find(array('table' => 'commentaires_guildes', 'link' => $link)), // commentaires sur la guilde
		'isauth' => findList5(array('table' => 'isauth', 'link' => $link)), // affiche le nom de l'auteur du commentaire
		
	);
	return $aReturn;
}

/**
* La fonction backoffice_edit_commentaires_guildes va permettre d'afficher en detail les commentaires postés et de les valider
* @param	$id 		INT			c'est l'identifiant de l'article
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	$link 		varchar  	c'est le connecteur
* @param 	$_POST	 	mixed 		Données posté
**/

function backoffice_edit_commentaires_guildes($id) {

	global $link;
	
	if(isset($_POST) && !empty($_POST)) {

		save(array('table' => 'commentaires_guildes', 'link' => $link), $_POST);
		header("Location: ".BASE_URL."/guildes/backoffice_commentaires_guildes");

	}
	$aReturn = array(
		'article' => findFirst(array('table' => 'articles', 'link' => $link, 'conditions' => 'id='.$id)), // à renomer
		'id' => $id, // lien entre le commentaire et la guilde
		'articlesTypesList' => findList(array('table' => 'articles_types', 'link' => $link)), // affiche le type d'article
		'commentaires_guildes' => findFirst(array('table' => 'commentaires_guildes', 'link' => $link, 'conditions' => 'id='.$id)), // lien entre le commentaire et la guilde
		
	);
	return $aReturn;
}


/**
* La fonction backoffice_index va permettre d'afficher en detail les commentaires dans le backoffice
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
				delete (array ('table' => 'guildes', 'link' => $link, 'id' => $k));
			}
		}
	}
	$aReturn = array (
		'guildes' => find(array('table' => 'guildes', 'link' => $link)),
		'guildelogo' => findList(array('table' => 'logo', 'link' => $link))
	
		);
	return $aReturn;
}
