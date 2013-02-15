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
				<button type="submit" class="bouton_valider">Valider</button>
			</div>
		</form>
		<img class="contact_logo" src="<?php echo BASE_URL;?>/img/logo-fury-game.png" title="logo fury-game" alt="logo fury-game" />
		<img class="contact_logo_assoc" src="<?php echo BASE_URL;?>/img/press-start-to-play.png" title="logo press start to play" alt="logo press start to play" />
	</div>
</div>