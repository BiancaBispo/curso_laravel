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
        <!--Menu-->
        <header>
            <nav class= "navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/flor-de-lotus.png" alt="Eventos">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="/" class="nav-link">Eventos</a></li>
                        {{--Colocando o link de acesso para a pagina desejada--}}
                        <li class="nav-item"><a href="/events/create" class="nav-link">Criar Eventos</a></li>
                        <li class="nav-item"><a href="/" class="nav-link">Entrar</a></li>
                        <li class="nav-item"><a href="/" class="nav-link">Cadastrar</a></li>
                    </ul>
                </div>
            </nav>
        </header>


        {{-- Comando para inserir nas paginas criadas essa estrutura já pronta --}}
        @yield('content')


        {{-- Criando o footer junto também --}}

    <footer>
        <p>HDC Events &copy; 2022</p>
    </footer>
    <!--Adicionando o script para os icons-->
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>