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
        //Criação do objeto para esses dados com o nome dos campos das tabelas
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        //Após a criação precisamos salvar esses objetos instanciados
        $event->save();

        //Depois de salvar redirecionar o usuário para alguma página desejada. 
        return redirect('/');

    }
    


    /*OBS: o indicado é separa as views por pasta, porque assim, conseguimos
     separar os nossos controller e a aplicação fica mais organizada */ 


}
