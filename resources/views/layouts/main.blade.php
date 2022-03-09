<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--No titulo também vai o comando de baixo, tendo uma secção que se chama 'title' --}}
        <title>@yield('title')</title>

        <!--Fonte do Google-->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet"> 

        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--CSS da aplicação-->
        <link rel="stylesheet" href="/css/styles.css">

        <!--JavaScript-->
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        {{-- Comando para inserir nas paginas criadas essa estrutura já pronta --}}
        @yield('content')


        {{-- Criando o footer junto também --}}

    <footer>
        <p>HDC Events &copy; 2022</p>
    </footer>
    </body>
</html>