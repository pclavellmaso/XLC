<style>

* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

#contentFlex {
    width: 100%;
    display: flex;
    flex-direction: column;
    padding: 5% 0%;
}

#contingut {
    border-radius: 5px;
    margin-top: 1em;
}

#leftFlex {
    flex: 0 0 30%;
    width: 100%;
}

.menu_item {
    cursor: pointer;
    font-size:20px;
    margin-bottom: 30px;
}

.menu_item:hover {
    font-weight: bold;
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
	width: 35% !important;
	top: 0!important;
	left: 0!important;
	background-color: #f5f2ed !important;
	position: fixed;
	z-index: 1;
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
    padding-left: 1.5em;
    padding-bottom: 1em;
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
    clip-path: circle(3em at center);
    overflow: hidden;
    width: 6em;
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

.close {
    background: transparent;
    border: none;
    float: right;
}

#select-label {
    cursor: pointer;
}

/* Pàgina inici */

h2, h3 {
    text-align: center;
}

h4 {
    margin-bottom: 1.5em;
}

.resum_flex {
    justify-content: space-around;
}

.resum_activitat {
    background: rgba(239, 162, 67, 0.4);
    padding: 4em;
}

.negoci_funcions {
    background: rgba(239, 162, 67, 0.6);
    padding: 4em;
}

</style>


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

    if (isset($_SESSION['dades_mod'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dades actualitzades!</strong> ...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['perfil_mod']);
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

    if(isset($_SESSION['pass_err'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error a l\'actualitzar la contrasenya</strong> Contrasenya actual invàlida
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i data-feather="x"></i></span>
            </button>
        </div>';
        unset($_SESSION['pass_err']);
    }

?>

<div id="contentFlex">

    <div id="leftFlex">

        <div>
            <span id="select-label" class="menu">MENÚ</span><br><br>
            
        </div>

        <div id="arteside">

            <div class="info_p_wrap">
                <div class="info_p">
                    <h4><?php echo ucfirst($_SESSION['nom']); ?></h4>
                    <h5><?php echo ucfirst($_SESSION['tipus_usuari']); ?> nº <?php echo $_SESSION['usuari_id']; ?></h5>
                </div>

                <div class="img_wrap">
                    <div class="mask">
                        <img class="profile" src="vista/img/profile.jpg" alt="profile.jpg">
                    </div>
                </div>
            </div>

            <div class="select-hide" id="order">

                <h4 class="seccio" id="dades_personals" class="menu_item">Dades personals</h4>

                <?php if(isset($_SESSION['tipus_usuari']) and $_SESSION['tipus_usuari'] == 'negoci') { ?>
                
                    <h4 class="seccio" id="dades_negoci" class="menu_item">Dades negoci</h4>
                    </br>
                    <h4 class="seccio" id="consul_prods" class="menu_item">Consultar productes</h4>
                    <h4 class="seccio" id="consul_proms" class="menu_item">Consultar promocions</h4>

                <?php }else { ?>
                    
                    <h4 class="seccio" id="compres" class="menu_item">Registre de compres</h4>
                    </br>
                    <h4 class="seccio" id="punts" class="menu_item">Els meus punts</h4>

                <?php } ?> 

            </div>
        </div>

    </div>

    <div id="rightFlex">

        <div id="contingut">

            <div class="resum_activitat">
                <h2>RESUM ACTIVITAT</h2>

                <div class="resum_flex d-flex pt-5">
                    <div class="productes">
                        <h4><?php echo 'X'; ?> productes catalogats</h4>
                        <h4><?php echo 'X'; ?> promocions actives</h4>
                    </div>
                    <div class="beneficis">
                        <h4><?php echo 'X'; ?> productes venuts</h4>
                        <h4><?php echo 'X'; ?>€ de benefici obtingut</h4>
                    </div>
                </div>
            </div>
            <hr>
            <div class="negoci_funcions">
                <h3>AMB EL COMPTE DE NEGOCI POTS</h3>
            </div>

        </div>

    </div>

</div>
    

<script>

    // Per defecte carrega la pàgina de les dades personals

    /*$.ajax({url: "index.php?accio=perfil_personal", success: function(result){
        $("#contingut").hide().html(result).fadeIn(400);
    }});*/

    jQuery(document).ready(function() {


        jQuery('#select-label').on('click', function(e){
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

</script>