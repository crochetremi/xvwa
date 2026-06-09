<?php
$XVWA_WEBROOT = '';
$host = "db";                  // Le nom du service Docker (et non localhost)
$dbname = 'xvwa';              // Le nom de la base défini dans le docker-compose
$user = 'xvwa_user';           // L'utilisateur défini dans le docker-compose
$pass = 'xvwa_password';       // Le mot de passe défini dans le docker-compose
$conn = new mysqli($host,$user,$pass,$dbname);
$conn1 = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
