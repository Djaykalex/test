<?php
if(isset($aControllerDatas['guildemembre_test'])) { $guildemembre_test = $aControllerDatas['guildemembre_test'];} //affiche la guilde du membre
if(isset($aControllerDatas['guildemembres'])) { $guildemembres = $aControllerDatas['guildemembres']; } // guilde de l'utilisateur ayant un rôle de Guild Master
// if(isset($aControllerDatas['guildemembre'])) { $guildemembre = $aControllerDatas['guildemembre']; } 
?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
/** On securise, si le rôle de la personne qui essaie de se connecter sur la page "gestion_guildes" en changeant l'URL manuellement, n'a pas 
	un rôle de rang 1, il sera alors redirigé vers l'accueil.
*/
?>

<div class="grid_16 background_blanc">
	<div class="grid_3 icone_article">
		<img class="tournoi_soustitre_icone" src="<?php echo BASE_URL;?>/img/petit-logo-fury-game.png" title="Festival Fury-Game" alt="Festival Fury-Game" />
	</div>
	<div class="grid_13 principe_tournoi" style=" width:700px; margin-right:20px">
		<div class="titre_articles">Vous souhaitez Ajouter "<?php foreach ($guildemembre_test as $k => $v){ echo $v ;}?>" à la guilde</div>
		<form class="" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildeMembreEdit">
			<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
			<div class="row">
				<label>Attention, vous allez ajouter  <?php foreach ($guildemembre_test as $k => $v){ echo $v ;}?> à la guilde</label>
				<div class="rowrights ">
					<select name="guildes_id" id="InputGuilde" class="select">
						<?php 
						foreach($guildemembres as $k => $v) {
							if(isset($v['guildes_id']) && $v['guildes_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							?><option <?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>	
				</div>
			</div>
			
			<div class="row">
				<button type="submit" class="bouton_valider" onclick="return confirm('Voulez vous vraiment ajouter ce membre?');">Ajouter à la guilde </button>
			</div>
			<div class="bouton_retour"><a href="<?php echo BASE_URL;?>/creation_guildes/gestion_membres_guildes">Revenir en arrière</a></div>
			
		</form>
		<?php 
			// pr($guildemembre_test); 
			// pr($guildemembre_test2); 
			// pr($guildemembre); 
			// pr($guildemembres); 
		?>
	</div>
</div>
<?php 
} else {
		header("Location: ".BASE_URL."");
		die();
	} 
?>