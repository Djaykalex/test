<?php if(isset($aControllerDatas['jeux_tournoi'])) { $jeux_tournoi = $aControllerDatas['jeux_tournoi'];} // affiche les jeux qui seront présentés au tournoi F-G
?>
<div class="grid_16 background_blanc">
	<div class="titre">Les jeux du Tournoi Fury-Game</div>
	<?php
	/** Affiche les différents jeux du tournoi F-G*/
	foreach($jeux_tournoi as $k => $v) { ?>
		<div class="">
			<a class="jeux_tournois"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/<?php echo $v["id"]; ?> "><img class="jeux_tournois" title="<?php echo $v['title_image'];?>" alt="<?php echo $v['alt'];?>" src="<?php echo BASE_URL."/".$v['front_image'];?>"/></a>	
		</div>
		<p class="jeux_tournois_title"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/<?php echo $v["id"]; ?> " title="<?php echo $v["title_image"]; ?>"><?php echo $v["title_image"]; ?></a></p>
	<?php }?>	
</div>
<div class="grid_16 background_blanc">
	<div class="titre">Le principe du tournoi guilde Vs guilde !</div>
	<div class="soustitre"><span>Comment faire ?</span></div>
	<div class="text3">
		<span class="gras">Le système</span> des parties rapides <span class="gras">est simple</span> et vous permet <span class="gras">d'affronter un ou plusieurs joueurs </span>autour d'un jeu. </br><span class="gras">Le gagnant</span> de la partie <span class="gras">remporte alors un nombre de points</span>  (allant de 5 à 50 points en fonction des jeux, voir <a href="#" class="liens" title="système de points" >système de points</a>). </br> Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. </br>
		 </br>
		Début des parties rapides : 9h00.</br>
		Fin des parties rapides : 18h00.</br>
	</div>
</div>
	
	
			
	
	
	
	
