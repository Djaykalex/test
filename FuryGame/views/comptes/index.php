
<?php if(isset($aControllerDatas['comptes'])) { $comptes = $aControllerDatas['comptes']; } ?>

<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles">Création de votre compte</div>
		<form class="form" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
	
			<div class="row">
				<label>Nom</label>
				<div class="rowright" >
					<input type="text" name="name" id="InputName" class="imput_size"<?php echo isset($comptes['name']) ? 'value="'.$comptes['name'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['name'])) {  ?> </br><label for="name" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
				</div>
				
			</div>
			<div class="row">
				<label>Prenom</label>
				<div class="rowright">
					<input type="text" name="prenom" id="InputName" class="imput_size"<?php echo isset($comptes['prenom']) ? 'value="'.$comptes['prenom'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['prenom'])) {  ?> </br><label for="prenom" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['prenom']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>Pseudo</label>
				<div class="rowright">
					<input type="text" name="pseudo" id="InputName" class="imput_size"<?php echo isset($comptes['pseudo']) ? 'value="'.$comptes['pseudo'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['pseudo'])) {  ?> </br><label for="pseudo" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['pseudo']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>Votre Login (adresse mail)</label>
				<div class="rowright">
					<input type="text" name="login" id="InputName" class="imput_size"<?php echo isset($comptes['login']) ? 'value="'.$comptes['login'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['login'])) {  ?> </br><label for="login" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['login']; ?></label> <?php } ?>
				</div>
			</div>
			<!--Mot de passe -->
			<div class="row">
				<label>Mot de passe</label>
				<div class="rowright">
					<input type="password" name="pass" id="InputPass"  class="imput_size"<?php echo isset($comptes['pass']) ? 'value="'.$comptes['pass'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['pass'])) {  ?> </br><label for="pass" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['pass']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label></label>
				<div class="rowright">
					<input type="hidden" name="isauth" id="InputName" value="1" >
				</div>
			</div>
			<div class="row">
				<label>Votre rôle</label>
				<div class="rowright">
					<select name="role_id" id="InputRole" class="imput_size">
						<?php 
						foreach($aControllerDatas['guildemembre'] as $k => $v) {

							if(isset($comptes['role_id']) && $comptes['role_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							
							?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<label>Choix de votre Guilde</label>
				<div class="rowrights ">
					<select name="guildes_id" id="InputGuilde" class="imput_size">
						<?php 
						foreach($aControllerDatas['guildemembres'] as $k => $v) {

							if(isset($comptes['guildes_id']) && $comptes['guildes_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							
							?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>	
				</div>
			</div>
			<div class="row">
				<button type="submit" class="bouton_valider">Valider</button>
			</div>
		</form>
		<img class="contact_logo" style="margin-top:-570px;"src="<?php echo BASE_URL;?>/img/logo-fury-game.png" title="logo fury-game" alt="logo fury-game" />
		<img class="contact_logo_assoc"  style="margin-top:-250px;" src="<?php echo BASE_URL;?>/img/press-start-to-play.png" title="logo press start to play" alt="logo press start to play" />
	</div>
</div>

