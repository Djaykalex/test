<?php 
if(isset($aControllerDatas['article'])) { $article = $aControllerDatas['article']; } // affiche le jeux ciblé présent au tournoi F-G
?>
<div class="grid_16 ">
	<div class="">
		<!--<div class="titre"><?php echo $article['name']; ?></div>-->
	</div>
	<img class="tfg_points" src="<?php echo BASE_URL;?>/img/jeux_tournois/tfg_points.png" title="jeux tournois" alt="jeux tournois"/>
	<a href="<?php echo BASE_URL;?>/le_tournois/les_points" title="" alt=""><img class="tfg_points_flag" src="<?php echo BASE_URL."/".$article['nb_points'];?>" title="<?php echo $article['title_image']; ?>" alt="<?php echo $article['alt']; ?>"/></a>
	<div class="tfg_text"><?php echo $article['tfg']; ?></div>
	<img class="boite" src="<?php echo BASE_URL."/".$article['boite'];?>" title="<?php echo $article['title_image']; ?>" alt="<?php echo $article['alt']; ?>"/>
	<!--<img class="age_icone" src="<?php echo BASE_URL;?>/img/jeux_tournois/age.png" title="age" alt="age"/>-->
	<div class="age"><?php echo $article['age']; ?>+</div>
	<!--<img class="time_icone" src="<?php echo BASE_URL;?>/img/jeux_tournois/time.png" title="temps de jeu" alt="temps de jeu"/>-->
	<div class="time"><?php echo $article['duree']; ?></div>
	<!--<img class="players_icone" src="<?php echo BASE_URL;?>/img/jeux_tournois/players.png" title="joueurs" alt="joueurs"/>-->
	<div class="players"><?php echo $article['nb_joueurs']; ?> joueurs</div>
	<img class="tfg_points_content" src="<?php echo BASE_URL;?>/img/jeux_tournois/tfg_points_content.png" title="jeux tournois" alt="jeux tournois"/>
	<div class="description_jeux_tournois">"<?php echo $article['description']; ?>"</div>
	<div class="tfg_content"><?php echo $article['content']; ?></div>
	<a class="tfg_liens"  href="<?php echo $article['liens']; ?>" target="_blank">www.<?php echo $article['name']; ?></a>
	<div class="tfg_end"></div>
	<img class="tfg_img1" src="<?php echo BASE_URL."/".$article['img1'];?>" title="<?php echo $article['title_image']; ?>" alt="<?php echo $article['alt']; ?>"/>
	<img class="tfg_img2" src="<?php echo BASE_URL."/".$article['img2'];?>" title="<?php echo $article['title_image']; ?>" alt="<?php echo $article['alt']; ?>"/>
	<img class="tfg_img3" src="<?php echo BASE_URL."/".$article['img3'];?>" title="<?php echo $article['title_image']; ?>" alt="<?php echo $article['alt']; ?>"/>
	<a class=""  href="<?php echo $article['lien_editeur']; ?>" target="_blank"><img class="tfg_img4" src="<?php echo BASE_URL."/".$article['img4'];?>" title="<?php echo $article['title_image']; ?>" alt="<?php echo $article['alt']; ?>"/></a>
</div>
		
	


	
	
			
	
	
	
	
