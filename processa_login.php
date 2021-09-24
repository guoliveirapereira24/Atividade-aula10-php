<?php

    session_start();
    require("./funcoes_login.php");
   /* lerArquivo("./dados/usuarios.json");

   /* session_start();

    $usuario = "txt_usuario";
    $senha = "txt_senha";
    $dados = json_decode("./dados/usuarios.json");


    realizarLogin($usuario, $senha, $dados);
    */

    //RECEBENDO OS DADOS DO FORMULARIO:
    require_once("./funcoes_login.php");
    if (isset($_POST['txt_funcionario'])) {
        
        $usuario = $_POST["txt_funcionario"];
        $senha = $_POST["txt_senha"];
        realizarLogin($usuario, $senha, lerArquivo("dados/empresaX.json"));

    }elseif ($_GET["logout"]) {
        finalizarLogin();
    } 
