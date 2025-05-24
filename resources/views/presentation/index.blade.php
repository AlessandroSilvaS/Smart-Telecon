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

                            <li class="menu-nav-option"><a href="#init" class='link-menu'>Início</a></li>
                            <li class="menu-nav-option"><a href="#services" class='link-menu'>Serviços</a></li>
                            <li class="menu-nav-option"><a href="#mission" class='link-menu'>Missão</a></li>
                            <li class="menu-nav-option"><a href="#contact" class='link-menu'>Contatos</a></li>

                        </ul>

                    </nav>

                    <div class="theme-and-contact">

                        <button class="theme-button" name="theme"><i class="bi bi-sun custom-size"></i></button>

                        <div class="contact-link-area">

                            <i class="bi bi-box-arrow-in-right custom-opacity"></i>

                            <a href="/login" class='contact-link' >Entrar</a>

                        </div>

                    </div>

                </div>
            </div>

            <!--informações iniciais-->

            <div class="apresentation-informations" id="init">

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

        <section class="service" id="services">

            <h1 class="service-title">Conheça nossos serviços</h1>

            <div class="container-cards-service">

                @if (!empty($cards))
                    @foreach ($cards as $card)
                        <x-card-project 
                            :image="$card['image']" 
                            :title="$card['title']" 
                            :content="$card['content']" 
                        />
                    @endforeach
                @else
                    <p>Nenhum card encontrado.</p>
                @endif

            </div>

        </section>

        <!--Section mission-->

        <section class="mission" id="mission">

            <div class="mission-container-image">

                <img src="https://www.falemaisvoip.com.br/blog/wp-content/uploads/2021/06/telecomunicacoes-nas-empresas.jpg" alt="mission-image">

            </div>

            <div class="mission-container-text">

                <h1 class="mission-text-header">Nossa Missão</h1>

                <div class="mission-text-informations">

                    <h2 class="text-informations">Nossa missão é proporcionar meios eficazes e seguros para a transmissão de dados, voz e imagem, conectando pessoas, empresas e tecnologias por meio de redes físicas e digitais. Temos como principal papel garantir o acesso à informação, à comunicação e à inclusão digital em escala local e global.</h2>

                </div>

            </div>

        </section>

        <!--Entre em contato-->

        <section class="contact" id="contact">
            
            <div class="location-contact-container">

                <div class="logo-and-name">

                    <img src="{{asset('assets/img/project/LogoSmart.png')}}" alt="Smart Logo">

                    <h2 style="color: aliceblue; font-size: 36px" >Smart Telecon</h2>

                </div>

                <div class="location">

                    <h2 class="location-title">Endereço</h2>

                    <p class="location-informations">Rua Daniel Esmero, 574, Croata 1</p>

                    <p class="location-informations">Pacajus, CE-Brasil</p>

                    <hr style="width: 100%; color: white">

                </div>

                <div class="contact-box">

                    <h2 class="contact-box-title">Contatos</h2>

                    <p class="contact-box-informations">Telefone 1: <span id="first-Telefon">+55 85 99254-1025</span></p>
                    <p class="contact-box-informations">Telefone 2: <span id="second-Telefon">+55 85 99263-7260</span></p>
                    <p class="contact-box-informations" id="last-contact">Email: <span id="email-contact">contato@smarttelecom.eng.br</span></p>

                </div>

            </div>

            <div class="social-content">

                <h3 style="color: aliceblue; font-size: 26px">Nossas redes sociais</h3>
                
                <x-social-button nameOfSocialMidia="Whatsapp" width="200px" backgroundColor="#25D366"><i class="bi bi-whatsapp"></i></x-social-button>

                <x-social-button nameOfSocialMidia="Instagram" width="200px" backgroundColor="#E4405F"><i class="bi bi-instagram"></i></x-social-button>

                <x-social-button nameOfSocialMidia="Facebook" width="200px" backgroundColor="#1877F2"><i class="bi bi-facebook"></i></x-social-button>

                <x-social-button nameOfSocialMidia="Linkedin" width="200px" backgroundColor="#0077B5"><i class="bi bi-linkedin"></i></x-social-button>

            </div>

        </section>

    </div>

</body>
</html>