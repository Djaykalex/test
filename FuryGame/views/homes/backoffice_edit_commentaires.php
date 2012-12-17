<?php if(isset($aControllerDatas['commentaires'])) { $article = $aControllerDatas['commentaires']; } ?>
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
						
						<textarea cols="60" rows="10" name="content" id="InputContent"><?php if(isset($article['content'])) { echo $article['content']; } ?></textarea>
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
							<input type="hidden" value="0" name="online" id="InputOnlineHidden">
							<input type="checkbox" value="1" name="online" id="InputOnline" <?php echo isset($article['Online']) && $article['Online'] ? 'checked="checked"' : ''; ?>>
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




