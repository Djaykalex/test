<?php if(isset($aControllerDatas['jeux_demos'])) { $jeux_demos = $aControllerDatas['jeux_demos']; }else {$jeux_demos = array(); };?>

<!-- Titre du jeu-->
<?php echo form_input('title_image', "Titre du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- L'alt de l'image-->
<?php echo form_input('alt_image', "Alt de de l'image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Le front de l'image-->
<?php echo form_input('front_image', "Lien de l'image" , array('type' => 'textarea', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Lien de l'éditeur-->
<?php echo form_input('lien_editeur', "Lien du site de l'éditeur" , array('type' => 'textarea', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Resume du jeu en démo-->
<?php echo form_input('description', "Resume du jeu" , array('type' => 'textarea',  'class' => 'maclass',  'errors' => $aControllerDatas['errors'], 'values' => $jeux_demos, 'wysiswyg' => true, 'cols' => 50, 'rows' => 20,)); ?>

<!-- L'age pour le jeu-->
<?php echo form_input('age', "age pour le jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- La durée du jeu-->
<?php echo form_input('duree', "age pour le jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Le nombre de joueurs-->
<?php echo form_input('nb_joueurs', "age pour le jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>


<div class="rowx">
	<button type="submit" class="medium grey"><span>Valider</span></button>
</div>
