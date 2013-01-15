<?php if(isset($aControllerDatas['membres'])) { $article = $aControllerDatas['membres'];}?>
<?php if(isset($aControllerDatas['guildemembre'])) { $guildemembre = $aControllerDatas['guildemembre'];}?>
<?php if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes'];}?>

<div class="grid_16 background_blanc ">
	<div class="fondtext">
		<div class="titre_gestion_compte">Gestion du compte <?php echo $_SESSION['user_pseudo']; ?> !</div>
	</div>
	
	<form class="form_compte"enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="comptesEdit">
		<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
		<div class="rowstyle">
			<label class="label">Nom</label>
			<div class="rowright">
				<input class="imput_size" type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
				<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
			</div>
		</div>
		<div class="rowstyle">
			<label class="label">Prenom</label>
			<div class="rowright">
				<input class="imput_size" type="text" name="prenom" id="InputPrenon" <?php echo isset($article['prenom']) ? 'value="'.$article['prenom'].'"' : ''; ?>>
				<?php if(isset($aControllerDatas['errors']['prenom'])) {  ?> <label for="prenom" generated="true" class="error"><?php echo $aControllerDatas['errors']['prenom']; ?></label> <?php } ?>
			</div>
		</div>
		<div class="rowstyle">
			<label class="label">Votre Login (adresse mail)</label>
			<div class="rowright">
				<input class="imput_size" type="text" name="login" id="InputLogin" <?php echo isset($article['login']) ? 'value="'.$article['login'].'"' : ''; ?>>
				<?php if(isset($aControllerDatas['errors']['login'])) {  ?> <label for="login" generated="true" class="error"><?php echo $aControllerDatas['errors']['login']; ?></label> <?php } ?>
			</div>
		</div>
		<div class="rowstyle">
			<label class="label">Mot de pass</label>
			<div class="rowright">
				<input class="imput_size" type="text" name="pass" id="InputPass" <?php echo isset($article['pass']) ? 'value="'.$article['pass'].'"' : ''; ?>>
				<?php if(isset($aControllerDatas['errors']['pass'])) {  ?> <label for="pass" generated="true" class="error"><?php echo $aControllerDatas['errors']['pass']; ?></label> <?php } ?>
			</div>
		</div>
		<div class="rowstyle">
			<label class="label">Pseudo</label>
			<div class="rowright">
				<input class="imput_size" type="text" name="pseudo" id="InputPseudo" <?php echo isset($article['pseudo']) ? 'value="'.$article['pseudo'].'"' : ''; ?>>
				<?php if(isset($aControllerDatas['errors']['pseudo'])) {  ?> <label for="pseudo" generated="true" class="error"><?php echo $aControllerDatas['errors']['pseudo']; ?></label> <?php } ?>
			</div>
		</div>
		<?php // attention permettre de changer le role du joueur est un risque. (si il existe deja un Guild Master.) Peu etre rajouter plus tard un role comme assistant guild master ?>
		<div class="rowstyle">
			<label class="label">Role du joueur </label>
			<div class="rowrights">
			
			<select name="role_id" id="InputRole">
				<?php 
				foreach($aControllerDatas['rolemembre'] as $k => $v) {

					if(isset($article['role_id']) && $article['role_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
					
					?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
				} 
				?>
			</select>	
			</div>
		</div>
		<div>ATTENTION !! Pour que votre changement de rôle s'effectue correctement vous devrez vous deconnecter et vous reconnecter</div>
		
		<?php // Si c'est un MEMBRE on affiche le select d'en dessous.  
		if(isset($_SESSION['role']) && $_SESSION['role'] == 2 ){
		?>
		<div class="rowstyle">
			<label class="label">Guildes</label>
			<div class="rowrights ">
			
			<select name="guildes_id" id="InputGuilde">
				<?php 
				foreach($aControllerDatas['guildemembre'] as $k => $v) {

					if(isset($article['guildes_id']) && $article['guildes_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
					
					?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
				} 
				?>
			</select>	
			</div>
		</div>
		<div>ATTENTION !! Pour que votre changement de guilde s'effectue correctement vous devrez vous deconnecter et vous reconnecter</div>
		<?php } ?> 
		
		<div class="rowstyle">
			<button type="submit" class="buttomvalider"><span class="validation">Modifier</span></button>
		</div>
	</form>
	<img class="modif_compte_logo" src="<?php echo BASE_URL;?>/img/logo-fury-game.png" title="logo fury-game" alt="logo fury-game" />
</div>



	


