// Confirmação de Cadastro do Produto
function confirmarCadastro(event) {
    event.preventDefault(); // Impede o envio imediato do formulário

    let nome = document.querySelector('input[name="nome"]').value.trim();
    let valor = document.querySelector('input[name="valor"]').value.trim();
    let estoque = document.querySelector('input[name="estoque"]').value.trim();

    // Verifica se todos os campos obrigatórios estão preenchidos
    if (nome === "" || valor === "" || estoque === "" ) {
        Swal.fire({
            title: "Campos obrigatórios!",
            text: "Por favor, preencha todos os campos antes de continuar.",
            icon: "warning",
            iconColor:'#908dfe', 
            confirmButtonColor: '#908dfe', 
            cancelButtonColor: '#5f5cb5',
            confirmButtonText: "OK"
        });
        return; // Interrompe o fluxo se algum campo estiver vazio
    }

    // Alerta de confirmação com os dados preenchidos
    Swal.fire({
        title: "Confirmar Cadastro",
        html: `Tem certeza que deseja cadastrar este produto?<br><br>
                <strong>Nome:</strong> ${nome} <br>
                <strong>Valor:</strong> R$ ${valor} <br>
                <strong>Estoque:</strong> ${estoque} unidades`,
        icon: "success",
        showCancelButton: true,
        iconColor:'#908dfe', 
        confirmButtonColor: '#908dfe', 
        cancelButtonColor: '#5f5cb5',
        confirmButtonText: "Sim, cadastrar!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("formCadastro").submit();
        }
    });
}

// Confirmação de Edição do Produto
function confirmarEdicao() {
    Swal.fire({
        title: 'Confirmar Edição',
        text: "Tem certeza que deseja editar este produto?",
        icon: 'warning',
        showCancelButton: true,
        iconColor:'#908dfe', 
        confirmButtonColor: '#908dfe', 
        cancelButtonColor: '#5f5cb5',
        confirmButtonText: 'Sim, editar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-editar').submit();
        }
    });
}

// Confirmação de Exclusão do Produto
function confirmarExclusao(id, nome, valor) {
    Swal.fire({
        title: 'Excluir produto?',
        html: `Tem certeza que deseja excluir este produto?<br><br>
                <strong>Nome:</strong> ${nome} <br>
                <strong>Valor:</strong> ${valor} <br>`,
        icon: 'warning',
        showCancelButton: true,
        iconColor:'#908dfe', 
        confirmButtonColor: '#908dfe', 
        cancelButtonColor: '#5f5cb5',
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('formExcluir' + id).submit();
        }
    });
}

// Para o aviso de sucesso desaparecer
document.addEventListener("DOMContentLoaded", function () {
    let alertBox = document.querySelector(".alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.opacity = "0";
            setTimeout(() => {
                alertBox.style.display = "none";
            }, 500);
        }, 2000);
    }
});
