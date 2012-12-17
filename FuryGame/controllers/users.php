<?php

/**

*/
require(CONTROLLERS.DS.'controllers.php');

function login() {

	global $link;
	
	//si posté
	if(isset($_POST) && !empty($_POST)) {
		
		//récup du login et pass avec la fonction sha1
		$login = $_POST['login'];
		$_POST['pass'] = sha1($_POST['pass']); // on securise le mot de pass en le cryptant
		$pass = $_POST['pass'];
		pr($_POST['pass']); // affiche le mot de pass 
		
		
		//test si non vide
		if(!empty($login) && !empty($pass)) {
		
			//récup du user
			$user = findFirst(array('table' => 'isauth', 'link' => $link, 'conditions' => "login='".$login."'"));
			
			
			
			if(!empty($user)) {
		
				$bddId = $user['id'];
				$bddLogin = $user['login'];
				$bddpseudo = $user['pseudo'];
				$bddname = $user['name'];
				$bddPass = $user['pass'];
				$bddPrenom = $user['prenom'];
				$bddisAuth = $user['isauth'];
				$bddrole = $user['role_id'];
				$bddguildes = $user['guildes_id'];
				
				
				//si le mdp posté est identique à celui en bdd
				
				if($pass == $bddPass) {
					
					if($bddisAuth) {
						
						//Creation du nom de la variable de session
						session_name("nomdusite");
						session_start();  
						
						//unset($user['pass']);
						//$_SESSION = $user;
					
						
					
						$_SESSION['isauth'] = true;
						$_SESSION['user_id'] = $bddId;
						$_SESSION['login'] = $bddLogin;
						$_SESSION['role'] = $bddrole;
						$_SESSION['user_prenom'] = $bddPrenom;
						$_SESSION['user_name'] = $bddname;
						$_SESSION['pass'] = $bddPass;
						$_SESSION['user_pseudo'] = $bddpseudo;
						$_SESSION['guildes'] = $bddguildes;

						
						if($_SESSION['role'] == 5) {
							header("location:".BASE_URL."/dashboards/backoffice_index"); // si c'est un admin on le dirige vers le backoffice 
							die();
						} else {
							header("location:".BASE_URL."/homes/index"); // sinon on le dirige vers la page d'accueil
							die();
						}
					} else {return array('errors' => 'Vous n avez pas les droits pour vous connecter !');}
				} else  {return array('errors' => "Le Mot de pass n'est pas bon!");}
			} else { return array('errors' => "L'utilisateur ' ".$login." ' n'existe pas ! "); }
		} else { return array('errors' => 'Vous devez saisir un login et un mot de pass !'); }	
	}
}

/**
*La fonction logout permet de detruire la session de connextion et de rediriger la personne vers la page d'accueil
*

**/
function logout () {
    
	session_name("nomdusite");
    // On démarre la session
    session_start ();  
     
    // On détruit les variables de notre session
    session_unset ();  
     
    // On détruit notre session
    session_destroy ();  
     
    // On redirige le visiteur vers la page d'accueil
    redirect("");  
 
}
