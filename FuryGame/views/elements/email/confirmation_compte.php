

<img src="http://localhost/FuryGame/webroot/img/logo-fury-game-footer.png"/>
<h1>Accusé de reception!</h1>
<p>Votre compte à bien été créé! </p>

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
<p>Votre login : <?php echo $mailDatas['messagesend']['login']; ?></p> 
<p>Votre pseudo : <?php echo $mailDatas['messagesend']['pseudo']; ?></p> 
<p>Votre mot de pass : <?php echo $mailDatas['messagesend']['pass']; ?></p> 


<!--

	Autre maniere d'afficher le contenu du message !! avec un foreach de la clée et sa valeur 
<?php
//foreach($mailDatas['messagesend' as $k =>$v) {

	//?><p><?php echo $k.'==>'.$v;?></p><?php

//}
?>


-->
