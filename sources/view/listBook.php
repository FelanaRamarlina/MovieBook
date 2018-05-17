<div class="row">
    <div class="col-md-6">

        <p>Trouvez ci-dessous la liste des Books crées</p>

        <ul>
            <?php
            if(count($books) == 0) {
                echo "<p>Aucun book pour le moment</p>";
            }
            else {
                foreach ($books as $book) {
                    echo "<li><a href='./resources/books/book_".$book['id'].".pdf'>".$book['name']."</a> - ".$book['created_at']."</li>";
                }
            }
            ?>
        </ul>
    </div>
    <div class="col-md-6">
        <p>Mes Books</p>
        <ul>
        <?php
        if(count($selfBooks) == 0) {
            echo "<p>Vous n'avez pas encore créer de book</p>";
        }
        else {
            foreach ($selfBooks as $selfBook) {
                echo "<li><a href='./resources/books/book_".$selfBook['id'].".pdf'>".$selfBook['name']."</a> - ".$selfBook['created_at']."</li>";
            }
        }
        ?>
        </ul>
    </div>

</div>
