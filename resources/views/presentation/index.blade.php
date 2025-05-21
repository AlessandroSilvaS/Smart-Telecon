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

                            <a href="/login" class='contact-link' >Entrar</a>

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

                @php
                    $arrayOfServicesCard = [
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                        [
                            'image' => "https://blog.synergyco.com.br/wp-content/uploads/2023/09/sistema-de-telecomunicacoes-1200x640.jpg",
                            'title' => "Smart Card",
                            'content' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, similique repudiandae. Laudantium consectetur optio doloribus libero, temporibus tenetur ad tempore facere atque, corrupti nesciunt, quia sit? Iste similique quae a."
                        ],
                    ];
                @endphp

                @foreach ($arrayOfServicesCard as $card)
                    <x-card-project 
                        :image="$card['image']" 
                        :title="$card['title']" 
                        :content="$card['content']"
                    />
                @endforeach

            </div>

        </section>

        <!--Section mission-->

        <section class="mission">

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

    </div>

</body>
</html>