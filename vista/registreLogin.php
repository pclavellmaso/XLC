<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

.wrap {
    width: 96%;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;

    padding: 1em 0;
}

.header {
    
}

.h1h {
    margin: auto;
    padding-bottom: 2em;
    padding-top: 1em;
    font-size: 2em!important;
}

.h1f {
    margin: auto;
    padding: 100px 0px 30px 0px;
}

.h2 {
    margin-bottom: 1em!important;
    width: 100%;
    float: left;
    font-size: 1.5em!important;
}

h5 {
    margin-bottom: 0!important;
    font-size: 1em!important;
}

.registreLogin {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.registre, .login {
    flex: 0 0 40%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.inputText {
    margin-bottom: 1.5em;
    height: 30px;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid brown;
    width: 100%;
    font-size: 1em;
}

form {
    width: 100%;
}

#info_negoci {
  display: none;
}

.btn {
    border: none;
    color: white!important;
    padding: 1em!important;
    border-radius: 2px!important;
    margin-left: auto;
    position: relative;
    background: #EFA243!important;
    display: block;
    cursor: pointer;
    transition: 0.4s!important;
}

.btn:hover {
    transform: scale(1.06); 
}

.error {
    color:red;
    margin-bottom: 5px;
}

.tipus_usuari {
    display: flex;
    justify-content: space-between;
    padding-bottom: 1em;
}

textarea {
    background: transparent;
    border: 1px solid brown;
}

.nouRegistre {
    padding: 1em;
    cursor: pointer;
    background: #EFA243!important;
    border-radius: 2px!important;
    color: white!important;
    transition: 0.4s!important;
    float: right;
    margin-top: 2.5em;
}

.nouRegistre:hover {
    transform: scale(1.06); 
}

.nouRegistre_wrap {
    width: 100%;
}

</style>

<?php include("header.php"); ?>

<div class="wrap">

    <div class="header">

        <h1 class="h1h">Uneix-te a la Comunitat i fes-la crèixer!</h1>

    </div>

    <div class="registreLogin">
        
        <?php 

            if (isset($_SESSION['registre'])) {

                echo '<div class="registre">

                    <h2 class="h2">Registre completat!</h2>
                    <p>Inicia sessió per descobrir nous productes i promocions especials!</p>';

                    unset($_SESSION['registre']);

                    echo '<div class="nouRegistre_wrap"><a class="nouRegistre" href="index.php?accio=registreLogin.php">Registrar-me de nou</a></div>

                </div>';

            }else {

                echo '<div class="registre">

                    <h2 class="h2">Registra\'t</h2>

                    <form id="formulariRegistre" method="post" action="index.php?accio=val_registreLogin">';

                        if(isset($_SESSION['signin_inc'])) {
                            echo "<div style='color: red;'>El correu i/o el nom ja han estat registrats</div>";
                        }
                    

                        echo '<div class="tipus_usuari">
                            <div>
                                <input type="radio" id="client_radio_reg" name="tipus_usuari_reg" value="client" checked="checked">
                                <label for="client_radio_reg">Consumidor</label>
                            </div>
                            <div>
                                <input type="radio" id="negoci_radio_reg" name="tipus_usuari_reg" value="negoci">
                                <label for="negoci_radio_reg">Comerciant</label>
                            </div>
                        </div>
                
                        <div class="input-group">
                            
                            <input class="inputText" type="text" name="username" placeholder="Nom d\'usuari">
                        </div>
                        
                        <div class="input-group">
                            <input class="inputText" type="email" name="email" placeholder="Correu electrònic">
                        </div>
                        
                        <div class="input-group">
                            <input class="inputText" id="password_reg" type="password" name="password_1" placeholder="Contrasenya">
                        </div>
                        
                        <div class="input-group">
                            <input class="inputText" type="password" name="password_2" placeholder="Confirma la contrasenya">
                        </div>

                        <!-- Info addicional negoci -->
                        <div id="info_negoci">

                            <div class="input-group camps_negoci">
                                <input class="inputText" type="text" name="nom_negoci" placeholder="Nom del negoci">
                            </div>

                            <div class="input-group camps_negoci">
                                <!--<input class="inputText" type="text"  placeholder="Descripció del negoci">-->
                                <textarea rows="5" cols="40" name="desc_negoci">Descripció del negoci</textarea>
                            </div>

                            <div class="input-group camps_negoci">
                                <input class="inputText" type="text" name="poblacio" placeholder="Població">
                            </div>

                            <div class="input-group camps_negoci">
                                <input class="inputText" type="int" name="cp" placeholder="Codi Postal">
                            </div>

                            <div class="input-group camps_negoci">
                                <input class="inputText" type="text" name="telefon" placeholder="Telèfon">
                            </div>

                        </div>

                        <div class="input-group">
                            <button type="submit" class="btn" name="reg_user">Registra\'t!</button>
                        </div>

                    </form>

                </div><!-- registre -->';
            }

        ?>

        
        <!-- // Login -->

        <div class="login">

            <h2 class="h2">Inicia sessió</h2>

            <form id="formulariLogin" method="post" action="index.php?accio=val_registreLogin">

                <?php
                    
                    if(isset($_SESSION['login_inc'])) {
                        echo "<div style='color: red;'>El Correu i la contrasenya no coincideixen</div>";
                    }
                
                ?>

                <div class="input-group">
                    <input class="inputText" type="text" name="email" placeholder="Correu electrònic">
                </div>

                <div class="input-group">
                    <input class="inputText" type="password" name="password" placeholder="Contrasenya">
                </div>

                <div class="input-group">
                    <button type="submit" class="btn" name="login_user">Iniciar sessió</button>
                </div>

            </form>  
        
        </div><!-- login -->

    </div><!-- registreLogin -->

    
    
    <div class="footer">
    
        <h1 class="h1f">Descobreix els beneficis de fer-te soci!</h1>
        <a href="#"><p>Més detalls aquí</p></a>

    </div>

</div><!-- wrap -->

<?php include("footer.php"); ?>



<script>

    jQuery(document).ready(function() {

        // Registre
        jQuery("#client_radio_reg").on('click', function() {

            jQuery('html,body').animate({ scrollTop: jQuery("#formulariRegistre").offset().top }, 'slow')
            jQuery("#info_negoci").css('display', 'none');
        });
        
        jQuery("#negoci_radio_reg").on('click', function() {
            
            jQuery('html,body').animate({ scrollTop: jQuery("#formulariRegistre").offset().top }, 'slow')
            jQuery("#info_negoci").css('display', 'block')
        });

        // Validacio jQuery Registre
        jQuery("#formulariRegistre").validate({
            rules: {
                username: { required: true, minlength: 2 },
                email: { required:true, email: true },
                password_1: { required:true, minlength: 3, maxlength: 15 },
                password_2: { required:true, equalTo: "#password_reg" },
                nom_negoci: { required:true, minlength: 2 },
                poblacio: { required:true, minlength: 4 },
                cp: { required:true, minlenght: 4 }
            },
            messages: {
                username : "Aquest camp és obligatori.", 
                email : "El format de l'email no és correcte.",
                password_1: "Aquest camp és obligatori.",
                password_2 : "Les contrasenyes no coincideixen.",
                nom_negoci : "Aquest camp és obligatori.",
                poblacio : "Aquest camp és obligatori.",
                cp : "Aquest camp és obligatori."
            }
        });
        // Fi Registre
        
        // Validació jQuery Login
        jQuery("#formulariLogin").validate({
            rules: {
                email: { required:true, email: true },
                password: { required:true, minlength: 3, maxlength: 15 }
            },
            messages: {
                email : "El format de l'email no és correcte.",
                password: "Aquest camp és obligatori."
            }
	    });
        

    });

</script>