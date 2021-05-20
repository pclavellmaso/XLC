<?php include('header.php'); ?>

<style>

.prodFlex {
    display: flex;
    padding-top: 60px;
}

.esquerre {
    flex: 0 0 34%;
}

img {
    width: 100%;
}

.esquerre {
    flex: 0 0 30%;
}

.dreta {
    margin-left: 50px;
    width: 70%;
}

.prodFlex_abaix {
    display: flex;
}

.abaix_dreta {
    margin-left: auto;
    margin-top: auto;
}

.info {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.fav_btn {
    background: transparent;
    border: none;
    float: right;
}

.feather.feather-heart {
    width: 3em;
    height: 5em;
}

.info_nom {
    font-weight: bold;
    font-size: 2em;
}

.info_descompte {
    font-size: 1.1em;
}

.info_negoci {
    font-size: 1.4em;
}

.info_poblacio {
    font-size: 1.2em;
}

.info_descripcio {
    margin-top: 3em;
}

.info_preu {
    font-weight: bold;
    font-size: 1.3em;
    margin-top: 2em;
}

.prodFlex_abaix {
    margin-top: auto;
}

/* INFO COMPRA */

.info_compra {
    margin-top: 2em;
    padding: 1em;
    background: rgba(239, 162, 67, 0.4);
}

.add {
    border: none;
    color: white;
    padding: 1em;
    font-size: 1em;
    border-radius: 2px;
    margin-left: auto;
    position: relative;
    background: #EFA243;
    display: block;
    cursor: pointer;
}

.descompte {
    margin-top: 0.5em;
    font-size: 1.1em;
    font-weight: bold;
    color: rgba(0,0,0, 0.5);
    cursor: pointer;
    transition: 0.4s;
    border: none;
}

.compra_esq {
    display: flex;
    flex-direction: column;
    flex: 0 0 50%;
}

.info_compra {
    display: flex;
    padding: 1em 1em;
}

form {
    width: 100%;
    display: flex;
}

#vue_qty > p:nth-child(1) {
    margin-bottom: 1em;
}

.descompte:hover, .descompte:focus {
    color: black;
}

.qty_producte {
    vertical-align: super;
    margin: 0px 0.5em;
}

.punts_extra {
    display: block;
    margin-top: 0.6em;
}

.feather.feather-minus-circle.minus, .feather.feather-plus-circle.plus {
    cursor: pointer;
}

.preu_descompte {
    margin-top: auto;
}

input[type="radio"] {
    width: 20px;
    height: 20px;
}


.relacionats {
    margin-top: 6em;
}

</style>

<?php 

    $id = $_GET['id'];

    $cons_prod = "SELECT p.id, p.nom, p.descripcio, p.preu, p.imatge, p.descompte, c.nom_categoria, n.nom as nom_negoci, n.poblacio FROM producte p, categoria c, negoci n WHERE p.id = '$id' and c.id = p.categoria_id and n.id = p.negoci_id";
    $res_prod = $bd->query($cons_prod);
    $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);

?>

<div class="contingut">

    <div class="prodFlex">

        <div class="esquerre">
            <img src="/XLC/vista/img/<?php echo $data_prod[0]['imatge']; ?>" alt="">
        </div>

        <div class="dreta">
            <div class="info">
                <p class="info_nom"><?php echo ucfirst($data_prod[0]['nom']); ?><span class="fav"><button class="fav_btn" name="" value="" type=""><i data-feather="heart"></i></button></span></p>
                <p class="info_negoci"><?php echo ucfirst($data_prod[0]['nom_negoci']); ?></p>
                <p class="info_cate"><?php echo $data_prod[0]['nom_categoria']; ?></p>
                <p class="info_poblacio">Manufacturat a <?php echo $data_prod[0]['poblacio']; ?></p>
                <p class="info_descripcio"><?php echo ucfirst($data_prod[0]['descripcio']); ?></p>
                
                <div class="prodFlex_abaix">
                    <div class="abaix_esq">
                        <?php 
                            if ($data_prod[0]['descompte'] > 0) {
                                $descompte = $data_prod[0]['descompte'];
                                echo '<p class="info_preu">Preu <span style="text-decoration: line-through;">'.$data_prod[0]['preu'].' €</span><span> '.($data_prod[0]['preu'] - $data_prod[0]['preu'] * ($data_prod[0]['descompte'] / 100)).' €</span></p>
                                <p class="info_descompte">Producte rebaixat un '.$descompte.' %</p>';
                            }else {
                                echo '<p class="info_preu">Preu '.$data_prod[0]['preu'].' €</p>';
                            }
                        ?>
                        
                    </div>
                    <div class="abaix_dreta">
                        <form action="index.php?accio=afegir_cistella" method="post">
                            <input type="hidden" name="prod_qty" value="1">
                            <input type="hidden" name="descompte" value="<?php echo $data_prod[0]['descompte']; ?>">
                            <input type="text" name="id_prod" value="<?php echo $data_prod[0]['id']; ?>" hidden>
                            <?php
                                if ($data_prod[0]['descompte'] > 0) {
                                    echo '<button type="submit" class="add add_defecte">Afegir a la cistella</button>';
                                }
                            ?>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr>

    

    <?php
        // Codi per temes de variar els descomptes segons el preu o alguna cosa aixi, pq no sempre siguin els mateixos tres
        /*$cons_desc = "SELECT p.descompte, p.preu FROM producte p WHERE p.id = '$id'";
        $res_desc = $bd->query($cons_desc);
        $data_desc = $res_prod->fetch_all(MYSQLI_ASSOC);

        if () {


        }*/
    
    ?>

    <?php
        if (isset($_SESSION['usuari_id'])) {
            $id_usuari = $_SESSION['usuari_id'];
            $cons_punts = "SELECT u.punts FROM usuari u WHERE u.id = '$id_usuari'";
            $res_punts = $bd->query($cons_punts);
            $data_punts = $res_punts->fetch_all(MYSQLI_ASSOC);

            if ($data_prod[0]['descompte'] == 0) {
                
                // VUE
                echo '<div class="info_compra" id="info_compra"></div>';
            }
        }
        
    ?>

    <div class="relacionats">
    
        <h2 class="titol_relacionats">Productes relacionats</h2>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    
    </div>

</div><!-- contingut -->

<script>    

    // VUEJS
    const options = {
        data() {
            return {
                qty: 1,
                descompte: 0,
                preu_inicial: <?php echo $data_prod[0]['preu']; ?>,
                preu_descompte: 0,
                punts_extra: 0,
                array_descomptes: [5, 10, 15, 20, 35]
            }
        },
        methods: {
            decrement() {
                if (this.qty > 1) {
                    this.qty--
                }
                this.punts_extra = (this.qty - 1) * 50
            },
            increment() {
                this.qty++
                this.punts_extra = (this.qty - 1) * 50
            }
        },

        created() {
            this.preu_descompte = this.preu_inicial
        },

        watch: {
            qty: function() {
                this.preu_descompte = this.preu_inicial * this.qty 
            }
        },

        template: `
        <form action="index.php?accio=afegir_cistella" method="post">
        <div class="compra_esq">
    
            <p>Disposes de <?php echo $data_punts[0]['punts']; ?> punts</p>
            <p>Aquest producte compte amb els següents descomptes:</p>

          

                <div v-for="(descompte, index) in descomptes" class="descs_add">
                    <input v-on:click="this.descompte=descompte" id="index" class="descompte" type="radio" name="punts_aplicats" v-model="descomptes[index] * 100); ?>" checked>
                    <input class="desc_add" name="desc_add" type="text" value="<?php echo $descomptes[$i]; ?>" hidden>
                    <label for="   ">Cap</label>
                </div>


        </div>

        <div class="compra_dreta">
                        
            <p>Per a cada unitat extra acumules 50 punts</p>

            <span v-on:click="decrement()"><i data-feather="minus-circle" class="minus"></i></span>
            <span class="qty_producte">{{ qty }} unitats</span>
            <span v-on:click="increment()"><i data-feather="plus-circle" class="plus"></i></span>
            <span class="punts_extra">Punts extra {{ punts_extra }}</span>

            <p class="preu_descompte">Preu final amb descompte aplicat {{(preu_descompte - (preu_descompte * (descompte / 100)))}} €</p>

            
                <input type="text" name="id_prod" value="<?php echo $data_prod[0]['id']; ?>" hidden>
                <input type="hidden" name="prod_qty_add" v-model="qty">
                <input type="hidden" name="punts_extra" v-model="punts_extra">
                <button type="submit" class="add add_defecte">Afegir a la cistella</button>
            
                        
        </div>
        </form>
        `
    }

    const app = Vue.createApp(options)
    app.mount("#info_compra")

    
    

    feather.replace()

</script>

<?php include('footer.php'); ?>