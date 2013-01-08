<div class="section">
	<div class="box">
		<div class="title">
			<h2>Ajouter un article</h2>
		</div>
		<div class="content nopadding">
			<?php echo form_create(array(
				'enctype' => "multipart/form-data",
				'method' => "post", 
				'action' => $_SERVER['REQUEST_URI'], 
				'id' => "ArticleAdd"
				));
			?>
			<?php include(ELEMENTS.DS.'backoffice'.DS.'formulaires'.DS.'articles.php'); ?>
		</div>
	</div>
</div>
