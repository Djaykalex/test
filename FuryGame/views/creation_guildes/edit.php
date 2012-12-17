<div class="section">
	<div class="box">
		<div class="title">
			<h2>Editer un membre</h2>
		</div>
		<div class="content nopadding">
			<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="ArticleEdit">
				<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
				<?php include(ELEMENTS.DS.'backoffice'.DS.'formulaires'.DS.'membres.php'); ?>
			</form>
		</div>
	</div>
</div>




