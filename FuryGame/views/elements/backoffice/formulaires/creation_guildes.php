<?php if(isset($aControllerDatas['guildes'])) { $article = $aControllerDatas['guildes']; } ?>
<div class="row">
	<label>Nom</label>
	<div class="rowright">
		<input type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
	</div>
</div>

<div class="row">
	<label>Votre couleur</label>
	<div class="rowright">
		<input type="text" name="color" id="InputName" <?php echo isset($article['color']) ? 'value="'.$article['color'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['color'])) {  ?> <label for="color" generated="true" class="error"><?php echo $aControllerDatas['errors']['color']; ?></label> <?php } ?>
	</div>
</div>





<div class="row">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>