<?php if(isset($aControllerDatas['articles_authors'])) { $articles_authors = $aControllerDatas['articles_authors']; } ?>
<div class="row">
	<label>Nouveau auteur</label>
	<div class="rowright"><input type="text" name="name" id="InputName" <?php echo isset($articles_authors['name']) ? 'value="'.$articles_authors['name'].'"' : ''; ?>></div>
</div>
<div class="row">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>