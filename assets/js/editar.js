// variaveis globais
var nome;
var contato;
var email;

function valores(){
    // variaveis que irão armazenar as ultimas informações do contato
    nome = document.querySelector("input[name=nome]").value;
    contato = document.querySelector("input[name=contato]").value;
}

// função que reseta as informações inicias do campo caso o usuario deixe vazio
function resetar(){
    // variaveis que armazenam os campos para serem verificados
    var campo_nome = document.querySelector("input[name=nome]");
    var campo_contato = document.querySelector("input[name=contato]");

    // apos um campo ser desfocado verifique se ele esta vazio
    if(campo_nome.value.length == 0){
        // preencha o campo com a ultima alteração salva
        campo_nome.value = `${nome}`;
    }
    // se o campo Contato estiver vazio
    else if(campo_contato.value.length == 0){
        // preencha o campo com a ultima alteração salva
        campo_contato.value = `${contato}`;
    }
}


