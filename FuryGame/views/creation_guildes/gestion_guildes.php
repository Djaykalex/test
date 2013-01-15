<?php 
	if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; } // table guildes
	if(isset($aControllerDatas['guildeban'])) { $guildeban = $aControllerDatas['guildeban']; } // couleur de la banniere de guilde
	if(isset($aControllerDatas['guildelogo'])) { $guildelogo = $aControllerDatas['guildelogo']; } // logo de la guilde
	if(isset($aControllerDatas['name_guilde_master'])) { $name_guilde_master = $aControllerDatas['name_guilde_master']; } // affichage du nom du Guilde master
	if(isset($aControllerDatas['membres_guilde'])) { $membres_guilde = $aControllerDatas['membres_guilde']; } // Nom des membres de la guilde
?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){ 
/** On securise, si le rôle de la personne qui essaie de se connecter sur la page "gestion_guildes" en changeant l'URL manuellement, n'a pas 
	un rôle de rang 1, il sera alors redirigé vers l'accueil.
*/?>
<div class="grid_16 background_blanc">
	<div class="fondtext ">
		<div class="titre_details_articles">Gestion de votre guilde !</div>
		<form class="form_compte" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
			<div class="dictonedit">
				<label class="titre_guilde">Nom de la guilde : </label>
				<div class="nomguilde"><?php echo $guildes['name']; ?></div>
			</div>
			<div class="dictonedit">
				<label class="titre_guilde">Votre dicton : </label>
				<div class="dicton2"><?php echo $guildes['dicton']; ?></div>
			</div>
			<div class="description2">
				<label class="titre_guilde">Votre présentation : </label>
				<div class="text_gestion_guildes"><?php echo $guildes['content']; ?></div>
			</div>
			<div class="gestion_guilde_banniere">
				<img class="foin3" src="<?php echo BASE_URL; ?>/img/foin2.png" />
				<img class=""id="logoguilde7" src="<?php echo BASE_URL."/".$guildeban['lien'];?>" />
				<img class=""id="logoguilde8" src="<?php echo BASE_URL."/".$guildelogo['img'];?>" />
			</div>
			<div class="description3">
				<label class="titre_guilde">Liste des membres : </label>
				<div class="text_gestion_guildes"><?php echo 'Guilde Master : '.$name_guilde_master['name']; ?></div>
				<div class="text_gestion_guildes"><?php foreach ($membres_guilde as $k => $v) { echo 'Membres : '.$v."<br />"; } ?></div>
			</div>
			<div class="editer_slot">		
				<a href="<?php echo BASE_URL; ?>/creation_guildes/editer_guildes/<?php echo $guildes['id']; ?>"><span class="valid_modif">Modifier</span></a>
			</div>
			
		</form>
	</div>
</div>
<?php 
} else {
		header("Location: ".BASE_URL."");
		die();
	} 
?>