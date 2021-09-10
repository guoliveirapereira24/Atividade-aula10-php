<?php

require("./funcoes.php");

$funcionarios = lerArquivo("./dados/empresaX.json");

if (isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<script src="./script.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./styles-global.css">
    <script src="./script.js" defer></script>
    <title>Funcionarios JSON</title>
</head>

<body>
    <div class="content">
        <h1>Lista de Funcionários</h1>
        <h2>TOTAL DE FUNCIONÁRIOS DESSA LISTA: <?php echo count($funcionarios); ?></h2>


        <form method="GET" class="search-form">
            <div class="input-group" style="flex: 1">
                <label>Pesquisar por nome</label>
                <input type="search" name="filtro" placeholder="Digite o nome do funcionário" value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />
            </div>
            <button class="material-icons">
                Buscar
            </button>
        </form>
        <button id="btnAddFuncionario">Adicionar funcionário</button>
        <br /><br />
        <div class="modal-form">
            <form id="form-funcionario" action="acoes.php" method="POST">
                <h1>Adicionar Funcionário</h1>
                <input type="text" name="id" placeholder="Digite o ID" />
                <input type="text" name="first_name" placeholder="Digite o primeiro nome" />
                <input type="text" name="last_name" placeholder="Digite o segundo nome" />
                <input type="text" name="email" placeholder="Digite o email" />
                <input type="text" name="gender" placeholder="Digite o sexo" />
                <input type="text" name="ip_address" placeholder="Digite o IP" />
                <input type="text" name="country" placeholder="Digite o país" />
                <input type="text" name="department" placeholder="Digite o departamento" />
                <button>Salvar</button>
            </form>
        </div>
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
                <th>Ações</th>
            </tr>
            <?php
            foreach ($funcionarios as $funcionario) :

            ?>
                <tr>
                    <td><?= $funcionario->id ?></td>
                    <td><?= $funcionario->first_name ?></td>
                    <td><?= $funcionario->last_name ?></td>
                    <td><?= $funcionario->email ?></td>
                    <td><?= $funcionario->gender ?></td>
                    <td><?= $funcionario->ip_address ?></td>
                    <td><?= $funcionario->country ?></td>
                    <td><?= $funcionario->department ?></td>
                    <td><button class="material-icons">edit</button>
                    <button onclick="deletar(<?= $funcionario->id ?>)" class="material-icons">delete</button>
                    </td>

                </tr>
            <?php
            endforeach;
            ?>


        </table>
    </div>
</body>

</html>