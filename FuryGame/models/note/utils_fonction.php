<?php
////////////////////////
//LES FONCTIONS EN PHP //
////////////////////////

// déclarer une fonction
function ma_fonction() {

	//instruction de la fonction
	
}

//Appel de fonction
ma_fonction();


//déclarer des paramètres
// ATTENTION/WARNINIG 
//Les paramètres de la fonction n'ont qu'une portée limité aux accollades
//Une fois la fonction terminée celles-ci sont détruites
//De meme, toutes variables déclarées en dehors de la fonction ne seront pas accessible dans celle-ci 
//sauf dans le cas de l'utilisation de mot clé réservé global

function ma_fonction($param1, $param2, ...) {}


//appel
ma_fonction($param1, $param2, ...) {}


//valeurs par défaut des paramètres
function ma_fonction($param1 = 1, $param2 = null) {}

//appel
ma_fonction(); // si on utilise les paramètres par defaut
// --> = ma_fonction(1, null);

ma_fonction(2, 'test');


// FONCTIONS QUI FONT UN RETURN //


function ma_fonction ($param1, $param2) {

	//Instructions qui vont permettre de génerer $return
	//...
	return $donnéesARetournées;
	
	//le code écrit après le return ne sera pas exécuté
}

//récupérer le résultat d'une fonction qui retourne qlq chose 
//On affecte la variable $valeur par la (ou les) donnée(s) retournée(s) par la fonction  


$valeur = ma_fonction($param1, $param2);

// LES VARIABLES EN PHP //

//Utilisation de define
//Par convention le nom de la constante est en majuscule
//Les mots séparés par un underscore
//La valeur d'une constante ne change jamais
//Une fois définie elle ne peut etre modifiée

define('MA_CONSTANTE', $valeur);

//EXEMPLE 
define('ROUND', 3); // --> GOOD

define('ROUND', 5); // --> ERREUR, already define, impossible de redefinir la constante

MA_CONSTANTE = 12; // --> ERREUR, parse error, impossible d'affecter la constante














