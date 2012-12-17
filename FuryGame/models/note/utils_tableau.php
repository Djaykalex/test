<?php
////////////////////////
//LES TABLEAUX EN PHP //
////////////////////////

// déclarer un tableau vide

$tableau = array(); 

//Pour declarer un tableau et linitialiser en mm temps.
// il y a 2 methodes :(on part du principe que la variable $tableau n'existe pas).

//Methode 1 : index caracteres
$tableau = array(
	'index1' => 'valeur index1',
	'index2' => 'valeur index2',
	'index3' => 'valeur index3',
	'index4' => 'valeur index4',
	'index5' => 'valeur index5'
);

//Methode 1bis : index numériques (auto)
$tableau = array(
	'valeur index1',
	'valeur index2',
	'valeur index3',
	'valeur index4',
	'valeur index5'

);

//Methode 2 : (resultat idem que méthode 1)
$tableau['index1'] = 'valeur index1';
$tableau['index2'] = 'valeur index2';
$tableau['index3'] = 'valeur index3';
$tableau['index4'] = 'valeur index4';
$tableau['index5'] = 'valeur index5';

);

//Methode 2 : (resultat idem que méthode 1bis)
$tableau[] = 'valeur index1';
$tableau[] = 'valeur index2';
$tableau[] = 'valeur index3';
$tableau[] = 'valeur index4';
$tableau[] = 'valeur index5';
);

// AFFECTATION //


// Affecte $tableau par la valeur contenu dans $valeur
// Si $valeur n'est pas un tableau le type de la variable $tableau sera modifié

$tableau = $valeur; 

//$tableau[MON_INDEX] = $valeur;

//MON_INDEX peut etre :
// un entier
// une chaine de caracteres
// une variable (contenant l'un des deux types ci_dessus)
// dans le cas d une chaine de caracteres il faut encapsuler l'index par des guillemets (simple ou double)
// dans les autres cas elles ne sont pas nécessaire 
//
// EXEMPLES :
// $valeur peut contenir tous types de données.

// on affecte à l'index 1 du tableau la valeur contenu dans $valeur
// Si l'index n'existe pas, il est alors crée
// Si l'index existe, il sera modifié par $valeur
// Index numérique

$tableau[1] = $valeur;

$tableau['1'] = $valeur; //(la valeur de 1 est numérique meme avec les guillemets)


// on affecte à l'index mon_index du tableau la valeur contenu dans $valeur
// Si l'index n'existe pas, il est alors crée
// Si l'index existe, il sera modifié par $valeur
// Index chaine de caractere

$tableau['mon_index'] = $valeur


// Definition d'une variable qui va contenir la valeur de l'index
$variable = 10;
// Affectation de l'index $valeur (10) par la valeur contenu dans $valeur
$tableau[$variable] = $valeur;

// Definition d'une variable qui va contenir la valeur de l'index
$variable = 'mon_second_index';
// Affectation de l'index $valeur (mon_second_index) par la valeur contenu dans $valeur
$tableau[$variable] = $valeur;



// RECUPERATION //


// Deux façons :
// - Soit on l'affiche directement
echo $tableau[MON_INDEX]; // MON_INDEX prendra la valeur souhaitée

// - Soit on le stock dans une variable

$valeur = $tableau[MON_INDEX]; // On affecte $valeur par la valeur de l'index MON_INDEX


//Cas particulier : Les tableaux à dimensions multiples
$tableau = array(
	'index1' => array(
		'index2' => array(
			'index3' => array (
				'index4' => array(
					'index5' => "valeur de l'index 5"
				)
			)
		)
	)
);
echo $tableau['index1']['index2']['index3']['index4']['index5'];

// PARCOURS DE TABLEAUX //

foreach ($tableau as $index => $valeur) {

	// $index et $valeur seront modifiés à chaque tour de boucle
	// $index aura pour valeur le nom de l'index courrant
	// $valeur aura pour valeur la valeur de l'index courrant
}


// Idem que celui de dessus sans la récupération de l'index
// On ne récupère que sa valeur.
foreach ($tableau as $valeur) {

	// $index et $valeur seront modifiés à chaque tour de boucle
	// $index aura pour valeur le nom de l'index courrant
	// $valeur aura pour valeur la valeur de l'index courrant
}

// la boucle for ne marche que sur des index numérique
// $i est un compteur
// Il commence au premier index du tableau
// Il se termine sur le dernier
// On l'incrémente de 1 à chaque tour de boucle
for($i = 0; $i <count($tableau); $i++) {
		
		// Je recupère la valeur de mon index
		$valeur = $tableau[$i];
}


// TESTS ET FONCTIONS SUR LES TABLEAUX //


is_array () : Détermine si une variable est un tableau

	if(is_array($tableau)) {/*faire quelque chose */} else {/*faire autre chose*/}

	bool is_array ( mixed $var )
	$yes = array('ceci', 'est', 'un tableau');
	echo is_array($yes) ? 'Tableau' : 'ce n\'est pas un tableau';
	echo "\n";
	$no = 'ceci est une chaîne';
	echo is_array($no) ? 'Tableau' : 'ce n\'est pas un tableau';
	
	
	
	
in_array () : Indique si une valeur précise appartient à un tableau
//MA_VALEUR peut etre un entier ou une chaine
	if(in_array(MA_VALEUR, $tableau)) {/*faire quelque chose */} else {/*faire autre chose*/}


	bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
	$a = array('1.10', 12.4, 1.13);
	if (in_array('12.4', $a, true)) {
		echo "'12.4' est trouvé avec le mode strict\n";
	}
	
explode () : Coupe une chaîne en tableau, segments
//DELIMITEUR est généralement une chaine de caracteres (le plus souvent 1 caractere)

	$chaine = explode(DELIMITEUR, $chaine);

	array explode ( string $delimiter , string $string [, int $limit ] )
	// Exemple 1
	$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
	$pieces = explode(" ", $pizza);
	echo $pieces[0]; // piece1
	echo $pieces[1]; // piece2	
	
	
	
implode () : Effet inverse de explode Rassemble les éléments d un tableau en une chaîne
//DELIMITEUR est généralement une chaine de caracteres (le plus souvent 1 caractere)

	$chaine = implode (DELIMITEUR, $chaine);

	
	string implode ( array $pieces )
	$array = array('lastname', 'email', 'phone');
	$comma_separated = implode(",", $array);
	echo $comma_separated; // lastname,email,phone



count : compte de nombre d elements d un tableau
	
	int count ( mixed $var [, int $mode = COUNT_NORMAL ] )
	$food = array('fruits' => array('orange', 'banana', 'apple'),
              'veggie' => array('carrot', 'collard', 'pea'));

	// count récursif
	echo count($food, COUNT_RECURSIVE); // affiche 8
	
	
	
	
empty : savoir si un tableau, une variable est vide 
// Ne s'applique pas forcement que sur un tableau
	
	if(empty($tableau)) {/*faire quelque chose */} else {/*faire autre chose*/}
	
	
	bool empty ( mixed $var )
	$var = 0;             
	// Evalué à vrai car $var est vide
	if (empty($var)) {
	  echo '$var vaut soit 0, vide, ou pas définie du tout';
	}
	
	
	
isset : savoir si une variable ou un index existe ou si elle est différente de null
	
	if(isset($tableau)) {/*faire quelque chose */} else {/*faire autre chose*/}
	if(isset($tableau[MON_INDEX])) {/*faire quelque chose */} else {/*faire autre chose*/}
	
	
	bool isset ( mixed $var [, mixed $... ] )
	$a = 'test';
	$b = 'anothertest';
	var_dump(isset($a));      // TRUE
	var_dump(isset($a, $b)); // TRUE

	
	
	
unset : Permet de vider de la memoire (supprime) une variable (utiliser dans la fonction save)
unset ($tableau); // supprime la variable $tableau
unset ($tableau[MON_INDEX]);// supprime du tableau l'index MON_INDEX


	
current : Retourne l élément courant du tableau (voir fonction findfirst)
Permet de récuperer le premier index d un tableau

		$premierElement = current($tableau);
	
	
	mixed current ( array &$array )
	$transport = array('foot', 'bike', 'car', 'plane');
	$mode = current($transport); // $mode = 'foot';
	$mode = next($transport);    // $mode = 'bike';
	$mode = current($transport); // $mode = 'bike';
	$mode = prev($transport);    // $mode = 'foot';
	$mode = end($transport);     // $mode = 'plane';
	$mode = current($transport); // $mode = 'plane';

	$arr = array();
	var_dump(current($arr)); // bool(false)

	$arr = array(array());
	var_dump(current($arr)); // array(0) { }
	
	
	

// AJOUTER DES DONNEES DANS UN TABLEAU //

// index numérique 


// index chaines de caracteres
