{{--diretiva que permite usar o conteúdo pré pronto do modelo de html e footer, e do titulo --}}

@extends('layouts.main') {{--o primeiro é a pasta e o main é o nome do arquivo.--}}

@section('title', 'Eventos') {{--chama a função e em seguida o nome desejado para está página--}}

{{--Chamando a função para aplicar o modelo html. Sendo aqui o INICIO--}}
@section('content')

    <img src="/img/img1.jpg" alt="Banner">
    <h1>Algum título</h1>
    @if(10 > 5)
        <p>A condição é true</p>
    @endif

    @if(10 < 5)
        <p>A condição é falsa</p> {{--Como é falsa não imprime a condição--}}
    @endif

    <p>{{ $nome }}</p> {{--Imprimir a variável nome criada no web.php--}}

    @if($nome == "Pedro")
        <p>Nome é Pedro</p>

    @elseif($nome == "Bianca")
        {{-- <p>O nome é Bianca</p>  --}}
        <p>O nome é {{ $nome }} e ela tem {{ $idade }} anos e tem a profissão {{ $profissao }}.</p>  <!-- Mais dinâmico --> 

    @else
        <p>O nome não é Pedro</p>
    @endif

    {{--Criando uma diretiva for--}}
    @for($i = 0; $i < count($arr); $i++)  {{-- essa condição for vai mostrar os números ordenados de forma crescente --}}
        <p>{{ $arr[$i] }} - {{ $i }}</p>
        @if($i == 2) {{--if dentro de for - um loop--}}
            <p>O i é 2</p>
        @endif
    @endfor

    @foreach($nomes as $nome)
        <p>{{ $loop->index}}</p>
            {{--A variável loop é do próprio Blade--}}
        <p>{{ $nome }}</p>  {{--imprimindo os nomes do array--}} 

    @endforeach


    {{--Comando puro PHP no blade--}}      
    @php
        $name = "João";
        echo $name;
    @endphp

    <!--Comentário HTML-->
    {{-- Este é um comentário do Blade --}}

{{--FIM da seção do conteúdo--}}
@endsection