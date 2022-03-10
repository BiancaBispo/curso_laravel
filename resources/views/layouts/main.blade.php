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
                        <li class="nav-item"><a href="/" class="nav-link">Entrar</a></li>
                        <li class="nav-item"><a href="/" class="nav-link">Cadastrar</a></li>
                    </ul>
                </div>
            </nav>
        </header>


        {{-- Comando para inserir nas paginas criadas essa estrutura já pronta --}}
        @yield('content')


        {{-- Criando o footer junto também --}}

<!--INICIO Footer = roda pé -->
{{--<footer class="page-footer bg-dark">
    <div id="contato" class="bg-success">
        <div class="container">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-12 text-center">
                    <a href="https://pt-br.facebook.com/login/web/"><i class="fab fa-facebook-f text-white mr-4"></i></a>
                    <a href="https://twitter.com/login?lang=pt"><i class="fab fa-twitter text-white mr-4"></i></a>
                    <a href="https://www.instagram.com/accounts/login/?hl=pt-br"><i class="fab fa-instagram text-white mr-4"></i></a>
                </div>
            </div>
        </div>   
    </div>

    <div class="container text-center text-md-left mt-5">
        <div class="row">

            <div class="col-md-3 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Sobre nós</h6>
                <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px">
                <p class="mt-2 text-white">Somos um grupo de jovens que está realizando um projeto que busque reunir informações sobre o mundo game para facilitar o encontro das tendências do momento. </p>
            </div>
            
            <div class="col-md-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Menu</h6>
                <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto " style="width: 125px; height: 2px">
                <ul class="list-unstyled "> 
                    <li class="my-2"><a href="/noticias_jogos/index.php" class="text-white">Inicio</a></li>
                    <li class="my-2"><a href="/noticias_jogos/noticias.php" class="text-white">Notícias</a></li>
                    <li class="my-2"><a href="/noticias_jogos/index.php" class="text-white">Vídeo</a></li>
                    <li class="my-2"><a href="#contato" class="text-white">Contato</a></li>
                    <li class="my-2"><a href="/noticias_jogos/src/view/login_novo/index.php" class="text-white">Produtos</a></li>
                </ul>
            </div>
        
            <div class="col-md-3 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">Contato</h6>
                <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px">
                <ul class="list-unstyled"> 
                    <li class="my-2"><i class="fas fa-envelope mr-3"></i> contato@gmail.com</li>
                    <li class="my-2"><i class="fas fa-phone mr-3"></i> (00) 0000-0000</li>
                </ul>
                
                <br>
                <h6 class="text-uppercase font-weight-bold">Configurações</h6>
                <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px">
                <ul class="list-unstyled"> 
                    <li class="my-2"><a href="/noticias_jogos/src/view/login_admin/index.php" class="text-white">Administrador</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">
        <p> All Right reserved by &copy; Projeto </p>
    </div>
</footer>--}}
    <!--FIM Footer = roda pé-->

    <footer>
        <p>HDC Events &copy; 2022</p>
    </footer>

    <!--Adicionando o script para os icons-->
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>