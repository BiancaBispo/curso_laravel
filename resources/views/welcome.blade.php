<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Curso</title>

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>

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
    </body>
</html>
