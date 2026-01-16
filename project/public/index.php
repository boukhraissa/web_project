<?php
	session_start();
	$isLoggedIn = isset($_SESSION["user_id"]);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>UNI HOME</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>ENSA KHOURIBGA</strong> – École Nationale des Sciences Appliquées</a>
									<ul class="icons">
										<li><a href="#" target="_blank" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" target="_blank" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" target="_blank" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" target="_blank" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" target="_blank" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>ENSA Khouribga</h1>
											<p>Une formation d’ingénierie d’excellence</p>
										</header>
										<p>L’ENSA Khouribga (École Nationale des Sciences Appliquées de Khouribga) est un établissement public d’enseignement supérieur au Maroc, faisant partie du réseau national des ENSA. Elle a pour mission de former des ingénieurs hautement qualifiés, capables de répondre aux exigences du développement technologique et industriel.</p>
										<ul class="actions">
											<li><a href="#" class="button big">En Savoir Plus</a></li>
										</ul>
									</div>
									<span class="image object">
										<img src="images/home1.jpg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Nos forces</h2>
									</header>
									<div class="features">
										<article class="articleContent">
											<span class="icon solid fa-graduation-cap"></span>
											<div class="content">
												<h3 class="h3content">Excellence Académique</h3>
												<p>L’école propose des formations d’ingénierie rigoureuses, alliant bases théoriques solides et compétences pratiques et techniques. Les programmes sont conçus pour préparer les étudiants aux défis réels du monde professionnel et de l’innovation.</p>
											</div>
										</article>
										<article class="articleContent">
											<span class="icon solid fa-desktop"></span>
											<div class="content">
												<h3 class="h3content">Environnement d’Apprentissage Moderne</h3>
												<p>L’ENSA Khouribga offre un environnement d’apprentissage dynamique grâce à des infrastructures modernes, des laboratoires spécialisés et un enseignement orienté projets. L’établissement encourage la créativité, le travail en équipe et la résolution de problèmes.</p>
											</div>
										</article>
										<article class="articleContent">
											<span class="icon solid fa-users"></span>
											<div class="content">
												<h3 class="h3content">Vie Étudiante et Activités</h3>
												<p>L’ENSA Khouribga accorde une grande importance à la vie étudiante, en encourageant l’engagement associatif, les activités culturelles, sportives et scientifiques. Ces initiatives permettent aux étudiants de développer leurs compétences personnelles, leur esprit de leadership et de renforcer la vie au sein du campus.</p>
											</div>
										</article>
										<article class="articleContent">
											<span class="icon solid fa-briefcase"></span>
											<div class="content">
												<h3 class="h3content">Opportunités de Carrière</h3>
												<p>Les diplômés de l’ENSA Khouribga bénéficient d’une excellente préparation pour des carrières professionnelles en ingénierie, recherche et technologies, aussi bien au niveau national qu’international. Les partenariats avec le milieu industriel facilitent l’insertion professionnelle des lauréats.</p>
											</div>
										</article>
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Nos parcours</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="images/IRIC.jpg" alt="" /></a>
											<h3 class="branchTitle">Ingénierie des Réseaux Intelligents et Cybersécurité</h3>
											<p class="branchContent">Cette filière vise à former des ingénieurs capables de concevoir et sécuriser des infrastructures réseau complexes. Elle combine les technologies des réseaux intelligents, des systèmes connectés et de la cybersécurité.</p>
											<ul class="actions">
												<li><a href="#" class="button branchButton">Plus</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/GE.jpg" alt="" /></a>
											<h3 class="branchTitle">Génie Électrique</h3>
											<p class="branchContent">Cette filière forme des ingénieurs maîtrisant la production, la distribution et la gestion de l’énergie électrique. Elle couvre les systèmes électriques, l’électronique de puissance, l’automatisation et les réseaux énergétiques modernes.</p>
											<ul class="actions">
												<li><a href="#" class="button branchButton">Plus</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/GP.jpg" alt="" /></a>
											<h3 class="branchTitle">Génie des Procédés, de l’Énergie et de l’Environnement</h3>
											<p class="branchContent">Cette filière forme des ingénieurs spécialisés dans l’optimisation des procédés industriels en intégrant les enjeux énergétiques et environnementaux. Elle met l’accent sur l’efficacité énergétique, la gestion des ressources et le développement durable.</p>
											<ul class="actions">
												<li><a href="#" class="button branchButton">Plus</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/GI.jpg" alt="" /></a>
											<h3 class="branchTitle">Génie Informatique</h3>
											<p class="branchContent">Cette filière forme des ingénieurs capables de concevoir, développer et maintenir des systèmes informatiques performants. Elle couvre le développement logiciel, les systèmes d’exploitation, les bases de données et l’architecture des systèmes informatiques.</p>
											<ul class="actions">
												<li><a href="#" class="button branchButton">Plus</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/Data.jpg" alt="" /></a>
											<h3 class="branchTitle">Informatique et Ingénierie des Données</h3>
											<p class="branchContent">Cette filière prépare des ingénieurs spécialisés dans la collecte, le traitement et l’analyse des données. Elle intègre les bases de la data science, du big data et des systèmes intelligents pour répondre aux enjeux numériques des organisations.</p>
											<ul class="actions">
												<li><a href="#" class="button branchButton">Plus</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="images/MGSI.jpg" alt="" /></a>
											<h3 class="branchTitle">Management et Gouvernance des Systèmes d’Information</h3>
											<p class="branchContent">Cette filière prépare des ingénieurs capables de piloter les systèmes d’information et d’aligner les technologies numériques avec la stratégie des organisations. Elle combine compétences techniques, management, gouvernance et transformation digitale.</p>
											<ul class="actions">
												<li><a href="#" class="button branchButton">Plus</a></li>
											</ul>
										</article>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<!-- Login -->
							<?php if (!$isLoggedIn): ?>
						        <a href="login.php" id="log" class="icon solid fa-user-circle login"> se connecter</a>
						    <?php else: ?>
						    	<a href="login.php" id="log" class="icon solid fa-user-circle login"><?php echo " " . $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></a>
						    <?php endif; ?>
								
							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Accueill</a></li>
										<li>
											<span class="opener">Espace Etudiant</span>
											<ul>
												<li><a href="#">Clubs</a></li>
												<li><a href="#">Emplois du temps</a></li>
												<li><a href="#">Notes</a></li>
											</ul>
										</li>
										<li><a href="#">Formation</a></li>
										<li><a href="#">Evenement</a></li>
										<li><a href="#">Espace d'Adminitration</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Nouveautée</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/event3.jpeg" alt="" /></a>
											<p>Vous voulez vivre une nouvelle expérience enrichissante et humaine ? 💙💛✨Le club EPIC organise un événement sanitaire 🏥 le jeudi 27 novembre, suivi d’une caravane solidaire 🚐🤝 le vendredi 28 novembre, mettant en avant l’entraide, la sensibilisation et l’esprit de communauté ❤️‍🩹.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/event2.jpeg" alt="" /></a>
											<p>L'événement le plus attendu de l'année est là !<br>Préparez-vous pour une nuit inoubliable sous le thème de l'authenticité et de l'élégance marocaine. 🇲🇦<br>📅 Date : Samedi 20 Décembre 2025</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/event1.jpeg" alt="" /></a>
											<p>Boostez vos compétences en ICT avec Huawei 💻!<br>Rejoignez-nous pour découvrir les technologies de demain et préparer la compétition internationale.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">Plus</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Contactez-nous</h2>
									</header>
									<p>À l’ENSA Khouribga, nous transformons la passion pour les sciences appliquées en compétences concrètes, pour un avenir professionnel prometteur.</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#" target="_blank">ensa@usms.ac.ma</a></li>
										<li class="icon solid fa-phone">(000) 000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; ENSA Khouribga. All rights reserved.</p>
								</footer>
						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>