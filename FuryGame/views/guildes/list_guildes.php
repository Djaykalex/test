<?php
//pr($aControllerDatas);
?>
<div class="grid_16 background_blanc">
	<div class="fondtext ">
		<div class="titre_details_articles">Liste des guildes</div>
		<div class="soustitre"><span>Les guildes </span></div>
		<div class="text3">
			<span class="gras">Le système</span> des parties rapides <span class="gras">est simple</span> et vous permet <span class="gras">d'affronter un ou plusieurs joueurs </span>autour d'un jeu. </br><span class="gras">Le gagnant</span> de la partie <span class="gras">remporte alors un nombre de points</span>  (allant de 5 à 50 points en fonction des jeux, voir <a href="#" class="liens" title="système de points" >système de points</a>). </br> Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. </br>
			 </br>
			Début des parties rapides : 9h00.</br>
			Fin des parties rapides : 18h00.</br>
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
	<div class="fintextslogan"></div>
</div>

