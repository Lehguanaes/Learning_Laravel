<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Estoque</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link das Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Ícone da Página -->
    <link rel="icon" href="{{asset('imgs/Logo_Pagina.png')}}" type="image/x-icon">
    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Link para o CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box-seam"> Estoque Web </i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <!-- Título Principal -->
        <h3><img src="{{asset('imgs/Logo_Navbar.png')}}" alt="Logo" width="36" height="30" class="d-inline-block align-text-top">Estoque</h3>
        <p>Cadastre seus Produtos!</p>
        <!-- Formulário de Cadastro -->
        <form action="/cadastrar-produto" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nomeInput" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite o nome do produto">
            </div>
            <div class="mb-3">
                <label for="valorInput" class="form-label">Valor:</label>
                <input type="number" class="form-control" name="valor" placeholder="Digite o valor do produto">
            </div>
            <div class="mb-3">
                <label for="quantidadeInput" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" name="estoque" placeholder="Digite a quantidade do produto">
            </div>
            <button type="button" class="btn btn-custom" onclick="confirmarCadastro()">
                Cadastrar
            </button>
        </form>
    </div>
    <!-- Rodapé -->
    <div id="footer">
        &copy 2025 Todos os direitos reservados | Letícia
    </div>
    <!-- Script de confirmação -->
    <script src="js/confirmacao.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>