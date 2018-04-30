<div class="sheet row">
    <?php foreach ($sheet as $donnees) { ?>

        <div class=" col-xs-6 col-sm-12">
            <h1 class="title"> <?php echo $donnees['title']; ?> </h1>
        </div>

        <div class=" col-xs-6 col-sm-6"><img src="resources/img/<?php echo $donnees['image'];?>"></div>
        <div class=" col-xs-6 col-sm-6">
            <p><strong>Date de sortie:</strong> <?php echo $donnees['date']; ?> </p>
            <p><strong>De:</strong>  <?php echo $donnees['director']; ?> </p>
            <p><strong>Genre:</strong>  <?php foreach ($categories as $cat) { echo $cat['name'].", ";} ?> </p>
            <p><strong>Nationalité:</strong>  <?php echo $donnees['nationality']; ?> </p>

            <h1 class="synopsis">Synopsis</h1>
            <p class="abstract"><?php echo $donnees['synopsis']; ?></p>

            <a class="return" href="index.php?ctrl=sheet&action=sheets"">Retour</a>
        </div>
    <?php } ?>

</div>
