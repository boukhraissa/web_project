<?php
session_start();
require_once "../private/config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Requête invalide.";
    header("Location: index.php");
    exit();
}

$target_type = $_POST['target_type'] ?? null;
$target_id   = $_POST['target_id'] ?? null;

if (!$target_type || !$target_id) {
    $_SESSION['error'] = "Données manquantes.";
    header("Location: login.php");
    exit();
}

$sql = "DELETE FROM join_requests
        WHERE user_id = ?
          AND target_type = ?
          AND target_id = ?
          AND statut = 'en_attente'";

$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id, $target_type, $target_id]);

if ($stmt->rowCount() > 0) {
    $_SESSION['success'] = "Votre demande a été annulée avec succès.";
} else {
    $_SESSION['error'] = "Impossible d'annuler cette demande.";
}

header("Location: " . $_SESSION['page']);
exit();
