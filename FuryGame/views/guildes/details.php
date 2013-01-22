<?php 
	/** affichage des infos de la guilde **/
	if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes']; } 
	if(isset($aControllerDatas['guilde'])) { $guilde = $aControllerDatas['guilde']; } 
	if(isset($aControllerDatas['guildeban'])) { $guildeban = $aControllerDatas['guildeban']; } 
	if(isset($aControllerDatas['isauthguilde'])) { $isauth = $aControllerDatas['isauthguilde']; } 
	if(isset($aControllerDatas['isauthguildes'])) { $isauthguildes = $aControllerDatas['isauthguildes']; }
	if(isset($aControllerDatas['membres'])) { $membres = $aControllerDatas['membres']; } 
	if(isset($aControllerDatas['guildelogo'])) { $guildelogo = $aControllerDatas['guildelogo']; } 
	/** commentaires **/
	if(isset($aControllerDatas['commentaire_nbr'])) { $com = $aControllerDatas['commentaire_nbr']; } /**Nombre de commentaires sur la page */
	if(isset($aControllerDatas['affichage_commentaires'])) { $affichage_commentaires = $aControllerDatas['affichage_commentaires'];} /**Affiche les commentaires avec pseudo et guilde de l'auteur */
	if(isset($aControllerDatas['lien_guilde_commentaires'])) { $lien_guilde_commentaires = $aControllerDatas['lien_guilde_commentaires']; } /**Enregistre le commentaire dans la bonne guilde */
	if(isset($aControllerDatas['pseudo_auteur'])) { $pseudo_auteur = $aControllerDatas['pseudo_auteur']; } /**Enregistre le pseudo de l'auteur du commentaire */
	if(isset($aControllerDatas['auteur_guilde_guildMaster'])) { $auteur_guilde_guildMaster = $aControllerDatas['auteur_guilde_guildMaster'];} /**Enregistre le nom de la guilde de l'auteur du commentaire en tant que GuildMaster */
	if(isset($aControllerDatas['auteur_guilde_membre'])) { $auteur_guilde_membre = $aControllerDatas['auteur_guilde_membre'];} /**Enregistre le nom de la guilde de l'auteur du commentaire en tant que membre */
	if(isset($aControllerDatas['content_Commentaires'])) { $content_commentaires = $aControllerDatas['content_Commentaires'];} /**Enregistre le contenu du commentaire */
 ?>
<div class="grid_16 background_blanc">
	<div class="fondtext">
		<div class="titre_details_articles">Bienvenue sur la guilde <?php echo $guildes['name']; ?>!</div>
		<form class="form_compte" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="GuildeEdit">
			<div class="grid_5" style="margin-top: 570px;">
				<div class="gestion_guilde_banniere_test">
					<img class="foin3" src="<?php echo BASE_URL; ?>/img/foin2.png" />
					<img class=""id="logoguilde10" src="<?php echo BASE_URL."/".$guildelogo[$guildes['logo_id']];?>" />
					<img class=""id="logoguilde9" src="<?php echo BASE_URL."/".$guildeban[$guildes['banniere_id']];?>" />
				</div>
			</div>
			<div class="grid_9">
				<div class="dictonedit">
					<label class="titre_guilde">Nom de la guilde : </label>
					<div class="nomguilde"><?php echo $guildes['name']; ?></div>
				</div>
				<div class="dictonedit">
					<label class="titre_guilde">Le dicton de la guilde : </label>
					<div class="dicton2"><?php echo $guildes['dicton']; ?></div>
				</div>
				<div class="description2">
					<label class="titre_guilde">Présentation : </label>
					<div class="text_gestion_guildes"><?php echo $guildes['content']; ?></div>
				</div>
				<div class="description3">
					<label class="titre_guilde">Liste des membres : </label>
					<div class="text_gestion_guildes"><span>Guilde master :  </span><?php echo $isauth[$guildes['isauth_id']]; ?></div>
					<!--<div class="text_gestion_guildes"><?php foreach ($membres as $k => $v) { echo $v."<br />"; } ?></div>-->
					<div class="text_gestion_guildes"><span>Membres : </span></div>
					<div class="text_gestion_guildes"><?php foreach ($guilde as $k => $v) { ?> - <?php echo $v."<br />"; } ?></div>
				</div>
			</div>
		</form>
	</div>
	<!-- Commentaires --> 
	<div >				
		<!-- Nbr de commentaires --> 
		<div class="titrecommentaires titre_com">Commentaire(s) : <?php  foreach($com as $k => $v) { echo $v;}?></div>
	</div>
	<!-- Affichage des commentaires -->
	<div class="commentaires">
		<?php 
		foreach ($affichage_commentaires as $k => $v){ ?>
			<div class="com"> 
				<div class="auteur_commentaires"><?php echo $isauth[$v['isauth_id']]; ?> 
					<span class="auteur_guildes"> <?php echo '['.$v['guildes_focus_id'].']' ;?></span>
				</div>
				<div class="contentcommentaires"><?php echo $v['content']; ?></div>
			</div>
		<?php } ;?>
	</div> 
	<!-- Creation du commentaire --> 
	
	<?php if(isset($_SESSION['user_id'])) {   ?>
	<form class="form" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="Commentaires_Guildes">
		<div class="row">
			<img class="ico_commentaire" src="<?php echo BASE_URL; ?>/img/ico_commentaire.png" alt="" title="" />
			<label class="ajouter_commentaire">Ajouter un commentaire</label>
			<div class="rowright">
				<input type="hidden" value="<?php echo $lien_guilde_commentaires['id']; ?>" name="guildes_id" id="InputIdHidden"> 
				<?php /**  name= guildes_id est l'endroit où l'on a écrit le commentaire !!!
				L'input de type hidden au dessus va permettre d'enregistrer le commentaire dans le bon article id et l'enregistre dans le champ article_id de la table commentaires, sans ça le commentaire risque d'apparaitre dans tous les articles */ ?>
				<input type="hidden" value="0" name="online" id="InputonlineHidden">
				<?php /** l'input de type hidden au dessus va permettre d'enregistrer le commentaire dans la table SQL avec une valeur de 0 pour le champ Online, ce qui signifie qu'il ne sera pas directement publier.*/ ?>
				
				<?php /** enregistrement du nom de l'auteur*/?>
				<?php foreach ($aControllerDatas['pseudo_auteur'] as $k => $v){ ?>
						<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="isauth_id" id="InputIsauthIdHidden">
						<?php /** name= isauth_id est le pseudo de l'auteur !!!
						l'input de type hidden au dessus va permettre d'enregistrer la $_SESSION['user_id'] qui correspond au pseudo de l'auteur et l'enregistre dans le champ isauth_id de la table commentaires */ ?>
				<?php  }?>
				
				<?php /** enregistrement du nom de la guilde de l'auteur */?>
				<?php 
					if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
					/** enregistrement du nom de la guilde de l'auteur pour un GuildMaster*/
						foreach ($auteur_guilde_guildMaster as $k => $v){ ?>
							<input type="hidden" value="<?php echo $v; ?>" name="guildes_focus_id" id="InputGuildesFocusIdHidden">
							<?php /** name= guildes_focus_id est le nom de la guilde de l'auteur !!!
							l'input de type hidden au dessus va permettre d'enregistrer la $_SESSION['user_id'] qui correspond au pseudo de l'auteur et l'enregistre dans le champ isauth_id de la table commentaires */ ?>
						
						<?php }
					} else {
						/** enregistrement du nom de la guilde de l'auteur pour un membre*/
						foreach ($auteur_guilde_membre as $k => $v){ ?>
							<input type="hidden" value="<?php echo $v; ?>" name="guildes_focus_id" id="InputGuildesFocusIdHidden"> 
							<?php /** name= guildes_focus_id est le nom de la guilde de l'auteur !!!
							l'input de type hidden au dessus va permettre d'enregistrer la $_SESSION['user_id'] qui correspond au pseudo de l'auteur et l'enregistre dans le champ isauth_id de la table commentaires */ ?>
						
						<?php }
					}	
				?>
				<textarea cols="60" rows="10" name="content" id="InputContent"><?php if(isset($content_commentaires['content'])) { echo $content_commentaires['content']; } ?></textarea>
				<?php if(isset($aControllerDatas['errors']['content'])) {  ?> <label for="content" generated="true" class="error"><?php echo $aControllerDatas['errors']['content']; ?></label> <?php } ?>
			</div>
			<div class="row">
				<button type="submit" class="superbutton">Envoyer</button>
			</div>
		</div>
	</form>
	<?php }?>
	<a class="retour" href="<?php echo BASE_URL; ?>/guildes/list_guildes"><img  src="<?php echo BASE_URL; ?>/img/retour.png" /></a>
</div>

