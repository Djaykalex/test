<?php if(isset($aControllerDatas['jeux_tournois'])) { $jeux_tournois = $aControllerDatas['jeux_tournois']; }else {$jeux_tournois = array(); };?>

<!-- L'image du jeu-->
<?php echo form_input('front_image', "L'image du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'front_image', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- Titre du jeu-->
<?php echo form_input('title_image', "Titre du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'title_image', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- L'alt de l'image-->
<?php echo form_input('alt', "Alt de l'image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'alt', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- Boite de l'image-->
<?php echo form_input('boite', "boite de l'image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'boite', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--la 1er image-->
<?php echo form_input('img1', "la 1er image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'img1', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--la 2eme image-->
<?php echo form_input('img2', "la 2eme image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'img2', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--la 3eme image-->
<?php echo form_input('img3', "la 3eme image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'img3', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--la 4eme image-->
<?php echo form_input('img4', "la 4eme image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'img4', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- Lien de l'éditeur-->
<?php echo form_input('lien_editeur', "Lien du site de l'éditeur" , array('type' => 'textarea', 'class' => 'maclass', 'name' => 'lien_editeur', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--le nom du jeu-->
<?php echo form_input('name', "Nom du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--le focus-->
<?php echo form_input('focus', "Petit resumé" , array('type' => 'text', 'class' => 'maclass', 'name' => 'focus', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- Description du jeu en démo-->
<?php echo form_input('description', "Description du jeu" , array('type' => 'textarea',  'class' => 'maclass',  'errors' => $aControllerDatas['errors'], 'values' => $jeux_tournois, 'wysiswyg' => true, 'cols' => 50, 'rows' => 20,)); ?>

<!-- Content du jeu en démo-->
<?php echo form_input('content', "Contenu du jeu" , array('type' => 'textarea',  'class' => 'maclass',  'errors' => $aControllerDatas['errors'], 'values' => $jeux_tournois, 'wysiswyg' => true, 'cols' => 50, 'rows' => 20,)); ?>

<!-- L'age pour le jeu-->
<?php echo form_input('age', "age pour le jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'age', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- La durée du jeu-->
<?php echo form_input('duree', "Duree du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'duree', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!-- Le nombre de joueurs-->
<?php echo form_input('nb_joueurs', "Nombre de joueurs" , array('type' => 'text', 'class' => 'maclass', 'name' => 'nb_joueurs', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--l'image du jeu-->
<?php echo form_input('image', "l'image du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'image', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--lien du jeu-->
<?php echo form_input('liens', "Lien du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'liens', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--TFG-->
<?php echo form_input('tfg', "Commentaire TFG" , array('type' => 'text', 'class' => 'maclass', 'name' => 'tfg', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--Nombre de points-->
<?php echo form_input('nb_points', "image des Points" , array('type' => 'text', 'class' => 'maclass', 'name' => 'nb_points', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--Nombre de points classement-->
<?php echo form_input('nb_points_class', "Points classement" , array('type' => 'text', 'class' => 'maclass', 'name' => 'nb_points_class', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>

<!--lien points des jeux-->
<?php echo form_input('liens_nb_points', "Lien points jeux" , array('type' => 'text', 'class' => 'maclass', 'name' => 'liens_nb_points', 'errors' => $aControllerDatas['errors'],'values' => $jeux_tournois  )); ?>


<?php echo form_close(); ?>
