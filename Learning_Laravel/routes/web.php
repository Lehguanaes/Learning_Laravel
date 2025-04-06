<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Rota após o Cadastro do Produto ser realizado
Route::post('/cadastrar-produto', function (Request $request) {
    Produto::create([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque,
    ]);

    return redirect('/')->with('success', 'Produto cadastrado com sucesso!');
});

// Rota para Consultar as informações de todos os Produtos cadastrados
Route::get('/consultar', function (Request $request) {
    $filtro = $request->input('filtro');
    
    $produtos = Produto::when($filtro, function ($query, $filtro) {
        return $query->where('nome', 'like', '%' . $filtro . '%');
    })->get();

    return view('consultar', ['produtos' => $produtos]);
});

// Rota para Editar um Produto cadastrado
Route::get('/editar-produto/{id}', function ($id) {
    $produto = Produto::find($id);
    return view('editar', ['produto' => $produto]);
});
Route::post('/editar-produto/{id}', function (Request $request, $id) {
    $produto = Produto::findOrFail($id);
    $produto->update([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque,
    ]);
    return redirect('/listar-produto/' . $id)->with('sucesso', 'Produto atualizado com sucesso!');
});

// Rota para listar as informações de um Produto cadastrado
Route::get('/listar-produto/{id}', function ($id) {
    $produto = Produto::find($id);
    return view('listar', ['produto' => $produto]);
});

// Rota para Excluir um Produto cadastrado
Route::delete('/excluir-produto/{id}', function ($id) {
    $produto = Produto::findOrFail($id);
    $produto->delete();

    return redirect('/consultar')->with('success', 'Produto excluído com sucesso!');
})->name('produtos.excluir');
?>
