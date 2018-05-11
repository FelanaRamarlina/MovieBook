</div>
<?php
if(isset($_GET['ctrl'])) {
    if($_GET['ctrl'] == "book")
        echo '<script src="./resources/js/book.js"></script>';
}
?>
<script src="./resources/js/pdfmake.min.js"></script>
<script src="./resources/js/vfs_fonts.js"></script>
