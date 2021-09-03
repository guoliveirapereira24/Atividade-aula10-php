<?php

    require("./funcoes.php");

    $funcionarios = lerArquivo("empresaX.json");


if (isset($_GET["buscarFuncionario"])){
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios JSON</title>
</head>
<body>
    <form action="">
        <input type="text" name="buscarFuncionario"
        value="<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : ""?>" placeholder="Buscar Funcionario"/>
        <button>Buscar</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Nota</th>
            <th>Gênero</th>
            <th>IP</th>
            <th>País</th>
            <th>Departamento</th>
        </tr>
    <?php
        foreach ($funcionarios as $funcionario) :
        
    ?>
        <tr>
            <td><?= $funcionario -> id?></td>
            <td><?= $funcionario -> first_name ?></td>
            <td><?= $funcionario -> last_name ?></td>
            <td><?= $funcionario -> email?></td>
            <td><?= $funcionario -> gender?></td>
            <td><?= $funcionario -> ip_address?></td>
            <td><?= $funcionario -> country?></td>
            <td><?= $funcionario -> department?></td>
            

        </tr>
    <?php
        endforeach;
    ?>


    </table>
    
</body>
</html>