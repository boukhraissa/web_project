<!DOCTYPE HTML>
<html>
	<head>
		<title>Formulaire de Postulation - ENSA KHOURIBGA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<style>
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			
			body {
				font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
				background:  linear-gradient(135deg, #050e36 0%, #0d0614 100%);
				min-height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
				padding:  20px;
			}
			
			.container {
				background: white;
				border-radius: 20px;
				box-shadow:  0 20px 60px rgba(0, 0, 0, 0.3);
				max-width: 700px;
				width: 100%;
				padding: 40px;
			}
			
			.header {
				text-align: center;
				margin-bottom: 30px;
			}
			
			.header h1 {
				color: #333;
				font-size: 2em;
				margin-bottom: 10px;
			}
			
			.header h4 {
				color: #666;
				font-size: 1.1em;
			}
			
			.form-group {
				margin-bottom:  25px;
			}
			
			.form-group label {
				display: block;
				margin-bottom: 8px;
				color: #333;
				font-weight: 600;
				font-size: 0.95em;
			}
			
			.form-group input,
			.form-group select {
				width: 100%;
				padding: 12px 15px;
				border: 2px solid #e0e0e0;
				border-radius: 8px;
				font-size: 1em;
				transition: all 0.3s ease;
				background:  #f8f9fa;
			}
			
			.form-group input:focus,
			.form-group select:focus {
				outline: none;
				border-color: #667eea;
				background: white;
				box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
			}
			
			.form-row {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 20px;
			}
			
			.btn-submit {
				width: 100%;
				padding:  15px;
				background: linear-gradient(135deg, #1c254e 0%, #625c69 100%);
				color: white;
				border: none;
				border-radius: 8px;
				font-size:  1.1em;
				font-weight: 600;
				cursor: pointer;
				transition:  all 0.3s ease;
				margin-top: 20px;
			}
			
			.btn-submit:hover {
				transform: translateY(-2px);
				box-shadow: 0 10px 25px rgba(73, 87, 146, 0.4);
			}
			
			.btn-submit:disabled {
				opacity: 0.6;
				cursor: not-allowed;
				transform: none;
			}
			
			.btn-retour {
				display: inline-block;
				margin-top: 15px;
				color: #667eea;
				text-decoration: none;
				font-weight: 600;
				transition: all 0.3s ease;
			}
			
			.btn-retour:hover {
				color: #764ba2;
			}
			
			.message {
				padding: 15px;
				border-radius: 8px;
				margin-bottom: 20px;
				display: none;
			}
			
			.message.success {
				background-color: #d4edda;
				border: 1px solid #c3e6cb;
				color:  #155724;
			}
			
			.message.error {
				background-color: #f8d7da;
				border: 1px solid #f5c6cb;
				color:  #721c24;
			}
			
			@media (max-width: 600px) {
				.form-row {
					grid-template-columns: 1fr;
				}
				
				.container {
					padding: 25px;
				}
				
				.header h1 {
					font-size: 1.5em;
				}
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1>Formulaire de Postulation</h1>
				<h4>ENSA KHOURIBGA - Master en Informatique et Mathématiques</h4>
			</div>
			
			<div id="message" class="message"></div>
			
			<form id="formulaire" onsubmit="soumettreFormulaire(event)">
				<div class="form-row">
					<div class="form-group">
						<label for="nom">NOM *</label>
						<input type="text" id="nom" name="nom" required placeholder="Votre nom">
					</div>
					
					<div class="form-group">
						<label for="prenom">PRÉNOM *</label>
						<input type="text" id="prenom" name="prenom" required placeholder="Votre prénom">
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group">
						<label for="telephone">TÉLÉPHONE *</label>
						<input type="tel" id="telephone" name="telephone" required placeholder="06 XX XX XX XX">
					</div>
					
					<div class="form-group">
						<label for="date_naissance">DATE DE NAISSANCE *</label>
						<input type="date" id="date_naissance" name="date_naissance" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email">E-MAIL *</label>
					<input type="email" id="email" name="email" required placeholder="exemple@email.com">
				</div>
				
				<div class="form-row">
					<div class="form-group">
						<label for="ville">VILLE *</label>
						<input type="text" id="ville" name="ville" required placeholder="Votre ville">
					</div>
					
					<div class="form-group">
						<label for="code_postal">CODE POSTAL *</label>
						<input type="text" id="code_postal" name="code_postal" required placeholder="25000">
					</div>
				</div>
				
				<div class="form-group">
					<label for="adresse">ADRESSE *</label>
					<input type="text" id="adresse" name="adresse" required placeholder="Votre adresse complète">
				</div>
				
				<div class="form-group">
					<label for="diplome">DIPLÔME *</label>
					<select id="diplome" name="diplome" required>
						<option value="">-- Sélectionnez votre diplôme --</option>
						<option value="licence">Licence</option>
						<option value="licence_professionnelle">Licence Professionnelle</option>
						<option value="bachelor">Bachelor</option>
						<option value="ingenieur">Diplôme d'Ingénieur</option>
						<option value="master">Master</option>
						<option value="autre">Autre</option>
					</select>
				</div>
				
				<button type="submit" class="btn-submit" id="submitBtn">✉️ SOUMETTRE LA CANDIDATURE</button>
				
				<div style="text-align: center;">
					<a href="Formation.php" class="btn-retour">← Retour à la page Formation</a>
				</div>
			</form>
		</div>
		
		<script>
			function afficherMessage(message, type) {
				const messageDiv = document.getElementById('message');
				messageDiv.textContent = message;
				messageDiv.className = 'message ' + type;
				messageDiv.style.display = 'block';
				
				// Faire défiler vers le haut pour voir le message
				window.scrollTo({ top: 0, behavior: 'smooth' });
				
				// Masquer le message après 5 secondes
				setTimeout(() => {
					messageDiv.style. display = 'none';
				}, 5000);
			}
			
			function soumettreFormulaire(event) {
				event.preventDefault();
				
				const submitBtn = document.getElementById('submitBtn');
				submitBtn.disabled = true;
				submitBtn.textContent = '⏳ Envoi en cours...';
				
				// Créer un objet FormData avec les données du formulaire
				const formData = new FormData(document.getElementById('formulaire'));
				
				// Envoyer les données au serveur
				fetch('traiter_postulation.php', {
					method: 'POST',
					body: formData
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						afficherMessage(data.message, 'success');
						// Réinitialiser le formulaire
						document.getElementById('formulaire').reset();
					} else {
						afficherMessage(data.message, 'error');
					}
				})
				.catch(error => {
                    console.error('Erreur complète:', error);
                    afficherMessage('Erreur:  ' + error. message + ' - Vérifiez la console du navigateur', 'error');
                })
				.finally(() => {
					submitBtn.disabled = false;
					submitBtn.textContent = '✉️ SOUMETTRE LA CANDIDATURE';
				});
			}
		</script>
	</body>
</html>