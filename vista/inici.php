<link rel="stylesheet" href="/XLC/vista/inici.css">

<?php include "header.php"; ?>

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
    height: 620px;
    overflow: hidden;
}

.img {
    flex: 0 0 33%;
}

.carousel {
    width: 100%;
}

.titol1 {
    margin-top: 100px;
    margin-bottom: 70px;
}

.prod_abaix {
    background: rgba(0,0,0, 0.2);
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    padding: 10px;
}

.info_nom, .preu {
    font-weight: bold;
}


.foto {
    width: 100%;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.session {
    position: static;
    width: 100%;
    background: rgba(0,0,0,0.5);
    color: white;
}


</style>




<div class="wrap">

    <div class=imgflex>
    
        <div class="img">
            <img class="carousel" src="/XLC/vista/img/una-2.jpg" alt="una">

        </div>
        
        <div class="img">
            <img class="carousel" src="/XLC/vista/img/dos.jpg" alt="dos">

        </div>
        
        <div class="img">
            <img class="carousel" src="/XLC/vista/img/quatre.jpg" alt="tres">

        </div>

    </div>
   
    <div>

        <h1 class="titol1">Descobreix els negocis que tens aprop i que no coneixies!</h1>
        <h2>Aquí trobaràs una selecció de productes dels negocis adherits al nostre portal</h2>

        
        <div class="seleccio container-fluid">
            
        <p>Selecció de productes amb descompte</p>
            
            <div class="grid_seleccio row">

                <?php 

                    $cons_prods = "SELECT p.id, p.imatge, p.descompte, p.nom, p.preu, c.nom_categoria FROM producte p, categoria c WHERE /*p.descompte > 0 and*/ p.categoria_id = c.id";
                    $res_prods = $bd->query($cons_prods);
                    $data_prods = $res_prods->fetch_all(MYSQLI_ASSOC);

                    foreach($data_prods as $prod) { ?>

                        <div class="col-12 col-sm-6 col-xl-4 mt-2 p-3"><a href="index.php?accio=pagina_producte&id=<?php echo $prod['id']; ?>">

                            <div class="prod_amunt">
                                <img class="foto" src="/XLC/vista/img/<?php echo $prod['imatge']; ?>" alt="">
                            </div>
                            <div class="prod_abaix">
                                <div class=info>
                                    <p class="info_nom"><?php echo $prod['nom']; ?></p>
                                    <p class="info_cate"><?php echo $prod['nom_categoria']; ?></p>
                                </div>
                                <div class="info2">
                                    <p class="preu"><?php echo $prod['preu']; ?> €</p>
                                    <p class="descompte"><?php echo $prod['descompte']; ?> % Rebaixat</p>
                                </div>
                            </div>

                        </a></div>

                    <?php } ?>

            </div>

        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--<div class="session">
            <?php
            /*echo 'Log Cookies: ';
            echo '<br>';
            echo 'client10: ';
            print_r(unserialize($_COOKIE[10]));
            echo '<br>';
            echo 'clientnou: ';
            print_r(unserialize($_COOKIE[9]));*/
            ?>
        </div>-->

    </div>

    

</div>

<script>

 

</script>


<?php include("footer.php"); ?>