<div class="row">
    <div class="menu col-xs-6 col-sm-12"><h3>Paramètres du compte</h3></div>
</div>
<form class="row contentData">
    <?php
        foreach ($user as $donnees) {
        ?>
            <div class="menu dataTitle col-xs-6 col-sm-6"><p>Nom</p></div>
            <div class="menu col-xs-6 col-sm-6">
                <input type="text" class="name" value="<?php echo $donnees['lastname'];?>">
                <input type="text" class="name" value="<?php echo $donnees['firstname'];?>">
            </div>

            <div class="menu dataTitle col-xs-6 col-sm-6"><p>Adresse email</p></div>
            <div class="menu col-xs-6 col-sm-6">
                <input type="text" class="mail" value="<?php echo $donnees['mail'];?>">
            </div>

            <div class="menu dataTitle col-xs-6 col-sm-6"><p>Modifier mon mot de passe</p></div>
            <div class="menu col-xs-6 col-sm-6">
                <input type="password" class="name" placeholder="Nouveau mot de passe">
                <input type="password" class="name" placeholder="Confirmer mot de passe">
            </div>
<?php
}
    ?>
</form>

<div class="row">
    <div class="menu col-xs-6 col-sm-12"><button onClick="" class="saveChanges btn my-2 my-sm-0" type="submit">Enregistrer les modifications</button></div>
</div>