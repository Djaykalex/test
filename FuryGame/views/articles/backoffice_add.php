<div class="section">
	<div class="box">
		<div class="title">
			<h2>Ajouter un article</h2>
		</div>
		<div class="content nopadding">
			<?php echo form_create(array(
				'enctype' => "multipart/form-data",
				'method' => "post", 
				'action' => $_SERVER['PHP_SELF'], 
				'id' => "ArticleAdd"
				));
			?>
				<?php include(ELEMENTS.DS.'backoffice'.DS.'formulaires'.DS.'articles.php'); ?>
			<?php echo form_close(); ?>
			
		</div>
	</div>
</div>
