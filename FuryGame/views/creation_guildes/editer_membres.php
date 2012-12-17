<?php
if(isset($aControllerDatas['securite_guildes_membres'])) { $securite_guildes_membres = $aControllerDatas['securite_guildes_membres']; } // On securise l'accès aux autres guildes
if(isset($aControllerDatas['GM_guilde'])) { $GM_guilde = $aControllerDatas['GM_guilde']; } // Guilde du Guilde Master
if(isset($aControllerDatas['guildemembre_test'])) { $guildemembre_test = $aControllerDatas['guildemembre_test'];} //affiche la guilde du membre
if(isset($aControllerDatas['guildemembre_test2'])) { $guildemembre_test2 = $aControllerDatas['guildemembre_test2'];} //affiche la guilde du membre
	

	if(isset($securite_guildes_membres['guildes_id']) && $securite_guildes_membres['guildes_id'] != $GM_guilde['id']) {
		header("location:".BASE_URL."/creation_guildes/gestion_membres_guildes");
		die();
	} 

/** je securise l'edition des membres de la guilde  : en gros 
	- On compare l'id la guilde du Guild Master avec celle du membre qui est affiché.
	- Le but est d'eviter qu'une personne puisse modifier l'appartenance à une guilde d'un membre d'une autre guilde en modifiant l'id de la guilde via l'URL.
*/	
?>
<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles">Editer votre guilde !</div>
		<div class="soustitre"><span>Comment faire ?</span></div>
		<div class="text3">
			<span class="gras">Le système</span> des parties rapides <span class="gras">est simple</span> et vous permet <span class="gras">d'affronter un ou plusieurs joueurs </span>autour d'un jeu. </br><span class="gras">Le gagnant</span> de la partie <span class="gras">remporte alors un nombre de points</span>  (allant de 5 à 50 points en fonction des jeux, voir <a href="#" class="liens" title="système de points" >système de points</a>). </br> Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. </br>
			 </br>
			
		</div>
		<form class="creaguilde" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildeMembreEdit">
			<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
			<div class="row">
				<label>Guildes_test</label>
				<div class="row ">
					<select name="guildes_id" id="InputGuilde">
						<?php 
						foreach($guildemembre_test as $k => $v) {
							if(isset($v['guildes_id']) && $v['guildes_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>	
				</div>
			</div>
			<div class="row">
				<button type="submit" class="buttomvalider2"><span class="valid_edit_guildes">Modifier ce membre</span></button>
			</div>
		</form>
		<form class="creaguilde" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildeMembreEdit">
			<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
			<div class="row">
				<label>Guildes_test</label>
				<div class="row ">
					<select name="guildes_id" id="InputGuilde">
						<?php 
						foreach($guildemembre_test2 as $k => $v) {
							if(isset($v['guildes_id']) && $v['guildes_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>	
				</div>
			</div>
			<div class="row">
				<button type="submit" class="buttomvalider2"><span class="valid_edit_guildes">Modifier ce membre</span></button>
			</div>
		</form>
		<?php pr($guildemembre_test); ?>
		<?php pr($guildemembre_test2); ?>
	</div>
	<div class="fintext"></div>
</div>
