<?php

    function lerArquivo($nomeArquivo){

        $arquivo = file_get_contents($nomeArquivo);

        $arquivoArr = json_decode($arquivo);
        
        return $arquivoArr;
        
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
    function verificarLogin(){

        if ($_SESSION["id"] != session_id() || (empty($_SESSION["id"])) ) {
            header('location: index.php');
    }

}
    //FUNÇÃO DE FINALIZAR LOGIN:
    // EFETUA A AÇÃO DE SAIR DO USUARIO DESTRUINDO A SESSÃO

    function finalizarLogin(){

        session_unset(); //LIMPA TODAS AS VARIAVEIS DE SESSÃO
        session_destroy();//DESTROI A SESSÃO ATIVA

        header('location: index.php');

}

?>  