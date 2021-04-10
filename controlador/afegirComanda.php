
<?php

    $array_elements = $_SESSION['cistella']['prods'];
    unset($_SESSION['cistella']['prods']);
    $_SESSION['cistella']['qty'] = 0;

?>


<?php header('location: index.php') ?>