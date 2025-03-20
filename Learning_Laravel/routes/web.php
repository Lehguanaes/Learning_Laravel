<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Rota após o cadastro do produto ser cadastrado
Route::post('/cadastrar-produto', function (Request $request){
//dd($request->all());

Produto::create([

    'nome' => $request->nome,
    'valor' => $request->valor,
    'estoque' => $request->estoque
]);

return redirect('/')->with('success', 'Produto cadastrado com sucesso!');
});
?>