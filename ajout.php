<!DOCTYPE html>
<html>
<head>
	<title>Ajouter des utilisateurs</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>
    <link rel="stylesheet" href="bootstrap/tsiky/bootstrap.min.css">
    <script src="bootstrap/tsiky/jquery.min.js"></script>
    <script src="bootstrap/tsiky/popper.min.js"></script>
    <script src="bootstrap/tsiky/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">
    <img src="icone.png" alt="logo" style="width:40px;">
  </a>
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="liste.php">LISTES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ajout.php">AJOUTER</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="modifier.php">MODIFIER</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="supprimer.php">SUPPRIMER</a>
    </li>
  </ul>
</nav>

<form action="liste.php" method="post"/>
  <div class="container">
    <h1><center>AJOUTER DES UTILISATEURS</center></h1>
    <p>Remplir ce formulaire pour ajouter vos informations.</p>
    <hr>

    <label for="name"><b>NOM</b></label>
    <input type="text" name="NOM" placeholder="Entrer votre nom" required/>
    <!--?php if(isset($outpout)) {echo $outpout;} ?-->

    <label for="firstname"><b>PRENOM</b></label>
    <input type="text" name="PRENOM" placeholder="Entrer votre prénom" required/>

    <label for="email"><b>EMAIL</b></label>
    <input type="email" name="EMAIL" placeholder="Entrer votre email" required/>

    <label for="password"><b>MOT DE PASSE</b></label>
    <input type="password" name="PASS" id="pass" placeholder="Entrer votre mot de passe" required/>
    <input type="checkbox" value="Afficher le mot de passe" onclick="myFunction()"><font color="green"> <label>Afficher le mot de passe<label></font>
    <hr>

    <input type="submit" name="ajout" class="registerbtn" value="AJOUTER"/>
  </div>
</form>

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

</body>
</html>