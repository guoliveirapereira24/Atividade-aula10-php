<?php

//recebe o nome do arquivo
function lerArquivo($nomeArquivo){
//lÊ o arquivo como string
    $arquivo = file_get_contents($nomeArquivo);
//echo $arquivo;

//transforma a string em array
    $jsonArray = json_decode($arquivo);

//print_r($jsonArray);

//devolve o array
return $jsonArray;
}


//busca o aluno dentro da lista e
// devolve uma lista com os alunos encontrados
function buscarFuncionario($funcionarios, $nome){


    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionario){
        if($funcionario->nome == $nome){
            $funcionariosFiltro[] = $funcionario;

        }

    }
    return $funcionariosFiltro;

}
?>