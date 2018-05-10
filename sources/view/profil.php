<div class="row">
    <div class="menu col-xs-6 col-sm-6"><h3>Paramètres du compte</h3></div>
    <div class="menu col-xs-6 col-sm-6"><h3 style="color:red;"><?php if(isset($info)) { echo $info;} ?></h3></div>

</div>
<form class="row contentData" action="index.php?ctrl=user&action=doUpdate" method="POST"  >
    <?php
        foreach ($user as $donnees) {
        ?>
            <div class="menu dataTitle col-xs-6 col-sm-6"><p>Nom</p></div>
            <div class="menu col-xs-6 col-sm-6">
                <input name="lastname" type="text" class="name" value="<?php echo $donnees['lastname'];?>">
                <input name="firstname" type="text" class="name" value="<?php echo $donnees['firstname'];?>">
            </div>

            <div class="menu dataTitle col-xs-6 col-sm-6"><p>Adresse email</p></div>
            <div class="menu col-xs-6 col-sm-6">
                <input name ="mail" type="text" class="mail" value="<?php echo $donnees['mail'];?>">
            </div>

            <div class="menu dataTitle col-xs-6 col-sm-6"><p>Modifier mon mot de passe</p></div>
            <div class="menu col-xs-6 col-sm-6 ">
                <input name="password" type="password" class="name" placeholder="Nouveau mot de passe" value="<?php echo $donnees['password'];?>">
                <input name="password2" type="password" class="name" placeholder="Confirmer mot de passe" value="<?php echo $donnees['password'];?>">
            </div>
<?php
}
    ?>
    <div class="menu col-xs-6 col-sm-12"><input class="saveChanges btn my-2 my-sm-0" type="submit" value="Enregistrer les modifications" ></div>
</form>
