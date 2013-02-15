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
	<div class="grid_3 icone_article">
		<img class="tournoi_soustitre_icone" src="<?php echo BASE_URL;?>/img/petit-logo-fury-game.png" title="Festival Fury-Game" alt="Festival Fury-Game" />
	</div>
	<div class="grid_13 principe_tournoi" style=" width:700px; margin-right:20px">
		<div class="titre_articles">Vous souhaitez supprimer "<?php foreach ($guildemembre_test as $k => $v){ echo $v ;}?>" de la guilde</div>
		<div class="tournoi_description">
			Attention, si vous souhaitez supprimer ce membre de la guilde, vous ne pourrez plus revenir en arrière. 
		</div>
		<form class="" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildeMembreEdit">
			<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
			<div class="row">
				<label></label>
				<div class="row">
					<select name="guildes_id" id="InputGuilde" class="select" >
						<?php 
						foreach($guildemembre_test2 as $k => $v) {
							if(isset($v['guildes_id']) && $v['guildes_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							?><option <?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>	
				</div>
			</div>
			<div class="row">
				<button type="submit" class="bouton_valider" onclick="return confirm('Voulez vous vraiment supprimer ce membre?');">Supprimer de la guilde</button>
			</div>
			<div class="bouton_retour"><a href="<?php echo BASE_URL;?>/creation_guildes/gestion_membres_guildes">Revenir en arrière</a></div>
		</form>
		<?php 
		// pr($guildemembre_test); 
		// pr($guildemembre_test2); 
		?>
	</div>
	<img class="footer_all_partenaires" src="<?php echo BASE_URL;?>/img/icones/footer_all_partenaires.png" title="Partenaires du festival fury-game" alt="partenaires du festival fury-game" />
</div>
