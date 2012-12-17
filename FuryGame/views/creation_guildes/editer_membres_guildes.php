<?php 
	if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; } // table guildes
	if(isset($aControllerDatas['guildes_connextion'])) { $guildes_connextion = $aControllerDatas['guildes_connextion']; } // Evite de se connecter sur une autre guilde
	if(isset($aControllerDatas['guildeban'])) { $guildeban = $aControllerDatas['guildeban']; } // couleur de la banniere de guilde
	if(isset($aControllerDatas['guildelogo'])) { $guildelogo = $aControllerDatas['guildelogo']; } // logo de la guilde
?>
<?php foreach ($aControllerDatas['isauthguildes'] as $k => $v) { // parcours de la table guildes
		if(isset($guildes_connextion['isauth_id']) && $guildes_connextion['isauth_id'] != $_SESSION['user_id']) {
			header("location:".BASE_URL."/creation_guildes/fatal_erreur");
		}
	}
/** je securise l'edition des membres de la guilde : en gros 
	- je parcours $aControllerDatas['isauthguildes'] qui contient la table guildes.
	- Si dans la table "guilde" il existe isauth_id et que isauth_id est different de l'user_id (qui correspond a l'id de la personne 
	connecter via la table isauth) je le redirige vers une page d'erreur.
	- Le but est d'eviter qu'une personne puisse changer de guilde en changeant l'id de la guilde via l'URL.
	-Meme technique à utiliser pour les modifications de comptes !
*/
?>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
/** On securise, si le rôle de la personne qui essaie de se connecter sur la page "gestion_guildes" en changeant l'URL manuellement, n'a pas 
	un rôle de rang 1, il sera alors redirigé vers l'accueil.
*/
?>
<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles"> Membres de la guilde <?php echo $guildes['name']; ?></div>
		<a class="btn black" href="<?php echo BASE_URL; ?>/membres/backoffice_add" style="float: right; margin-top: -33px;"><span>ajouter</span></a>
		<div class="gestion_membres_guilde_banniere">
			<img class="foin3_membres" src="<?php echo BASE_URL; ?>/img/foin2.png" />
			<img class=""id="logo_membres_guilde" src="<?php echo BASE_URL."/".$guildeban['lien'];?>" />
			<img class=""id="logo_membres_guilde2" src="<?php echo BASE_URL."/".$guildelogo['img'];?>" />
		</div>
		<div class="content_edite">
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
				<table cellspacing="0" cellpadding="0" border="0" class="table">
					<thead>
						<tr>
							<th class="th_edite">Nom</th>
							<th class="th_edite">prenom</th>
							<th class="th_edite">Pseudo</th>
							<th class="th_edite">Edit</th>
						</tr> 
					</thead> 
					<tbody> 
						<?php 
							foreach ($aControllerDatas['isauth'] as $k => $v){ ?>
								<tr> 
									<td class="td_edite"><?php echo $v['name']; ?></td>
									<td class="td_edite"><?php echo $v['prenom']; ?></td>
									<td class="td_edite"><?php echo $v['pseudo']; ?></td>
									<td class="td_edite">
										<a href="<?php echo BASE_URL; ?>/creation_guildes/editer_membres/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/thumb-edit.png" alt="edit" /></a>
									</td>
								</tr>
					  <?php } ?>
					</tbody> 
				</table>
				<div class="editer_membres_guildes"></div>
			</form>
		</div>
	</div>
</div>
<?php 
} else {
		header("Location: ".BASE_URL."");
		die();
	} 
?>
