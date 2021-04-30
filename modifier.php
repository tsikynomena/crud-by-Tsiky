<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Modifier des utilisateurs</title>
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


<h1><center>MODIFIER DES UTILISATEURS</center></h1></br>

<?php


    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=user','root','',$pdo_options);

        $req = $bdd->prepare ('INSERT INTO liste (NOM,PRENOM,EMAIL) VALUES (:NOM_marq,:PRENOM_marq,:EMAIL_marq)');

        if(isset($_POST['ajout']))
        {
            $req-> execute
            (             
                array(

                    'NOM_marq'=> $_POST['NOM'],
                    'PRENOM_marq'=> $_POST['PRENOM'],
                    'EMAIL_marq'=> $_POST['EMAIL'],
                )
            );                   
        }

        echo "<table width='800' align ='center' border='0' class='table table-bordered table-hover table-stripped'>";
        echo "<tr class='bg-success'>";
        echo "<th>ID</th>";
        echo "<th>NOM</th>";
        echo "<th>PRENOM</th>";
        echo "<th>EMAIL</th>";
        echo "<th>MODIFIER</th>";
        echo "</tr>";

        $reponse = $bdd->query('select * from liste');

        while($donnees = $reponse->fetch()) 
        {?>
            
            <tr>
                <td><?php echo $donnees['id']; ?></td>
                <td><?php echo $donnees['NOM']; ?></td>
                <td><?php echo $donnees['PRENOM']; ?></td>
                <td><?php echo $donnees['EMAIL']; ?></td>
                <td><a href="FormulaireModifier.php?id=<?php echo $donnees['id'];?>" class="btn btn-warning">Modifier</a></td>
            </tr>
<?php

        }

        $reponse->closeCursor();
    }
    catch(Exception $e)
    {
        die('Erreur:'.$e-> getMessage());
    }

                
?>

</body>
</html>