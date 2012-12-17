<div class="grid_12 ">
	<div class="fondtext ban">
		<div class="titre">Création de votre guilde !</div>

		<div class="text">
			Voici en avant première les 4 classes du Survivor Series !
			2 classes au CAC et 2 classes Ranged DPS, de quoi rendre la partie plus exitante.
		</div>
		<a href="#" /><img  class="img4" src="<?php echo BASE_URL; ?>/img/banniereguilde.png" alt="" title="" /></a>
		
		<form class="creaguild" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildCreation">
			
			<?php if(isset($aControllerDatas['guildes'])) { $article = $aControllerDatas['guildes']; } ?>
			
			<div class="row nom">
				<label>Nom de la guilde</label>
				<div class="rowright">
					<input type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
				</div>
			</div>

			<div class="row color">
				<label>Choix de couleur</label>
				<div class="rowright">
					<input type="text" name="color" id="InputColor" value=""<?php echo isset($article['color']) ? 'value="'.$article['color'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['color'])) {  ?> <label for="color" generated="true" class="error"><?php echo $aControllerDatas['errors']['color']; ?></label> <?php } ?>
				</div>
			</div>
			
			<div class="row logo" >
				<label>Votre logo</label>
				<div class="rowright">
				
				<select name="logo_id" id="InputRole">
					<?php 
					foreach($aControllerDatas['guildemembre'] as $k => $v) {

						if(isset($article['logo_id']) && $article['logo_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
						
						?><option<?php echo $selected; ?> value="<?php echo $k; ?>"><?php echo $v; ?></option><?php 
					} 
				
					?>
				</select>
				
					
				</div>
			</div>
			<div class="row presentation">
				<label>Présentation de la guilde</label>
				<div class="rowright">
					
					<textarea cols="70" rows="15" name="presentation" id="InputPresentation" <?php echo isset($article['presentation']) ? 'value="'.$article['presentation'].'"' : ''; ?>></textarea>
					<?php if(isset($aControllerDatas['errors']['presentation'])) {  ?> <label for="presentation" generated="true" class="error"><?php echo $aControllerDatas['errors']['presentation']; ?></label> <?php } ?>
				</div>
			</div>
			
			<div class="row">
				<button type="submit" class="medium grey buttom"><span>Création de la guilde</span></button>
			</div>
		</form>
	</div>
	<div class="fintext"></div>
	
			<?php
				$guildemembre = $aControllerDatas['guildemembre'];
				
				foreach ($aControllerDatas['guildes'] as $k => $v){  ?>

			<a href="#" /><img  class="img4" src="<?php echo BASE_URL; ?>/img/banniereguilde.png" alt="" title="" /><?php echo BASE_URL."/".$guildemembre[$v['logo_id']];?> </a><?php } ?>
			                 
</div>