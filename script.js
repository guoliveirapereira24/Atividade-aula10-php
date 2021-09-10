/**function showFormNovoFuncionario(){
    document.querySelector("form-funcionarioNovo").style.display = "flex";
    document.getElementById("id").value = id;
    document.getElementById("first_name").value = first_name;
    document.getElementById("last_name").value = last_name;
    document.getElementById("email").value = email;
    document.getElementById("gender").value = gender;
    document.getElementById("ip_address").value = ip_address;
    document.getElementById("country").value = country;
    document.getElementById("department").value = department;

}*/

function showModal(){
    document.querySelector(".modal-form").style.display = "flex";

}
document.getElementById("btnAddFuncionario").addEventListener("click", showModal);