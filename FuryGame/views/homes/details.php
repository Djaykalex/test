<?php if(isset($aControllerDatas['paginationCommentaires'])) { $paginationCommentaires = $aControllerDatas['paginationCommentaires'];}?>
<?php if(isset($aControllerDatas['article'])) { $article = $aControllerDatas['article']; } ?>
<?php if(isset($aControllerDatas['isauth'])) { $isauth = $aControllerDatas['isauth']; } /**isauth = pseudo */ ?>
<?php if(isset($aControllerDatas['isauth2'])) { $isauth2 = $aControllerDatas['isauth2']; } /**isauth2 = nom */?>
<?php if(isset($aControllerDatas['commentaire_nbr'])) { $com = $aControllerDatas['commentaire_nbr']; } ?>
<?php if(isset($aControllerDatas['articlesTypesList'])) { $articlesTypesList = $aControllerDatas['articlesTypesList']; } ?>
<?php if(isset($aControllerDatas['guildes'])) { $guildes = $aControllerDatas['guildes'];}?>
<?php if(isset($aControllerDatas['guildes2'])) { $guildes2 = $aControllerDatas['guildes2'];}?>

<div class="grid_16 ">
	<div class="fondtext titrefond">
		<div class="titre"><?php echo $article['name']; ?></div>
		<div class="typearticle"><?php echo $articlesTypesList[$article['articles_type_id']]; ?></div>
		 <div class="text"><?php echo $article['content']; ?></div>
	</div>
	<!-- Commentaires --> 
	<!-- Nbr de commentaires --> 
	<div >					
		<div class="titrecommentaires titre_com">Commentaire(s) : <?php  foreach($com as $k => $v) { echo $v;}?></div>
	</div>
	<!-- Affichage des commentaires -->
	<div class="commentaires">
		<?php 
		foreach ($paginationCommentaires as $k => $v){ ?>
			<div class="com"> 
				<div class="auteur_commentaires"><?php echo $isauth[$v['isauth_id']]; ?> <span class="auteur_guildes"><?php if(isset($guildes[$v['guildes_id']])) 
				{echo '['.$guildes[$v['guildes_id']].']'; } else { echo "[Pas de uilde]";}?></span></div>
				<?php /** affiche le pseudo de l'auteur et le nom de sa guilde, se sont des membres */?>

				<div class="contentcommentaires"><?php echo $v['content']; ?></div>
			</div>
		<?php } ?>
	</div> 
	
	<!-- Creation du commentaire --> 
	
	<?php if(isset($aControllerDatas['commentaires'])) { $commentaires = $aControllerDatas['commentaires']; } ?>
	<?php if(isset($_SESSION['user_id'])) {   ?>
	<form class="form" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="Commentaires">
		<div class="row">
			<img class="ico_commentaire" src="<?php echo BASE_URL; ?>/img/ico_commentaire.png" alt="" title="" />
			<label class="ajouter_commentaire">Ajouter un commentaire</label>
			<div class="rowright">
				<input type="hidden" value="<?php echo $article['id'];?>" name="article_id" id="InputArticleIdHidden">
				<?php /** L'input de type hidden au dessus va permettre d'enregistrer le commentaire dans le bon article id et l'enregistre dans le champ article_id de la table commentaires, sans ça le commentaire risque d'apparaitre dans tous les articles */ ?>
				<input type="hidden" value="0" name="online" id="InputOnlineHidden">
				<?php /** l'input de type hidden au dessus va permettre d'enregistrer le commentaire dans la table SQL avec une valeur de 0 pour le champ Online, ce qui signifie qu'il ne sera pas directement publier.*/ ?>
				
				<?php /** enregistrement du nom de l'auteur*/?>
				<?php foreach ($aControllerDatas['isauth2'] as $k => $v){ ?>
						<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="isauth_id" id="InputIsauthIdHidden">
						<?php /** l'input de type hidden au dessus va permettre d'enregistrer la $_SESSION['user_id'] qui correspond au pseudo de l'auteur et l'enregistre dans le champ isauth_id de la table commentaires */ ?>
				<?php  }?>
				
				<?php /** enregistrement du nom de la guilde de l'auteur pour un membre*/?>
				<?php foreach ($aControllerDatas['isauth2'] as $k => $v){ ?>
						<input type="hidden" value="<?php echo $_SESSION['guildes']; ?>" name="guildes_id" id="InputIsauthIdHidden">
						<?php /** l'input de type hidden au dessus va permettre d'enregistrer la $_SESSION['guildes'] qui correspond a la guilde de l'auteur et l'enregistre dans le champ guildes_id de la table commentaires */ ?>
				<?php  }?>
				
				<?php /** enregistrement du nom de la guilde de l'auteur pour un Guild Master*/?>
				<?php foreach ($aControllerDatas['guildes2'] as $k => $v){ ?>
						
						<input type="hidden" value="<?php echo $v['id']; ?>" name="guildes_id" id="InputIsauthIdHidden">
						<?php /** l'input de type hidden au dessus va permettre d'enregistrer la $_SESSION['guildes'] qui correspond a la guilde de l'auteur et l'enregistre dans le champ guildes_id de la table commentaires */ ?>
				<?php  }?>
				
				<textarea cols="60" rows="10" name="content" id="InputContent"><?php if(isset($commentaires['content'])) { echo $commentaires['content']; } ?></textarea>
				<?php if(isset($aControllerDatas['errors']['content'])) {  ?> <label for="content" generated="true" class="error"><?php echo $aControllerDatas['errors']['content']; ?></label> <?php } ?>
				
			</div>
			<div class="row">
				<button type="submit" class="buttomvalider"><span class="validation">Ajouter</span></button>
			</div>
		</div>
	</form>
	<?php }?>
</div>



	