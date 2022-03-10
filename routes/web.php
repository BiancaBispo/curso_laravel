<?php

use Illuminate\Support\Facades\Route;


//Para ativar a rota com o controller, vamos colocar o caminho do diretório do controller aqui usando o 'use'
use App\Http\Controllers\EventController;

//Depois de herdar o controller informamos para o caminho que ele esta no arquivo EventController e na class index
Route::get('/', [EventController::class, 'index']); 
/*tudo que está no index vai aparecer na pagina inicial*/ 


//Aqui agora vamos criar um evento.
Route::get('/events/create', [EventController::class, 'create']); 
/*o evento criará o caminho da barra de busca e dos arquivos que criamos*/



Route::get('/contato', function () { //aqui é a url que o usuário ve no site
    return view('contato');//aqui é o nome do arquivo que criamos, podendo ter um nome desejado. 
});

Route::get('/produtos', function () { 
    //O request é um método que torna possível resgatar dos paramentros que vem por query string (query parametros)

    $busca = request('search'); //quando tiver essa palavra na rota (busca do navegador)
    return view('products', ['busca' => $busca]); //aqui passando a busca na view
});


//Query parameter
Route::get('/produto_testes/{id?}', function ($id = null) { //passando o novo parâmetro, com o id e na function preciso especificar que estou passando um id para recebe-lo depois na view 
    return view('product', ['id' => $id]); //comando para mandar lá para a view esse resultado, através de um array
    //lembrando que na hora do retorno os nomes tem que ser igual ao do arquivo que já possui na pasta views
});
