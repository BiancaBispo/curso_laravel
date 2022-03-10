{{--diretiva que permite usar o conteúdo pré pronto do modelo de html e footer, e do titulo --}}

@extends('layouts.main') {{--o primeiro é a pasta e o main é o nome do arquivo.--}}

@section('title', 'Eventos') {{--chama a função e em seguida o nome desejado para está página--}}

{{--Chamando a função para aplicar o modelo html. Sendo aqui o INICIO--}}
@section('content')

<br><br><div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
    </form>
    <!--
    <div class="container">
        <div class="d-sm-block text-right mb-4">
            <h1 class="display-3 title-color "> Mundo Game</h1>
            <p class="lead"> Navegue pelas fases desse mundo das notícias games!!</p>
            <a href="#" class="btn btn-color btn-lg">Descubra</a>
        </div>
    </div>
    -->
</div>

  <div id="events-container" class="col-md-12">
      <h2>Próximos Eventos</h2>
      <p class="subtitle">Veja os eventos dos próximos dias</p>
     
      <div id="cards-container" class="row">
        @foreach ($events as $event) {{--chamando a tabela events na variável event--}}
        <div class="card col-md-3">
            <img src="/img/events/{{ $event->image }}" alt="{{$event->title}}">
            <div class="card-body">
                <p class="card-date">10/03/2022</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">N Participantes</p>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        {{--imprimindo o titulo e a descrição  --}}
         @endforeach

      </div>
  </div>











{{--FIM da seção do conteúdo--}}
@endsection