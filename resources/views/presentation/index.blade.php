<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <!--Biblioteca de icones -->

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
     
    <title>Smart Telecon</title>
</head>
<body>

    <!-- header e menu da aplicação com logo da empresa, menu de navegação, botão de tema e botão de contato rspectivamente-->

    <header class="header">

        <img src="{{ asset('assets/img/project/LogoSmart.png') }}" alt="emprise logo" id="logo-image">

        <nav class='menu-nav'>

            <ul class="menu-nav-list">

                <li class="menu-nav-option"><a href="#" class='link-menu'>Início</a></li>
                <li class="menu-nav-option"><a href="#" class='link-menu'>Serviços</a></li>
                <li class="menu-nav-option"><a href="#" class='link-menu'>Missão</a></li>
                <li class="menu-nav-option"><a href="#" class='link-menu'>Valores</a></li>
                <li class="menu-nav-option"><a href="#" class='link-menu'>Contatos</a></li>

            </ul>

        </nav>

        <div class="theme-and-contact">
            
            <button class="theme" name="theme"><i class="bi bi-sun custom-size"></i></button>

            <div class="contact-link-area">

                <i class="bi bi-box-arrow-in-right custom-opacity"></i>

                <a href="https://smarttelecom.eng.br/login" class='contact-link' target='_blank'>Entrar</a>

            </div>

        </div>

        <section class="apresentation">

        <div class="apresentations-text">
            
        </div>

        </section>

    </header>

    <main>

    </main>

    <footer>

    </footer>
    
</body>
</html>