<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Produto;
use llluminate\Http\request;

Route::get('/', function () {
    return view('inicio');
});

Route:: post('/cadastrar-produto', function(Request $request){
    //dd($request->all());

    produto::create([
        'nome' => $request->nome,
        'valor'=> $request ->valor,
        'estoque' => $request->estoque

    ]);
    echo "Produto criado com sucesso!";
});

Route::get('/listar-produto/{id}', function($id){
   $produto = Produto::find($id);
   return view('listar', ['produto' => $produto]); 
});

Route::get('/editar-produto{id}', function($id){
    $produto = Produto::find($id);
    return view('editar', ['produto' => $produto]);
});

Route::post('/editar-produto/{id}',function(Request $request, $id){
    $produto = Produto::find($id);

    $produto->update([
        'nome' => $request->nome,
        'valor' =>$request->valor,
        'estoque' => $request->estoque
    ]);
    echo "Produto editando com sucesso!";
});

Route::get('/excluir-produto/{id}', function($id){
    $produto =Produto::find($id);
    $produto->delete();

    echo "Produto excluido com sucesso!";

});