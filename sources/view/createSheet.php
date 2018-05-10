<div class="row">
    <div class=" title col-xs-6 col-sm-12">
        <h2>Créer une fiche</h2>
		<?if(isset($_GET['error']) && $_GET['error']=="exist") echo '<p>Cette fiche existe dejà.Voulez-vous  <a href="index.php?ctrl=sheet&action=update">la modifier</a> ?</p>';?>
		<?if(isset($_GET['error']) && $_GET['error']=="empty") echo '<p>Tous les champs doivent être remplies .</p>';?>
    </div>
    <div class=" title col-xs-6 col-sm-4"></div>
    <div class="form formCreate col-xs-6 col-sm-4">
        <form action="index.php?ctrl=sheet&action=doCreateSheet" method="post">
            <input type="text" name="title" id="title" placeholder="Titre" required>
            <input type="text" name="director" id="director" placeholder="Réalisateur" required>
            <input type="date" name="date" id="date" placeholder="Date de sortie" required>
            <input type="text" name="nationality" id="nationality" placeholder="Nationalité">
			<input type="text" name="synopsis" id="synopsis" placeholder="Synopsis" />
			<input type="text" name="image" id="image" />
            <input type="submit" value="Créer une fiche">
            <?php
            if(isset($info)) { echo "<p>".$info."</p>";}
            ?>
        </form>
    </div>
    <div class="left col-xs-6 col-sm-4">
    </div>
</div>