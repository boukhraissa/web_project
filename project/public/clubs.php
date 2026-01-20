<?php
    session_start();
    require "../private/config.php";


    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit;
    }

    $isLoggedIn = isset($_SESSION["user_id"]);
    $isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";  
    $_SESSION['page']="clubs.php";

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT target_id, statut 
            FROM join_requests
            WHERE user_id = ? AND target_type = 'club'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    $requests = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $requests[$row['target_id']] = $row['statut'];
    }

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>UNI HOME</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/evenement.css">

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

                        <!-- Main -->
                            <div>

                            <!-- Banner -->
                                <div>
                                    <?php if (isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success">
                                            <i class="fas fa-check-circle"></i>
                                            <span><?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></span>
                                            <button class="alert-close" onclick="this.parentElement.remove()">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-error">
                                            <i class="fas fa-exclamation-circle"></i>
                                            <span><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></span>
                                            <button class="alert-close" onclick="this.parentElement.remove()">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            <!-- Section -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                            <h1>BSecure</h1>
                                            <p>Explorer le monde numérique de manière sûre et créative</p>
                                        </header>
                                        <p>Nous organisons des ateliers, des projets pratiques et des challenges pour aider les étudiants à apprendre le hacking éthique, la sécurité réseau et d'autres compétences en cybersécurité dans un environnement collaboratif.</p>
                                        <?php if (!isset($requests[2])): ?>

                                            <form action="reserve.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?=2?>">
                                                <input type="hidden" name="source" value="page_club">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-user-plus"></i>
                                                    <span>Rejoindre</span>
                                                </button>
                                            </form>

                                        <?php elseif ($requests[2] === 'en_attente'): ?>
                                            <div class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                <span>En attente de validation</span>
                                            </div>
                                            <form action="cancel.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?= 2 ?>">
                                                <button type="submit" class="btn btn-cancel">
                                                    <i class="fas fa-times"></i>
                                                    <span>Annuler</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[2] === 'acceptee'): ?>
                                            <div class="status-badge status-accepted">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Inscription confirmée</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="image object">
                                        <img src="images/BSecure.png" alt="" />
                                    </span>
                                </section>

                            <!-- Section -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                            <h1>Epic</h1>
                                            <p>Servir la communauté avec cœur et action</p>
                                        </header>
                                        <p>Nous organisons des projets de bénévolat, des initiatives sociales et des activités de leadership pour avoir un impact positif localement et mondialement, tout en favorisant le travail d'équipe et le développement personnel.</p>
                                        <?php if (!isset($requests[3])): ?>

                                            <form action="reserve.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?=3?>">
                                                <input type="hidden" name="source" value="page_club">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-user-plus"></i>
                                                    <span>Rejoindre</span>
                                                </button>
                                            </form>

                                        <?php elseif ($requests[3] === 'en_attente'): ?>
                                            <div class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                <span>En attente de validation</span>
                                            </div>
                                            <form action="cancel.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?= 3 ?>">
                                                <button type="submit" class="btn btn-cancel">
                                                    <i class="fas fa-times"></i>
                                                    <span>Annuler</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[3] === 'acceptee'): ?>
                                            <div class="status-badge status-accepted">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Inscription confirmée</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="image object">
                                        <img src="images/Epic.png" alt="" />
                                    </span>
                                </section>

                            <!-- Section -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                            <h1>Rotaract</h1>
                                            <<p>Faire du bénévolat pour créer un changement significatif</p>
                                        </header>
                                        <p>Nos membres participent à des projets humanitaires, des campagnes de sensibilisation et des actions de soutien à la communauté, contribuant à la société tout en développant des compétences et de l'expérience précieuses.</p>
                                        <?php if (!isset($requests[1])): ?>

                                            <form action="reserve.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?=1?>">
                                                <input type="hidden" name="source" value="page_club">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-user-plus"></i>
                                                    <span>Rejoindre</span>
                                                </button>
                                            </form>

                                        <?php elseif ($requests[1] === 'en_attente'): ?>
                                            <div class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                <span>En attente de validation</span>
                                            </div>
                                            <form action="cancel.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?= 1 ?>">
                                                <button type="submit" class="btn btn-cancel">
                                                    <i class="fas fa-times"></i>
                                                    <span>Annuler</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[1] === 'acceptee'): ?>
                                            <div class="status-badge status-accepted">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Inscription confirmée</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="image object">
                                        <img src="images/Rotaract.png" alt="" />
                                    </span>
                                </section>

                            <!-- Section -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                            <h1>Enactus</h1>
                                            <p>Entrepreneuriat social et impact durable.</p>
                                        </header>
                                        <p>Enactus est un club d’étudiants d’ENSA Khouribga qui encourage l’innovation sociale et l’entrepreneuriat pour répondre à des défis réels de la communauté. À travers des projets durables, des ateliers, des compétitions et des actions concrètes, nous aidons les étudiants à développer des solutions à impact positif tout en renforçant leurs compétences en leadership, travail d’équipe et gestion de projet.</p>

                                        <?php if (!isset($requests[4])): ?>
                                            <form action="reserve.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?=4?>">
                                                <input type="hidden" name="source" value="page_club">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-user-plus"></i>
                                                    <span>Rejoindre</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[4] === 'en_attente'): ?>
                                            <div class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                <span>En attente de validation</span>
                                            </div>
                                            <form action="cancel.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?= 4 ?>">
                                                <button type="submit" class="btn btn-cancel">
                                                    <i class="fas fa-times"></i>
                                                    <span>Annuler</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[4] === 'acceptee'): ?>
                                            <div class="status-badge status-accepted">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Inscription confirmée</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="image object">
                                        <img src="images/Enactus.png" alt="" />
                                    </span>
                                </section>

                            <!-- Section -->
                                <section id="banner">
                                    <div class="content">
                                        <header>
                                            <h1>Comité Majsid</h1>
                                            <p>Apprendre et pratiquer l’Islam avec dévotion.</p>
                                        </header>
                                        <p>Le Comité Majsid à ENSA Khouribga propose des séances d’apprentissage du Coran, des discussions sur les enseignements islamiques et des activités spirituelles pour renforcer la foi et la connaissance religieuse au sein de la communauté étudiante.</p>

                                        <?php if (!isset($requests[5])): ?>
                                            <form action="reserve.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?=5?>">
                                                <input type="hidden" name="source" value="page_club">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-user-plus"></i>
                                                    <span>Rejoindre</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[5] === 'en_attente'): ?>
                                            <div class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                <span>En attente de validation</span>
                                            </div>
                                            <form action="cancel.php" method="post" class="action-form">
                                                <input type="hidden" name="target_type" value="club">
                                                <input type="hidden" name="target_id" value="<?= 5 ?>">
                                                <button type="submit" class="btn btn-cancel">
                                                    <i class="fas fa-times"></i>
                                                    <span>Annuler</span>
                                                </button>
                                            </form>
                                        <?php elseif ($requests[5] === 'acceptee'): ?>
                                            <div class="status-badge status-accepted">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Inscription confirmée</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <span class="image object">
                                        <img src="images/Majsid.png" alt="" />
                                    </span>
                                </section>
                            </div>
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