<link rel="stylesheet" href="/XLC/vista/inici.css">

<?php include "header.php";?>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.wrap {
    width: 100%;
    margin: auto;
}

.imgflex {
    display: flex;
    width: 100%;
    justify-content: flex-start;
    flex-wrap: wrap;
}

.img {
    flex-grow: 1;
    height: 80vh;
}

img {
    max-height: 100%;
    min-width: 100%;
    object-fit: cover;
    opacity: 1;
}

.sectionBuscar {
    width: 100%;
    height: 100vh;
}

.fade {
    width: 100%;
    height: 100%;
    top: -100%;
    position: relative;
    /* NO VA JODER */
    transition: 0.5s;
}

.fade:hover {
    
    background: linear-gradient(to right, rgba(255, 216, 158, 0.8) 0%, rgba(0,0,0, 0) 150%);
}

/*.buscar {
    position: absolute;
    top: 50%;
    left: 40%;
}

.inpText {
    border: none;
    font-size:30px;
    border-bottom: 2px solid black;
    background: transparent;
}*/



</style>

<div class="wrap">

    <div class="sectionBuscar">

        <div class=imgflex>
        
            <div class="img">
                <img src="/XLC/vista/img/una-2.jpg" alt="una">
                <div class="fade"></div>

            </div>
            
            <div class="img">
                <img src="/XLC/vista/img/dos.jpg" alt="dos">
                <div class="fade"></div>

            </div>
            
            <div class="img">
                <img src="/XLC/vista/img/quatre.jpg" alt="tres">
                <div class="fade"></div>

            </div>

            <!-- <div class="buscar">

                <input class="inpText" type="text" name="buscar" placeholder="Busca un producte">

            </div> -->

        </div>

    </div>

    
    
   
    
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <p>Descobreix els negocis que tens aprop i que no coneixies!</p>
    <?php
        echo $_SESSION['negoci?'];
        echo $_SESSION['entra'];
        echo $_SESSION['signin'];
        echo $_SESSION['signin2'];
        echo $_SESSION['login'];
        echo $_SESSION['res_c'];
        echo $_SESSION['res_n'];
        echo $_SESSION['imatge'];
        echo $_SESSION['cons_client'];
        echo $_SESSION['aff'];

    ?>
    <br>
    <p>Aquí trobaràs una selecció de productes dels negocis adherits al nostre portal</p>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>

<!-- <script>

    jQuery(document).ready(function(){

        jQuery(".inpText").focus(function(){

            jQuery("img").css('opacity', '0.4');

        });
        jQuery(".inpText").blur(function(){

            jQuery("img").css('opacity', '0.6');

        });

    });

</script> -->


<?php include("footer.php"); ?>