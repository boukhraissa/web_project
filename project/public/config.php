<?php
$host = '127.0.0.1';
$db   = 'ensa_db';
$user = 'root';
$pass = '';
$port = 3307;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "server works";
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
