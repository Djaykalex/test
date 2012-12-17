<?php if(isset($aControllerDatas['articletype'])) { $articletype = $aControllerDatas['articletype']; } ?>
<div class="row">
	<label>Nouveau type d'article</label>
	<div class="rowright"><input type="text" name="name" id="InputName" <?php echo isset($articletype['name']) ? 'value="'.$articletype['name'].'"' : ''; ?>></div>
</div>
<div class="row">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>