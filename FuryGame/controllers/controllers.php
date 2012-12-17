<?php

/**
* fonction redirect qui permet de rediriger vers l'url passée en paramètre
* @param varchar $url Url de la page de redirection
**/


function redirect($url) {
			
	header("Location: ".BASE_URL.'/'.$url);
	die();	
		
}


/**
*fonction sendmail permet l'envoi de mail. 
* @param 	$mailDatas 		varchar 		ce sont les données du mail ['layout']['view']['messagesend']['subject']['from']...
* @param 	$host 			varchar 		c'est l'host du transport
* @param 	$port 			varchar 		c'est le port de connexion
* @param 	$username 		varchar 		c'est l'adresse mail de l'envoyeur
* @param 	$password 		varchar 		c'est le pass du transport 
* @param	view 			varchar 		Index contenant la vue à utiliser (optionnel)
*
* ->setSubject() c'est le titre du mail.
* ->setFrom() c'est le mail de l'envoyeur.
* ->->setTo() c'est le mail à qui ont l'envoie.
* ->addPart() c'est le contenu du mail.
*
**/

function sendmail (
	$mailDatas,
	$host = "ns0.ovh.net",
	$port = '587',
	$username = 'postmaster@fury-game.fr',
	$password = 'wK7aLijd'
	

) {

	require(SWIFT.DS.'swift_required.php');


	// Create the Transport
	$transport = Swift_SmtpTransport::newInstance($host, $port)
	  ->setUsername($username)
	  ->setPassword($password)
	  ;

	/*
	You could alternatively use a different transport such as Sendmail or Mail:

	// Sendmail
	$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

	// Mail
	$transport = Swift_MailTransport::newInstance();
	*/

	// Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);
	
	
		
	$layout = $mailDatas['layout'];
	if(isset($mailDatas['view'])) {
		
		$view = $mailDatas['view'];
		ob_start(); //On va récupérer dans une variable le contenu de la vue pour l'affichage dans la variable layout_for_content "buffer"
		include(ELEMENTS.DS.'email'.DS.$view.'.php'); //Chargement de la vue
		$content_for_layout = ob_get_clean(); //On stocke dans cette variable le contenu de la vue
	
	}
	
	ob_start(); //On va récupérer dans une variable le contenu de la vue pour l'affichage dans la variable layout_for_content
	include(LAYOUT.DS.$layout.'.php'); //Chargement de la vue
	$messageHTML = ob_get_clean(); //On stocke dans cette variable le contenu de la vue
	
	
	// Create the message
	$message = Swift_Message::newInstance()

	  // Give the message a subject
	  ->setSubject($mailDatas['subject'])

	  // Set the From address with an associative array
	  ->setFrom($mailDatas['from'])

	  // Set the To addresses with an associative array
	  ->setTo($mailDatas['to'])

	   // And optionally an alternative body
	  ->addPart($messageHTML, 'text/html')
	;


	// Send the message
	$result = $mailer->send($message);
	echo $result;
}
