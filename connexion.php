<?php

		$email = $_POST['email'];
		$password = $_POST['pass'];

		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=user','root','',$pdo_options);

		$reponse = $bdd->query("SELECT * FROM liste WHERE EMAIL = '$email' AND PASSWORD = '$password'") or die ("Failed to query database ".mysql_error());
					
        $donnees = $reponse->fetch();
                    
		if($donnees['EMAIL'] == $email && $donnees['PASSWORD'] == $password){
			session_start();
			header ('location:liste.php');
            
		} else {
			
            $outpout = "<span style = 'color:red'>✖ Votre email ou votre mot de passe est incorrect ! Veuillez réessayer</span>";
            require_once 'authentification.php';

		}

?>