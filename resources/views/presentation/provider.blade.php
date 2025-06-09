<!DOCTYPE html>
<html lang="pt-br" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Smart | Seus planos</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="https://smarttelecom.eng.br/new_template/assets/img/favicon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

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

        <!-- Modal de edição -->
        @auth
        <div class="modal fade" id="modalToggle" tabindex="-1" aria-labelledby="modalToggleLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Editar plano</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="#" id="editPlanForm">
                      @csrf
                      @method('PUT')

                      <div class="mb-3">
                        <input type="text" name="name_plan" id="basic-default-name" class="form-control" placeholder="Nome do plano" />
                      </div>
                      <div class="mb-3">
                        <input type="text" name="speed_plan" id="basic-default-speed" class="form-control" placeholder="Velocidade (ex: 100 Mbps)" />
                      </div>
                      <div class="mb-3">
                        <input type="text" name="type_plan" id="basic-default-type" class="form-control" placeholder="Tipo do plano" />
                      </div>
                      <div class="mb-3">
                        <input type="text" name="price_plan" id="basic-default-price" class="form-control" placeholder="Preço do plano" />
                      </div>

                      <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-primary" style="background-color: #04b0d3;">Salvar</button>

                        <!-- Botão para abrir modal de remoção -->
                        <button type="button" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-danger">
                          Deletar registro
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal de remoção -->
        <div class="modal fade" id="modalToggle2" tabindex="-1" aria-labelledby="modalToggleLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form method="POST" id="deletePlanForm" action="#">
                @csrf
                @method('DELETE')

                <div class="alert alert-danger m-3">Cuidado! - Você está certo do que faz?</div>
                <p class="m-3" id="confirm-delete">Realmente quer apagar esse plano?</p>

                <div class="m-3" style="display: flex; gap: 10px;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger">Deletar registro</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endauth

        <!-- Conteúdo principal -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y mb-5">
            <div class="card">
              <h5 class="card-header" style="font-size: 36px">Seus planos</h5>
              <small class="m-2">Clique em uma linha da tabela para editá-la</small>

              <!-- Botões de ação -->
              <div class="buttons-area">
                <div class="m-3">
                  <input type="text" id="searchInput" class="form-control" placeholder="Filtrar planos..." />
                </div>

                <a href="{{ route('export.pdf') }}" class="buttons-area-buttons" target="_blank">
                  <i class="bi bi-file-earmark-bar-graph fs-4"></i>
                </a>
                <button class="buttons-area-buttons" type="button" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <i class="bi bi-plus fs-4"></i>
                </button>
              </div>

              <!-- Outros modais -->
              <x-modalsProject.generateDocument />
              <x-modalsProject.modal-add />

              <!-- Tabela de planos -->
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Nome</th>
                      <th>Velocidade</th>
                      <th>Tipo</th>
                      <th>Preço</th>
                      <th>Data de criação</th>
                      <th>Última edição</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    @foreach($plans as $plan)
                      <tr onclick="openModal({{ $plan->id }})" style="cursor: pointer;">
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
    let selectedPlanId = null;

    function openModal(planId) {
      selectedPlanId = planId;
      const row = document.querySelector(`tr[onclick="openModal(${planId})"]`);
      const cols = row.querySelectorAll('td');

      // Atualizar formulário de edição
      $('#basic-default-name').val(cols[0].innerText.trim());
      $('#basic-default-speed').val(cols[1].innerText.trim().replace(' mgb', ''));
      $('#basic-default-type').val(cols[2].innerText.trim());
      $('#basic-default-price').val(cols[3].innerText.trim());

      $('#editPlanForm').attr('action', `/provider/alterPlans/${selectedPlanId}`); 

      $('#deletePlanForm').attr('action', `/provider/removePlan/${selectedPlanId}`);


      // Abrir modal de edição
      var editModal = new bootstrap.Modal(document.getElementById('modalToggle'));
      editModal.show();
    }
  </script>

  <script>
  $(document).ready(function () {
    $("#searchInput").on("keyup", function () {
      let value = $(this).val().toLowerCase();
      $("table tbody tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>


  <!-- Bootstrap JS -->
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
</body>

</html>
