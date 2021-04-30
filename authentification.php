<!DOCTYPE HTML>
<html>
	<head>
		<title>Authentification</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body class="is-preload">
			<header id="header">
				<?php if(isset($outpout)) {echo $outpout;} ?>
				<h1>AUTHENTIFICATION</h1>
				<p>Entrer votre identifiant personnel que se soit Administrateur ou simple utilisateur!</p>
			</header>
			<form id="signup-form" method="post" action="connexion.php" />

				<input type="email" name="email" id="email" placeholder="Email" required/>
				<input type="password" name="pass" id="pass" placeholder="Mot de passe" required/>
  				<input type="button" value="Afficher le mot de passe" onclick="myFunction()">
				<input type="submit" name="connexion" value="Connexion" />
				<input type="reset" value="Annuler" />

			</form>
	<style>
		input[type="button"]{
			border-radius: 6px;
			border: none;
			background-color: rgb(69,123,250);
		}

		input[type="button"]:hover{
			border-radius: 6px;
			background-color: rgb(69,123,150);
		}
	</style>
	<script>
		function myFunction() {
  		var x = document.getElementById("pass");
  		if (x.type === "password") {
   			 x.type = "text";
  		} else {
    		x.type = "password";
  		}
	}
	</script>

		<script src="js/main.js"></script>

	</body>
</html>