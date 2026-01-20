 <?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit;
    }
    require "./../private/config.php";

    $isLoggedIn = isset($_SESSION["user_id"]);
    $isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";
    $stmt = $pdo->prepare("
        SELECT matiere, note
    	FROM notes
  	  	WHERE user_id = :user_id
    ");
    $stmt->execute(['user_id' => $_SESSION['user_id']]);
	$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                    <a href="index.php" class="logo"><strong>ENSA KHOURIBGA</strong> – École Nationale des Sciences Appliquées</a>
                                    <ul class="icons">
                                        <li><a href="#" target="_blank" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                                        <li><a href="#" target="_blank" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                        <li><a href="#" target="_blank" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
                                        <li><a href="#" target="_blank" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                                        <li><a href="#" target="_blank" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
                                    </ul>
                                </header>
                                    
                        <!-- Section -->
                                <section>
                                    <div class="content">
                                        <header>
                                            <h2>Mes Notes</h2>
                                        </header>
                                        <ul class="profile-info">
                                            <?php foreach ($notes as $note): ?>
		                                            <li>
		                                                <span>
		                                                    <p><?php echo htmlspecialchars($note['matiere']); ?></p>
		                                                    <p>:</p>
		                                                    <p><?php echo htmlspecialchars($note['note']); ?></p>
		                                                </span>
		                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
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

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>