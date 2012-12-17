<?php if(isset($aControllerDatas['commentaires_guildes'])) { $com_guildes = $aControllerDatas['commentaires_guildes']; } ?>
<div class="section">
	<div class="box">
		<div class="title">
			<h2>Editer un Commentaire</h2>
		</div>
		<div class="content nopadding">
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
				<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
				<div class="row">
				
					<div class="rowright">
						
						<textarea cols="60" rows="10" name="content" id="InputContent"><?php if(isset($com_guildes['content'])) { echo $com_guildes['content']; } ?></textarea>
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
					<div class="row">
						<label></label>
						<div class="rowright">
							<input type="hidden" value="0" name="online" id="InputonlineHidden">
							<input type="checkbox" value="1" name="online" id="Inputonline" <?php echo isset($com_guildes['online']) && $com_guildes['online'] ? 'checked="checked"' : ''; ?>>
							<label for="InputOnline">En ligne</label>
						</div>
					</div>
					<div class="row">
					<button type="submit" class="medium grey"><span>Valider</span></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>




