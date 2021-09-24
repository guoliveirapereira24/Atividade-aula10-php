<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $arquivoArr = json_decode($arquivo);

    return $arquivoArr;

}

function buscarFuncionario($funcionarios, $filtro){

    $funcionariosFiltro = [];

    foreach($funcionarios as $funcionario){
        if(
            strpos($funcionario->first_name, $filtro) !== false
            || 
            strpos($funcionario->last_name, $filtro) !== false
            ||
            strpos($funcionario->department, $filtro) !== false
        ){
            $funcionariosFiltro[] = $funcionario;
        }
    }

    return $funcionariosFiltro;

}

function adicionarFuncionario($nomeArquivo, $novoFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);

}

function deletarFuncionario($nomeArquivo, $idFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    //percorre os funcionários e apaga o id procurado
    foreach($funcionarios as $chave => $funcionario){
        if($funcionario->id == $idFuncionario){
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);

}

//**BUSCA FUNCIONARIO POR ID: */
function buscarFuncionarioPorId($nomeArquivo,$idFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {
            
            if ($funcionario->id == $idFuncionario) {
                
                return $funcionario;

            }

    }
     return false;   


}
function editarFuncionario($nomeArquivo, $funcionarioEditado){

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $funcionarioEditado["id"]) {
            $funcionarios[$chave] = $funcionarioEditado;
        }
    }
    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);

}
function realizarLogin($first_name, $senha, $dados){
        
    foreach ($dados as $dado) {
        if ( $dado->first_name == $first_name && $dado->senha == $senha) {
        
        //$dados = json_decode("./dados/usuarios.json");  
        //VARIAVEIS DE SESSÃO:
        
        $_SESSION["first_name"] = $dado->first_name;
        $_SESSION["id"] = session_id();
        $_SESSION["data_hora"] = date('d/m/y - h:i:s');

        header("location: area_restrita.php");
        exit;

}   
}

header('location: index.php');
}