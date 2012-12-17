
<?php if(isset($aControllerDatas['comptes'])) { $comptes = $aControllerDatas['comptes']; } ?>

<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles">Creer votre compte</div>
		
		<div class="text">
			Vous souhaitez créer un compte afin d'etre Guild Master pour créer une guilde, etre membre d'une guilde, ou simple membre... C'est içi que ca se passe !! 
		</div>
		<div class="imagecompte"></div>
		<form class="form" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
	
			<div class="row">
				<label>Nom</label>
				<div class="rowright" >
					<input type="text" name="name" id="InputName" <?php echo isset($comptes['name']) ? 'value="'.$comptes['name'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['name'])) {  ?> </br><label for="name" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
				</div>
				
			</div>
			<div class="row">
				<label>Prenom</label>
				<div class="rowright">
					<input type="text" name="prenom" id="InputName" <?php echo isset($comptes['prenom']) ? 'value="'.$comptes['prenom'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['prenom'])) {  ?> </br><label for="prenom" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['prenom']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>Pseudo</label>
				<div class="rowright">
					<input type="text" name="pseudo" id="InputName" <?php echo isset($comptes['pseudo']) ? 'value="'.$comptes['pseudo'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['pseudo'])) {  ?> </br><label for="pseudo" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['pseudo']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>Votre Login </br>(adresse mail)</label>
				<div class="rowright">
					<input type="text" name="login" id="InputName" <?php echo isset($comptes['login']) ? 'value="'.$comptes['login'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['login'])) {  ?> </br><label for="login" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['login']; ?></label> <?php } ?>
				</div>
			</div>
			<!--Mot de passe -->

			<div class="row">
				<label>Mot de pass</label>
				<div class="rowright">
					<input type="password" name="pass" id="InputPass"  <?php echo isset($comptes['pass']) ? 'value="'.$comptes['pass'].'"' : ''; ?>>
					
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
					<select name="role_id" id="InputRole">
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
					<select name="guildes_id" id="InputGuilde">
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
				<button type="submit" class="buttomvalider"><span class="validation">Valider</span></button>
			</div>
		</form>
	</div>
	<div class="fintext"></div>
</div>

