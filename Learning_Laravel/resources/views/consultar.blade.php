<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque Web</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link das Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Ícone da Página -->
    <link rel="icon" href="{{asset('imgs/Logo_Pagina.png')}}" type="image/x-icon">
    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Link para Máscara de Campo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Link para o CSS externo -->
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
                        <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Avisos -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container" style="max-width: 900px;">
        <!-- Título -->
        <h3><img src="{{asset('imgs/Consultar.png')}}" alt="Logo" width="32" height="32" class="d-inline-block align-text-top"> Consultar Produtos</h3>
        <p class="mb-4">Informações de todos os produtos cadastrados</p>
        <!-- Filtro -->
        <div class="d-flex justify-content-end mb-4">
            <form method="GET" action="{{ url('/consultar') }}" class="d-flex align-items-center">
                <input type="text" name="filtro" class="form-control me-2" placeholder="Buscar por nome"
                    value="{{ request('filtro') }}" style="max-width: 200px; height: 40px;">
                <button type="submit" class="btn btn-purple d-flex align-items-center" style="height: 40px;">Buscar</button>
            </form>
        </div>
        @section('content')
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>{{ $produto->estoque }}</td>
                        <td class="text-center">
                            <!-- Editar -->
                            <a href="{{ url('/editar-produto/' . $produto->id) }}" class="btn btn-sm btn-editar me-1">
                                <i class="bi bi-pencil-fill"></i> Editar
                            </a>
                            <!-- Excluir -->
                            <form id="formExcluir{{ $produto->id }}" action="{{ route('produtos.excluir', $produto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn btn-sm btn-excluir"
                                    onclick="confirmarExclusao({{ $produto->id }}, '{{ $produto->nome }}', 'R$ {{ number_format($produto->valor, 2, ',', '.') }}')">
                                    <i class="bi bi-trash-fill"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum produto cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Rodapé -->
    <div id="footer">
        &copy 2025 Todos os direitos reservados | Letícia
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/confirmacao.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>