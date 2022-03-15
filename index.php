<?php 
require 'config.php';

if (isset ($_POST['nome'])&& !empty($_POST['nome'])){
 
  $cpf = addslashes($_POST['cpf']);
  $creci = addslashes($_POST['creci']);
  $nome = addslashes($_POST['nome']);


  $sql = "INSERT INTO corretor SET nome = '$nome', cpf ='$cpf', creci ='$creci'";
  $sql= $pdo->query($sql);

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
        <h1>Cadastro de Corretor</h1>
    </div>
    <div class="container">    
    <form method="POST">
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" minlength="11" maxlength="11" />
            <label for="creci">Creci:</label>
            <input type="text" name="creci" minlength="2" />
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" minlength="2" />
        </div>   
        <div>
            <input type="submit" value= "Enviar" /><br><br><br>
        </div>
    </form>
    </div>


<div class="container">
    <table border ="1" width= "400">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Creci</th>
            <th>*</th>
        </tr>
        <?php 
        $sql= "SELECT * FROM corretor ORDER BY nome";
        $sql= $pdo->query($sql);
        if ($sql->rowCount() > 0){
        foreach ($sql-> fetchAll() as $corretores): ?>
         <tr>
            <td><?php echo $corretores['nome']?></td>
            <td><?php echo $corretores['cpf']?></td>
            <td><?php echo $corretores['creci']?></td>
            <td><?php echo '<a href="editar.php?id='.$corretores['id'].'">Editar</a>|<a href="excluir.php?id='.$corretores['id'].'">Excluir</a>' ?></td>
        </tr>

        <?php 
        endforeach;   
    } 
    ?>
</div>
    
</body>
</html>