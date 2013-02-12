

<?php 
	if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; } // table guildes
	if(isset($aControllerDatas['guildes_connextion'])) { $guildes_connextion = $aControllerDatas['guildes_connextion']; } // Evite de se connecter sur une autre guilde
	if(isset($aControllerDatas['guildeban'])) { $guildeban = $aControllerDatas['guildeban']; } // couleur de la banniere de guilde
	if(isset($aControllerDatas['guildelogo'])) { $guildelogo = $aControllerDatas['guildelogo']; } // logo de la guilde
?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
/** On securise, si le rôle de la personne qui essaie de se connecter sur la page "gestion_guildes" en changeant l'URL manuellement, n'a pas 
	un rôle de rang 1, il sera alors redirigé vers l'accueil.
*/
?>
<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles"> Membres sans guilde</div>
		<div class="">
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
				<table class="tab_guilde_membres" cellspacing="0" cellpadding="0" border="0" class="table">
					<thead>
						<tr>
							<th class="th_edite">Nom</th>
							<th class="th_edite">prenom</th>
							<th class="th_edite">Pseudo</th>
							<th class="th_edite">Guilde</th>
							<th class="th_edite">Ajouter</th>
						</tr> 
					</thead> 
					<tbody> 
						<?php 
						foreach ($aControllerDatas['isauth'] as $k => $v){ ?>
							<tr> 
								<td class="td_edite"><?php echo $v['name']; ?></td>
								<td class="td_edite"><?php echo $v['prenom']; ?></td>
								<td class="td_edite"><?php echo $v['pseudo']; ?></td>
								<td class="td_edite"><?php echo $v['guildes_id']; ?></td>
								<td class="td_edite">
									<a href="<?php echo BASE_URL; ?>/creation_guildes/ajouter/<?php echo $v['id']; ?>"><img src="<?php echo BASE_URL; ?>/img/backoffice/add.png" alt="Ajouter" title="ajouter ce membre" style="margin-left:15px;"/></a>
								</td>
							</tr>
					  <?php } ?>
					</tbody> 
				</table>
			
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


