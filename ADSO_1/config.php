<?php

$dsn = 'mysql:dbname=banco;host=localhost';
$dsn = 'root';
$dsn = '';

try {
    $pdo = new PDO ($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo 'falhou '.$e->getMessage();
}

?>