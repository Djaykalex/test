<?php 
	if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; } // table guildes
	if(isset($aControllerDatas['guildeban'])) { $guildeban = $aControllerDatas['guildeban']; } // couleur de la banniere de guilde
	if(isset($aControllerDatas['guildelogo'])) { $guildelogo = $aControllerDatas['guildelogo']; } // logo de la guilde
	if(isset($aControllerDatas['membre_guilde'])) { $membre_guilde = $aControllerDatas['membre_guilde']; } // Nom des membres de la guilde
	if(isset($aControllerDatas['name_guilde_master'])) { $name_guilde_master = $aControllerDatas['name_guilde_master']; } // affichage du nom du Guilde master
?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
/** On securise, si le rôle de la personne qui essaie de se connecter sur la page "gestion_membres_guildes" en changeant l'URL manuellement, n'a pas 
	un rôle de rang 1, il sera alors redirigé vers l'accueil.
*/
?>
<div class="grid_16 background_blanc">
	<div class="fondtext ">
		<div class="titre_details_articles">Gestion des membres votre guilde !</div>
		<div class="soustitre"><span>Comment faire ?</span></div>
		<form class="form_compte" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
			<div class="dictonedit_membres">
				<label class="titre_guilde">Nom de la guilde : </label>
				<div class="nomguilde"><?php echo $guildes['name']; ?></div>
			</div>
			<div class="gestion_membres_guilde_banniere">
				<img class="foin3_membres" src="<?php echo BASE_URL; ?>/img/foin2.png" />
				<img class=""id="logo_membres_guilde" src="<?php echo BASE_URL."/".$guildeban['lien'];?>" />
				<img class=""id="logo_membres_guilde2" src="<?php echo BASE_URL."/".$guildelogo['img'];?>" />
			</div>
			<div class="description_membres">
				<label class="titre_guilde">Liste des membres : </label>
				<div class="text_gestion_guildes"><?php echo 'Guilde Master : '.$name_guilde_master['name']; ?></div>
				<div class="text_gestion_guildes"><?php foreach ($membre_guilde as $k => $v) { echo 'Membres : '.$v."<br />"; } ?></div>
			</div>
			<div class="editer_slot_membres">		
				<a href="<?php echo BASE_URL; ?>/creation_guildes/editer_membres_guildes/<?php echo $guildes['id']; ?>"><span class="valid_edit">Modifier les membres</span></a>
			</div>
		</form>
	</div>
	<div class="fintext"></div>
</div>
<?php 
} else {
		header("Location: ".BASE_URL."");
	} 
?>