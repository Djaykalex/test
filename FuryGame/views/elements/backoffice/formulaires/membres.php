<?php if(isset($aControllerDatas['membres'])) { $article = $aControllerDatas['membres']; } ?>




<div class="row">
	<label>Nom</label>
	<div class="rowright">
		<input class="bloc" type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
	</div>
</div>
<div class="row">
	<label>Prenom</label>
	<div class="rowright">
		<input type="text" name="prenom" id="InputPrenon" <?php echo isset($article['prenom']) ? 'value="'.$article['prenom'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['prenom'])) {  ?> <label for="prenom" generated="true" class="error"><?php echo $aControllerDatas['errors']['prenom']; ?></label> <?php } ?>
	</div>
</div>
<div class="row">
	<label>Votre Login </br>(adresse mail)</label>
	<div class="rowright">
		<input type="text" name="login" id="InputLogin" <?php echo isset($article['login']) ? 'value="'.$article['login'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['login'])) {  ?> <label for="login" generated="true" class="error"><?php echo $aControllerDatas['errors']['login']; ?></label> <?php } ?>
	</div>
</div>
<div class="row">
	<label>Mot de pass</label>
	<div class="rowright">
		<input type="text" name="pass" id="InputPass" <?php echo isset($article['pass']) ? 'value="'.$article['pass'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['pass'])) {  ?> <label for="pass" generated="true" class="error"><?php echo $aControllerDatas['errors']['pass']; ?></label> <?php } ?>
	</div>
</div>
<div class="row">
	<label>Pseudo</label>
	<div class="rowright">
		<input type="text" name="pseudo" id="InputPseudo" <?php echo isset($article['pseudo']) ? 'value="'.$article['pseudo'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['pseudo'])) {  ?> <label for="pseudo" generated="true" class="error"><?php echo $aControllerDatas['errors']['pseudo']; ?></label> <?php } ?>
	</div>
</div>
<!--<div class="row">
	<label>Guildes</label>
	<div class="rowrights ">
	
	<select name="guilde_id" id="InputGuilde">
		<?php 
		foreach($aControllerDatas['guildemembre'] as $k => $v) {

			if(isset($article['guilde_id']) && $article['guilde_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
			
			?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
		} 
		?>
	</select>	
	</div>
</div>
-->
<div class="row">
	<label>isauth </br>(1 à 9)</label>
	<div class="rowright">
		<input type="text" name="isauth" id="InputIsauth" <?php echo isset($article['isauth']) ? 'value="'.$article['isauth'].'"' : ''; ?>>
		<?php if(isset($aControllerDatas['errors']['isauth'])) {  ?> <label for="isauth" generated="true" class="error"><?php echo $aControllerDatas['errors']['isauth']; ?></label> <?php } ?>
	</div>
</div>


<div class="row">
	<label>Role du joueur </label>
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
	
<div class="rowx">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>