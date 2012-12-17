

<img src="http://localhost/FuryGame/webroot/img/logo-fury-game-footer.png"/>
<h1>Accusé de reception!</h1>
<p>Nous avons bien reçu votre message! </p>

<!-- 1er maniere -->
<?php

// foreach($mailDatas['messagesend'] as $k =>$v) {

	// ?><!--<p><?php /** echo $k.' = '.$v; */?></p>
	<?php

// }
?>


<!-- 2eme maniere -->

<p>Votre nom : <?php echo $mailDatas['messagesend']['name']; ?></p> 
<p>Votre prenom : <?php echo $mailDatas['messagesend']['prenom']; ?></p> 
<p>Votre telephone : <?php echo $mailDatas['messagesend']['telephone']; ?></p> 
<p>Votre adresse mail : <?php echo $mailDatas['messagesend']['adresse_mail']; ?></p> 
<p>Votre message : <?php echo $mailDatas['messagesend']['message']; ?></p> 


<!--

	Autre maniere d'afficher le contenu du message !! avec un foreach de la clée et sa valeur 
<?php
//foreach($mailDatas['messagesend' as $k =>$v) {

	//?><p><?php echo $k.'==>'.$v;?></p><?php

//}
?>


-->
