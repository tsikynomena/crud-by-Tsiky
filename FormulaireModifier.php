<?php

    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=user','root','',$pdo_options);
    }
    catch(Exception $e)
    {
        die('Erreur:'.$e-> getMessage());
    }

if(isset($_GET["id"])){
  $id = $_GET["id"];
  if(!empty($id) && is_numeric($id)){
    
        $reponse = $bdd->query('SELECT * FROM liste WHERE id=' . $_GET["id"]);
        $donnees = $reponse->fetch();
  }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier des utilisateurs</title>
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

<form action="BddUpdate.php" method="post"/>
  <div class="container">
    <h1><center>MODIFIER L'UTILISATEUR</center></h1>
    <p>Vous pouvez modifier vos informations ici.</p>
    <hr>

    <label for="id"><b></b></label>
    <input type="hidden" name="NUM" value="<?php echo $donnees['id']; ?>" required/>

    <label for="name"><b>NOM</b></label>
    <input type="text" name="NOM" value="<?php echo $donnees['NOM']; ?>" required/>

    <label for="firstname"><b>PRENOM</b></label>
    <input type="text" name="PRENOM" value="<?php echo $donnees['PRENOM']; ?>" required/>

    <label for="email"><b>EMAIL</b></label>
    <input type="email" name="EMAIL" value="<?php echo $donnees['EMAIL']; ?>" required/>

    <!--label for="password"><b>MOT DE PASSE</b></label>
    <input type="password" name="PASS" required/-->
    <hr>

    <input type="submit" name="modifier" OnClick="return confirm('Poursuivre les modifications?');" class="registerbtn" value="ENREGISTRER LES MODIFICATIONS"/>
  </div>
</form>

</body>
</html>
