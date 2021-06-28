<style>

* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

h4 {
    font-size: 1em!important;
    margin-bottom: 0.5em!important;
}

#contentFlex {
    width: 100%;
    display: flex;
    flex-direction: column;
    padding: 5% 0%;
}

#contingut {
    border-radius: 2px;
    padding: 1em;
}

#leftFlex {
    flex: 0 0 30%;
    width: 100%;
}

.menu_item {
    cursor: pointer;
    font-size: 1.3em;
    margin-bottom: 0.5em;
}

#rightFlex {
    flex: 0 0 70%;
    width: 100%;
}

.dadesPersonals, .dadesNegoci, .infoProductes, .infoPromocions {
    display: none;
}
label {
    display: block;
    margin: 20px 0;
}

#arteside {
	width: 25% !important;
	top: 0!important;
	left: 0!important;
	background-color: #f5f2ed !important;
	position: fixed;
	z-index: 2;
	display:none;
}



/* Contingut menú lateral */
#order {
	
	/* Overflow (scroll) en arteside responsive */
	overflow-y: auto;
	height: 100vh!important;
	
	scroll-padding: auto;
	
	/* Amagar scrollbar */
	-ms-overflow-style: none;  /* IE and Edge */
	scrollbar-width: none;  /* Firefox */
}

h5 {
    font-size: 0.8em!important;
}

.info_p_wrap {
    display: flex;
    padding: 2em;
    background: rgba(239, 162, 67, 0.4);
}

.profile {
    width: 100%;
}

.img_wrap {
    margin-right: 2em;
    margin-left: auto;
    top: -20%;
    position: relative;
}

.mask {
    clip-path: circle(2em at center);
    overflow: hidden;
    width: 4em;
    height: 4em;
    background: #B3001B;
    display: flex;
}

.seccio {
    padding: 1em;
    padding-left: 2em;
    width: 100%;
    transition: 0.3s;
    margin: 0;
}

.seccio:hover {
    background: rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

.seccio:hover h4 {
    font-weight: bold;
}

.close {
    background: transparent;
    border: none;
    float: right;
}

#select-label {
    margin-left: 1em;
    font-size: 1.1em;
    vertical-align: text-top;
}

.seccio > h4 {
    font-weight: bold;
}

.label-wrap {
    cursor: pointer;
    display: inline;
}

</style>



<?php include "header.php"; ?>

<?php

    if (isset($_SESSION['new_promo'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Promoció creada!</strong> Pots consultar els seus detalls a la secció de promocions.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['new_promo']);
    }

    if (isset($_SESSION['eliminar_promo'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Promoció eliminada correctament</strong> ...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['eliminar_promo']);
    }

    if (isset($_SESSION['insert'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Producte afegit correctament al catàleg</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['insert']);
    }

    if (isset($_SESSION['eliminar_producte'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Producte eliminat correctament</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['eliminar_producte']);
    }

    if(isset($_SESSION['pass_err'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error a l\'actualitzar la contrasenya</strong> Contrasenya actual invàlida
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['pass_err']);
    } elseif (isset($_SESSION['dades_mod'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dades actualitzades!</strong> ...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['dades_mod']);
    }

    if (isset($_SESSION['dades_NegociMod'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dades actualitzades!</strong> ...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['dades_NegociMod']);
    }

?>

<div id="contentFlex">

    <div id="leftFlex">

        <div class="label-wrap">
            <i data-feather="menu"></i><span id="select-label" class="menu">MENÚ</span><br><br>
        </div>

        <div id="arteside">

            <div class="info_p_wrap">
                <div class="info_p">
                    <h4><?php echo ucfirst($_SESSION['nom']); ?></h4>
                    <h5><?php echo ucfirst($_SESSION['tipus_usuari']); ?> nº <?php echo $_SESSION['usuari_id']; ?></h5>
                </div>

                <div class="img_wrap">
                    <div class="mask">
                        <!--<img class="profile" src="vista/img/profile.jpg" alt="profile.jpg">-->
                        <p style="margin: auto; color: white;"><?php echo ucfirst($_SESSION['nom'][0]); ?></p>
                    </div>
                </div>
            </div>

            <div class="select-hide" id="order">

                <div id="dades_personals" class="seccio">
                    <h4>Dades personals</h4>
                    <p>Consulta i/o edita les teves dades personals</p>
                </div>

                <?php if(isset($_SESSION['tipus_usuari']) and $_SESSION['tipus_usuari'] == 'negoci') { ?>
                
                    <div id="dades_negoci" class="seccio">
                        <h4>Dades negoci</h4>
                        <p>Consulta i/o edita les dades referents al negoci</p>
                    </div>
                    </br>

                    <div id="consul_prods" class="seccio">
                        <h4>Catàleg de productes</h4>
                        <p>Consulta els productes atuals del catàleg, modifica o elimina els existents i afegeix-ne de nous</p>
                    </div>
                    
                    <div id="consul_proms" class="seccio">
                        <h4>Consultar promocions</h4>
                        <p>Consulta les promocions actives i creen de noves.</p>
                    </div>

                <?php }else { ?>
                    
                    <div id="compres" class="seccio">
                        <h4>Registre de compres</h4>
                        <p>Consulta el teu registre de compres realitzades i el corresponent guany o consum de punts en cadascuna</p>
                    </div>
                    </br>
                    <div id="punts" class="seccio">
                        <h4>Els meus punts</h4>
                        <p>Consulta els punts totals aconseguits i els actuals. Descobreix quins descomptes tens desbloquejats</p>
                    </div>
                <?php } ?> 

            </div>
        </div>

    </div>

    <div id="rightFlex">

        <div id="contingut">
        </div>

    </div>

</div>
    

<script>

    // Per defecte carrega la pàgina de les dades personals
    $.ajax({url: "index.php?accio=perfil_personal", success: function(result){
        $("#contingut").hide().html(result).fadeIn(400);
    }});

    jQuery(document).ready(function() {


        jQuery('.label-wrap').on('click', function(e){
            jQuery('#order').css("display", "block");
            jQuery('#arteside').toggle('slide', {direction: 'right'}, 500 );
            e.stopPropagation();
        });

        jQuery('#arteside').on('click', function(e){
            e.stopPropagation()
        });
        
        jQuery(document).on('click', function(){
            jQuery("#arteside").hide('slide', {direction: 'right'}, 500 );
        });

        jQuery('.seccio').after().on('click', function(){
            jQuery("#arteside").toggle('slide', {direction: 'right'}, 500 );
        });

        setTimeout(function() {
            jQuery(".alert").hide(200);
        }, 5000)

        jQuery(".close").click(function() {
            jQuery(".alert").hide(200);
        })




        $("#dades_personals").click(function(){
            $.ajax({url: "index.php?accio=perfil_personal", success: function(result){
                $("#contingut").hide().html(result).fadeIn(400);
            }});
        });

        $("#dades_negoci").click(function(){
            $.ajax({url: "index.php?accio=perfil_negoci", success: function(result){
                $("#contingut").hide().html(result).fadeIn(400);
            }});
        });

        $("#consul_prods").click(function(){
            $.ajax({url: "index.php?accio=perfil_productes", success: function(result){
                $("#contingut").html(result);
            }});
        });


        jQuery("#consul_proms").on('click', function() {
            $.ajax({url: "index.php?accio=perfil_promos", success: function(result){
                $("#contingut").html(result);
            }});
        });

        jQuery("#punts").on('click', function() {
            $.ajax({url: "index.php?accio=perfil_punts", success: function(result){
                $("#contingut").html(result);
            }});
        });

        jQuery("#compres").on('click', function() {
            $.ajax({url: "index.php?accio=perfil_compres", success: function(result){
                $("#contingut").html(result);
            }});
        });

    });

    feather.replace()

</script>

<?php include "footer.php";?>

