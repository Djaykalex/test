<?php 
if(isset($_SESSION['user_id']) ) {
	$guilde = find(array('table' => 'guildes', 'link' => $link, 'conditions' => 'isauth_id='.$_SESSION['user_id']));
	//cela va permettre de ne pas afficher dans le menu l'onglet 'gestion de la guilde' au cas où l'utilisateur qui vient de créer un compte en tant que 
	// Guild Master puisse y acceder. Car la page se s'affichera pas correctement etant donné qu'il n'a pas crée de guilde.
}

?>
<div>
    <div id="menu">
        <ul class="level1">
            <li class="level1-li"><a class="level1-a" href="<?php echo BASE_URL; ?>/">Accueil</a></li>
            <li class="level1-li"><a class="level1-a drop" href="<?php echo BASE_URL; ?>/fury_games/index">Fury Game<!--[if gte IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul class="level2">
					<li><a href="<?php echo BASE_URL; ?>/fury_games/news">News</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/fury_games/demonstrations">Jeux en démos</a></li>
                </ul>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
			 <li class="level1-li"><a class="level1-a drop" href="<?php echo BASE_URL; ?>/le_tournois/index">Le tournoi F-G<!--[if gte IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul class="level2">
					<li><a href="<?php echo BASE_URL; ?>/le_tournois/liste_des_jeux">Liste des jeux</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/le_tournois/les_points">Classement des points</a></li>
                  
                </ul>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
            <li class="level1-li"><a class="level1-a drop" href="<?php echo BASE_URL; ?>/guildes/index">Les guildes<!--[if gte IE 7]><!--></a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul class="level2">
                    <li><a href="<?php echo BASE_URL; ?>/guildes/list_guildes">Liste des guildes</a></li>
					
					<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1 ){?>
						<li><a href="<?php echo BASE_URL; ?>/creation_guildes/index">Création de guilde<!--[if gte IE 7]><!--></a><!--<![endif]-->
						
						<?php if(!empty($guilde)){?>	
						</li>  <li><a href="<?php echo BASE_URL; ?>/creation_guildes/gestion_guildes">Gestion de la guilde<!--[if gte IE 7]><!--></a><!--<![endif]-->
						</li>  <li><a href="<?php echo BASE_URL; ?>/creation_guildes/gestion_membres_guildes">Gestion des membres la guilde<!--[if gte IE 7]><!--></a><!--<![endif]-->
						</li>
						<?php } 
					
					} ?> 
					
                </ul>
            <!--[if lte IE 6]></td></tr></table></a><![endif]-->
            </li>
            <li class="level1-li"><a class="level1-a drop" href="<?php echo BASE_URL; ?>/infos/index">Plan du site</a>
				<ul class="level2">
                    <li><a href="<?php echo BASE_URL; ?>/infos/plannings">Planning de la journée</a></li>                             
                </ul>
			</li>
			<li class="level1-li "><a class="level1-a drop" href="<?php echo BASE_URL; ?>/users/login">Se connecter</a><!--<![endif]-->
            <!--[if lte IE 6]><table><tr><td><![endif]-->
				<ul class="level2">
				  
						<li><a href="<?php echo BASE_URL; ?>/comptes/index">Créer un compte<!--[if gte IE 7]><!--></a></li>
						
						<?php if(isset($_SESSION['user_id'])){?>
						<li><a href="<?php echo BASE_URL; ?>/comptes/gestion_comptes">Gérer son compte</a></li>
						
						
						<li><a href="<?php echo BASE_URL; ?>/users/logout">Déconnextion</a></li>
					  <?php } ?>
                </ul>
            </li>
			<li class="level1-li"><a class="level1-a " href="<?php echo BASE_URL; ?>/homes/contacts">Nous contacter<!--[if gte IE 7]><!--></a><!--<![endif]--> </li>
        </ul>
    </div>
    <div style="clear:both"></div>
</div>