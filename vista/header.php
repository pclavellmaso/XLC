<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xarxa Local de Comerços</title>

    <!-- JQuery Core-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JQuery UI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!-- JQuery Validate-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="/XLC/vista/header.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="/XLC/vista/js/header.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- VUE -->
    <script src="https://unpkg.com/vue@next"></script>

    <!-- AXIOS (ajax for vue) -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Other Shittys -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:wght@700&display=swap">

</head>

<body>

    <div class="pagina">

        <div class="capçalera_flex">

            <div class="cap_esq">

                <img class="logo" src="/XLC/vista/img/logo.png" alt="logo"></img>
                <a href="index.php"><h1 class="titol">Xarxa Local de Comerços</h1></a>

            </div>

            <div class="cap_dreta">
                <div class="cerca_icon"><i data-feather="search"></i></div>
                <input class="cerca" type="text" placeholder="Busca...">

                <?php 

                    //si hi ha una sessió iniciada
                    if (isset($_SESSION['nom'])) {
                        
                        echo '<div class="cistella">
                            <img class="cistella_icon" src="/XLC/vista/img/cistella.png" alt="">
                            <div class="cistella_info">'.$_SESSION["cistella"]["qty"].'</div>
                        </div>'; 
                    }
                ?>
                
                <?php 
                
                    if (isset($_SESSION['nom'])) {
                        // Primera lletra del nom de l'usuari
                        echo '<div class="usuari">'.ucfirst($_SESSION['nom'][0]).'</div>';
                    }else {
                        echo '<a href="index.php?accio=registreLogin"><div class="usuari">?</div></a>';
                    }
                ?>
                

            </div>

        </div>

        <div class="navbar">

            <div class="navbar_item"><a href="index.php">Inici</a></div>

            <!-- Només el usuari registrat com a negoci podrà veure l'apartat Rànking negocis -->
            <?php if (isset($_SESSION['tipus_usuari']) and $_SESSION['tipus_usuari'] == 'negoci') {?>

                <div class="navbar_item"><a href="index.php?accio=llista_negocis">Rànking Negocis</a></div>

            <?php }?>

            <div class="navbar_item"><a href="index.php?accio=mur_promos"></i>Mur de Promocions</a></div>
            <div class="navbar_item"><a href="index.php?accio=sobre_projecte">Sobre el Projecte</a></div>
            <div class="navbar_item item_usuari">

            </div>

        </div>

        <div class="content">

            <div class="dialeg_usuari">

                <a href="index.php?accio=perfil"><div class="perfil"><i data-feather="user"></i>Pàgina perfil</div></a>
                <a href="index.php?accio=logout"><div class="logout"><i data-feather="x-circle"></i>Tancar sessió</div></a>

            </div>

            <div class="dialeg_cistella">

                <a href="index.php?accio=perfil_cistella"><div class="cistella_prods"><i data-feather="align-left"></i><?php echo $_SESSION["cistella"]["qty"]; ?> Productes</div></a>
                <a href="#"><div class="cistella_punts"><i data-feather="gift"></i>125 Punts</div></a>

            </div>

  

<?php

    if (isset($_SESSION['nom'])) {

        echo '<script>

            jQuery(document).ready(function(){

                

                jQuery(".usuari").on("click", function(){
                    
                    jQuery(".dialeg_cistella").hide("fade", {direction: "center"}, 250);

                    if(jQuery(".dialeg_usuari").css("display") == "none") {
                        
                        jQuery(".dialeg_usuari").show("fade", {direction: "center"}, 250);
                    }else {
                        jQuery(".dialeg_usuari").hide("fade", {direction: "center"}, 250);
                    }
                });

                jQuery(".cistella").on("click", function(){
                    
                    jQuery(".dialeg_usuari").hide("fade", {direction: "center"}, 250);

                    if(jQuery(".dialeg_cistella").css("display") == "none") {
                        
                        jQuery(".dialeg_cistella").show("fade", {direction: "center"}, 250);
                    }else {
                        jQuery(".dialeg_cistella").hide("fade", {direction: "center"}, 250);
                    }
                });

            });

            feather.replace()

        </script>';
    }

?>

<script>

jQuery(document).ready(function() {


    /* Click on document tanca sidemenu */
    jQuery(document).click(function() {
        
        jQuery('.dialeg_usuari').hide("fade", {direction: "center"}, 250);
        jQuery('.dialeg_cistella').hide("fade", {direction: "center"}, 250);
    })
    
    /* Stop propagation del click on document en el propi sidemenu */
    jQuery('.cistella').on('click', function(e){
        e.stopPropagation()
    });
    jQuery('.usuari').on('click', function(e){
        e.stopPropagation()
    });





});



</script>
