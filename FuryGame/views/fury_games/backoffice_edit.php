<div class="section">
	<div class="box">
		<div class="title">
			<h2>Editer un article</h2>
		</div>
		<div class="content nopadding">
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
				<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
				<?php include(ELEMENTS.DS.'backoffice'.DS.'formulaires'.DS.'jeux_demos.php'); ?>
			</form>
		</div>
	</div>
</div>




