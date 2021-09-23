<?php

    function lerArquivo($nomeArquivo){

        $arquivo = file_get_contents($nomeArquivo);

        $arquivoArr = json_decode($arquivo);
        
        return $arquivoArr;
        
    }
    function realizarLogin($first_name, $senha, $dados){
        
        foreach ($dados as $dado) {
            if ( $empresaX->first_name == $usuario && $dado->senha == $senha) {
                
        
            //VARIAVEIS DE SESSÃO:
            $_SESSION["usuario"] = $dado->funcionario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/y - h:i:s');

           header("location: area_restrita.php");
           exit;

        }   
    }

    header('location: index.php');


?>  