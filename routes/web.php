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

Route::get('/', function () {

    $nome = "Bianca";
    $idade = 22;

    $arr = [10,20,30,40,50];    //Array

    $nomes = ["Bianca", "Lucas", "Janete", "Max"]; //Array

    return view('welcome', 
    [
        'nome' => $nome, 
        'idade' => $idade, 
        'profissao' => "Programador",
        'arr' => $arr,
        'nomes' => $nomes
    ]); //Array 
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/produtos', function () { //aqui é a url que o usuário ve no site
    return view('products'); //aqui é o nome do arquivo que criamos, podendo ter um nome desejado. 
});


Route::get('/outro', function () {
    return view('contato');
});
