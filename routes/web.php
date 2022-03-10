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

/*Comando para ativar o POST salvamento do banco através da view*/ 
Route::post('/events',[EventController::class, 'store']);
/*primeiro passamos o caminho, depois ativamos o EventController (do BD) 
e por ultimo qual a view que quero atingir através do método store*/





Route::get('/contato', function () { //aqui é a url que o usuário ve no site
    return view('contato');//aqui é o nome do arquivo que criamos, podendo ter um nome desejado. 
});