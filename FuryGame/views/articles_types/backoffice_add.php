<div class="section">
	<div class="box">
		<div class="title">
			<h2>Ajouter un type d'article</h2>
		</div>
		<div class="content nopadding">
			
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="ArticleEdit">
			<?php include(ELEMENTS.DS.'backoffice'.DS.'formulaires'.DS.'articles_types.php'); ?>
			</form>
		</div>
	</div>
</div>
