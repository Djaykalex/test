<?php if(isset($aControllerDatas['messages'])) { $article = $aControllerDatas['messages']; } ?>
<div class="row">
	<label>Titre </label>
	<div class="rowright">
		<input type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
	</div>
</div>

<div class="row">
	<label>Auteur</label>
	<div class="rowright">
		<input type="text" name="prenom" id="InputPrenom" <?php echo isset($article['prenom']) ? 'value="'.$article['prenom'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['prenom'])) {  ?> <label for="prenom" generated="true" class="error"><?php echo $aControllerDatas['errors']['prenom']; ?></label> <?php } ?>
	</div>
</div>
<div class="row">
	<label>Votre adresse mail</label>
	<div class="rowright">
		<input type="text" name="adresse_mail" id="InputColor" <?php echo isset($article['adresse_mail']) ? 'value="'.$article['adresse_mail'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['adresse_mail'])) {  ?> <label for="adresse_mail" generated="true" class="error"><?php echo $aControllerDatas['errors']['adresse_mail']; ?></label> <?php } ?>
	</div>
</div>


<div class="row">
	<label>Contenu du message</label>
	<div class="rowright">
		
		<textarea cols="50" rows="20" name="message" id="InputContent"><?php if(isset($article['message'])) { echo $article['message']; } ?></textarea>
		<?php if(isset($aControllerDatas['errors']['message'])) {  ?> <label for="message" generated="true" class="error"><?php echo $aControllerDatas['errors']['message']; ?></label> <?php } ?>
		<script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.
				
				var editor = CKEDITOR.replace( 'InputContent' );
				CKFinder.setupCKEditor( editor, '<?php echo BASE_URL; ?>/js/ckfinder/' );
			//]]>
			
		</script>
		
	</div>
</div>

<div class="row">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>