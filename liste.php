<!DOCTYPE html>
<html>
<head>
    <title>Listes des utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/tsiky/bootstrap.min.css">
    <script src="bootstrap/tsiky/jquery.min.js"></script>
    <script src="bootstrap/tsiky/popper.min.js"></script>
    <script src="bootstrap/tsiky/bootstrap.min.js"></script>
</head>
<body>
<style>
  body{
    background-color: rgb(72,72,72);
  }
</style>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">
    <img src="icone.png" alt="logo" style="width:40px;">
  </a>
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">ACCUEIL</a>
    </li>
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
  <input class="form-control" id="myInput" type="text" placeholder="Rechercher des utilisateurs...">
</nav>
 
<h1><center><font color="white">LISTES DES UTILISATEURS</font></center></h1>

<?php require_once 'BddSupp.php'; ?>

<?php if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type'] ?>">

<?php

  echo $_SESSION['message'];
  unset($_SESSION['message']);

?>

</div>

<?php endif ?>

<?php

    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=user','root','',$pdo_options);

        $req = $bdd->prepare ('INSERT INTO liste (NOM,PRENOM,EMAIL,PASSWORD) VALUES (:NOM_marq,:PRENOM_marq,:EMAIL_marq,:PASSWORD_marq)');

        if(isset($_POST['ajout']))
        {
          /*$yourname = $_POST['NOM'];
          $firstname  = $_POST['PRENOM'];
          $email = $_POST['EMAIL'];

          $regex = "/^[a-zA-Z\d]+$/";
          if(preg_match($regex, $yourname)){

            $outpout = "<span style = 'color:green'>✓</span>";

          } else{
            
            $outpout = "<span style = 'color:red'>✖</span>";
          
          }*/

          $req-> execute
            (             
                array(

                    'NOM_marq'=> $_POST['NOM'],
                    'PRENOM_marq'=> $_POST['PRENOM'],
                    'EMAIL_marq'=> $_POST['EMAIL'],
                    'PASSWORD_marq'=> $_POST['PASS'],
                )
            );
        }

        echo "<table id='datatableid' width='800' align ='center' border='0' class='table table-bordered table-hover table-stripped table-borderless table-dark'>";
        echo "<tr class='bg-success'>";
        echo "<th>ID</th>";
        echo "<th>NOM</th>";
        echo "<th>PRENOM</th>";
        echo "<th>EMAIL</th>";
        echo "<th>VOIR</th>";
        echo "<th>MODIFIER</th>";
        echo "<th>SUPPRIMER</th>";
        echo "<th>CHECK</th>";
        echo "</tr>";

        $reponse = $bdd->query('select * from liste');

        while($donnees = $reponse->fetch()) 
        {?>
          <tbody id="myTable">
            <tr>
                <td><?php echo $donnees['id']; ?></td>
                <td><?php echo $donnees['NOM']; ?></td>
                <td><?php echo $donnees['PRENOM']; ?></td>
                <td><?php echo $donnees['EMAIL']; ?></td>
                <td><a href="PageVoir.php?id=<?php echo $donnees['id'];?>" class="btn btn-outline-info">👁 Voir</a></td>
                <td><a href="FormulaireModifier.php?id=<?php echo $donnees['id'];?>" class="btn btn-outline-warning">📝 Modifier</a></td>
                <td><a href="BddSupp.php?id=<?php echo $donnees['id'];?>" OnClick="return confirm('Voulez-vous vraiment supprimer <?php echo $donnees['NOM']; ?> <?php echo $donnees['PRENOM']; ?>');" class="btn btn-outline-danger">✖ Supprimer</a></td>
                <td>
                    <form action="BddCheck.php" method="post">
                        <input type="checkbox" name="deleteAll[]" value="<?php echo $donnees['id']; ?>">
                </td>
            </tr>
          </tbody>
<?php
        }
?>
                        <div class="col-md-4 service-grid service-left">
                        <input type="submit" name="deleteMultiple" OnClick="return confirm('Vous êtes sûr de vouloir les supprimer?');" value="SUPPRIMER DES UTILISATEURS" class="btn btn-danger" /><br><br>
                        </div>
                    </form>
<?php

        $reponse->closeCursor();
    }
    catch(Exception $e)
    {
        die('Erreur:'.$e-> getMessage());
    }
              
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
/*  $(document).ready(function() {
    $('#datatableid').Datatable();

  });*/
</script>

</body>
</html>