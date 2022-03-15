<?php 
require 'config.php';

if (isset ($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM corretor WHERE id ='$id'";
    $pdo -> query($sql);

header ("Location: index.php");

} else{
    header ("Location: index.php");
    

}

?>