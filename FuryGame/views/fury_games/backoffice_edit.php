<div class="section">
	<div class="box">
		<div class="title">
			<h2>Editer un article</h2>
		</div>
		<div class="content nopadding">
			<?php echo form_create(array(
				'enctype' => "multipart/form-data",
				'method' => "post", 
				'action' => $_SERVER['REQUEST_URI'], 
				'id' => "JeuxDemosEdit"
				));
			?>
			<input type="hidden" value="<?php echo $aControllerDatas['id']; ?>" name="id" />
			<?php include(ELEMENTS.DS.'backoffice'.DS.'formulaires'.DS.'jeux_demos.php'); ?>
		</div>
	</div>
</div>


