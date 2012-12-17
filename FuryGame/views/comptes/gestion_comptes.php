<?php if(isset($aControllerDatas['comptes'])) { $article = $aControllerDatas['comptes'];}?>
<?php if(isset($aControllerDatas['comptes2'])) { $compte = $aControllerDatas['comptes2'];}?>
<?php if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes'];}?>
<?php if(isset($aControllerDatas['guildecompte'])) { $guildecompte = $aControllerDatas['guildecompte'];}?>
<?php if(isset($aControllerDatas['isauth'])) { $isauth = $aControllerDatas['isauth'];}?>
<?php if(isset($aControllerDatas['pasdeguilde'])) { $pasdeguilde = $aControllerDatas['pasdeguilde'];}?>

<div class="grid_16 background_blanc ">
	<div class="fondtext">
		<div class="titre_gestion_compte">Gestion de votre compte <?php echo $_SESSION['user_pseudo']; ?> !</div>
		<form class="form_compte" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
		<?php 
			foreach ($aControllerDatas['comptes'] as $k => $v){ ?>
				<div class="row">
					<label>Nom : </label>
					<?php echo $v['name']; ?>
				</div>
				<div class="row">
					<label>Prenom : </label>
					<?php echo $v['prenom']; ?>
				</div>
				<div class="row">
					<label>Pseudo : </label>
					<?php echo $v['pseudo']; ?>
				</div>
				<div class="row">
					<label>Votre Login : </label>
					<?php echo $v['login']; ?>
				</div>
				<div class="row">
					<label>Mot de pass : </label>
					<?php echo $v['pass']; ?>
				</div>
				<div class="row">
					<label>Choix de votre rôle : </label>
					<?php if(isset($aControllerDatas['role'])) { $role = $aControllerDatas['role'];}
					foreach($aControllerDatas['comptes']as $k => $v) {
						if(isset($v['role_id'])) {
							echo $role[$v['role_id']];
						} else {
							echo 'Le joueur n a pas de rôle';
						} 
					}?>
				</div>
				<?php /** AFFICHAGE DU NOM DE LA GUILDE SUIVANT SON ROLE!! */ ?>
				
				<?php  if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
				// Si le rôle du joueur est 'Guild Master' dans ce cas j'affiche la partie d'en dessous sinon j'affiche rien.
				?>
				<div class="row">
					<label>Choix de votre guilde :  </label>
					<?php 
						foreach($aControllerDatas['guildes']as $k => $v) {
							if(isset($v['isauth_id']) && $v['isauth_id'] == $_SESSION['user_id']) {
								echo $v['name'];
							} else { echo 'plop';} 	
						}?>
				</div>
				<?php } ;?>
				<?php  if(isset($_SESSION['role']) && $_SESSION['role'] == 2 ){ 
				// Si le rôle du joueur est 'membre' dans ce cas j'affiche la partie d'en dessous sinon j'affiche rien.
				?>
				<div class="row">
					<label>Choix de votre guilde pour Membre : </label>
					<?php 
					foreach($guildecompte as $k => $v) { 
						echo $v;
					}
					?>
				</div>
				<?php } ?>
				<?php foreach ($aControllerDatas['comptes'] as $k => $v){ ?>
				<div class="editer_slot">		
					<a href="<?php echo BASE_URL; ?>/comptes/edit_comptes/<?php echo $v['id']; ?>"><span class="valid_edit">Editer</span></a>
				</div>
				<?php } ?>
			<?php } ?>
		</form>
	</div>
</div>

