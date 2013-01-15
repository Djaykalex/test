<?php
	/**Lien JS pour activer le ckeditor **/
	$a = array (
		'ckfinder/ckfinder',
		'backoffice/costum',
		'ckeditor/ckeditor',
		'ckeditor/config',
	);
	js($a);
?>
<?php 
	if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; } 
?>
<?php 
	if(isset($guildes['isauth_id']) && $guildes['isauth_id'] != $_SESSION['user_id']) {
		header("location:".BASE_URL."/creation_guildes/fatal_erreur");
	}
	
/** je securise l'edition de guilde : en gros 
	- je parcours $aControllerDatas['isauthguildes'] qui contient la table guildes.
	- Si dans la table "guilde" il existe isauth_id et que isauth_id est different de l'user_id (qui correspond a l'id de la personne 
	connecter via la table isauth) je le redirige vers une page d'erreur.
	- Le but est d'eviter qu'une personne puisse changer de guilde en changeant l'id de la guilde via l'URL.
*/	
?>
<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles">Editer votre guilde !</div>

		<div class="text3">
			<span class="gras">Le système</span> des parties rapides <span class="gras">est simple</span> et vous permet <span class="gras">d'affronter un ou plusieurs joueurs </span>autour d'un jeu. </br><span class="gras">Le gagnant</span> de la partie <span class="gras">remporte alors un nombre de points</span>  (allant de 5 à 50 points en fonction des jeux, voir <a href="#" class="liens" title="système de points" >système de points</a>). </br> Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. </br>
			 </br>
			Début des parties rapides : 9h00.</br>
			Fin des parties rapides : 18h00.</br>
		</div>
		<a href="#" /><img  class="img4" src="<?php echo BASE_URL; ?>/img/banniereguilde.png" alt="" title="" /></a>
		<form class="creaguild" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildeEdit">
			<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
			<div class="row nom">
				<label>Nom de la guilde</label>
				<div class="rowright">
					<input type="text" name="name" id="InputName" <?php echo isset($guildes['name']) ? 'value="'.$guildes['name'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="rowt color" >
				<label>Choix de couleur</label>
				<div class="rowright">
					<select name="banniere_id" id="InputBanniere">
						<?php 
						foreach($aControllerDatas['guildeban'] as $k => $v) {
							if(isset($guildes['banniere_id']) && $guildes['banniere_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>
					<em class="image1"><img src="<?php echo BASE_URL; ?>/img/allbannieresnumeros2.gif" /></em>
				</div>
			</div>
			<div class="rowt logo" >
				<label>Votre logo</label>
				<div class="rowright">
					<select name="logo_id" id="InputRole">
						<?php 
						foreach($aControllerDatas['logo'] as $k => $v) {
							if(isset($guildes['logo_id']) && $guildes['logo_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
						} 
						?>
					</select>
					<em class="image2"><img src="<?php echo BASE_URL; ?>/img/all_logos.png" /></em>
				</div>
			</div>
			<div class="row dictonguilde">
				<label>Dicton de la guilde</label>
				<div class="rowright">
					<textarea cols="50" rows="2" name="dicton" id="InputDicton"><?php if(isset($guildes['dicton'])) { echo $guildes['dicton']; } ?></textarea>
					<?php if(isset($aControllerDatas['errors']['dicton'])) {  ?> <label for="content" generated="true" class="error"><?php echo $aControllerDatas['errors']['dicton']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row_content presentation">
				<label>Presentation de la guilde</label>
				<div class="rowright">
					<textarea cols="60" rows="20" name="content" id="InputContent"><?php if(isset($guildes['content'])) { echo $guildes['content']; } ?></textarea>
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
				<button type="submit" class="buttomvalider2"><span class="valid_edit_guildes">Mettre à jour la guilde</span></button>
			</div>
		</form>
	</div>
</div>
