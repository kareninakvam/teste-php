<?php 
require 'config.php';

$id = 0;

if (isset ($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
}

if (isset($_POST['nome'])&& !empty($_POST ['nome'])){

    $nome = addslashes($_POST['nome']);
    $creci = addslashes($_POST['creci']);
    $cpf = addslashes ($_POST['cpf']);

    $sql= "UPDATE corretor SET nome = '$nome', cpf ='$cpf', creci='$creci' WHERE id ='$id'";
    $sql = $pdo->query($sql);
    header ("Location: index.php");
}

$sql = "SELECT * FROM corretor WHERE id ='$id'";
$sql = $pdo->query($sql);

if ($sql -> rowCount () > 0){
    $dado = $sql -> fetch();
}else {
    header ("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Teste PHP</title>
</head>
<body>
<div class="container"><br><br>
    <h1>Editando o cadastro</h1><br><br>
</div>
<div class="container">     
    <form method="POST">
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" minlength="11" maxlength="11" value= "<?php echo $dado['cpf']?>" />
            <label for="creci">Creci:</label>
            <input type="text" name="creci" minlength="2"value= "<?php echo $dado['creci']?>" />
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" minlength="2"value= "<?php echo $dado['nome']?>" />
        </div>   
        <div>
            <input type="submit" value= "Salvar" /> <br> <br>
        </div>
    </form>
    </div>
</body>
</html>