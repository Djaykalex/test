<?php if(isset($aControllerDatas['jeux_demos'])) { $jeux_demos = $aControllerDatas['jeux_demos']; }else {$jeux_demos = array(); };?>

<!-- Titre du jeu-->
<?php echo form_input('title_image', "Titre du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'title_image', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- L'alt de l'image-->
<?php echo form_input('alt_image', "Alt de de l'image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'alt_image', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Le front de l'image-->
<?php echo form_input('front_image', "Lien de l'image" , array('type' => 'textarea', 'class' => 'maclass', 'name' => 'front_image', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Lien de l'éditeur-->
<?php echo form_input('lien_editeur', "Lien du site de l'éditeur" , array('type' => 'textarea', 'class' => 'maclass', 'name' => 'lien_editeur', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Resume du jeu en démo-->
<?php echo form_input('description', "Resume du jeu" , array('type' => 'textarea',  'class' => 'maclass',  'errors' => $aControllerDatas['errors'], 'values' => $jeux_demos, 'wysiswyg' => true, 'cols' => 50, 'rows' => 20,)); ?>

<!-- L'age pour le jeu-->
<?php echo form_input('age', "age pour le jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'age', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- La durée du jeu-->
<?php echo form_input('duree', "Duree du jeu" , array('type' => 'text', 'class' => 'maclass', 'name' => 'duree', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<!-- Le nombre de joueurs-->
<?php echo form_input('nb_joueurs', "Nombre de joueurs" , array('type' => 'text', 'class' => 'maclass', 'name' => 'nb_joueurs', 'errors' => $aControllerDatas['errors'],'values' => $jeux_demos  )); ?>

<?php echo form_close(); ?>
