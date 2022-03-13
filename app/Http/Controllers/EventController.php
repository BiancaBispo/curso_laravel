<?php

/*funções que são encaminhadas para a rota web.php*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Adicionando o Model do usuário criado anteriormente
use App\Models\User;

/*Vamos chamar a o model (ele fará a conexão entre o banco e a view) */
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        /*Ativando a busca, o search da variável que 
        colocamos no input da busca. 
        E o para busca a informação nessa variável */
        $search = request('search');

        //Se a busca estiver preenchida:
        if($search) {
            /*o evento para ativar a busca, 
            buscando por título, que não precisa ser EXATAMENTE igual 
            'usa-se para isso o LIKE', sendo qualquer coisa para trás 
            ou para frente dos caracteres.
            E o GET diz que quer pegar esses registros
            */
            
            $events = Event::where([
                ['title', 'like', '%' .$search. '%']
            ])->get();

        } else{
            //Se não, ativa o Model Event
            $events = Event::all();
        }


        //lembrar de sempre enviar o novo evento para a view!!
        return view('welcome', ['events' => $events, 'search' => $search]); //Array 
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
       /*Lembrando que a ordem tem que ser igual aos input da view*/
        $event->title = $request->title;
        $event->date = $request->date;
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

        //Comandos responsáveis por inserir um  user_id à cada evento criado
          $user = auth()->user();
          //o evento do usuario é igual ao id dele
          $event->user_id = $user->id;

        //Após a criação precisamos salvar esses objetos instanciados
        $event->save();
        //Depois de salvar redirecionar o usuário para alguma página desejada e junto uma mensagem. 
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
    
    //o show e o id é o das rotas
    public function show($id) {
        //chamando o model Event
        $event = Event::findOrFail($id);
    
        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        //comando para exibir os dados (os eventos criados dele) do usuário na view
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        /*diferente de quando fizemos o da busca, aqui queremos o usuário de fato, 
        então vai buscar somente o usuário quando o event for acionado e o primeiro 
        id que for igual ao do usuário ele vai puxar para a view, evitando que ele busque
         por todo o banco todos os ids iguais, otimizando o site   */


        // vai retornar na view o mesmo caminho das rotas
        return view('events.show', ['event' => $event, 'eventOwner'=>$eventOwner, 'hasUserJoined'=>$hasUserJoined]);
    }

    //Função para mostrar os eventos criados do usuário 
    public function dashboard(){
        //pegar o usuário autenticado 
        $user = auth()->user();

        //verificar os eventos desse usuário, puxando a função do events laaa do arquivo user.php 
        $events = $user->events;
        
        //para acessar aos eventos que os usuários participam 
        $eventsAsParticipant = $user->eventsAsParticipant;

        //retornar a view
        return view('events.dashboard', 
        ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
    }


    //Função para deletar um dado (evento do usuário)
    public function destroy($id) {

        //Chamando através do id com a função 'delete' para deletar o dado  
        Event::findOrFail($id)->delete();

        //retornando na view
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    //Função para editar os dados no banco de dados (puxar as informações)
    public function edit($id) {
        //para que somente usuários autores possam editar seus arquivos
        $user = auth()->user();

        $event = Event::findOrFail($id);

        //se o usuário for diferente do evento (para editar) ele o redireciona para a dashboard dele, não a  de outro pessoa
        if($user->id != $event->user_id) {
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
    }

    //Comando atualizar o banco de dados depois do edit
    public function update(Request $request){

        $data = $request->all();

        //copia do arquivo upload da imagem da função Store
         if($request->hasFile('image') && $request->file('image')->isValid()) {
            //pegando a imagem e a extensão da mesma
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            //pegar o nome do arquivo e alterar para uma string unica através do tempo de criação da mesma
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . ".". $extension ;
            
            //Adicionar a imagem a pasta chamada events, salvo-as no servidor
            $request->image->move(public_path('img/events'), $imageName);

            //Alterar o nosso objeto, o nome anterior da imagem para o novo nome
            $data['image'] = $imageName; 
        }


        Event::findOrFail($request->id)->update($data);
        
        //depois de terminar, redirecionar para outra página
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');

    }

    //Participantes do evento
    public function joinEvent($id) {
        //para que somente usuários autores possam participar dos eventos
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $event->title);

    }

    public function leaveEvent($id){
        //para que somente usuários autores possam sair dos eventos
        $user = auth()->user();

        //é o método detach que permite tirar a ligação entre usuário e evento 
        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $event->title);
    }

    /*OBS: o indicado é separa as views por pasta, porque assim, conseguimos
     separar os nossos controller e a aplicação fica mais organizada */ 


}
