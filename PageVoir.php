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
    <title>Informations des utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<h1><center>VOUS POUVEZ CONSULTER VOS INFORMATIONS ICI</center></h1>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a {
  width: 100%;
  margin-bottom: -20px;
  margin-top: 10px;
}

</style>
</head>
<body>
</br>
<h2 style="text-align:center"><font color="brown">A propos</font></h2>

<div class="card">
  <img src="img/User.png" alt="user" style="width:100%">
  <h5>Nom : <?php echo $donnees['NOM']; ?></h5>
  <h6>Prénom : <?php echo $donnees['PRENOM']; ?></h6>
  <h7>Email : <?php echo $donnees['EMAIL']; ?></h7>
  <p><a href="FormulaireModifier.php?id=<?php echo $donnees['id'];?>" class="btn btn-success">Modifier</a></p>
</div>

</body>
</html>