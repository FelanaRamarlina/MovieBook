<div class="row">
    <div class=" title col-xs-6 col-sm-12">
        <h1>MovieBook</h1>
        <h2>Créez votre book en ligne</h2>
    </div>
    <div class=" title col-xs-6 col-sm-12"></div>
    <div class="left col-xs-6 col-sm-4">
        <!-- <p>Développé par CFA UPMC Students</p>-->
        <img src="resources/img/plume.jpg">
    </div>
    <div class="formLogin form col-xs-6 col-sm-6">
        <form action="index.php?ctrl=user&action=doLogin" method="post">
            <input type="email" name="mail" id="mail" placeholder="Identifiant" required>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion">
            <p>Pas encore inscrit?</p><a class="create" href="index.php?ctrl=user&action=createUser">Créer un compte</a>
            <?php
            if(isset($info)) { echo $info;}
            ?>
        </form>
    </div>
    <div class="left col-xs-6 col-sm-2">
        <!-- <p>Développé par CFA UPMC Students</p>-->
    </div>
</div>