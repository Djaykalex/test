<?php 
				
foreach($aControllerDatas['guildes2']as $k => $v) {
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $v['isauth_id'] ) {
		header("location:".BASE_URL."/creation_guildes/erreur");
	} else {
	
	} 
}
/**
le foreach permet de parcourir la table guilde et de verifier si user_id existe et si user_id est egal à isauth_id de la table guilde. 
Si c'est le cas, ca veut dire que la personne connectée a deja crée une guilde et il sera alors redirigé vers une page d'erreur. 
sinon il peut alors créer sa guilde. En sachant que seul les guild masters peuvent avoir acces à cette page 
*/
?>
<div class="grid_16 ">
	<div class="fondtext titrefond">
		<div class="titre">Creation de votre guilde !</div>
		<div class="soustitre"><span>Comment faire ?</span></div>
		<div class="text3">
			<span class="gras">Le système</span> des parties rapides <span class="gras">est simple</span> et vous permet <span class="gras">d'affronter un ou plusieurs joueurs </span>autour d'un jeu. </br><span class="gras">Le gagnant</span> de la partie <span class="gras">remporte alors un nombre de points</span>  (allant de 5 à 50 points en fonction des jeux, voir <a href="#" class="liens" title="système de points" >système de points</a>). </br> Après avoir fini, il vous est libre de recommencer une autre partie du même jeu ou d'en choisir un autre. </br>
			 </br>
			Début des parties rapides : 9h00.</br>
			Fin des parties rapides : 18h00.</br>
		</div>
		<a href="#" /><img  class="img4" src="<?php echo BASE_URL; ?>/img/banniereguilde.png" alt="" title="" /></a>
		<form class="creaguild" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildCreation">
			
			<?php if(isset($aControllerDatas['guildes'])) { $article = $aControllerDatas['guildes']; } ?>
			<?php if(isset($aControllerDatas['isauth'])) { $isauth = $aControllerDatas['isauth']; } ?>
			<div class="row nom">
				<label>Nom de la guilde</label>
				<div class="rowright">
					<input type="text" name="name" id="InputName" <?php echo isset($article['name']) ? 'value="'.$article['name'].'"' : ''; ?>>
					<?php if(isset($aControllerDatas['errors']['name'])) {  ?> <label for="name" generated="true" class="error"><?php echo $aControllerDatas['errors']['name']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="rowt color" >
				<label>Choix de couleur</label>
				<div class="rowright">
					<select name="banniere_id" id="InputBanniere">
						<?php 
						foreach($aControllerDatas['guildeban'] as $k => $v) {

							if(isset($article['banniere_id']) && $article['banniere_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							
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

							if(isset($article['logo_id']) && $article['logo_id'] == $k) { $selected = ' selected="selected"'; } else { $selected = ''; }
							
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
					<textarea cols="60" rows="2" name="dicton" id="InputDicton" <?php echo isset($article['dicton']) ? 'value="'.$article['dicton'].'"' : ''; ?>></textarea>
					<?php if(isset($aControllerDatas['errors']['dicton'])) {  ?> <label for="dicton" generated="true" class="error"><?php echo $aControllerDatas['errors']['dicton']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row presentation">
				<label>Présentation de la guilde</label>
				<div class="rowright">
					<textarea cols="60" rows="15" name="content" id="InputContent" <?php echo isset($article['content']) ? 'value="'.$article['content'].'"' : ''; ?>></textarea><em class="textdescription"></br><span>Idée de présentation : Et 
					est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum.</span></em>
					<?php if(isset($aControllerDatas['errors']['content'])) {  ?> <label for="content" generated="true" class="error"><?php echo $aControllerDatas['errors']['content']; ?></label> <?php } ?>
				</div>
			</div>
			<div class="row">
				<label></label>
				<div class="rowright">
					<input type="hidden" name="isauth_id" id="InputIsauth" value="<?php echo $_SESSION['user_id'];?>" >
					
				</div>
			</div>
			<div class="row">
				<button class="submit" type="submit" class="medium grey buttom"><span>Création de la guilde</span></button>
			</div>
		</form>
	</div>
	<div class="fintext"></div>

</div>
