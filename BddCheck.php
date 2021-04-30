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

session_start();

if (isset($_POST['deleteMultiple'])) {

    $numberOfCheckbox = count($_POST['deleteAll']);
    $i = 0;
    while ($i<$numberOfCheckbox) {

        $keyToDelete = $_POST['deleteAll'][$i];
        $reponse = $bdd->query('DELETE FROM liste WHERE id=' . $keyToDelete);
        $i++;

        }

        $_SESSION['message'] = "Suppréssion avec succès!";
        $_SESSION['msg_type'] = "warning";
        
		header("location:liste.php");
    }

?>