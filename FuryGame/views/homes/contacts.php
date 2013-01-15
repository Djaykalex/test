<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles">Vous souhaitez nous contacter !</div>
		<div class="text">
		</div>
		<?php if(isset($aControllerDatas['contact'])) { $article = $aControllerDatas['contact']; } ?>
		<form class="form" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
			<div class="row">
				<label>Nom</label>
				<div class="rowright" >
					<input type="text" name="name" id="InputName" class="imput_size" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['name'])) {  ?> </br><label for="name" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>Prenom</label>
				<div class="rowright">
					<input type="text" name="prenom" id="InputName" class="imput_size"<?php echo isset($article['prenom']) ? 'value="'.$article['prenom'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['prenom'])) {  ?> </br><label for="prenom" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['prenom']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row formrow">
				<label>Adresse mail</label>
				<div class="rowright">
					<input type="text" name="adresse_mail" id="InputAdresse_mail" class="imput_size"<?php echo isset($article['adresse_mail']) ? 'value="'.$article['adresse_mail'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['adresse_mail'])) {  ?> </br></br><label for="adresse_mail" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['adresse_mail']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>telephone</label>
				<div class="rowright">
					<input type="text" name="telephone" id="InputTelephone" class="imput_size" <?php echo isset($article['telephone']) ? 'value="'.$article['telephone'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['telephone'])) {  ?> </br></br><label for="telephone" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['telephone']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label>Texte</label>
				<div class="rowright">
					<textarea cols="50" rows="20" name="message" id="InputMessage" <?php echo isset($article['message']) ? 'value="'.$article['message'].'"' : ''; ?>></textarea>
					<?php if(isset($aControllerDatas['errors']['message'])) {  ?> </br></br><label for="message" generated="true" class="error"><img src="<?php echo BASE_URL; ?>/img/backoffice/icon-error.png" alt="Error" /><?php echo $aControllerDatas['errors']['message']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<button type="submit" class="buttomvalider"><span class="validation">Valider</span></button>
			</div>
		</form>
		<img class="contact_logo" src="<?php echo BASE_URL;?>/img/logo-fury-game.png" title="logo fury-game" alt="logo fury-game" />
		<img class="contact_logo_assoc" src="<?php echo BASE_URL;?>/img/press-start-to-play.png" title="logo press start to play" alt="logo press start to play" />
	</div>
</div>