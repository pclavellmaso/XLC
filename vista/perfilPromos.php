<style>

* {
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
}

.llistaFlex {
    flex: 0 0 60%;
    overflow-y: auto;
    padding-right: 30px;
    background: rgba(0, 0, 0, 0.1);
    padding: 1em;
    height: 80vh;
}

h3 {
    font-size: 1em;
}

/* width */
.llistaFlex::-webkit-scrollbar {
  width: 2px;
}

/* Track */
.llistaFlex::-webkit-scrollbar-track {
  background: gray; 
}
 
/* Handle */
.llistaFlex::-webkit-scrollbar-thumb {
  background: lightgrey; 
}

.prodFlex {
    display: flex;
    flex-direction: column;
}

#contingut {
    padding: 1em;
    width: 100%;
}

.right {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 80%;
    padding-left: 2em;
}

#rightFlex {
    width: 100%;
    display: flex;
}

.data {
    margin-top: 7px;
}

.desc {
    padding-top: 15px;
}

.preu {
    display: inline-block;
}

.flex_img {
    border-radius: 5px;
    background: transparent;
    width: 20%;
    display: flex;
    margin-left: 20px;
}

.check_label {
    margin: auto;
}

img {
    width: 100%;
    margin: auto;
    border-radius: 5px;
    background: transparent;
}

.inputHide {
    display: none;
}

.inputHide + .check_label {
    cursor: pointer;
}

.check_label:before {
    content: "";
    width: 20px;
    height: 20px;
    background-color: transparent;
    display: inline-block;
    border-radius: 2px 2px 2px 2px;
    height: 20px;
    border: 1px solid grey;
}

.inputHide:checked + .check_label:before {
    background-color: gray;
}

.btn_crear {
    transition: 0.4s;
    margin-top: auto;
    background-color: rgba(0, 0, 0, 0.1);
    border: none;
    font-size: 1.3em;
    cursor: pointer;
    padding: 1em;
    width: 100%;
    margin-top: 1em;
}

.btn_crear:enabled {
    background: #EFA243;
    color: white;
}

.input_descmp, .input_data_fi {
    display: inline-block;
    background: transparent;
    border:none;
    border-bottom: 1px solid black;
}

.promo_act {
    background: rgba(0, 0, 0, 0.1);
    margin-left: 2em;
    padding: 2em;
    flex: 0 40%;
    display: flex;
    flex-direction: column;
    height: max-content;
}

.crear_promo {
    display: flex;
}

.promo_act > h3 {
    font-weight: bold;
}

.label_prod {
    margin: 0;
    display: flex;
    cursor: pointer;
}

.prodFlex_wrap {
    display: flex;
}

.promo_wrap {
    display: flex;
    background: rgba(0, 0, 0, 0.1);
    padding: 1em;
    margin-top: 1.5em;
}

.esq, .dreta {
    flex: 0 0 45%;
}

.del {
    flex: 0 0 10%;
    display: flex;
    flex-direction: column;
}

.del_btn {
    margin-top: auto;
    width: 100%;
    background: #B3001B;
    border: none;
    border-radius: 2px;
    color: white;
    padding: 0.5em;
}

.mostra_btn {
    width: 100%;
    background: #EFA243;
    border: none;
    border-radius: 2px;
    color: white;
    padding: 0.7em;
    font-size: 1.3em;
}

h6 {
    margin-top: 3em;
}

.promo_form {
    padding: 4em 0;
}

</style>


<?php

    $usuari_id = $_SESSION['usuari_id'];

    // Consulta dels productes (catàleg) del negoci loguejat
    $cons_prods = "SELECT p.id, p.nom, p.descripcio, p.preu, p.descompte, p.stock, p.imatge FROM producte p, negoci n WHERE p.negoci_id = n.id and n.usuari_id = '$usuari_id'";
    $res_prods = $bd->query($cons_prods);
    $data_prods = $res_prods->fetch_all(MYSQLI_ASSOC);

    // Consulta de promocions actives/creades
    $cons_promos = "SELECT * FROM promocio WHERE negoci_id = ".$usuari_id."";
    $res_promos = $bd->query($cons_promos);
    $data_promos = $res_promos->fetch_all(MYSQLI_ASSOC);


    // Si hi ha promocions actives
    if (count($data_promos) >= 1) {

        echo '<div>

            <h1 style="text-align: left;">Promocions Actives</h1>';

            foreach ($data_promos as $indexPromo => $promocio) {
                
                // Consulta dels productes inclosos a la promocio (subpromocio)
                $cons_subpromo = "SELECT * FROM subpromocio WHERE promocio_id = ".$promocio['id']."";
                $res_subpromo = $bd->query($cons_subpromo);
                $data_subpromo = $res_subpromo->fetch_all(MYSQLI_ASSOC);

                echo '<div class="promo_wrap">

                    <div class="esq">
                        <span>Vàlida desde el <strong>'.$promocio['data_inici'].'</strong> fins al </span>
                        <span><strong>'.$promocio['data_fi'].'</strong></span>
                        <p>Descompte del <strong>'.$promocio['descompte_add'].'%</strong> aplicat</p>
                    </div>
                    <div class="dreta">
                        <p><strong>Inclou els següents productes:</strong> </p>';

                        foreach ($data_subpromo as $indexSubPromo => $subPromo) {

                            // Per a cada article (subpromo) es consulten les dades (nom de moment) del producte
                            $cons_infoProd = "SELECT nom FROM producte WHERE id = ".$subPromo['producte_id']."";
                            $res_infoProd = $bd->query($cons_infoProd);
                            $data_infoProd = $res_infoProd->fetch_all(MYSQLI_ASSOC);

                            echo '<div class="subpromo">';
                                foreach ($data_infoProd as $indexProd => $producte) {
                                    echo '<li>'.ucfirst($producte['nom']).'</li>';
                                }
                            echo '</div>';
                        }
                        
                    echo '</div>
                    
                    <form method="post" class="del" action="index.php?accio=eliminar_promo">
                        <input type="text" name="promo_id" value="'.$promocio['id'].'" hidden>
                        <button type="submit" class="del_btn">Elimina</button>
                    </form>
                    
                </div><hr>';
            }
        echo '</div>
        <div id="contingut2">
            <div id="app">
        </div>
        </div><!-- #contingut -->';

    // Si no hi ha promocions actives
    } else {

        echo '<div>
            <h2>No tens cap promoció activa</h2>
            <h6>Crea una nova promoció per a començar</h6>  
        </div>

        <div id="contingut2">

            <div id="app">

        </div>';
    }

?>


<script>

    //VUE

    promocions = {

        data() {
            return {
                data_prods: <?php echo json_encode($data_prods); ?>,
                llista: [],
                mostrar_form: false,
                ids: [],
                btn_text: 'Crear nova promoció'
            }
        },

        methods: {
            mod: function(nom, id) {
                
                if (!this.llista.includes(nom)) {
                    this.llista.push(nom)
                    this.ids.push(id)
                } else {
                    let index = this.llista.indexOf(nom)
                    this.llista.splice(index, 1)
                    this.ids.splice(index, 1)
                }

                if (this.llista.length > 1) {
                    jQuery(".btn_crear").prop('disabled', false);
                }else {
                    jQuery(".btn_crear").prop('disabled', true);
                }
            },
            mostra: function() {
                this.mostrar_form = !this.mostrar_form
                this.btn_text = (this.btn_text == "Crear nova promoció") ? "Cancela" : "Crear nova promoció"
            }
        },

        template: `
            <button v-on:click="mostra()" class="mostra_btn">{{ btn_text }}</button>

            <div class="promo_form" v-if="mostrar_form">
                <div class="header">
                    <h1>Catàleg actualitzat dels teus productes</h1>
                    <br>
                    <p>1 Selecciona els productes que vulguis incloure en la promoció (Mínim: 2)</p>
                    <p>2 Omple les dades del formulari</p>
                    <p>3 Crear Promoció!</p>
                    <br>
                    <p>* El descompte aplicat a l'hora de crear la promoció descarta els descomptes individuals dels productes</p>
                </div>

                <form id="crearPromoForm" class="crear_promo" action="/XLC/index.php?accio=afegir_promo" method="post">

                    <div class="llistaFlex">

                        <div v-for="(data_prod, i) in data_prods" class="prodFlex">
                            <div class="prodFlex_wrap">
                        
                                <div class="flex">
                                    <input class="inputHide" v-bind:id="i" name="ids[]" type="checkbox" v-model="data_prod['id']">
                                    <label v-on:click="mod(data_prod['nom'], data_prod['id'])" class="check_label" v-bind:for="i"></label>
                                </div>

                                <label v-on:click="mod(data_prod['nom'], data_prod['id'])" class="label_prod" v-bind:for="i">
                                    <div class="flex_img">
                                        <img :src="'/XLC/vista/img/' + data_prod['imatge']">
                                    </div>
                                    
                                    <div class="right">

                                        <div>
                                            <h3 style="font-weight: bold;">{{ data_prod['nom'].capitalize() }}</h3>
                                            <h6 class="data">Afegit el: 25/01/2020</h6>
                                            <h6 class="descompte">Descompte: {{ data_prod['descompte'] }} %</h6>
                                            <h6 class="preu">{{ data_prod['preu'] }} €</h6>
                                        </div>

                                        <!--Guardar pels informes <h5>24u. venudes</h5>-->
                                    </div>
                                </label>
                            
                            </div>
                            <hr>
                        </div>

                    </div>

                    <div class="promo_act">

                        <h3>Productes inclosos: </h3>

                        <ul>
                            <li v-for="(nom, index) in llista">{{ nom.capitalize() }}</li>
                        </ul>

                        <h3 style="display: inline-block; margin-top: 15px;">Aplicar descompte del</h3>
                        <input name="descompte" value="" class="input_descmp" min=0 max=90 type="number" required>

                        <h3 style="margin-top: 15px;">Data de finalització</h3>
                        <input name="data_fi" value="" class="input_data_fi" type="date" required>

                        <input name="ids" v-model="ids" type="hidden">

                        <button style="display: block" class="btn_crear" type="submit" form="crearPromoForm" disabled>Crear Promoció</button>
                            
                    </div>

                </form>
            </div>
        `
    }

    const app = Vue.createApp(promocions)
    app.mount("#app")


    /*jQuery(document).ready(function() {
        
    })*/
    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }


</script>