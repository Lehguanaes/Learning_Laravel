// Função para exibir o alerta de confirmação antes de cadastrar o produto
function confirmarCadastro() {
    // Pegar os valores dos inputs
    let nomeProduto = document.querySelector('input[name="nome"]').value;
    let valorProduto = document.querySelector('input[name="valor"]').value;
    let quantidadeProduto = document.querySelector('input[name="estoque"]').value;

    // Verificar se os campos estão preenchidos
    if (!nomeProduto || !valorProduto || !quantidadeProduto) {
        Swal.fire({
            icon: 'warning',
            title: 'Campos vazios!',
            text: 'Preencha todos os campos antes de cadastrar.',
        });
        return;
    }

    // Exibir o alerta de confirmação
    Swal.fire({
        title: 'Confirmar Cadastro',
        html: `Deseja cadastrar o produto <b>${nomeProduto}</b> com preço de <b>R$ ${valorProduto}</b> e quantidade de <b>${quantidadeProduto}</b>?`,
        icon: 'question',
        iconColor: '#908dfe', 
        showCancelButton: true,
        confirmButtonColor: '#908dfe', 
        cancelButtonColor: '#5f5cb5',
        confirmButtonText: 'Sim, cadastrar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, submeter o formulário
            document.querySelector('form').submit();
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
            }, 500); // Tempo extra para transição suave
        }, 2000); // Tempo antes de sumir (3 segundos)
    }
});
