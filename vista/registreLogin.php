<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

.wrap {
    width: 90%;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;

    padding: 60px 0px;
}

.header {
    
}

.h1h {
    margin: auto;
    padding: 30px 0px 100px 0px;
}

.h1f {
    margin: auto;
    padding: 100px 0px 30px 0px;
}

.h2 {
    margin-bottom: 60px;
}

h3 {
    margin-bottom: 20px;
}

h4 {
    margin-top: 20px;
}

.registreLogin {
    display: flex;
    width: 100%;
}

.registre, .login {
    flex: 0 0 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.inputText {
    margin-bottom: 15px;
    height: 30px;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid brown;
    width: 100%;
    font-size: 18px;
}

input:nth-child(1){
    margin-top: 60px;
}

form {
    width: 100%;
    padding: 0px 80px;
}

#info_negoci {
  display: none;
}

button {
    float: right;
    font-size: 25px;
    background-color: transparent;
    border: none;
    transition-duration: 0.2s;
    cursor: pointer;
}

button:hover {
    font-size: 28px;
}

.error {
    color:red;
    margin-bottom: 5px;
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

                    <h3>Registre completat!</h3>
                    <h1>Inicia sessió per descobrir la fantasia de l\'artesania</h1>
                    <br>
                    <br>
                    <br>';

                    unset($_SESSION['registre']);

                    echo '<a href="index.php?accio=registreLogin.php">Registrar-me de nou</a>

                </div>';

            }else {

                echo '<div class="registre">

                    <h2 class="h2">Registra\'t</h2>

                    <form id="formulariRegistre" method="post" action="index.php?accio=val_registreLogin">';

                        if(isset($_SESSION['signin_inc'])) {
                            echo "<div style='color: red;'>El correu i/o el nom ja han estat registrats</div>
                            <br>";
                        }
                    

                        echo '<div>
                            <h3>Em registro com a:</h3>
                            <input type="radio" id="client_radio_reg" name="tipus_usuari_reg" value="client" checked="checked">
                            <label for="client_radio_reg">Client</label><br><br>
                            <input type="radio" id="negoci_radio_reg" name="tipus_usuari_reg" value="negoci">
                            <label for="negoci_radio_reg">Negoci</label>
                        </div>
                
                        <div class="input-group">
                            <h4>Nom d\'usuari</h4><br>
                            <input class="inputText" type="text" name="username">
                        </div>
                        
                        <div class="input-group">
                            <h4>Correu electrònic</h4><br>
                            <input class="inputText" type="email" name="email">
                        </div>
                        
                        <div class="input-group">
                            <h4>Contrasenya</h4><br>
                            <input class="inputText" id="password_reg" type="password" name="password_1">
                        </div>
                        
                        <div class="input-group">
                            <h4>Confirma la contrasenya</h4><br>
                            <input class="inputText" type="password" name="password_2">
                        </div>

                        <!-- Info addicional negoci -->
                        <div id="info_negoci">

                            <div class="input-group camps_negoci">
                                <h4>Nom del negoci</h4><br>
                                <input class="inputText" type="text" name="nom_negoci">
                            </div>

                            <div class="input-group camps_negoci">
                                <h4>Descripció del negoci</h4><br>
                                <input class="inputText" type="text" name="desc_negoci">
                            </div>

                            <div class="input-group camps_negoci">
                                <h4>Població</h4><br>
                                <input class="inputText" type="text" name="poblacio">
                            </div>

                            <div class="input-group camps_negoci">
                                <h4>CP</h4><br>
                                <input class="inputText" type="int" name="cp">
                            </div>

                            <div class="input-group camps_negoci">
                                <h4>Telèfon</h4><br>
                                <input class="inputText" type="text" name="telefon">
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
                        echo "<div style='color: red;'>El Correu i la contrasenya no coincideixen</div>
                        <br>";
                    }
                
                ?>

                <div class="input-group">
                    <h4>Correu electrònic</h4><br>
                    <input class="inputText" type="text" name="email">
                </div>

                <div class="input-group">
                    <h4>Contrasenya</h4><br>
                    <input class="inputText" type="password" name="password">
                </div>

                <div class="input-group">
                    <button type="submit" class="btn" name="login_user">Inicia sessió!</button>
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

            jQuery("#info_negoci").css('display', 'none');
        });
        
        jQuery("#negoci_radio_reg").on('click', function() {

            jQuery("#info_negoci").css('display', 'block');
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