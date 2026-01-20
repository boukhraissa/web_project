<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        http_response_code(403);
        exit('Access denied');
    }

    $file = '../public/assets/calendars/' . $_SESSION['filiere'] . ".pdf";

    if (!file_exists($file)) {
        http_response_code(404);
        exit('File not found: ' . $file);
    }

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="EmploisDuTemps.pdf"');
    header('Content-Length: ' . filesize($file));

    readfile($file);
    exit;
