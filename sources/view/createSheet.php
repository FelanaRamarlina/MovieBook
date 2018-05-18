<div class="row">
    <div class=" title col-xs-6 col-sm-12">
        <h2>Créer une fiche</h2>

    </div>
    <div class=" title col-xs-6 col-sm-4"></div>
    <div class="form formCreate col-xs-6 col-sm-4">
        <form action="index.php?ctrl=sheet&action=doCreateSheet" method="post" enctype="multipart/form-data">
            <input class="loginForm" type="text" name="title" id="title" placeholder="Titre" required>
            <input class="loginForm" type="text" name="director" id="director" placeholder="Réalisateur" required>
            <input class="loginForm" type="date" name="date" id="date" placeholder="Date de sortie" required>
            <input class="loginForm" type="text" name="nationality" id="nationality" placeholder="Nationalité" required>
			<input class="loginForm" type="text" name="synopsis" id="synopsis" placeholder="Synopsis" />
            <label for="cat">Catégorie</label>
            <select id="cat" name="cat">
                <option value="1">Action</option>
                <option value="2">Science Fiction</option>
                <option value="3">Comédie</option>
                <option value="4">Horreur</option>
                <option value="5">Guerre</option>
                <option value="6">Musique</option>
                <option value="7">Drame</option>
                <option value="8">Thriller</option>
                <option value="9">Policier</option>
                <option value="10">Animation</option>
            </select>
			<input type="file" name="image" id="image" />
            <input class="submitLoginForm" type="submit" value="Créer une fiche">
            <?php
            if(isset($info)) { echo "<p>".$info."</p>";}
            ?>
        </form>
    </div>
    <div class="left col-xs-6 col-sm-4">
    </div>
</div>