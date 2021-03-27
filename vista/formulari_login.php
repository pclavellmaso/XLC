<?php
    include("vista/header.php");
    //include("controlador/validacio_login.php");
?>

<link rel="stylesheet" type="text/css" href="vista/formulari_registre.css">

<body>

<div class="form">

  <div class="header">
  	<h2>Login</h2>
  </div>

  <form id="formulariLogin" method="post" action="index.php?accio=login">

	<div>
		<p>Inicio sessió com a:</p>
		<input type="radio" id="client_radio" name="tipus_usuari" value="client" checked="checked">
		<label for="client_id">Client</label><br>
		<input type="radio" id="negoci_radio" name="tipus_usuari" value="negoci">
		<label for="negoci_id">Negoci</label>
	</div>

  	<div class="input-group">
  		<label>Correu</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Contrasenya</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="vista/formulari_registre.php">Sign up</a>
  	</p>
  </form>

  </div>


  <script>

jQuery(document).ready(function() {

	$("#formulariLogin").validate({
		rules: {
			email: { required:true, email: true },
			password: { required:true, minlength: 3, maxlength: 15 }
		},
		messages: {
			email : "El format del email no és correcte.",
			password: "Aquest camp és obligatori.",
		}
	});
	
});

</script>

<?php include 'vista/footer.php';?>