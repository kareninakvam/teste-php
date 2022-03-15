<?php 
$dsn= "mysql:dbname=karen;host=localhost";
$dbuser="root";
$dbpass="";


try {
    $pdo = new PDO ($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "Falhou a conexão: ".$e->getMessage();
}

?>