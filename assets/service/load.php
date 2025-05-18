<?php

$file = '../dock/TPD-FX_Medical_Evacuation_Dossier.pdf';
$verifyFile = '../dock/verify';

file_put_contents($verifyFile, '0');

if (isset($_GET['download'])) {
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="document.pdf"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        http_response_code(404);
        echo "File not found.";
    }
} else {
    if (file_exists($file)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');
        readfile($file);
        exit;
    } else {
        http_response_code(404);
        echo "File not found.";
    }
}
