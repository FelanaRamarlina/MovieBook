
<h2>Créer une fiche</h2>
<?if(isset($_GET['error']) && $_GET['error']=="exist") echo '<p>Cette fiche existe dejà.Voulez-vous  <a href="index.php?ctrl=sheet&action=update">la modifier</a> ?</p>';?>
<?if(isset($_GET['error']) && $_GET['error']=="empty") echo '<p>Tous les champs doivent être remplies .</p>';?>
<form class="sheetForm" method="post" action="index.php?ctrl=sheet&action=doCreate">
	<p><label for="title">Titre: </label> <input type="text" name="title" id="title" /></p>
	<p><label for="director">Réalisateur : </label> <input type="text" name="director" id="director" /></p>
	<p><label for="date">Date de sortie : </label> <input type="date" name="date" id="date" /></p>
	<p><label for="nationality">Nationalité : </label> <input type="text" name="nationality" id="nationality" /></p>
	<p><label for="synopsis">Synopsis : </label> <input type="text" name="synopsis" id="synopsis" /></p>
	<p><label for="image">Image: </label> <input type="text" name="image" id="image" /></p>
	
	<p><input type="submit" value="Créer une fiche"/></p>

</form>
