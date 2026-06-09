<?php require __DIR__ . '/../../db.php'; $c = db();
if (isset($_POST['body']) && $_POST['body'] !== '') {
    $b = mysqli_real_escape_string($c, $_POST['body']); // echappement SQL seulement
    mysqli_query($c, "INSERT INTO comments (body) VALUES ('$b')");
}
?>
<!doctype html><meta charset="utf-8"><title>XSS stockee</title>
<h2>XSS stockee (livre d'or)</h2>
<form method="post"><input name="body" placeholder="votre commentaire"><button>Poster</button></form>
<div style="margin-top:12px">
<?php $r = mysqli_query($c, "SELECT body FROM comments ORDER BY id DESC");
// (!) VULNERABLE : commentaires affiches sans echappement HTML
while ($row = mysqli_fetch_assoc($r)) { echo '<p>' . $row['body'] . '</p>'; } ?>
</div>
<p><a href="/">Retour</a></p>
