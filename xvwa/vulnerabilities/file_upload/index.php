<?php
$msg = '';
if (!empty($_FILES['f']['name'])) {
    $dir = __DIR__ . '/uploads';
    @mkdir($dir, 0777, true);
    // (!) VULNERABLE : nom conserve, aucune validation de type ni d'extension,
    //     stockage dans un dossier servi et executable par le serveur web.
    $name = basename($_FILES['f']['name']);
    if (move_uploaded_file($_FILES['f']['tmp_name'], $dir . '/' . $name)) {
        $safe = htmlspecialchars($name);
        $msg = 'Fichier depose : <a href="uploads/' . $safe . '">' . $safe . '</a>';
    } else {
        $msg = 'Echec de l\'upload.';
    }
}
?>
<!doctype html><meta charset="utf-8"><title>Upload</title>
<h2>Upload de fichiers</h2>
<form method="post" enctype="multipart/form-data"><input type="file" name="f"><button>Envoyer</button></form>
<div style="margin-top:12px"><?= $msg ?></div>
<p><a href="/">Retour</a></p>
