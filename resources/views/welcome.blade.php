{{--diretiva que permite usar o conteúdo pré pronto do modelo de html e footer, e do titulo --}}

@extends('layouts.main') {{--o primeiro é a pasta e o main é o nome do arquivo.--}}

@section('title', 'Eventos') {{--chama a função e em seguida o nome desejado para está página--}}

{{--Chamando a função para aplicar o modelo html. Sendo aqui o INICIO--}}
@section('content')

@foreach ($events as $event) {{--chamando a tabela events na variável event--}}
    {{--imprimindo o titulo e a descrição  --}}
    <p>{{ $event->title }} -- {{$event->description}}</p>
@endforeach


{{--FIM da seção do conteúdo--}}
@endsection