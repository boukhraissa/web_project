<?php
	require "./../private/config.php";

	$error = "";
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
	    $email  = $_POST["email"];
	    $nom    = $_POST["nom"];
	    $prenom = $_POST["prenom"];
	    $filiere= $_POST["filiere"];

	    if ($_POST["password"] !== $_POST["check_password"]) {
	        	$error = "Passwords do not match";
	    	} 
	    else {
	        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	        try {
	            $stmt = $pdo->prepare(
	                "INSERT INTO users (email, nom, prenom, password, filiere) VALUES (?, ?, ?, ?, ?)"
	            );
	            $stmt->execute([$email, $nom, $prenom, $password, $filiere]);
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
								 	    <select name="filiere" required>
								 	    	<option	value="" disabled selected>Filiere</option>

									     	<option value="GE1">GE1</option>
											<option value="GE2">GE2</option>
											<option value="GE3">GE3</option>

											<option value="GI1">GI1</option>
											<option value="GI2">GI2</option>
											<option value="GI3">GI3</option>

											<option value="GPEE1">GPEE1</option>
											<option value="GPEE2">GPEE2</option>
											<option value="GPEE3">GPEE3</option>

											<option value="IID1">IID1</option>
											<option value="IID2">IID2</option>
											<option value="IID3">IID3</option>

											<option value="IRIC1">IRIC1</option>
											<option value="IRIC2">IRIC2</option>
											<option value="IRIC3">IRIC3</option>

											<option value="MGSI1">MGSI1</option>
											<option value="MGSI2">MGSI2</option>
											<option value="MGSI3">MGSI3</option>
									    </select>
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