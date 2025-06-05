<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="https://smarttelecom.eng.br/new_template/assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/generateDocument.css') }}">

    <!--Bootstrap icons-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Smart | Gerar Documento</title>
    
</head>
<body>
    <a href="/provider" class="return-provider-link"><i class="bi bi-arrow-left"></i></a>

    <div class="container-main-gd">
        <div class="header-container">

            <img src="https://smarttelecom.eng.br/new_template/assets/img/favicon.png" alt="">
        </div>

        <div class="informations-container">

            <h1 class="contract-title">
                Smart Telecom | Time atual {{ optional($team)->name }}
            </h1>
            
            <div class="main-informations">
                <h2 class="name-provider">Provedor: {{Auth::user()->name}}</h2>

                <h2 class="cnpj-provider">CNPJ: {{Auth::user()->cnpj}}</h2>
            </div>

            <hr style="width: 90%; margin: 0 auto;">

            <h3 class="vige">Vigência:</h3>

            <div class="container-data-vig">

                <p>De: <span>Init</span> | Até: <span>Finish</span></p>

            </div>

        </div>

        <div class="second-informations">

            <h2 class="value-contract">Valor do contrato: R$ 000,00</h2>

            <h2 class="city-contract">Cidade: Pacajus</h2>

            <h3 class="date" id='date'>dd/mm/aa</h3>

        </div>

    </div>
    
    <div class="create-container">

        <button class="create-contract">Gerar documento</button>

    </div>
    <script>

        function formatData(data){

            const formates = {year: 'numeric', mounth: 'long', day: 'numeric'}

            return data.toLocaleDateString('pt-br', formates)

        }

        const dataCamp = document.getElementById('date')

        const atualDate = new Date()

        dataCamp.textContent = formatData(atualDate)

    </script>
</body>
</html>