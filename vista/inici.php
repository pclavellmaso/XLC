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
    margin-top: 50px;
    margin-bottom: 70px;
}

.prod_abaix {
    padding: 5px;
}

.info_nom, .preu {
    font-weight: bold;
}


.foto {
    width: 100%;
}

.session {
    position: static;
    width: 100%;
    background: rgba(0,0,0,0.5);
    color: white;
}
.background:hover {
    background: rgba(0,0,0, 0.1);
}

.background {
    transition: 0.7s;
    padding: 5px;
}

</style>




<div class="wrap bg-light">
   
    <div class="container-fluid main-container">

        <?php

            if ($_SESSION['tipus_usuari'] == 'client') {

                echo '<h1 class="titol1">Descobreix productes artesanals arreu de Catalunya</h1>
        
                <h2>Novetats</h2>
                    
                <div class="grid_seleccio row">';

                        $cons_prods = "SELECT p.id, p.imatge, p.descompte, p.nom, p.preu, c.nom_categoria FROM producte p, categoria c WHERE /*p.descompte > 0 and*/ p.categoria_id = c.id";
                        $res_prods = $bd->query($cons_prods);
                        $data_prods = $res_prods->fetch_all(MYSQLI_ASSOC);

                        foreach($data_prods as $prod) {

                            echo '<div class="prodFlex col-12 col-sm-6 col-xl-3 mt-2 p-4"><a href="index.php?accio=pagina_producte&id='.$prod['id'].'">

                                <div class="background">
                                <div class="prod_amunt">
                                    <img class="foto" src="/XLC/vista/img/'.$prod['imatge'].'" alt="">
                                </div>
                                <div class="prod_abaix">
                                    <div class=info>
                                        <p class="info_nom">'.$prod['nom'].'</p>
                                        <p class="info_cate">'.$prod['nom_categoria'].'</p>
                                    </div>
                                    <div class="info2">
                                        <p class="preu">'.$prod['preu'].' €</p>
                                        <p class="descompte">'.$prod['descompte'].' % Rebaixat</p>
                                    </div>
                                </div>
                                </div>

                            </a></div>';

                        }

                echo '</div>';
            } else {

                include('paginaPerfilNegoci.php');
            }

        ?>        

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
       

    

</div>

<script>

 

</script>


<?php include("footer.php"); ?>