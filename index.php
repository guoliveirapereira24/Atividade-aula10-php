<?php

    require("./funcoes.php");

    $funcionarios = lerArquivo("empresaX.json");


if (isset($_GET["buscarFuncionario"]) && $_GET["filtro"] !=""){
$funcionarios = buscarFuncionarioNome($funcionarios,$_GET["filtro"]);
}


?>

<!DOCTYPE html>
<html lang="pt-br">
    <script src="./script.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js" defer></script>
    <title>Funcionarios JSON</title>
</head>
<body>
    <h1>Lista de funcionários</h1>
    <h2>TOTAL DE FUNCIONÁRIOS DESSA LISTA: <?php echo count($funcionarios); ?></h2>
    
 
    <button id="btnAddFuncionario">Adicionar funcionário</button>

    <div class="container-form-funcionarioNovo" action="acoes.php" method="POST">
 
        <form id="form-funcionario">
        
            <input type="text" id="idFuncionarioNovo" name="id" placeholder="ID">

            <input type="text" id="nomeFuncionarioNovo" name="first_name" placeholder="First name">

            <input type="text" id="UltimoNomeFuncionarioNovo" name="last_name" placeholder="Second name">
            
            <input type="text" id="emailFuncionarioNovo" name="email" placeholder="email">
    <p id="generoCaixa">Gênero:</p>
<p>
            <input type="radio" id="generoFuncionarioNovo" name="gender" value="Masculino">Masc
            <input type="radio" id="generoFuncionarioNovo" name="gender" value="Feminino">Fem
            <input type="radio" id="generoFuncionarioNovo" name="gender" value="Outro">Other

</p>
            <input type="text" id="ipFuncionarioNovo" name="ip_address" placeholder="IP"> 

            <input type="text" id="paisFuncionarioNovo" name="country" placeholder="Country">

            <input type="text" id="departamentoFuncionarioNovo" name="department" placeholder="Department">

            <button>Add</button>
    </div>

        </form>
    <form action="">

        <input type="text" name="buscarFuncionario"
        value="<?= isset($_GET["filtro"/*filtro*/]) ? $_GET["filtro"/*filtro*/] : ""?>" placeholder="Buscar Funcionario"/>
        <button>Buscar</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
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