<!DOCTYPE html>
<html lang="pt-br"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
   
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Smart | Seus planos</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="https://smarttelecom.eng.br/new_template/assets/img/favicon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="/assets/css/provider.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Helpers e scripts base -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <script src="../assets/js/config.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  @if(request('id') && !\App\Models\UserPlan::find(request('id')))

    <script>

      history.pushState(null, null, window.location.pathname);

    </script>

  @endif

</head>

<body>

  <!-- Layout wrapper -->
  <x-app-layout>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container-tables-project">

        <!-- Título e subtítulo -->
        <div class="container-initial-informations">
          <div class="initial-informations-title-and-subtitle">
            <div class="initial-information-title">
              <h1>Bem vindo(a), {{ explode(' ', Auth::user()->name)[0] }}!</h1>
            </div>
            <div class="initial-informations-subtitle">
              <h3>Monitore ativamente seus planos.</h3>
            </div>
          </div>
        </div>

        <!-- Modais de Edição e Exclusão -->
       
        @if(Auth::check() && request()->has('id'))
          @php

            $planItem = App\Models\UserPlan::find(request()->query('id'));

          @endphp

            <x-modalsProject.edit :plan="$planItem" />
            <x-modalsProject.remove :plan="$planItem" />

        @endif

        <!-- Conteúdo principal -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y mb-5">
            <div class="card">
              <h5 class="card-header" style="font-size: 36px">Seus planos</h5>
              <small class="m-2">Clique em uma linha da tabela para edita-la</small>

              <!-- Botões de ação -->
              <div class="buttons-area">

                <a class="buttons-area-buttons" data-bs-toggle="modal" data-bs-target="#modalTop"><i class="bi bi-file-earmark-bar-graph fs-4"></i></a>

                <button class="buttons-area-buttons" data-bs-toggle="modal" data-bs-target="#modalFilter"><i class="bi bi-search"></i></button>

                <button class="buttons-area-buttons" type="button" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class="bi bi-plus fs-4"></i></button>

              </div>

              <!--Modal gerar documento-->

              <x-modalsProject.generateDocument/>

              <!--Modal Adicionar-->

                <x-modalsProject.modal-add/>

              <!--Modal de Filtragem-->

                <x-modalsProject.filter/>

              <!-- Tabela -->
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Nome</th>
                      <th>Velocidade</th>
                      <th>Tipo</th>
                      <th>Preço</th>
                      <th>Data de criação</th>
                      <th>Última Edição</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach($plans as $plan)
                    <tr onClick="openModal(1, {{ $plan->id }})" style="cursor: pointer;">
                      <td><strong>{{ $plan->name_plan }}</strong></td>
                      <td>{{ $plan->speed_plan }} mgb</td>
                      <td>{{ $plan->type_plan }}</td>
                      <td>{{ $plan->price_plan }}</td>
                      <td>{{ $plan->created_at }}</td>
                      <td>{{ $plan->updated_at }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>

  <!-- Scripts de interação -->
  <script>
    function openModal(indexModal, itemId) {
      history.pushState(null, null, '?id=' + itemId);

      fetch(`/plan/${itemId}/details`)
        .then(response => response.json())
        .then(data => {

          document.getElementById('basic-default-name').value = data.name_plan;
          document.getElementById('basic-default-speed').value = data.speed_plan;
          document.getElementById('basic-default-type').value = data.type_plan;
          document.getElementById('basic-default-price').value = data.price_plan;

          const modal1 = new bootstrap.Modal(document.getElementById('modalToggle'));
          const modal2 = new bootstrap.Modal(document.getElementById('modalToggle2'));

          if (indexModal == 1) {
            modal1.show();
            modal2.hide();
          } else if (indexModal == 2) {
            modal2.show();
            modal1.hide();
          }
        })
        .catch(error => {
          console.error('Erro ao carregar os dados do plano:', error);
        });
    }

    $(document).ready(function () {
      $('#modalToggle').on('hidden.bs.modal', function () {
        document.getElementById('basic-default-name').value = '';
        document.getElementById('basic-default-speed').value = '';
        document.getElementById('basic-default-type').value = '';
        document.getElementById('basic-default-price').value = '';
      });
    });
  </script>

  <!-- Bibliotecas JS -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>
</html>
