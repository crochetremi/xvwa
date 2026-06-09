<!doctype html><meta charset="utf-8"><title>XSS reflechie</title>
<h2>XSS reflechie</h2>
<form><input name="search" placeholder="votre recherche"><button>OK</button></form>
<!-- (!) VULNERABLE : donnee reaffichee sans echappement -->
<div style="margin-top:12px">Resultat pour : <?php echo $_GET['search'] ?? ''; ?></div>
<p><a href="/">Retour</a></p>
