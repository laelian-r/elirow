<?php
    try {
        $host = "localhost";
        $dbname = "elirow";
        $dbuser = "root";
        $dbpassword = "";
        $db = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Échec de la connexion: " . $e->getMessage();
    }
?>