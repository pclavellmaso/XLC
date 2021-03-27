<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xarxa Local de Comerços</title>

    <!--JQuery Core-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--JQuery UI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!--JQuery Validate-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" crossorigin="anonymous"></script>

    <!--CSS styles-->
    <link rel="stylesheet" href="/XLC/vista/header.css">

    <!--JS files-->
    <script src="/XLC/vista/js/header.js"></script>

    <!--Other Shittys-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:wght@700&display=swap">

</head>

<body>

    <div class="pagina">

        <div class="capçalera_flex">

            <div class="logo">

                <h2>XLC - Cardedeu</h2>
            </div>

            <div class="titol">
                <h1><a href="index.php">Xarxa Local de Comerços</a></h1>
            </div>

            <div class="tema">

                <div class="tema_clar"></div>
                <div class="tema_fosc"></div>

            </div>

        </div>

        <div class="navbar">

            <div class="navbar_item"><a href="index.php">Inici</a></div>

            <!-- Només el usuari registrat com a negoci podrà veure l'apartat Rànking negocis -->
            <?php if (isset($_SESSION['tipus_usuari']) and $_SESSION['tipus_usuari'] == 'negoci') {?>

                <div class="navbar_item"><a href="index.php?accio=llista_negocis">Rànking Negocis</a></div>

            <?php }?>

            <div class="navbar_item"><a href="index.php?accio=mur_promos">Mur de Promocions</a></div>
            <div class="navbar_item"><a href="index.php?accio=sobre_projecte">Sobre el Projecte</a></div>

            <?php
                echo 'Log Session: ';
                print_r($_SESSION);
            ?>

            <div class="navbar_item usuari">

                <?php 

                    //si hi ha una sessió iniciada
                    if (isset($_SESSION['nom'])) { echo $_SESSION['nom']; } else {
                        
                        // icono / algo nice jeje
                        echo "<a href='index.php?accio=registreLogin'>Registra't o Inicia sessió</a>";
                    }
                ?>

            </div>

        </div>

        <div class="dialeg_usuari">

            <div><a href="index.php?accio=perfil">Pàgina perfil</a></div>
            <div><a class="logout" href="index.php?accio=logout">Tancar sessió</a></div>

        </div>

    </div>

<?php

    if (isset($_SESSION['nom'])) {

        echo '<script>

            $(document).ready(function(){

            $(".navbar_item.usuari").on("click", function(){
                $(".dialeg_usuari").toggle();
            });

        });

        </script>';
    }

?>

