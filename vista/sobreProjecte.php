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
        <h1>Pròximament...</h1>
    </div>

</div>

</div>




<?php include "footer.php";?>