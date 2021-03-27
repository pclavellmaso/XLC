<link rel="stylesheet" href="vista/sobreProjecte.css">

<?php include "header.php";?>

<?php /*if (isset($_SESSION)) {

    echo 'sessio actual: ';
    print_r($_SESSION);
    }*/

    /*if (isset($_SESSION['nom'])) {

    echo $_SESSION['nom'];
    }*/

?>

<div>

<div class="inici_flex">

    <?php

        $sql = "SELECT * FROM negoci";
        $result = mysqli_query($bd, $sql);
        // Nº files resultants
        $resultCheck = mysqli_num_rows($result);

        $row = mysqli_fetch_assoc($result);

        //echo 'Consulta nom negoci bd: ';
        //print_r($row['nom']);
    ?>

    <div class="bloc projecte">
        <h1 class="inici">Projecte</h1>
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2>
    </div>

    <div class="bloc objectiu">
        <h1 class="inici">Objectiu</h1>
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2>
    </div>

    <div class="bloc individu">
        <h1 class="inici">Tú com a individu</h1>
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2>
    </div>

    <div class="bloc artesania">
        <h1 class="inici">Artesania</h1>
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h2>
    </div>

</div>

</div>




<?php include "footer.php";?>