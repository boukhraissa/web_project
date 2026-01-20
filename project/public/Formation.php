<?php
	session_start();
	$isLoggedIn = isset($_SESSION["user_id"]);
	$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";
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

		<div id="wrapper">

				<div id="main">
						<div class="inner">

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

							<section>
									<header class="major">
										<h2>Formation Initiale</h2>
									</header>

									<div class="row">
										<div class="col-7 col-12-small">
											<h3>Formation Ingénieur d'Etat</h3>
											<h4>Une formation scientifique, technologique et humaine de haut niveau</h4>
											<p>La formation s'étale sur 5 années : les deux années préparatoires et les 3 ans du cycle ingénieur.</p>
											<p><a href="./images/Organigrame-ENSAK.jpeg" class="icon solid fa-file-pdf"> Télécharger l'organigramme</a></p>

											<h4>Années Préparatoires Intégrées</h4>
											<p>Permet à l'élève ingénieur d'acquérir des connaissances solides en mathématiques et physique ainsi qu'une initiation à l'informatique.</p>
											<p><a href="files/depliant-api.pdf" class="icon solid fa-file-pdf"> Télécharger le dépliant</a></p>

											<h4>Cycle Ingénieur d'Etat</h4>
											<p>Sanctionné par un diplôme d'ingénieur d'État, le cycle ingénieur est un cursus de formation d'enseignement supérieur d'une durée de six semestres (S5, S6, S7, S8, S9 et S10) accessible selon les conditions suivantes...</p>
											
                                            <div id="cycle-details" style="display:none;">
                                                <p><strong>L'accès en première année est ouvert :</strong><br>
                                                • Aux candidats ayant validé les deux années du cycle préparatoire intégré.<br>
                                                • Aux candidats ayant réussi le concours national commun d'admission dans les établissements de formation d'ingénieurs et établissements assimilés et ce dans la limite des places offertes par l'école.<br>
                                                • Aux candidats ayant réussi le concours d'accès ouvert aux étudiants Bac+2 (DEUG, DUT, DEUST, DEUP ou tout autre diplôme reconnu équivalent) ou Bac+3 (Licence ou tout autre diplôme reconnu équivalent) selon les prérequis pédagogiques et les modalités précisés dans le descriptif de la filière et dans la limite des places disponibles.</p>
                                                
                                                <p>L'accès à une filière de ce cycle peut se faire en deuxième année par voie de concours pour les candidats ayant au moins un diplôme BAC+3 (Licence ou tout autre diplôme reconnu équivalent) et les prérequis équivalents à la première année de la filière et sélectionnées selon les critères d'admission précisés dans le descriptif de la filière. Après un classement, les candidats sont retenus selon la limite des places disponibles.</p>
                                                
                                                <p>L'année universitaire est composée de deux semestres comprenant chacun 16 à 18 semaines d'enseignement et d'évaluation. Les périodes de stage ne sont pas incluses dans ces semaines. L'organisation du cursus sur les six semestres de la formation est définie par l'équipe pédagogique de chacune des filières du cycle ingénieur en coordination avec les instances pédagogiques de l'établissement. Chaque semestre comprend 6 à 8 modules. Les cinq premiers semestres de formation d'ingénieur sont composés de trois blocs de modules :</p>
                                                
                                                <p>Le bloc des modules scientifiques et techniques de base et de spécialisation, composé, d'une part, de modules reflétant les caractères scientifique et technique généraux de la formation d'ingénieur et, d'autre part, de modules spécifiques à une spécialisation dans le cadre de la filière. Le bloc de modules de management composé essentiellement de modules de management de projets, de management d'entreprise. Le bloc de modules de langues, de communication et des TIC.</p>
                                                
                                                <p><strong>Le sixième semestre est consacré au stage relatif au projet de fin d'étude (PFE).</strong> Ce stage permet aux étudiants de :<br>
                                                • Découvrir la vie professionnelle et d'adapter les connaissances théoriques à la réalité industrielle.<br>
                                                • Réaliser un travail de synthèse.<br>
                                                • Développer l'esprit d'initiative et le travail en groupe et de renforcer la recherche bibliographique.<br>
                                                • Faciliter l'insertion professionnelle aux futurs diplômés.</p>
                                            </div>
                                            <p><a href="javascript:void(0);" id="btn-lire-suite" class="button" onclick="afficherDetails()">Lire la suite...</a></p>
										</div>
										<div class="col-5 col-12-small">
											<span class="image fit"><img src="images/Organigrame-ENSAK.jpeg" alt="Schéma de formation ingénieur" /></span>
										</div>
									</div>

									<hr class="major" />

									<h3>Filières ingénieurs offertes</h3>
									
									<style>
										.filiere-box {
											display: flex;
											align-items: center;
											gap: 1rem;
											padding: 1.5rem;
											border: 2px solid #e0e0e0;
											border-radius: 8px;
											background: #fff;
											cursor: pointer;
											transition: all 0.3s ease;
											text-decoration: none;
											color: inherit;
										}
										
										.filiere-box:hover {
											background: #3498db;
											border-color: #3498db;
											color: #fff;
											transform: translateY(-3px);
											box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
										}
										
										.filiere-box:hover strong,
										.filiere-box:hover a {
											color: #fff !important;
										}
										
										.filiere-box img {
											width: 70px;
											height: 70px;
											object-fit: contain;
											flex-shrink: 0;
										}
										
										.btn-postuler {
											display: inline-flex;
											align-items: center;
											justify-content: center;
											gap: 0.5em;
											transition: all 0.3s ease;
										}
										
										.btn-postuler:hover {
											background-color: #27ae60 !important;
											border-color: #27ae60 !important;
											transform: scale(1.05);
										}
									</style>
									
									<div class="row gtr-uniform">
										<div class="col-6 col-12-medium">
											<a href="files/depliant-gi.pdf" class="filiere-box">
												<img src="images/gi-ic.png" alt="" />
												<div>
													<strong>Filière Ingénieur en - Génie Informatique -</strong><br>
													<span class="icon solid fa-file-pdf"> Télécharger le dépliant</span>
												</div>
											</a>
										</div>
										<div class="col-6 col-12-medium">
											<a href="files/depliant-iid.pdf" class="filiere-box">
												<img src="images/iid-ic.png" alt="" />
												<div>
													<strong>Filière Ingénieur en - Informatique et Ingénierie des Données -</strong><br>
													<span class="icon solid fa-file-pdf"> Télécharger le dépliant</span>
												</div>
											</a>
										</div>
										<div class="col-6 col-12-medium">
											<a href="files/depliant-ge.pdf" class="filiere-box">
												<img src="images/ge-ic.png" alt="" />
												<div>
													<strong>Filière Ingénieur en - Génie Électrique -</strong><br>
													<span class="icon solid fa-file-pdf"> Télécharger le dépliant</span>
												</div>
											</a>
										</div>
										<div class="col-6 col-12-medium">
											<a href="files/depliant-iric.pdf" class="filiere-box">
												<img src="images/iric-ic.png" alt="" />
												<div>
													<strong>Filière Ingénieur en - Ingénierie des Réseaux Intelligents et Cybersécurité -</strong><br>
													<span class="icon solid fa-file-pdf"> Télécharger le dépliant</span>
												</div>
											</a>
										</div>
										<div class="col-6 col-12-medium">
											<a href="files/depliant-gp.pdf" class="filiere-box">
												<img src="images/gp-ic.png" alt="" />
												<div>
													<strong>Filière Ingénieur en - Génie des Procédés, de l'Énergie et de l'Environnement -</strong><br>
													<span class="icon solid fa-file-pdf"> Télécharger le dépliant</span>
												</div>
											</a>
										</div>
										<div class="col-6 col-12-medium">
											<a href="files/depliant-mgsi.pdf" class="filiere-box">
												<img src="images/mgsi-ic.png" alt="" />
												<div>
													<strong>Filière Ingénieur en - Management et Gouvernance des Systèmes d'Information -</strong><br>
													<span class="icon solid fa-file-pdf"> Télécharger le dépliant</span>
												</div>
											</a>
										</div>
									</div>

									<hr class="major" />

									<h3>Formation Master en Informatique et Mathématiques pour la Science des Données</h3>
									<p>Une filière du cycle Master s'étale sur deux années et comporte quatre semestres (S1, S2, S3 et S4) organisés comme suit...</p>
									
                                    <div id="master-details" style="display:none;">
                                        <p>• S1 et S2 sont des semestres d'études fondamentales, spécifiques au caractère du Master. S1 ou S1 et S2, peuvent constituer un tronc commun avec d'autres filières du même champ disciplinaire ;<br>
                                        • S3 et S4 sont des semestres d'approfondissement, de spécialisation et d'initiation à la recherche pour le Master ; ou d'approfondissement, de spécialisation et de professionnalisation pour le Master spécialisé.</p>
                                        
                                        <p><strong>Une filière du cycle Master comporte 24 modules, stage compris, répartis en trois blocs de modules :</strong></p>
                                        
                                        <p>Un bloc de modules majeurs y compris le stage est composé d'enseignements généraux dans la spécialité du Master ou spécifiques à cette spécialité. Le nombre de modules majeurs est de 19 à 20 modules, dont 6 modules consacrés au stage.</p>
                                        
                                        <p>Un bloc de modules "outils" nécessaires à la formation (Langues, Communication professionnelle, Gestion de projets, Nouvelles Technologies, Méthodologie de recherche bibliographique ou autres). Le nombre de modules "outils" est de 1 à 2 modules.</p>
                                        
                                        <p>Un bloc de modules complémentaires, constitué de modules d'option, de spécialisation ou d'ouverture en relation avec le domaine de spécialisation de la formation. Le nombre de modules complémentaires est de 1 à 3 modules.</p>
                                        
                                        <p>Chaque semestre est constitué de 6 modules.</p>
                                    </div>
                                    <p><a href="javascript:void(0);" id="btn-master" class="button" onclick="afficherMaster()">Lire la suite...</a></p>
                                    
                                    <p style="margin-top: 2rem; text-align: center;"><a href="formulaire.php" class="button primary icon solid fa-paper-plane btn-postuler" style="font-size: 1.2em; padding: 1em 2.5em;">POSTULER</a></p>

								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<!-- Login -->
							<?php if (!$isLoggedIn): ?>
						        <a href="login.php" class="icon solid fa-user-circle login"> se connecter</a>
						    <?php else: ?>
						    	<a href="login.php" class="icon solid fa-user-circle login"><?php echo " " . $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></a>
						    	<a href="logout.php" class="icon solid fa-sign-out-alt logout"></a>
						    <?php endif; ?>
								
							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.php">Accueill</a></li>
										<li>
											<span class="opener">Espace Etudiant</span>
											<ul>
												<li><a href="infoPersonelle.php">Info Personelles</a></li>
                                                <li><a href="calendar.php">Emplois Du Temps</a></li>
												<li><a href="clubs.php">Clubs</a></li>
												<li><a href="note.php">Notes</a></li>
											</ul>
										</li>
										<li><a href="Formation.php">Formation</a></li>
										<li><a href="#">Evenement</a></li>
										<?php if ($isAdmin): ?>
						        			<li><a href="#">Espace d'Adminitration</a></li>
						    			<?php endif; ?>
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

		<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			
			<script>
				function afficherDetails() {
					document.getElementById('cycle-details').style.display = 'block';
					document.getElementById('btn-lire-suite').style.display = 'none';
				}
				function afficherMaster() {
					document.getElementById('master-details').style.display = 'block';
					document.getElementById('btn-master').style.display = 'none';
				}
			</script>

	</body>
</html>