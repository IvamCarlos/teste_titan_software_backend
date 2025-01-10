// Função para fechar o alerta em caso de sucesso ou falha
function fecharAlerta() {
    var data = document.querySelector('.closebtn');
    data.parentElement.style.display="none";
}

// Função de validação para registrar um novo funcionário
function validarFuncionario() {

    const nome = document.getElementById("nome");
    const cpf = document.getElementById("cpf");
    const email = document.getElementById("email");
    const empresa = document.getElementById("empresa");
    let valid = true;

    if (!nome.value) {
        const nomeErro = document.getElementById("nomeErro");
        nomeErro.classList.add("visible");
        nome.classList.add("invalid");
        nomeErro.setAttribute("aria-hidden", false);
        nomeErro.setAttribute("aria-invalid", true);
        valid = false;
    }

    if (!cpf.value) {
        const cpfErro = document.getElementById("cpfErro");
        cpfErro.classList.add("visible");
        cpf.classList.add("invalid");
        cpfErro.setAttribute("aria-hidden", false);
        cpfErro.setAttribute("aria-invalid", true);
        valid = false;
    }

    if (!email.value) {
        const emailError = document.getElementById("emailErro");
        emailErro.classList.add("visible");
        email.classList.add("invalid");
        emailErro.setAttribute("aria-hidden", false);
        emailErro.setAttribute("aria-invalid", true);
        valid = false;
    }

    if (!empresa.value) {
        const empresaError = document.getElementById("empresaErro");
        empresaErro.classList.add("visible");
        empresa.classList.add("invalid");
        empresaErro.setAttribute("aria-hidden", false);
        empresaErro.setAttribute("aria-invalid", true);
        valid = false;
    }
        
    return valid;
}

// Função para validar se foi digitado o nome da empresa antes de submeter o funcionário
function validarEmpresa() {

    const nome = document.getElementById("nome");
    let valid = true;

    if (!nome.value) {
        const nomeErro = document.getElementById("nomeErro");
        nomeErro.classList.add("visible");
        nome.classList.add("invalid");
        nomeErro.setAttribute("aria-hidden", false);
        nomeErro.setAttribute("aria-invalid", true);
        valid = false;
    }
        
    return valid;
}

// Função para formatar os dados do funcionário dentro input RG e CPF
function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)
    if (texto.substring(0,1) != saida){
        documento.value += texto.substring(0,1);
    }
}