<?php if(isset($aControllerDatas['jeux_demos'])) { $jeux_demos = $aControllerDatas['jeux_demos'];} // table jeux_demos?> 
<?php if(isset($aControllerDatas['articlesTypesList'])) { $articlesTypesList = $aControllerDatas['articlesTypesList'];} // table article type?>
<?php if(isset($aControllerDatas['totalarticles'])) { $totalarticles = $aControllerDatas['totalarticles'];} //affiche le nbr d'articles?>
<?php if(isset($aControllerDatas['com'])) { $com = $aControllerDatas['com'];} // compte le nbr de commentaires pour chaque articles?>

<div class="grid_16 background_blanc">
	<div class="titre grid_16 alpha omega">Les jeux en démonstrations</div>
	<?php
	/** Affiche les différents jeux en démonstration*/
	/* Principe du modulo */ 
	$cpt = 1;
	foreach($jeux_demos as $k => $v) { 
	
	if($cpt%2 == 0) { $stylemore = 'margin-left:0px;margin-right:20px;'; }
	else { $stylemore = 'margin-left:20px; margin-right:20px;'; }
	
	$cpt++;
	?>
	<div class="fondtext_front_news grid_8 alpha omega" style="width:440px; <?php echo $stylemore; ?> ">
		<div class=" grid_8 alpha omega" style="width:440px;"> 
			<!-- A refaire le lien vers les jeux en details -->
			<a class="titre_front_demos" style="width:440px" href="<?php echo BASE_URL;?>/le_tournois/details_jeux/<?php echo $v["id"]; ?> "><?php echo $v['title_image'];?></a>
			<img class="icone_petit_news" src="<?php echo BASE_URL."/".$v['front_image'];?>" title="<?php echo $v['title_image']; ?>" alt="<?php echo $v['alt_image']; ?>"/>
			<div class="demo_description"><?php echo $v['description'];?></div>
			<div class="icone_demos">
				<div>
					<img class="age_icone" src="<?php echo BASE_URL;?>/img/jeux_tournois/age.png" title="age" alt="age"/>
					<p class="age_p"><?php echo $v['age'];?>+</p>
				</div>
				<div>
					<img class="time_icone" src="<?php echo BASE_URL;?>/img/jeux_tournois/time.png" title="temps de jeu" alt="temps de jeu"/>
					<p class="time_p"><?php echo $v['duree'];?>H</p>
				</div>
				<div>
					<img class="players_icone" src="<?php echo BASE_URL;?>/img/jeux_tournois/players.png" title="joueurs" alt="joueurs"/>
					<p class="joueurs_p"><?php echo $v['nb_joueurs'];?></p>
				</div>
			</div>
			<a href="<?php echo $v['lien_editeur'];?>" target="_blank" class="demos_liens">Site de l'éditeur</a>
		</div>
	</div>
	<?php }?>	
</div>

	
	
	
	
