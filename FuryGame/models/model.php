<?php
$serveurHost = 'localhost';
$bddLogin = 'root';
$bddPass = '';
$bddName = 'nouvelle';

/**
 * Fonction de connexion à la base de données
 * 
 * @param 	varchar		$serveur	Nom du serveur
 * @param 	varchar		$login		Identifiant de connexion au serveur
 * @param 	varchar		$password	Mot de passe de connexion au serveur
 * @param 	varchar		$dbName		Base de données à utiliser
 * @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function connect($serveur, $login, $password, $dbName){
	
	$connector = mysql_connect($serveur, $login, $password) or die ('Impossible de se connecter au serveur'); 
	mysql_select_db($dbName, $connector) or die ('Impossible de selectionner la base de donnée');
	return $connector;
}


/**
 * Fonction find permet de trouver une table de la base de données.
* @param 	varchar		$serveur	Nom du serveur
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
*/
 
function find($parametres) {
	
	$table = $parametres['table'];
	$link = $parametres['link'];	

	$tableau = array();
	$sql = "SELECT ";
		
	///////////////////////
	//   CHAMPS FIELDS   //
	if(isset($parametres['fields'])) {
	
		//Si il s'agit d'un tableau
		if(is_array($parametres['fields'])) { $sql .= implode(', ', $parametres['fields']); }
		//Si il s'agit d'une chaine de caractères
		else { $sql .= $parametres['fields']; }
	} else { $sql .= '*'; }
	
	$sql .= " FROM ".$table;
		
	if(isset($parametres['conditions'])) { //Si on a des conditions
		
		//On teste si conditions est un tableau
		//Sinon on est dans le cas d'une requete personnalisée
		if(!is_array($parametres['conditions'])) {
	
			$sql .= ' WHERE '.$parametres['conditions']; //On les ajoute à la requete
	
		//Si c'est un tableau on va rajouter les valeurs
		} else {
	
			$cond = array();
			foreach($parametres['conditions'] as $k => $v) {
	
				if(!is_numeric($v)) {
	
					$v = "'".mysql_real_escape_string($v, $link)."'";
				}
				$cond[] = "$k=$v";
			}
			
			//if(!empty($cond)) {
			if(count($cond) > 0) {
				
				$sql .= ' WHERE '.implode(' AND ', $cond);
			}
		}
	}
	//pr ($sql);
	if($result = mysql_query($sql, $link)) { //On lance la requète
		
		//Parcours des résultats et affectation du tableau
		while($ligne = mysql_fetch_assoc($result)) { $tableau[] = $ligne; }
	}
	
	return $tableau; //On retourne le résultat
}


/**
*fonction qui permet de compter le nombre d'elements retournés par une requete de type SELECT.
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
*/

function FindCount($parametres) {

	$table = $parametres['table'];
	$link = $parametres['link'];	

	$tableau = array();
	$sql = "SELECT COUNT(id)"; 
	$sql .= " FROM ".$table;
	$sql .=" WHERE online = 1";
	
	if(isset($parametres['conditions'])) { //Si on a des conditions
		
		//On teste si conditions est un tableau
		//Sinon on est dans le cas d'une requete personnalisée
		if(!is_array($parametres['conditions'])) {
	
			$sql .= ' WHERE '.$parametres['conditions']; //On les ajoute à la requete
	
		//Si c'est un tableau on va rajouter les valeurs
		} else {
	
			$cond = array();
			foreach($parametres['conditions'] as $k => $v) {
	
				if(!is_numeric($v)) {
	
					$v = "'".mysql_real_escape_string($v, $link)."'";
				}
				$cond[] = "$k=$v";
			}
			
			//if(!empty($cond)) {
			if(count($cond) > 0) {
				
				$sql .= ' WHERE '.implode(' AND ', $cond);
			}
		}
	}
	
	if($result = mysql_query($sql, $link)) { //On lance la requète
		
		//Parcours des résultats et affectation du tableau
		while($ligne = mysql_fetch_assoc($result)) { $tableau[] = $ligne; }
	}
	
	return $tableau; //On retourne le résultat
	
}


/**
* fonction qui permet de gerer la pagination des articles
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
**/

function pagination($parametres)  {
	
	$table = $parametres['table'];
	$messagesParPage = $parametres['messagesParPage'];	
	$link = $parametres['link'];	
	$tableau = array();
	$targetpage = BASE_URL; 
	
	
	$sql = "SELECT COUNT(id) as nbArt"; 
	$sql .= " FROM ".$table;
	$req = mysql_query($sql) or die(mysql_error());
	$data = mysql_fetch_assoc($req);
	
	
	$nbArt = $data['nbArt'];
	$nbPage = ceil($nbArt/$messagesParPage); 
	
	
	if(isset($_GET['p']) && $_GET['p'] >0 && $_GET['p'] <= $nbPage){
		$cPage = $_GET['p'];// numero de la page courrante
	} 
	else {
		$cPage = 1;
	}
	
	$req = mysql_query($sql) or die(mysql_error());
	$data = mysql_fetch_assoc($req);
	$sql.= " LIMIT ".(($cPage-1)* $messagesParPage).", $messagesParPage";
	
	
	while($data =mysql_fetch_assoc($req)){
		
		 $tableau[] = $data;
	
	}
	
	for($i=1 ; $i<=$nbPage ; $i++){
		if($i == $cPage){
			echo $i.' /';
		} else {
			
			echo "<a href=\'".$targetpage."/homes?p = ".$i."'>".$i."</a>";
			
		}
	}
	if($req = mysql_query($sql, $link)) { //On lance la requète
		
		//Parcours des résultats et affectation du tableau
		while($ligne = mysql_fetch_assoc($req)) { $tableau[] = $ligne; }
	}
	return $tableau; //On retourne le résultat
}


/**
* fonction qui permet de gerer la pagination des articles
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function paginationArticles($parametres){

	$targetpage = BASE_URL; 
	$tableau = array();

	$sql = "SELECT COUNT(id) as nbArt FROM articles"; 
	$req = mysql_query($sql) or die(mysql_error());
	$data =mysql_fetch_assoc($req);
	
	$nbArt = $data['nbArt'];
	$messagesParPage = 4;
	$nbPage = ceil($nbArt/$messagesParPage); 
	
	if(isset($_GET['p']) && $_GET['p'] >0 && $_GET['p'] <= $nbPage){
		$cPage = $_GET['p'];// numero de la page courrante
	} 
	else {
		$cPage = 1;
	}

	$premiereEntree=($cPage-1)*$messagesParPage; // On calcul la première entrée à lire

	$sql = "SELECT * FROM articles ORDER BY id DESC LIMIT ".$premiereEntree.', '.$messagesParPage.'';

	$req = mysql_query($sql) or die(mysql_error());
	while($data =mysql_fetch_assoc($req)){

			echo '		
					<div class="fondtext titrefond">
						<div class="titre">'.$data['name'].'</div>
						<div class="text"> '.$data['content'].'</div>
						<div class="date">'.$data['Created'].' par '.$data['created_by'].'</div>
						<a class="date" href="'.BASE_URL.'/homes/details/'.$data["id"] .'">Voir les commentaires</a>
					</div>
					<div class="fintext"></div>
			';	
	}
	
	for($i=1 ; $i<=$nbPage ; $i++){
		if($i == $cPage){  //Si il s'agit de la page actuelle...
			echo '<div class="numero_page_noir"> '.$i.' </div> '; 
		} else { //Sinon...
			
			echo '<a class="numero_page" href="?p='.$i.'">'.$i.'</a>';
		}
	}
	return $tableau; //On retourne le résultat
}


/**
 * Fonction de pagination commentaires
* @param 	$table 		varchar  		variable qui contient le nom de la table
* @param 	varchar		$sql			requète sql
* @param 	int			$perpag			nb d'articles affichées par pages
* @param 	int			$premierepage	première page affichée
* @return 	ressource	$link			Ressource de connexion au serveur
*/

function paginationCommentaires($parametres){

	$table = $parametres['table'];
	$link = $parametres['link'];
	$perpag = $parametres['messagesParPage'];
	$premierepage = $parametres['premierepage'];
	$test = $parametres['test'];
	$targetpage = BASE_URL; 
	$tableau = array();

	$sql = "SELECT COUNT(id) as nbArt";
	$sql.= " FROM ".$table; 
	$req = mysql_query($sql) or die(mysql_error());
	$data =mysql_fetch_assoc($req);
	
	
	$nbArt = $data['nbArt'];
	$messagesParPage = $perpag;
	$nbPage = ceil($nbArt/$messagesParPage); 
	
	if(isset($_GET['p']) && $_GET['p'] >0 && $_GET['p'] <= $nbPage){
		$cPage = $_GET['p'];// numero de la page courrante
	} 
	else {
		$cPage = 1;
	}
	
	$premiereEntree=($cPage-1)*$messagesParPage; // On calcul la première entrée à lire
	$premierepage= $premiereEntree;
	
	$sql = "SELECT * ";
	$sql.=" FROM ".$table."";
	
	
	if(isset($parametres['conditions'])) { //Si on a des conditions
		
		//On teste si conditions est un tableau
		//Sinon on est dans le cas d'une requete personnalisée
		if(!is_array($parametres['conditions'])) {
	
			$sql .= ' WHERE '.$parametres['conditions']; //On les ajoute à la requete
	
		//Si c'est un tableau on va rajouter les valeurs
		} else {
	
			$cond = array();
			foreach($parametres['conditions'] as $k => $v) {
	
				if(!is_numeric($v)) {
	
					$v = "'".mysql_real_escape_string($v, $link)."'";
				}
				$cond[] = "$k=$v";
			}
			
			//if(!empty($cond)) {
			if(count($cond) > 0) {
				
				$sql .= ' WHERE '.implode(' AND ', $cond);
			}
		}
	}
	$sql.= " LIMIT ".$premiereEntree.', '.$messagesParPage.'';
	
	
	// for($i=$test ; $i<=$nbPage ; $i++){
		// if($i == $cPage){  //Si il s'agit de la page actuelle...
			
			// echo '<div class="numero_page_noir_com"> '.$i.' </div> '; 
			
		// } else { //Sinon...
			
			// echo '<a class="numero_page_com" href="?p='.$i.'">'.$i.'</a>';
		// }
	// }
	
	
	if($result = mysql_query($sql, $link)) { //On lance la requète
		
		//Parcours des résultats et affectation du tableau
		while($ligne = mysql_fetch_assoc($result)) { $tableau[] = $ligne; }
	}
	return $tableau; //On retourne le résultat
}


/**
 * Fonction de paginator
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */

function paginator($parametres) {

	$table = $parametres['table'];
	$messagesParPage = $parametres['messagesParPage'];	
	$link = $parametres['link'];	
	$tableau = array();
	

	$sql = "SELECT COUNT(id) as total"; 
	$sql .= " FROM ".$table;

	//Une connexion SQL doit être ouverte avant cette ligne...
	$retour_total=mysql_query($sql); //Nous récupérons le contenu de la requête dans $retour_total
	$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
	$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.


	//Nous allons maintenant compter le nombre de pages.
	$nombreDePages=ceil($total/$messagesParPage);
	
	if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
	{
		 $pageActuelle=intval($_GET['page']);
		 
		 if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
		 {
			  $pageActuelle=$nombreDePages;
		 }
	}
	else // Sinon
	{
		 $pageActuelle=1; // La page actuelle est la n°1    
	}

	$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

	// La requête sql pour récupérer les messages de la page actuelle.
	
	$retour_messages=mysql_query('SELECT * FROM articles ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
	
	while($donnees_messages=mysql_fetch_assoc($retour_messages)) // On lit les entrées une à une grâce à une boucle
	{
		 //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
		
		 $tableau[] = $donnees_messages;
	
	}
	
	for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
	{
		 //On va faire notre condition
		 if($i==$pageActuelle) //Si il s'agit de la page actuelle...
		 {
			echo '<div class="numero_page_noir"> '.$i.' </div> '; 
			
		 }	
		 else //Sinon...
		 {
			 echo '<a class="numero_page" href="?page='.$i.'">'.$i.'</a>';
			  
		 }
	}
	return $tableau; //On retourne le résultat

}


/**
* fonction findFirst qui permet de Retourner l'élément courant du tableau
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */

function findFirst($parametres) {

	//$result = find($parametres); 
	//return $result[0];
	return current(find($parametres)); // current : Retourne l'élément courant du tableau
}


/**
* fonction findList qui permet de Retourner un élément tableau, içi c'est le champ name de la table que l'on va choisir
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function findList($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['name']; }
	return $tableau;	
}


/**
* fonction findList2 qui permet de Retourner un élément tableau, içi c'est champ image de la table que l'on va choisir
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function findList2($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['img']; }
	return $tableau;	
}


/**
* fonction findList3 qui permet de Retourner un élément tableau, içi c'est le champ image de la table que l'on va choisir
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function findList3($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	
	foreach($list as $k => $v) {   
		
		$tableau[$v['id']] = $v['img'];
	}
	return $tableau;	
}


/**
* fonction findList4 qui permet de Retourner un élément tableau, içi c'est le champ lien de la table que l'on va choisir
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function findList4($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['lien']; }
	return $tableau;	
}


/**
* fonction findList5 qui permet de Retourner un élément tableau, içi c'est le champ pseudo de la table que l'on va choisir
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function findList5($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['pseudo']; }
	return $tableau;	
}


/**
* fonction findList6 qui permet de Retourner un élément tableau, içi c'est le champ id de guilde de la table que l'on va choisir
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function findList6($parametres) {
	
	$tableau = array();
	$list = find($parametres);
	foreach($list as $k => $v) { $tableau[$v['id']] = $v['guildes_id']; }
	return $tableau;	
}


/**
 * Fonction de sauvegarde des données, si c'est un nouvelle ajout on le créer, sinon on l'edit
 * 
 * @param 	varchar		$serveur	Nom du serveur
 * @param 	varchar		$login		Identifiant de connexion au serveur
 * @param 	varchar		$password	Mot de passe de connexion au serveur
 * @param 	varchar		$dbName		Base de données à utiliser
 * @return 	ressource	$link		Ressource de connexion au serveur
 * exemple de creation : INSERT INTO `nouvelle`.`isauth` (`id`, `login`, `pass`, `isauth`, `role_id`, `name`, `prenom`, `pseudo`, `guildes_id`) VALUES (NULL, 'test', 'test', '1', '1', 'test', 'test',  * 'test', '0');
 */

function save($parametres, $data){

	$schema = schema($parametres['table'], $parametres['link']);
	
	if(in_array('Modify', $schema)) {
			$data['Modify'] = date("Y-m-d H:i:s"); 
			
		}
		if(in_array('Modify_by', $schema)) {
			$data['Modify_by'] = $_SESSION['user_id']; 
			
		}
		
	if(isset($data['id']) && !empty($data['id'])) {
		/** si il existe déjà des données dans ce cas je modifie 
		Exemple :
		UPDATE `nouvelle`.`isauth` SET `login` = 'test2',`pass` = 'test2',`name` = 'test2',`prenom` = 'test2',`pseudo` = 'test2' 
		WHERE `isauth`.`id` =48;*/
		$sql = "UPDATE ".$parametres['table']." SET ";
		
		/** changement de mot de pass avec la fonction sha1*/
		if(isset($data['pass'])){
				$data['pass'] = sha1($_POST['pass']);
				
			}
		
		foreach($data as $k=>$v) {
			
			if($k!="id") { 
				
				$v = mysql_real_escape_string($v, $parametres['link']);
				
				$sql .= "$k='$v',"; 
			}
		}	
		$sql = substr($sql,0,-1);   // je supprime la derniere virgule 
		$sql .=" WHERE id=".$data['id'].";";
	}
	else {
		/** sinon je crée si c'est un nouvel ajout de données
		Exemple :  
		INSERT INTO `nouvelle`.`isauth` (`id`, `login`, `pass`, `isauth`, `role_id`, `name`, `prenom`, `pseudo`, `guildes_id`) VALUES (NULL, 'test', 'pass', '1', '1', 'test', 'test',  * 'test', '0'); */
		$sql = "INSERT INTO ".$parametres['table']."(";
		unset($data["id"]);
		
		if(in_array('Created', $schema)) {
			$data['Created'] = date("Y-m-d H:i:s"); 
			
			
		}
		if(in_array('Created_by', $schema)) {
			$data['Created_by'] = $_SESSION['user_id']; 
			
		}
		/** Enregistrement d'un nouveau compte avec un mot de pass crypter avec la fonction sha1. Tous les mots de pass de la table qui contient un champ "pass" sont crypter.*/
		foreach($data as $k=>$v) {
			if(isset($data['pass'])){				   /** si il existe un champ "pass" dans la table */
				$data['pass'] = sha1($_POST['pass']);  /** la variable $data['pass'] est égale à ce qui est posté dans le champ "pass" crypté*/
				
			}
			$sql .= "$k,"; 
		}
	
		$sql = substr($sql,0,-1);   // je supprime la derniere virgule 
		$sql .=') VALUES(';
	
		foreach($data as $v) { 
				$v = mysql_real_escape_string($v, $parametres['link']);
				$sql .= "'$v',"; 
		}
		$sql = substr($sql,0,-1);
		$sql .=");";
	}
	mysql_query($sql, $parametres['link']) or die(mysql_error()."</br>=>".mysql_query());
	
	if(!isset($data['id'])) { return mysql_insert_id(); } /** mysql_insert_id — Retourne l'identifiant généré par la dernière requête  */
	else { return $data["id"]; }	
}


/**
 * Fonction de sauvegarde des données.
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
 */

function save_assoc($parametres, $data){
$sql = "INSERT INTO ".$parametres['table']."(";
		unset($data["id"]);
		
		if(in_array('Created', $schema)) {
			$data['Created'] = date("Y-m-d H:i:s"); 
			
		}
		if(in_array('Created_by', $schema)) {
			$data['Created_by'] = $_SESSION['user_id']; 
			
		}
		foreach($data as $k=>$v) { $sql .= "$k,"; }
	
		$sql = substr($sql,0,-1);   // je supprime la derniere virgule 
		$sql .=') VALUES(';
		
		foreach($data as $v) { 
		
			$v = mysql_real_escape_string($v, $parametres['link']);
			$sql .= "'$v',"; 
		}
		$sql = substr($sql,0,-1);
		$sql .=");";
		mysql_query($sql, $parametres['link']) or die(mysql_error()."</br>=>".mysql_query());
	
	if(!isset($data['id'])) { return mysql_insert_id(); } 
	else { return $data["id"]; }
}


/**
* Fonction delete des données. 
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
* DELETE FROM `nouvelle`.`articles` WHERE `articles`.`id` = 10
* $sql = "DELETE FROM".$parametres['table']."WHERE id=".$parametres['id'];
*/

function delete($parametres) {
	
	$sql = "DELETE FROM ".$parametres['table']." WHERE id=".$parametres['id'];
	mysql_query($sql, $parametres['link']) or die(mysql_error()."</br>=>".mysql_query());
}


/**
* Fonction deleteAll des données. 
* @param 	$table 		varchar  	variable qui contient le nom de la table
* @param 	varchar		$sql		requète sql
* @return 	ressource	$link		Ressource de connexion au serveur
* DELETE FROM `nouvelle`.`articles` WHERE `articles`.`id` = 10
* $sql = "DELETE FROM".$parametres['table']."WHERE id=".$parametres['id'];
*/

function deleteAll($parametres) {
	
	$sql = "DELETE * FROM ".$parametres['table'];
	mysql_query($sql, $parametres['link']) or die(mysql_error()."</br>=>".mysql_query());
}

/**
 * Fonction de validations des données.
 * 
 * @param 	varchar		$validate	Champs a valider 
 * @param 	varchar		$datas[$k]	cest égal à ma valeur name et content dans ma variable $validate qui correspond au name et content du $datas du formulaire.
 * @param 	varchar		$serveur	Nom du serveur
 * @param 	varchar		$login		Identifiant de connexion au serveur
 * @param 	varchar		$password	Mot de passe de connexion au serveur
 * @param 	varchar		$dbName		Base de données à utiliser
 * @return 	ressource	$link		Ressource de connexion au serveur
 */
 
function validates ($validate, $datas) {
	require (LIB.DS."validation.php");
	$errors = array();
	
	foreach ($validate as $k => $v) {
	//on va parcourir tous les champs a valider 
		
		
		//par defaut si le champ est present dans les données a valider
		//mais pas dans les données envoyees par le formulaire en genere une erreure
		
		//$datas[$k] cest egal a ma valeur name et content dans ma variable $validate qui correspond au name et content du $datas du formulaire.
	
		if(isset($datas[$k])) {
			//echo "correspondance";
		
			//on va tester si il y a pls regles de validation
			//si on a pas directement acces a la clée rule cela signifie qu'il y a plusieurs régles
			if(isset($v['rule'])) {
				
				/**
				$isValid egale la fonction check qui comprend 2 parametres la clée de $datas et les regles de validations
				
				**/
				$isValid = Validation::check($datas[$k],$v['rule'] );
				if(!$isValid){
				 $errors[$k] = $v['message'];
				}
			} else {
				
				//on va donc les parcourir
				foreach ($v as $key => $valeur) {
				
					$isValid = Validation::check($datas[$k],$valeur['rule'] );
					if(!$isValid){
					
					$errors[$k] = $valeur['message'];
					}
				}			
			}	
		}	
	}
	return $errors;
}


/**
* cette fonction permet de renvoyer la liste des champs d'une table

* @param    varchar 	$tableName 	Variable contenant le nom de la table
* @param    ressource   $connector 	Lien vers la ressource de connexion au serveur
* @return array Tableau contenant la liste des champs de la table
* $tab[] = $ligne[0] permet de rajouter un element dans le tableau sans se soucier des indexs .
**/

function schema($tablname, $Link) {
	
	$tab = array(); // declaration d'une variable qui contiendra la liste des tables
	
	//Liste des table de la base de données
	$query = "SHOW COLUMNS FROM ".$tablname; // Requete à éffectuer
	if($result = mysql_query($query, $Link)) { // on lance la requete 
		
			//Parcours des résultats
			while($ligne = mysql_fetch_row($result)) { 
				$tab[] = $ligne[0]; // Affectation du tableau
				//echo $ligne[0];
			}
			
	}
	return $tab; // On retourne le résultat de la variable $tab
}

$link = connect($serveurHost, $bddLogin, $bddPass, $bddName); //Par défaut on se connecte à la base de données