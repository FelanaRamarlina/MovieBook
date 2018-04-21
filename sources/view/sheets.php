<div class="row">
    <div class=" col-xs-6 col-sm-12">
        <form action="index.php?ctrl=sheet&action=showSheetsByName" method="post">
            <input type="text" name ="recherche" id="recherche" class="research form-control form-control-lg"  placeholder="Rechercher une fiche...">
            <input type="submit" style="display: none" />
        </form>
    </div>
</div>
<div class="row">
    <div class="menu col-xs-6 col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php?ctrl=sheet&action=sheets">Tous</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    foreach ($categories as $donnees) {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" onclick=\"\">";
                                echo $donnees['name'];
                                echo '</a></li>';
                    }
                    ?>
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
        if(isset($info)) {
            echo '<div class=" col-xs-6 col-sm-12" style="">'.$info.'</div >';
        }
    ?>
</div>