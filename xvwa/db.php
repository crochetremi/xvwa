<?php
// Connexion à la base et amorçage automatique (jeu de données de démonstration).
function db() {
    static $c = null;
    if ($c) return $c;
    $tries = 0;
    while ($tries < 15) {
        $c = @mysqli_connect('db', 'xvwa', 'xvwa123', 'xvwa');
        if ($c) break;
        $tries++; sleep(2);
    }
    if (!$c) { http_response_code(503); die('Base de donnees indisponible (reessayez dans quelques secondes).'); }
    mysqli_query($c, "CREATE TABLE IF NOT EXISTS users (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50), password VARCHAR(50))");
    mysqli_query($c, "CREATE TABLE IF NOT EXISTS comments (id INT PRIMARY KEY AUTO_INCREMENT, body TEXT)");
    $r = mysqli_query($c, "SELECT COUNT(*) AS n FROM users");
    if ($r && mysqli_fetch_assoc($r)['n'] == 0) {
        mysqli_query($c, "INSERT INTO users (username,password) VALUES ('admin','S3cr3t!'),('alice','pass123'),('bob','hunter2')");
    }
    return $c;
}
