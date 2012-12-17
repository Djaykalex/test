<?php if(isset($aControllerDatas['guildes'])) { $article = $aControllerDatas['guildes']; } ?>
<div class="row">
	<label>Nom de la guilde</label>
	<div class="rowright">
		<input type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
	</div>
</div>

<div class="row">
	<label>Couleur de la guilde</label>
	<div class="rowright">
		<input type="text" name="color" id="InputColor" <?php echo isset($article['color']) ? 'value="'.$article['color'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['color'])) {  ?> <label for="color" generated="true" class="error"><?php echo $aControllerDatas['errors']['color']; ?></label> <?php } ?>
	</div>
</div>

<div class="row">
	<label>Logo</label>
	<div class="rowright">
		<select name="logo_id" id="InputLogo">
			<?php 
			foreach($aControllerDatas['guildelogo'] as $k => $v) {

				if(isset($article['logo_id']) && $article['logo_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
				
				?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
			} 
			?>
		</select>
	</div>
</div>
<div class="row">
	<label>Dicton de la guilde</label>
	<div class="rowright">
		<textarea cols="50" rows="2" name="dicton" id="InputDicton"><?php if(isset($article['dicton'])) { echo $article['dicton']; } ?></textarea>
		<?php if(isset($aControllerDatas['errors']['dicton'])) {  ?> <label for="content" generated="true" class="error"><?php echo $aControllerDatas['errors']['dicton']; ?></label> <?php } ?>
	</div>
</div>
<div class="row">
	<label>Presentation de la guilde</label>
	<div class="rowright">
		
		<textarea cols="50" rows="20" name="content" id="InputContent"><?php if(isset($article['content'])) { echo $article['content']; } ?></textarea>
		<?php if(isset($aControllerDatas['errors']['content'])) {  ?> <label for="content" generated="true" class="error"><?php echo $aControllerDatas['errors']['content']; ?></label> <?php } ?>
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