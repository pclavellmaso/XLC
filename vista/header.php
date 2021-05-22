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

        <!-- <div class="capçalera_flex"> -->
        <nav class="navbar navbar-expand-lg mt-0">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">Xarxa Local de Comerços</a>

                

                    <form class="d-flex">
                        <div class="cerca_icon"><i data-feather="search"></i></div>
                        <input class="search form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inici</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Mur de Promocions</a>
                        </li>
                    </ul>

                

            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mt-0">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inici</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Mur de Promocions</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>

                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>

                </ul>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                </div>
            </div>
        </nav>

        <div class="content">

            <div class="dialeg_usuari">

                <a href="index.php?accio=perfil"><div class="perfil"><i data-feather="user"></i>Pàgina perfil</div></a>
                <a href="index.php?accio=logout"><div class="logout"><i data-feather="x-circle"></i>Tancar sessió</div></a>

            </div>

            <div class="dialeg_cistella">

                <?php
                    if (isset($_SESSION['nom'])) {

                        $cons_punts = "SELECT u.punts FROM usuari u WHERE u.id = ".$_SESSION['usuari_id']."";

                        $res_punts = $bd->query($cons_punts);
                        $punts = $res_punts->fetch_all(MYSQLI_ASSOC);

                        echo '<a href="index.php?accio=perfil_cistella"><div class="cistella_prods"><i data-feather="align-left"></i><?php echo $_SESSION["cistella"]["qty"]; ?> Productes</div></a>
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
