
function showModal(){
    document.querySelector(".modal-form").style.display = "flex";
}

function deletar(idFuncionario){
    //pede confirmação ao usuário
    let confirmacao = confirm("Deseja deletar o funcionário?");

    //se confirmar que quer apagar, redireciona para arquivo de ação
    //com o id como parâmetro
    if(confirmacao){
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}
/* FUNÇÃO DE EDITAR*/ 
function editar(idFuncionario){
    
//TESTE DE RECEBIMENTO:
// alert(idFuncionario);
    window.location = "editar.php?id=" + idFuncionario;


}
/** BUSCA FUNCIONARIO POR ID: */


document.getElementById("btnAddFuncionario")
    .addEventListener("click", showModal);