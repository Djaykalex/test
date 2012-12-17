<?php if(isset($aControllerDatas['article_resume'])) { $article_resume = $aControllerDatas['article_resume'];}?>
<?php if(isset($aControllerDatas['articlesTypesList'])) { $articlesTypesList = $aControllerDatas['articlesTypesList'];}?>
<?php if(isset($aControllerDatas['totalarticles'])) { $totalarticles = $aControllerDatas['totalarticles'];} //affiche le nbr d'articles?>
<?php if(isset($aControllerDatas['test'])) { $test = $aControllerDatas['test'];} // affiche le nbr d'articles?>
<?php if(isset($aControllerDatas['nbr_commentaires'])) { $nbr_commentaires = $aControllerDatas['nbr_commentaires'];} // compte le nbr de commentaires pour chaque articles?>
<?php if(isset($aControllerDatas['com'])) { $com = $aControllerDatas['com'];} // compte le nbr de commentaires pour chaque articles?>
<?php if(isset($aControllerDatas['jeux_tournoi'])) { $jeux_tournoi = $aControllerDatas['jeux_tournoi'];} // affiche les jeux qui seront présentés au tournoi F-G?>

<div class="grid_16">
	<div class="fondtext background_blanc">
		<?php if(isset($_SESSION['role']) && $_SESSION['role'] != 5){?>
			<div class="bonj"><h2 class="bonjour"><span class="yop">Bonjour <?php echo $_SESSION['user_pseudo'];?> !</span></h2></div>
		<?php }
		/** On identifie le membre qui se connecte*/
		?>
		<div class="wrapper"> <!-- SLICEBOX -->
				<ul id="sb-slider" class="sb-slider">
					<li>
						<a href="<?php echo BASE_URL; ?>/fury_games/index" ><img src="<?php echo BASE_URL; ?>/img/images/7a.jpg" title="Festival Fury-Game" alt="Festival Fury-Game"/></a>
						<div class="sb-description">
							<h3>Le Festival Fury-Game c'est quoi?!</h3>
						</div>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>/le_tournois/index" ><img src="<?php echo BASE_URL; ?>/img/images/page_de_presentation2.jpg" title="tournoi Fury-Game" alt="tournoi Fury-Game"/></a>
						<div class="sb-description">
							<h3>Le tournoi Fury-Game.</h3>
						</div>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>/guildes/index" ><img src="<?php echo BASE_URL; ?>/img/images/ff.jpg" title="Création de guilde" alt="image1"/></a>
						<div class="sb-description">
							<h3>Création de guilde</h3>
						</div>
					</li>
					<li>
						<a href="<?php echo BASE_URL; ?>/infos/plan_du_sites" ><img src="<?php echo BASE_URL; ?>/img/images/plan-du-site-+-legende_petit.jpg" title="site Fury-Game" alt="site Fury-Game"/></a>
						<div class="sb-description">
							<h3>Le site Fury-Game.</h3>
						</div>
					</li>
				</ul>
			<div id="shadow" class="shadow"></div>
			<div id="nav-arrows" class="nav-arrows">
				<a href="#">Next</a>
				<a href="#">Previous</a>
			</div>
		</div><!--  FIN SLICEBOX  /wrapper -->
	</div>
	<!-- SLOGAN-->
	<div class="fondtext_slogan background_blanc">
		<div class="slogan"><span><a href="<?php echo BASE_URL;?>/fury_games/index">Le festival Fury-Game</span></a> vous accueil <span>le dimanche 26 Mai</span> pour découvrir tous nos jeux !</div>
	</div>
	<!-- section jeux focus-->
	<!-- 1er ligne -->
	<!-- 1er colonne -->
	<div class="background_blanc_home">
		<div class="container_16 ">
			<div class="titre">Les jeux du Tournoi Fury-Game</div>
			<div class="grid4 ">
				<div class="focus_img_text">
					<div class="">
						<a class="jeux_tournois_focus_gauche"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/1 ">
						<img class="jeux_tournois_img" title="Team Manager Bloodbowl" alt="Team Manager Bloodbowl" src="<?php echo BASE_URL;?>/img/jeux_tournois/test.jpg"/></a>	
					</div>
					<div class="focus_titre1">Team manager Bloodbowl</div>
					<div class="focus">
						<p>Team manager Bloodbowl est un hymne sportif dedie aux os brises, aux demonstrations athletiques a couper le souffle, a la violence et franchement a la tricherie.</p>
					</div>
					<div class="bouton_voir_plus"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/1 ">Voir plus</a></div>
				</div>		
				
			</div>
			<!-- 1ere ligne -->
			<!-- 2eme colonne -->
			<div class="grid4">
				<div class="focus_img_text">
					<div class="">
						<a class="jeux_tournois_focus"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/4 ">
						<img class="jeux_tournois_img" title="Munchkin" alt="Munchkin" src="<?php echo BASE_URL;?>/img/jeux_tournois/focus_munch.jpg"/></a>	
					</div>
					<div class="focus_titre2">Munchkin</div>
					<div class="focus2">
						<p>Munchkin, bienvenue dans le Donjon ! Tuez tout ce qui se présente devant vous. Poignardez vos amis. Ramassez tous les trésors et fuyez !</p>
					</div>
					<div class="bouton_voir_plus2"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/4 ">Voir plus</a></div>
				</div>		
			</div>
			<!-- 1er ligne -->
			<!-- 3eme colonne -->
			<div class="grid4">
				<div class="focus_img_text">
					<div class="">
						<a class="jeux_tournois_focus"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/7 ">
						<img class="jeux_tournois_img" title="Zombicide" alt="Zombicide" src="<?php echo BASE_URL;?>/img/jeux_tournois/focus_Zombicide_col1.jpg"/></a>	
					</div>
					<div class="focus_titre3">Zombicide</div>
					<div class="focus3">
						<p>Zombicide, la SCIENCE a permis à l’Homme de transformer la faune et la flore. Ces altérations ont eu de graves conséquences sur l’organisme humain.</p>
					</div>
					<div class="bouton_voir_plus3"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/7 ">Voir plus</a></div>
				</div>		
			</div>
		</div>
		<div class="container_16 focus2ligne">
			<div class="grid4 ">
				<div class="focus_img_text">
					<div class="">
						<a class="jeux_tournois_focus_gauche"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/11 ">
						<img class="jeux_tournois_img" title="Blokus" alt="Blokus" src="<?php echo BASE_URL;?>/img/jeux_tournois/focus_Blokus.jpg"/></a>		
					</div>
					<div class="focus_titre1">Blokus</div>
					<div class="focus">
						<p>Blokus Classique en famille ou entre amis, il faudra redoubler de stratégie pour remporter la partie !</p>
					</div>
					<div class="bouton_voir_plus"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/11 ">Voir plus</a></div>
				</div>		
				
			</div>
			<!-- 1ere ligne -->
			<!-- 2eme colonne -->
			<div class="grid4">
				<div class="focus_img_text">
					<div class="">
						<a class="jeux_tournois_focus"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/3 ">
						<img class="jeux_tournois_img" title="Risk" alt="Risk" src="<?php echo BASE_URL;?>/img/jeux_tournois/focus_risk.jpg"/></a>	
					</div>
					<div class="focus_titre2">Risk</div>
					<div class="focus2">
						<p>Nouvelle version du grand classique. Il faut être le premier à mener à bien sa mission secrète ou être le premier à conquérir le monde!</p>
					</div>
					<div class="bouton_voir_plus2"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/3 ">Voir plus</a></div>
				</div>		
			</div>
			<!-- 1er ligne -->
			<!-- 3eme colonne -->
			<div class="grid4">
				<div class="focus_img_text">
					<div class="">
						<a class="jeux_tournois_focus"  href="<?php echo BASE_URL;?>/le_tournois/details_jeux/7 ">
						<img class="jeux_tournois_img" title="Zombicide" alt="Zombicide" src="<?php echo BASE_URL;?>/img/jeux_tournois/focus_zombie_dice_col.jpg"/></a>	
					</div>
					<div class="focus_titre3">Zombie Dice</div>
					<div class="focus3">
						<p>Vous êtes un zombie. Et vous voulez des cerveeaauux. Plus que vos copains zombies.</p>
					</div>
					<div class="bouton_voir_plus3"><a href="<?php echo BASE_URL;?>/le_tournois/details_jeux/7 ">Voir plus</a></div>
				</div>		
			</div>
		</div>
		<div class="bouton_voir_tout_focus"><a href="<?php echo BASE_URL;?>/le_tournois/liste_des_jeux" title="" >Voir la suite des jeux</a></div>
		<!-- Fin section jeux focus-->
		</br>
	</div>	
	<!-- SLOGAN-->
	<div class="fondtext_slogan2 background_blanc">
		<div class="slogan">Venez partager vos expériences de jeu avec de nombreux passionnés !</div>
	</div>
	<!--  Carossel News -->
	<div class="fondtext_slogan background_blanc">	
		<div class="titre_carrousel"><a href="<?php echo BASE_URL;?>/fury_games/news">Les dernieres news</a></div>
		<img class="imgnews" src="<?php echo BASE_URL; ?>/img/home_galerie.jpg" alt="fond image" title="fond image" />
		<div class="caroussel">
				<div class="list_carousel">
					<ul id="foo2">
					<?php foreach($article_resume as $k => $v) { ?>
						<li><a href="<?php echo BASE_URL;?>/fury_games/details/<?php echo $v["id"]; ?> "><span class="focus_titre"><?php echo $v['title']; ?></span><img class="icone_test_news" src="<?php echo BASE_URL."/".$v['icone'];?>" title="<?php echo $v['title']; ?>" alt="<?php echo $v['alt']; ?>"/></a></li>
					<?php }?>	
					</ul>
					<div class="clearfix"></div>
					<a id="prev2" class="prev" href="#">&lt;</a>
					<a id="next2" class="next" href="#">&gt;</a>
					<div id="pager2" class="pager"></div>
				</div>
		</div>
	</div><!--  Fin Carossel News -->
</div>

