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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script> 

  
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
                        
                        {{--E quando estiver logado, autenticado (auth) ele mostre essas opções--}}
                        @auth
                        <li class="nav-item"><a href="/dashboard" class="nav-link">Meus eventos</a></li>

                        {{--log out - Sair do login--}}
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                            @csrf {{--permissão de uso--}}
                            <a href="/logout" 
                            class="nav-link" 
                            onclick="event.preventDefault(); 
                                            this.closest('form').submit();">
                            Sair</a>
                            </form>
                        </li>
                        @endauth

                        {{--permite que, quando logado esses dois botões suma--}}
                        @guest
                        <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
                        <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>


        {{-- Comando para inserir nas paginas criadas essa estrutura já pronta --}}
       {{--
        
        @yield('content')
        
        Depois de tirar esse comando vamos o substituir pela tag main--}} 

    <main>
        <div class="container-fluid">
            <div class="row">

                {{--Comandos para a mensagem de envio do formulário--}}
                @if (session('msg'))
                    <p class="msg"> {{ session('msg') }} </p>
                @endif
                @yield('content')

            </div>
        </div>
    </main>


    <footer>
        <p>HDC Events &copy; 2022</p>
    </footer>

    <!--Adicionando o script para os icons-->
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>