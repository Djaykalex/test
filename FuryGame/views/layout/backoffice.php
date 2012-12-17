<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="desciption" content="Fury Game festival de jeu" />
		<meta name="keyword" content="Fury Game est un festival de jeu à Jacou près de Montpellier, tournois, démonstrations animations jeux de société, jeux de cartes, jeux de plateau, jeux de rôles." />
		<title>Back-office</title>  		
		
		<?php
		/**voici un tableau php qui regroupe tous nos liens css, ne pas oublier de lui indiquer le chemin de la bibliothèque... içi c'est lib/html.php **/
		
		$a = array (
		
			'reset', 
			'grille/reset',
			'grille/text', 
			'grille/960_16_col',
			'backoffice/link-buttons',	
			'backoffice/forms',	
			'backoffice/form-buttons',	
			'backoffice/datatable',	
			'backcss'
			
		);
		css($a);
		
		
		$aJs = array(
			'backoffice/jquery-1.7.1.min',
			'backoffice/jquery-ui',
			'backoffice/jquery-ui-select',
			'backoffice/jquery-ui-spinner',
			'backoffice/jquery.validate.min',
			'ckeditor/ckeditor',
			'ckeditor/config',
			'ckfinder/ckfinder',
			'backoffice/costum',
		);
		js($aJs);
		?>

	</head> 
	<body>
		<div  class="banniere">
			<?php
				include_once ELEMENTS.DS.'backoffice'.DS.'backmenu.php';
			?>
		</div>
		<div class="backfond" >
			<div class="fondtextb " >
				<?php
					echo $content_for_layout;
				?>
			</div>
		</div>
	</body>
</html>