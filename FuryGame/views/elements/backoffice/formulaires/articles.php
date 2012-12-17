<?php if(isset($aControllerDatas['articles'])) { $article = $aControllerDatas['articles']; }else {$article = array(); };?>

<!-- Nom de l'article-->
<?php echo form_input('name', "Titre de l'article" , array('type' => 'text', 'class' => 'maclass', 'name' => 'name', 'errors' => $aControllerDatas['errors'],'values' => $article  )); ?>

<!-- Le type de l'article-->
<?php echo form_input('articles_type_id', "Type d'article" , array('type' => 'select',  'class' => 'maclass', 'name' => 'articles_type_id', 'errors' => $aControllerDatas['errors'], 'values' => $article, 'datas' => $aControllerDatas['articlesTypesList'])); ?>

<!-- Nom de l'auteur-->
<?php echo form_input('created_by', "created_by" , array('type' => 'hidden_auteur', 'class' => 'maclass', 'name' => 'created_by', 'errors' => $aControllerDatas['errors'],'values' => $_SESSION['user_pseudo']  )); ?>

<!-- image caroussel de l'article
<?php echo form_input('icone', "image de l'article" , array('type' => 'text_icone', 'class' => 'maclass', 'name' => 'icone', 'errors' => $aControllerDatas['errors'],'values' => $article  )); ?>
-->

<!-- titre de l'image de l'article-->
<?php echo form_input('title', "titre de l'image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'title', 'errors' => $aControllerDatas['errors'],'values' => $article  )); ?>

<!-- image caroussel de l'article-->
<?php echo form_input('icone', "image de l'article" , array('type' => 'text_icone', 'class' => 'maclass', 'name' => 'icone', 'errors' => $aControllerDatas['errors'],'values' => $article  )); ?>

<!-- petite image de l'article-->
<?php echo form_input('petit_icone', "petite image de l'article" , array('type' => 'text_petite_image', 'class' => 'maclass', 'name' => 'petit_icone', 'errors' => $aControllerDatas['errors'],'values' => $article  )); ?>

<!-- alt de l'image de l'article-->
<?php echo form_input('alt', "alt de l'image" , array('type' => 'text', 'class' => 'maclass', 'name' => 'alt', 'errors' => $aControllerDatas['errors'],'values' => $article  )); ?>

<!-- Resume de l'article-->
<?php echo form_input('resume', "Resume de l'article" , array('type' => 'textarea',  'class' => 'maclass',  'errors' => $aControllerDatas['errors'], 'values' => $article, 'wysiswyg' => true, 'cols' => 50, 'rows' => 20,  )); ?>

<!-- Le contenu de l'article-->
<?php echo form_input('content', "Texte" , array('type' => 'textarea',  'class' => 'maclass',  'errors' => $aControllerDatas['errors'], 'values' => $article, 'wysiswyg' => true, 'cols' => 50, 'rows' => 20,  )); ?>

<!-- Article en ligne ou pas -->
<?php echo form_input('Online', "" , array('type' => 'checkbox',  'class' => 'maclass', 'errors' => $aControllerDatas['errors'], 'values' => $article, 'label_bis' => 'En ligne')); ?>



