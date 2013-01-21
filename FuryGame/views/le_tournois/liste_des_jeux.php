<?php if(isset($aControllerDatas['jeux_tournoi'])) { $jeux_tournoi = $aControllerDatas['jeux_tournoi'];} // affiche les jeux qui seront présentés au tournoi F-G
?>
<div class="grid_16 background_blanc">
	<div class="titre">Les jeux du Tournoi Fury-Game</div>
	<?php
	/** Affiche les différents jeux du tournoi F-G*/
	foreach($jeux_tournoi as $k => $v) { ?>
		<div class="">
			<a class="jeux_tournois"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/<?php echo $v["id"]; ?> "><img class="jeux_tournois" title="<?php echo $v['title_image'];?>" alt="<?php echo $v['alt'];?>" src="<?php echo BASE_URL."/".$v['front_image'];?>"/></a>	
		</div>
		<p class="jeux_tournois_title"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/<?php echo $v["id"]; ?> " title="<?php echo $v["title_image"]; ?>"><?php echo $v["title_image"]; ?></a></p>
	<?php }?>	
</div>

	
	
			
	
	
	
	
