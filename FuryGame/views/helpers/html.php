<?php 

/** creation d'une fonction:
 * function ma_fonction () {
 * 		echo 'Avant return';
 * 		return TRUE; // PHP sort de la fonction en renvoyant la valeur vrai
 * 		echo 'Apres return'; // cette instruction ne sera jamais executé
 * } 
 */
/** fonction à utiliser pour une debug de variable**/
/**
 * 
 * @param unknown_type $mDiplay element à afficher
 * @author djayk 
 * @copyright 2012 hellfury
 * @version afficher la version de la fonction
 * @todo liste de choses a faire 
 */

/**
 *
 * @param mixed $a Css à insérer
 */
function css($a) {

	foreach($a as $k => $v) {
		
		echo '<link rel="stylesheet" type="text/css" href="'.BASE_URL.'/css/'.$v.'.css" />';
	}
}
/**
 *
 * @param mixed $a Js à insérer
 */
function js($a) {

	foreach($a as $k => $v) {

		echo '<script src="'.BASE_URL.'/js/'.$v.'.js"></script>';
	}
}


/**  
la fonction img a entre parenthèses la variable $sImg que j'ai crée suivis de la variable options = null qui correspond à des valeurs que l'on pourrait rajouter a la suite de alt title ...
on determine la variable attr comme n'ayant rien par defaut
ensuite on indique que si y a isset option on fait un foreach ($options as $K => $V) {$attr.=' ' donc on rajoute a $attr un blanc par le .=' ' un espace entre les guillemets.
suivis de .$K. '="'.$V'"' se traduit par ma key="ma valeur" le dernier guillemet est ecrit de cette facon = '"'
$html ='<img src="'.BASE_URL.'/img/'.$sImg.'" '.$attr.'/>'; pourrait s'ecrire de cette façon : 
$html = <img src="../webroot/img/maphoto1.png" title="" alt=""/>
**/

function img($sImg, $options = null) { 

	$attr ='';
	if(isset($options)) {
	
		foreach($options as $K => $V) { $attr.=' '.$K.'="'.$V.'"';}
	
	}
	$html ='<img src="'.BASE_URL.'/img/'.$sImg.'" '.$attr.'/>';
	return $html;
}

/**
fonction permettant de generer le code html d'un lien 
@param varchar $texte Texte du lien
@param varchar $url du lien
@param varchar $options tableau d'attributs (optionnel)
@return Retourne le code html d'un lien
@version 0.1 - 08/02/2012




**/
function lien($texte, $url, $options = null) {

	$attr='';
	if(isset($options)) {
	
		foreach($options as $K => $V) { $attr.=' '.$K.'="'.$V.'"';}
	}
	
	$html ='<a href="'.$url.'" '.$attr.'>'.$texte.'</a>';
	return $html;
}
/**<?php if (isset($sSliders) && count($sSliders) > 0) { ?>
	<div class="container_alpha slider">
		<div id="slider" class="nivoslider">
		<?php
		$captions = '';
		foreach($sSliders as $K => $V) {
		
			$title = '';
			if(isset($v['content']) && !empty($v['content'])) {
			
				$title = 'title="#htmlcaption'.$v['id'].'" ';
				$captions .='<div id="#htmlcaption'.$v['id'].'" class="nivo-html-caption">'.$v['content'].'</div>'."\n";
			}
			
			?><img src="<?php echo
			echo "\n"
**/


/** fonction sha1 + $salt pour sécuriser les données sensible */
$salt = "49@!alsd";
$password = "alexange";
$pass2 = sha1($password);
$password_crypte = sha1(sha1($password).$salt);
// echo $password_crypte;
// echo $pass2;
