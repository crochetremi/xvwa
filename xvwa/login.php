<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Demo : pas d'authentification reelle, sert au test de rate-limiting.
    $msg = 'Identifiants invalides.';
}
?>
<!doctype html><meta charset="utf-8"><title>Connexion</title>
<h2>Connexion</h2>
<form method="post">
<p><input name="user" placeholder="utilisateur"></p>
<p><input name="pass" type="password" placeholder="mot de passe"></p>
<button>Se connecter</button></form>
<p style="color:red"><?= $msg ?></p>
<p><a href="/">Retour</a></p>
