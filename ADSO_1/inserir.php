<?php 

require 'config.php';

$id = 0;

if(isset($_POST['Nombre']) && empty ($_POST['Nombre']) == false) {

    $senha = '';

    $Nombre = addslashes($_POST['Nombre']);
    $email = addslashes($_POST['email']);
    $telefono = addslashes($_POST['telefono']);

    $inserirusuario = "INSERT INTO usuarios SET Nombre = '$Nombre', email = '$email', telefono = '$telefono'";
    $pdo->query($inserirusuario);

    header("Location: index.php");
}

?>