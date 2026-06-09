<?php require __DIR__ . '/../../db.php'; $c = db(); $out = '';
if (isset($_GET['item'])) {
    // (!) VULNERABLE : concatenation directe de l'entree utilisateur
    $sql = "SELECT id, username FROM users WHERE id = '" . $_GET['item'] . "'";
    $r = mysqli_query($c, $sql);
    if ($r) { while ($row = mysqli_fetch_assoc($r)) { $out .= $row['id'] . ' - ' . htmlspecialchars($row['username']) . '<br>'; } }
    else { $out = '<span style="color:red">' . htmlspecialchars(mysqli_error($c)) . '</span>'; }
}
?>
<!doctype html><meta charset="utf-8"><title>SQLi</title>
<h2>Injection SQL</h2>
<p>Rechercher un utilisateur par son identifiant :</p>
<form><input name="item" value="<?= htmlspecialchars($_GET['item'] ?? '') ?>"><button>Chercher</button></form>
<div style="margin-top:12px"><?= $out ?></div>
<p><a href="/">Retour</a></p>
