<div class="row">
    <div class="login col-xs-6 col-sm-8" style='border:1px solid blue;'>
        <form action="index.php?ctrl=user&action=doLogin" method="post">
            <h1>MovieBook</h1>
            <h2>Créez votre book en ligne</h2>
            <input type="email" name="mail" id="mail" placeholder="Identifiant" required>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion">
            <?php
            if(isset($info)) { echo $info;}
            ?>
            <p>Développé par CFA UPMC Students</p>
        </form>
    </div>
    <div class="col-xs-6 col-sm-4" style='border:1px solid blue;'></div>
</div>