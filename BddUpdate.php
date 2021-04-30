<?php

    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=user','root','',$pdo_options);

        session_start();

        if(isset($_POST['modifier'])){

        $req = $bdd->prepare ('UPDATE liste SET NOM=:NOM_marq,PRENOM=:PRENOM_marq,EMAIL=:EMAIL_marq WHERE id=' . $_POST['NUM']);

        $_SESSION['message'] = "✓ Modification avec succès!";
        $_SESSION['msg_type'] = "success";

        header("location:liste.php");

        $req-> execute
            (             
                array(
                    'NOM_marq'=> $_POST['NOM'],
                    'PRENOM_marq'=> $_POST['PRENOM'],
                    'EMAIL_marq'=> $_POST['EMAIL'],
                )
            );                   
        }

    }
    catch(Exception $e)
    {
        die('Erreur:'.$e-> getMessage());
    }

?>