<?php


$yourname = $_POST['NOM'];
$firstname  = $_POST['PRENOM'];
$email = $_POST['EMAIL'];

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    echo "Mety";
}else{
    echo "Tsy mety";
}

?>