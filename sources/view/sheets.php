<div class="row">
    <div class=" col-xs-6 col-sm-12"><input class="research form-control form-control-lg" type="text" placeholder="Rechercher une fiche..."></div>
</div>
<div class="row">
    <div class="menu col-xs-6 col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php?ctrl=user&action=fiches">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" onclick="">Action</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Science fiction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comédie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Guerre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Horreur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Drame</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thriller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Musique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Créer un book</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="row">
    <?php
        foreach ($sheets as $donnees) {
            echo "<div class='divPoster col-6 col-md-3'><a href='index.php?ctrl=sheet&action=sheet'>";
            echo '<img class="poster" src="resources/img/'.$donnees['image'].'">';
            echo '</a></div>';
        }
    ?>
</div>