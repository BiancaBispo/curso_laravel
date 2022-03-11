<?php

/*funções que são encaminhadas para a rota web.php*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*Vamos chamar a o model (ele fará a conexão entre o banco e a view) */
use App\Models\Event;

class EventController extends Controller
{
    public function index() {

        //ativando o model Event
        $events = Event::all();

        return view('welcome', ['events' => $events]); //Array 
    }

    //function do Evento
    public function create() {
        return view('events.create');
        //o caminho do evento que vai retornar uma view (o mesmo ta na pasta events no arquivo create)
    }


    //Função do banco store
    public function store(Request $request) {
        /*O request é que vai ser responsável por 
        trazer todo os campos do formulário de criar
        eventos ao banco*/

        $event = new Event;
        //Criação do objeto para esses dados com o nome dos campos das tabelas, puxando essas informações através do request
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
       
        //JSON - A unica diferença é de vez informar que essa informação vai vim em string, vamos falar que é um Array
        $event->items = $request->items;



        // Comando para o Upload da Imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            //pegando a imagem e a extensão da mesma
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            //pegar o nome do arquivo e alterar para uma string unica através do tempo de criação da mesma
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . ".". $extension ;
            
            //Adicionar a imagem a pasta chamada events, salvo-as no servidor
            $request->image->move(public_path('img/events'), $imageName);

            //Alterar o nosso objeto, o nome anterior da imagem para o novo nome
            $event->image = $imageName; 
        }

        //Após a criação precisamos salvar esses objetos instanciados
        $event->save();
        //Depois de salvar redirecionar o usuário para alguma página desejada e junto uma mensagem. 
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
    
    //o show e o id é o das rotas
    public function show($id) {
        //chamando o model Event
        $event = Event::findOrFail($id);
        // vai retornar na view o mesmo caminho da rota
        return view('events.show', ['event' => $event]);
    }


    /*OBS: o indicado é separa as views por pasta, porque assim, conseguimos
     separar os nossos controller e a aplicação fica mais organizada */ 


}
