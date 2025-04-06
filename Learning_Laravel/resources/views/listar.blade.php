<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque Web</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonte Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Ícone da Página -->
    <link rel="icon" href="{{asset('imgs/Logo_pagina.png')}}" type="image/x-icon">
    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- jQuery e Máscaras -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('imgs/Logo_Navbar.png')}}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                <strong>Estoque Web</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/consultar">Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Avisos para o Usuário -->
    @if(session('sucesso'))
    <div class="alert alert-success">
        {{ session('sucesso') }}
    </div>
    @endif
    <!-- Conteúdo -->
    <div class="container">
        <h3>
            <img src="{{asset('imgs/Listar.png')}}" alt="Logo" width="32" height="32" class="d-inline-block align-text-top">
            Produto
        </h3>
        <p class="mb-4">Informações cadastradas do produto</p>
        <!-- Formulário de Exibição -->
        <form>
            <div class="mb-4">
                <label class="form-label">Nome do Produto:</label>
                <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}" readonly>
            </div>
            <div class="mb-4">
                <label class="form-label">Valor (R$):</label>
                <input type="text" class="form-control" name="valor" value="{{ number_format($produto->valor, 2, ',', '.') }}" readonly>
            </div>
            <div class="mb-4">
                <label class="form-label">Estoque:</label>
                <input type="number" class="form-control" name="estoque" value="{{ $produto->estoque }}" readonly>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-editar" onclick="window.location.href='/consultar'">OK</button>
            </div>
        </form>
    </div>
    <!-- Rodapé -->
    <div id="footer">
        &copy; 2025 Todos os direitos reservados | Letícia
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/confirmacao.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>