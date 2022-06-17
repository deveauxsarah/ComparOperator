<?php

try {
    // $db = new PDO("mysql:host=127.0.0.1;dbname=comparoperator", 'root', '');
    $db = new PDO("mysql:host=141.94.22.233;dbname=DEVEAUX_comparoperator", 'DEVEAUX', 'Lena1402.');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
