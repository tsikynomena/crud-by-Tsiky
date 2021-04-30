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

if(isset($_GET["id"])){
	$id = $_GET["id"];
	if(!empty($id) && is_numeric($id)){
		
        $bdd->exec('DELETE FROM liste WHERE id=' . $_GET["id"]);
        
        $_SESSION['message'] = "L'utilisateur a été supprimé avec succès!";
        $_SESSION['msg_type'] = "danger";

        header("location:liste.php");
	}

}

?>