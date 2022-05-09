<?php

try
{
    $db = new PDO("mysql:host=127.0.0.1;dbname=comparoperator", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage()); 
}