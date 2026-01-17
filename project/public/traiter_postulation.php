<?php
header('Content-Type: application/json');

require_once '../private/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO postulation (nom, prenom, telephone, date_naissance, email, ville, code_postal, adresse, diplome) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $_POST['date_naissance'],
            $_POST['email'],
            $_POST['ville'],
            $_POST['code_postal'],
            $_POST['adresse'],
            $_POST['diplome']
        ]);

        echo json_encode([
            'success' => true,
            'message' => 'Candidature enregistrée! ',
            'id' => $pdo->lastInsertId()
        ]);

    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}
?>