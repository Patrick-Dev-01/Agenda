function formulario(){
    // pegar a input do campo email
    var campo_email = document.querySelector("input[name=email]");
    // se o campo email estiver vazio
    if(campo_email.value.length == 0){
        // valor por padrão será "Não especificado"
        campo_email.value = "Não especificado";
    }
}