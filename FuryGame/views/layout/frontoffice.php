<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="desciption" content="Fury Game festival de jeu" />
		<meta name="keyword" content="Fury Game est un festival de jeu à Jacou près de Montpellier, tournois, démonstrations animations jeux de société, jeux de cartes, jeux de plateau, jeux de rôles." />
		<title>Fury-Game</title>  		
		
		<?php
		/**voici un tableau php qui regroupe tous nos liens css, ne pas oublier de lui indiquer le chemin de la bibliothèque... içi c'est lib/html.php **/
		$aCss = array (
			'reset', 
			'grille/reset',
			'grille/text', 
			'grille/960_16_col',
			'style',
			'nivo-slider',
			'lightbox',	
			'custom',	
			'demo',	
			'slicebox',	
			'link-buttons',	
			
			'menu',
			'css',
			
		);
		css ($aCss);
		?>
		<?php
		/**voici un tableau php qui regroupe tous nos liens css, ne pas oublier de lui indiquer le chemin de la bibliothèque... içi c'est lib/html.php **/
		$a = array (
			// 'jquery-1.7.1.min',
			'jquery-1.8.2.min',
			'jquery-ui-1.8.18.custom.min',
			'jquery.smooth-scroll.min',
			'lightbox',
			'jquery.nivo.slider.pack',
			'jquery.nivo.slider',
			'menu',
			'jquery-1.3.2',
			'jquery.paginate',
			'modernizr.custom.46884',
			'jquery.carouFredSel-6.1.0-packed',
			'jquery.ba-throttle-debounce.min',
			'jquery.mousewheel.min',
			'jquery.touchSwipe.min',
			'jquery.slicebox',
			'slicebox',
			'scripts2',
			'scripts'
		);
		js($a);
		?>
		<!--lien vers les js -->
	</head> 
	<body>
		<div class="header_logo_fg"><a href="<?php echo BASE_URL; ?>/homes" title=""><img src="<?php echo BASE_URL; ?>/img/logo-fury-game.png" title="Logo festival des jeux fury game" alt="Logo festival des jeux fury game"></a></div>
		<div class="slidertop">
			<?php
				include_once ELEMENTS.DS.'frontoffice/slider.php';
			?>
		</div>
		<div id="header"></div>
		<div class="menutop">
			<?php
				include_once ELEMENTS.DS.'frontoffice/menu.php';
			?>
		</div>
		<div  class="container_16 backtestcss">
			<?php
				echo $content_for_layout;					
			?>
		</div>
		<div id="footer"></div>
		<div class="footers">
			<div class="textfoot container_16 ">
				<?php
					include_once ELEMENTS.DS.'frontoffice/footer.php';
				?>
			</div>
		</div>
	</body>
</html>