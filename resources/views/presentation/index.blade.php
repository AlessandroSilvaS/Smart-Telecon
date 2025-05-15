<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <!--Biblioteca de icones -->

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

     <!--Background-image-->

     <style>

        .header {
            background-image: url("{{ asset('assets/img/project/networkImage.jpg') }}");
        }

    </style>
     
    <title>Smart Telecon</title>
</head>
<body>

    <div class="view-index">

        <!--first section: apresentation-->

        <section class="apresentation">

        <!--logo menu e funcionalidades-->

            <div class="header-container">

                <div class="header">

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

                        <button class="theme-button" name="theme"><i class="bi bi-sun custom-size"></i></button>

                        <div class="contact-link-area">

                            <i class="bi bi-box-arrow-in-right custom-opacity"></i>

                            <a href="https://smarttelecom.eng.br/login" class='contact-link' target='_blank'>Entrar</a>

                        </div>

                    </div>

                </div>
            </div>

            <!--informações iniciais-->

            <div class="apresentation-informations">

            <!--Informações de texto-->

                <div class="text-informations">

                <!--Cabeçalhos-->

                    <div class="container-headers">

                        <h1 class="header-01">Regularização de provedores</h1>

                        <h2 class="header-02">Projeto de compartilhamento de postes</h2>

                        <h4 class="header-03">Nossos serviços garantem a regularização completa e eficiente para seu provedor de internet</h4>

                    </div>

                    <!--Outras informações-->


                    <div class="container-list-and-contact">

                        <ul class="apresentation-text-list">

                            <li class="apresentation-text-option"><i class="bi bi-check-circle"></i><span>Regularização Rápida e eficiente</span></li>
                            <li class="apresentation-text-option"><i class="bi bi-check-circle"></i><span>Atendimento ao cliente de qualidade</span></li>
                            <li class="apresentation-text-option"><i class="bi bi-check-circle"></i><span>Suporte técnico especializado</span></li>

                        </ul>

                        <a href="#" class="apresentation-text-link">Fale conosco</a>

                    </div>
                </div>

                <!--Imagem inicial-->

                <div class="apresentation-image-container">

                    <img src="{{ asset('assets/img/project/worldDay.svg') }}" alt="apresentation image" id="apresentation-image">
                
                </div>

            </div>

        </section>

        <!--Seção dois: serviços-->

        <section class="service">

            <h1 class="service-title">Conheça nossos serviços</h1>

            <div class="container-cards-service">
                
            </div>

        </section>

    </div>

</body>
</html>