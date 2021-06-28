<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xarxa Local de Comerços</title>

    <!-- JQuery Core -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JQuery UI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!-- JQuery Validate -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="/XLC/vista/bootstrap2.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="/XLC/vista/js/header.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

    <!-- VUE -->
    <script src="https://unpkg.com/vue@next"></script>

    <!-- AXIOS (ajax for vue) -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Other Shittys -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:wght@700&display=swap">

</head>

<style>

/* COLOR PALETTE {
    "Eerie Black":"#101819",
    "Linen":"#FAEADB",
    "Yellow Orange":"#EFA243",
    "Firebrick":"#B3001B"
}*/

@font-face {
    font-family: "keka";
    src: url("../XLC/fonts/keka.otf");
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Noto Sans JP', serif;
}

.pagina {
	background: #FDFDFD;
}

a {
    text-decoration: none;
    color: black;
}

.capçalera_flex {
    display: flex;
    background-color: #FDFDFD;
    padding: 10px 30px;
    position: fixed;
    top: 0px;
    width: 100%;
    z-index: 2;
}

.cap_esq {
    display: flex;
    align-items: center;
}

.cap_dreta {
    margin-left: auto;
    display: flex;
    align-items: center;
}

.logo {
    width: 60px;
}

.titol_header {
    font-family: 'Carter One', cursive;
    font-size: 1.5em;
}

.cerca {
    margin-right: 35px;
    font-size: 15px;
    background: transparent;
    border: none;
    line-height: 25px;
    border-bottom: 2px solid #101819;

}

h1 h2 {
    font-family: 'Vidaloka', sans-serif;
}

.usuari {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: inline-block;
    background-color: #B3001B;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FAEADB;
}

.descripcio_flex {
    width: 100%;
    display: flex;
    justify-content: center;
    line-height: 30px;
}

.descripcio_flex p {
    width: 50%;
    padding: 50px;
    font-size: 20px;
    font-weight: bold;
    text-align: justify;
    text-align-last: center;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
}

.stickyUser {
    position: fixed!important;
    top: 80px;
}

.search {
    background: transparent;
    border: none;
    border-bottom: 1px solid black;
    border-radius: 0px;
}

.navbar {
    margin-top: 0px;
}

.navbar_item:hover > a {
    color: brown;
}

.navbar_item:hover {
    color: brown;
}

.navbar_item.cistella {
    margin-left: auto;
}

.navbar_item {
    margin-right: 40px;
    font-size: 22px;
    cursor: pointer;
    font-family: 'Yanone Kaffeesatz', sans-serif !important;
}

.sticky + .content {
    padding-top: 80px;
}

.cerca_icon {
    margin-right: 7px;
    position: relative;
    top: 3;
    color: 101819;
}

.dialeg_usuari {
    background-color: #FAEADB;
    top: 83px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    position: fixed;
    display: none;
    right: 30px;
    z-index: 1;
}

.perfil, .logout {
    transition: 0.4s;
    font-size: 16px;
    color: #B3001B;
    padding: 13px 15px;
}

.perfil:hover, .logout:hover {
    background-color: #B3001B;
    color: #FAEADB;
}

.dialeg_cistella {
    background-color: #FAEADB;
    top: 83px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    right: 90px;
    position: fixed;
    display: none;
    z-index: 1;
}

.cistella_prods, .cistella_punts {
    transition: 0.4s;
    font-size: 16px;
    color: EFA243;
    padding: 13px 15px;
}

.cistella_prods:hover, .cistella_punts:hover {
    background-color: #EFA243;
    color: #FAEADB;
}

.perfil:hover>a {
    color: white;
}

.feather.feather-x-circle, .feather.feather-user, .feather.feather-align-left, .feather.feather-gift {
    vertical-align: bottom;
    margin-right: 15px;
}

.content {
    padding: 0% 5%;
    background: #FDFDFD!important;
}

.cistella {
    position: relative;
    margin-right: 15px;
    cursor: pointer;
}

.cistella_info {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}

.cistella_icon {
    width: 45px;
    vertical-align: bottom;
}

.navbar_item.item_usuari {
    margin-left: auto;
    margin-right: 0px!important;
}

.logo {
    width: 70%;
}

.navbar-toggler {
    color: black;
    border: none;
    padding: 0;
}

.navbar1, .navbar2 {
    width: 100%;
    margin: auto;
    padding: 0 5%;
    padding-top: 0.5em;
    background: #FDFDFD;
}

.menu_usuari {
    display: flex;
}

.navbar-brand:hover {
    color: black;
}

@media (max-width: 414px) {
    
    .cistella_icon, .usuari {
        width: 35px;
        height: 35px;
    }
}

@media (min-width: 768px) {
    
    .logo {
        width: 60px!important;
    }
}


</style>

<body>

    <div class="pagina">

        <!-- <div class="capçalera_flex"> -->
        <nav class="navbar1 navbar navbar-expand mt-0">
            <div class="container-fluid">

                <a class="navbar-brand" href="index.php">
                    <img class="logo me-lg-2 w-25" src="/XLC/vista/img/logo.png" alt="logo"></img>
                    <span class="d-none d-lg-inline titol_header">Xarxa Catalana Artesania</span>
                </a>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <?php 

                        // Si hi ha una sessió iniciada
                        if (isset($_SESSION['nom'])) {
                            
                                if ($_SESSION['tipus_usuari'] == 'client') {
                                    
                                    echo '<div class="menu_usuari">
                                    
                                        <div class="cistella">
                                            <img class="cistella_icon" src="/XLC/vista/img/cistella.png" alt="">
                                            <div class="cistella_info">'.$_SESSION["cistella"]["qty"].'</div>
                                        </div>
                                        <div class="usuari">'.ucfirst($_SESSION['nom'][0]).'</div>
                                    </div>';

                                } else {
                                    echo '<div class="">
                                        <div class="usuari">'.ucfirst($_SESSION['nom'][0]).'</div>
                                    </div>';
                                }

                        } else {

                            echo '<li class="nav-item">
                                <a href="index.php?accio=registreLogin"><div class="usuari">?</div></a>
                            </li>';
                        }

                    ?>

                </ul>

            </div>
        </nav>


        <?php 

            if ($_SESSION['tipus_usuari'] != 'negoci') {

                echo '<nav class="navbar2 navbar navbar-expand-lg navbar-light mt-0">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Inici</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?accio=mur_promos">Mur de Promocions</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?accio=sobre_projecte" tabindex="-1">Sobre el projecte</a>
                                </li>

                            </ul>

                        </div>

                    </div>
                </nav>';
            }

        ?>
        

        <div class="content">

            <div class="dialeg_usuari">

                <a href="index.php?accio=perfil"><div class="perfil"><i data-feather="user"></i>El meu compte</div></a>
                <a href="index.php?accio=logout"><div class="logout"><i data-feather="x-circle"></i>Tancar sessió</div></a>

            </div>

            <div class="dialeg_cistella">

                <?php
                    if (isset($_SESSION['nom'])) {

                        $cons_punts = "SELECT u.punts FROM usuari u WHERE u.id = ".$_SESSION['usuari_id']."";

                        $res_punts = $bd->query($cons_punts);
                        $punts = $res_punts->fetch_all(MYSQLI_ASSOC);

                        echo '<a href="index.php?accio=perfil_cistella"><div class="cistella_prods"><i data-feather="align-left"></i>'.$_SESSION["cistella"]["qty"].' Productes</div></a>
                        <a href="index.php?accio=perfil"><div class="cistella_punts"><i data-feather="gift"></i>'.$punts[0]['punts'].' punts</div></a>';
                    }
                    
                ?>

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

    feather.replace()

});

</script>
