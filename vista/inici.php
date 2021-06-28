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

.close {
    background: transparent;
    border: none;
    float: right;
}

.imgflex {
    display: flex;
    width: 100%;
    justify-content: flex-start;
    flex-wrap: wrap;
    height: 620px;
    overflow: hidden;
}

.carousel {
    width: 100%;
}

.titol1 {
    margin: 1em 0;
}

.prod_abaix {
    padding: 5px;
}

.info_nom, .preu {
    font-weight: bold;
    margin: 0;
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
    transform: scale(1.025);
    transform-origin: center;
}

.background {
    transition: transform 250ms ease-out;
    transition: 0.4s;
    width: 100%;
    color: black;
}

</style>


<?php

    if (isset($_SESSION['compra'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Compra realitzada correctament.</strong> Consulta el registre de compres per a més detalls
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['compra']);
    }

?>

<div class="wrap">
   
    <div class="container-fluid main-container">

        <?php

            if ($_SESSION['tipus_usuari'] == 'negoci') {

                include('paginaPerfilNegoci.php');
                
            } else {

                echo '<h1 class="titol1">Descobreix productes artesanals arreu de Catalunya</h1>
        
                <h4>Novetats</h4>
                    
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
                                        <p class="info_nom">'.ucfirst($prod['nom']).'</p>
                                        <p class="info_cate">'.$prod['nom_categoria'].'</p>
                                    </div>
                                    <div class="info2">
                                        <span class="preu">'.$prod['preu'].' €</span>';
                                        if ($prod['descompte'] > 0) {
                                            echo '<span class="descompte">  |  '.$prod['descompte'].' % Rebaixat</span>';
                                        }
                                    echo '</div>
                                </div>
                                </div>

                            </a></div>';

                        }

                echo '</div>';
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

    setTimeout(function() {
        jQuery(".alert").hide(200);
    }, 5000)

    jQuery(".close").click(function() {
        jQuery(".alert").hide(200);
    })

</script>


<?php include("footer.php"); ?>