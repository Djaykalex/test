<?php
//pr($aControllerDatas);
?>
<div class="grid_16 background_blanc">
	<div class="titre">Liste des guildes</div>
	<div class="grid_16 principe_tournoi" style=" width:900px; margin-right:20px">
		<img class="tournoi_soustitre_icone" src="<?php echo BASE_URL;?>/img/icones/flag_guildes.png" title="Guilde contre guilde" alt="Guilde contre guilde" />
		<div class="tournoi_description">
			Le système des parties rapides est simple et vous permet d'affronter un ou plusieurs joueurs autour d'un jeu.Le gagnant de la partie remporte alors un nombre de points (allant de 5 à 50 points en fonction des jeux, voir système de points.Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. 
			Le système des parties rapides est simple et vous permet d'affronter un ou plusieurs joueurs autour d'un jeu.Le gagnant de la partie remporte alors un nombre de points (allant de 5 à 50 points en fonction des jeux, voir système de points.Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. 
		</div>
	</div>
	<?php 
	$guildeban = $aControllerDatas['guildeban'];
	$guildelogo = $aControllerDatas['guildelogo'];	
	foreach ($aControllerDatas['guildes2'] as $k => $v){ 
		?>
		<div class="fondtextguilde">
			<div class="titreguildelist"><a class="plusdinfos"  href="<?php echo BASE_URL; ?>/guildes/details/<?php echo $v['id']; ?>" title="Cliquez içi pour avoir plus de détails" /><?php echo $v['name']; ?></a></div>
			<!--<div>La couleur de votre banniere : <?php echo $v['color']; ?></div>-->
			
			<img id="logoguilde2" src="<?php echo BASE_URL."/".$guildeban[$v['banniere_id']];?>" />
			<img id="logoguilde5" src="<?php echo BASE_URL."/".$guildelogo[$v['logo_id']];?>" />
			<img class="foin2" src="<?php echo BASE_URL; ?>/img/foin2.png" />
		</div>
	<?php } ?>
</div>

