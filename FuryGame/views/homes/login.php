<h1> S'identifier </h1>

<form class="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="login">
	<input  class="fields" name="login" type="text" id="id-ici" value="Votre Login"  ></br>
	<input  class="fields" name="pass" type="password" id="id-ici"  value="pass"  ></br>
	<button type="submit" ><span>Valider</span></button>
</form>
	<?php 
	
	if (isset($aControllerDatas['errors'])) {
		?><div class="title"><?php echo $aControllerDatas['errors'];
		}
	if(isset($aControllerDatas['success'])) {
		pr("Youpi jai le droit de me co");
		
	}
	?>

	
	
