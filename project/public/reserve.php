<?php
session_start();
require_once "../private/config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$target_type = $_POST['target_type'];
$target_id   = $_POST['target_id'];
$source      = $_POST['source'];

try {
    $sql = "
        INSERT INTO join_requests
        (user_id, target_type, target_id, source, statut)
        VALUES (?, ?, ?, ?, 'en_attente')
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $user_id,
        $target_type,
        $target_id,
        $source
    ]);

    $_SESSION['success'] = "Votre demande a été envoyée à l'administration.";

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        $_SESSION['error'] = "Une demande est déjà en attente pour cet élément.";
    } else {
        $_SESSION['error'] = "Erreur lors de l'envoi de la demande.";
    }
}
header("Location: " . $_SESSION['page']);
exit();
