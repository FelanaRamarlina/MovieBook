<div class="row">
    <div class=" title col-xs-6 col-sm-12">
        <h2>Créer mon compte</h2>
    </div>
    <div class="col-md-3"></div>
    <div class="form formCreate col-md-6">
        <form action="index.php?ctrl=user&action=doCreate" method="post">
            <input class="loginForm" type="text" name="lastname" id="lastname" placeholder="Nom" required>
            <input class="loginForm" type="text" name="firstname" id="firstname" placeholder="Prénom" required>
            <input class="loginForm" type="email" name="mail" id="mail" placeholder="Adresse électronique" required>
            <input class="loginForm" type="password" name="password" id="password" placeholder="Mot de passe">
            <input class="submitLoginForm" type="submit" value="M'inscrire">
            <?php
            if(isset($info)) { echo "<p>".$info."</p>";}
            ?>
            <a href="index.php?ctrl=user&action=login" style="text-align: center">Connexion</a>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>