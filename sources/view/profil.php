<div class="row">
    <?php
        foreach ($user as $donnees) {
            echo "<div class=\"menu col-xs-6 col-sm-12\" style='border: 1px solid red;'><h1>".$donnees['lastname']." ".$donnees['firstname']."</h1></div>";
            echo "<div class=\"menu col-xs-6 col-sm-12\" style='border: 1px solid red;'><h3>".$donnees['mail']."</h3></div>";
            echo "<div class=\"menu col-xs-6 col-sm-12\" style='border: 1px solid red;'><h3>Modifier mon mot de passe</h3></div>";
        }
    ?>
</div>
