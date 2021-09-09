<?php

//recebe o nome do arquivo
function lerArquivo($nomeArquivo){
//lÊ o arquivo como string
    $arquivo = file_get_contents($nomeArquivo);
//echo $arquivo;

//transforma a string em array
    $jsonArray = json_decode($arquivo);

    // var_dump($jsonArray);exit;

//print_r($jsonArray);

//devolve o array
return $jsonArray;
}



//busca o aluno dentro da lista e
// devolve uma lista com os alunos encontrados
function buscarFuncionarioNome($funcionarios, $filtro){


    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionario){
        if(strpos($funcionario->first_name, $filtro) !== false
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

    $funcionarios = $lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);

}
