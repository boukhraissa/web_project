<?php
    session_start();
    require_once "../private/config.php";

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    $isLoggedIn = isset($_SESSION["user_id"]);
    $isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";
    $_SESSION['page']="evenement.php";

    $user_id = $_SESSION['user_id'];

    $evenement = [
        [
            'id' => 1, 
            'nom' => 'Intelligence Artificielle', 
            'niveau' => 'Cycle', 
            'duree' => '6 mois',
            'description' => 'Découvrez les fondamentaux de l\'IA et du Machine Learning',
            'date' => '15 Mars 2026',
            'participants' => 45,
            'max_participants' => 60
        ],
        [
            'id' => 2, 
            'nom' => 'Cybersécurité', 
            'niveau' => 'Cycle', 
            'duree' => '4 mois',
            'description' => 'Maîtrisez les techniques de protection des systèmes',
            'date' => '22 Mars 2026',
            'participants' => 32,
            'max_participants' => 50
        ],
        [
            'id' => 3, 
            'nom' => 'Développement Web Avancé', 
            'niveau' => 'Master', 
            'duree' => '5 mois',
            'description' => 'Approfondissez vos compétences en développement full-stack',
            'date' => '10 Avril 2026',
            'participants' => 28,
            'max_participants' => 40
        ],
        [
            'id' => 4, 
            'nom' => 'Data Science', 
            'niveau' => 'Master', 
            'duree' => '6 mois',
            'description' => 'Analysez et visualisez des données complexes',
            'date' => '5 Mai 2026',
            'participants' => 38,
            'max_participants' => 45
        ]
    ];

    $sql = "SELECT target_id, statut 
            FROM join_requests
            WHERE user_id = ? AND target_type = 'evenement'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    $requests = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $requests[$row['target_id']] = $row['statut'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Événements Universitaires</title>
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/evenement.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
            <div id="wrapper">
                <div>
                <header class="header">
                    <div class="header-content">
                        <div class="header-left">
                            <i class="fas fa-calendar-alt header-icon"></i>
                            <h1>Événements de l'Université</h1>
                        </div>
                        <form action="logout.php" method="post" class="logout-form">
                            <button type="submit" class="logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Déconnexion</span>
                            </button>
                        </form>
                    </div>
                </header>
                

                <div class="container">

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

                    <div class="stats-bar">
                        <div class="stat-item">
                            <i class="fas fa-calendar-check"></i>
                            <div>
                                <span class="stat-number"><?= count($evenement) ?></span>
                                <span class="stat-label">Événements</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <span class="stat-number"><?= count(array_filter($requests, fn($s) => $s === 'acceptee')) ?></span>
                                <span class="stat-label">Inscriptions</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <span class="stat-number"><?= count(array_filter($requests, fn($s) => $s === 'en_attente')) ?></span>
                                <span class="stat-label">En attente</span>
                            </div>
                        </div>
                    </div>

                    <div class="events-grid">
                        <?php foreach ($evenement as $f): ?>
                            <div class="event-card" data-event-id="<?= $f['id'] ?>">
                                <div class="event-header">
                                    <div class="event-badge niveau-<?= strtolower($f['niveau']) ?>">
                                        <i class="fas fa-graduation-cap"></i>
                                        <?= htmlspecialchars($f['niveau']) ?>
                                    </div>
                                    <div class="event-date">
                                        <i class="far fa-calendar"></i>
                                        <?= htmlspecialchars($f['date']) ?>
                                    </div>
                                </div>

                                <div class="event-body">
                                    <h3 class="event-title"><?= htmlspecialchars($f['nom']) ?></h3>
                                    <p class="event-description"><?= htmlspecialchars($f['description']) ?></p>

                                    <div class="event-info">
                                        <div class="info-item">
                                            <i class="fas fa-hourglass-half"></i>
                                            <span><?= htmlspecialchars($f['duree']) ?></span>
                                        </div>
                                        <div class="info-item">
                                            <i class="fas fa-users"></i>
                                            <span><?= $f['participants'] ?> / <?= $f['max_participants'] ?></span>
                                        </div>
                                    </div>

                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= ($f['participants'] / $f['max_participants']) * 100 ?>%"></div>
                                    </div>
                                </div>

                                <div class="event-footer">
                                    <?php if (!isset($requests[$f['id']])): ?>

                                        <form action="reserve.php" method="post" class="action-form">
                                            <input type="hidden" name="target_type" value="evenement">
                                            <input type="hidden" name="target_id" value="<?= $f['id'] ?>">
                                            <input type="hidden" name="source" value="page_evenement">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-user-plus"></i>
                                                <span>Rejoindre</span>
                                            </button>
                                        </form>

                                    <?php elseif ($requests[$f['id']] === 'en_attente'): ?>

                                        <div class="status-badge status-pending">
                                            <i class="fas fa-clock"></i>
                                            <span>En attente de validation</span>
                                        </div>
                                        <form action="cancel.php" method="post" class="action-form">
                                            <input type="hidden" name="target_type" value="evenement">
                                            <input type="hidden" name="target_id" value="<?= $f['id'] ?>">
                                            <button type="submit" class="btn btn-cancel">
                                                <i class="fas fa-times"></i>
                                                <span>Annuler</span>
                                            </button>
                                        </form>

                                    <?php elseif ($requests[$f['id']] === 'acceptee'): ?>

                                        <div class="status-badge status-accepted">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Inscription confirmée</span>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                                        <li><a href="evenement.php">Evenement</a></li>
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
            <script src="assets/js/evenement.js"></script>

</body>
</html>