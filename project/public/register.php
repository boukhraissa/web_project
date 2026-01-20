<?php
	require "./../private/config.php";

	$error = "";
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
	    $email  = $_POST["email"];
	    $nom    = $_POST["nom"];
	    $prenom = $_POST["prenom"];

	    if ($_POST["password"] !== $_POST["check_password"]) {
	        	$error = "Passwords do not match";
	    	} 
	    else {
	        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	        try {
	            $stmt = $pdo->prepare(
	                "INSERT INTO users (email, nom, prenom, password) VALUES (?, ?, ?, ?)"
	            );
	            $stmt->execute([$email, $nom, $prenom, $password]);
	            header("Location: logout.php");
	        } catch (PDOException $e) {
	            if ($e->getCode() == 23000) {
	                $error = "Email already exists. Please use a different email.";
	            } else {
	                $error = "Database error: " . $e->getMessage();
	            }
	        }
	    }

		$_POST["password"] = "";
		$_POST["check_password"] = "";
	}
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

							<!-- Form -->
								<div class="div_form">
									<form method="POST">
										<input type="email" name="email" required placeholder="student@ensa.ma">
										<input type="text" name="nom" required placeholder="nom">
										<input type="text" name="prenom" required placeholder="prenom">
	    								<input type="password" name="password" required placeholder="password">
	    								<input type="password" name="check_password" required placeholder="Retype password">
	    								<button type="submit" class="submit">Register</button>
	    	

	    								<?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($error)): ?>
   											<p class="error"><?php echo htmlspecialchars($error); ?></p>
										<?php endif; ?>
									</form>
								</div>
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