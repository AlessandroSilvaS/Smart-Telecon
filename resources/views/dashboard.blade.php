<meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://smarttelecom.eng.br/new_template/assets/img/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <title>Smart | administrador</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <style>
      .firts-card:hover{
        transform: scale(1.1);
      }
    </style>

<x-app-layout>

     <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0" style="width: 100%; display: flex; justify-content: space-evenly;">

                  <!--first-->

                    <div class="card firts-card" style="width: 20%; cursor: pointer;  transition: transform 0.3s;" onclick="showTable('table-provider')">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="user-square"><path fill="#FF6363" d="M14.81,12.28a3.73,3.73,0,0,0,1-2.5,3.78,3.78,0,0,0-7.56,0,3.73,3.73,0,0,0,1,2.5A5.94,5.94,0,0,0,6,16.89a1,1,0,0,0,2,.22,4,4,0,0,1,7.94,0A1,1,0,0,0,17,18h.11a1,1,0,0,0,.88-1.1A5.94,5.94,0,0,0,14.81,12.28ZM12,11.56a1.78,1.78,0,1,1,1.78-1.78A1.78,1.78,0,0,1,12,11.56ZM19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1Z"></path></svg>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Provedores</span>
                          <h3 class="card-title mb-2">{{$data['total_users']}}</h3>
                          
                        </div>
                    </div>

                  <!--second-->

                  <div class="card firts-card" style="width: 20%; width: 20%; cursor: pointer;  transition: transform 0.3s;" onclick="showTable('table-plans')">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="signal-alt"><path fill="#636FFF" d="M10,14a1,1,0,0,0-1,1v6a1,1,0,0,0,2,0V15A1,1,0,0,0,10,14ZM5,18a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V19A1,1,0,0,0,5,18ZM20,2a1,1,0,0,0-1,1V21a1,1,0,0,0,2,0V3A1,1,0,0,0,20,2ZM15,9a1,1,0,0,0-1,1V21a1,1,0,0,0,2,0V10A1,1,0,0,0,15,9Z"></path></svg>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Planos ativos</span>
                          <h3 class="card-title mb-2">{{$data['total_plans']}}</h3>
                        </div>
                    </div>

                  <!--tree-->

                  <div class="card firts-card" style="width: 20%; width: 20%; cursor: pointer;  transition: transform 0.3s;" onclick="showTable('table-contract')">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="file-alt"><path fill="#FFFD63" d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z"></path></svg>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Contratos</span>
                          <h3 class="card-title mb-2">{{$data['total_contracts']}}</h3>
                        </div>
                    </div>

                  <!--four-->

                  <div class="card" style="width: 20%; width: 20%;">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="money-bill"><path fill="#88FF63" d="M6,11a1,1,0,1,0,1,1A1,1,0,0,0,6,11Zm12,0a1,1,0,1,0,1,1A1,1,0,0,0,18,11Zm2-6H4A3,3,0,0,0,1,8v8a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V8A3,3,0,0,0,20,5Zm1,11a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V8A1,1,0,0,1,4,7H20a1,1,0,0,1,1,1ZM12,9a3,3,0,1,0,3,3A3,3,0,0,0,12,9Zm0,4a1,1,0,1,1,1-1A1,1,0,0,1,12,13Z"></path></svg>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Renda mensal</span>
                          <h3 class="card-title mb-2">Este mês: R$ {{ number_format($data['renda_total'], 2, ',', '.') }}</h3>
                        </div>
                    </div>

                  </div>
                </div>

                <div class="table-container" id="table-container" style="margin: 10%; display: none;">
                  <div class="card" style="width: 100%">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7" style="width: 100%">
                        <div class="card-body">

                        @php

                          $labelsProvider = ['id', 'Nome', 'Email', 'cnpj'];

                          $labelsPlans = ['id', 'Nome', 'Velocidade', 'Tipo', 'Preço'];

                          $labelsContract = ['cliente', 'CNPJ', 'cidade', 'valor', 'início', 'fim'];

                          $values = $data['plans']

                        @endphp

                          <div class="table-provider" id="table-provider">
                            <x-table.table-component :title="'Lista de provedores'" :labels="$labelsProvider" :values="$data['users']" :whoAre="'providers'" functionClose="closeTable"/>
                          </div>

                          <div class="table-plans" id="table-plans">
                            <x-table.table-component :title="'Lista de planos'" :labels="$labelsPlans" :values="$data['plans']" :whoAre="'plans'" functionClose="closeTable"/>
                          </div>

                          <div class="table-cotracts" id="table-contract">
                            <x-table.table-component :title="'Lista de contratos'" :labels="$labelsContract" :values="$data['contract']" :whoAre="'contracts'" functionClose="closeTable"/>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              
              <div class="row" >
                <!-- Order Statistics -->

                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4" style="width: 50%;">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Tipos de plano</h5>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">Confira os planos mais comprados</h2>
                        </div>
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                              ><i class="bi bi-eye"></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Fibra ótica</h6>
                            </div>
                          </div>
                        </li>

                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bi bi-ethernet"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Cabo HTC</h6>
                            </div>
                          </div>
                        </li>
                        
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bi bi-rocket"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Satélite</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary">
                              <i class="bi bi-telephone"></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">ADSL</h6>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4" style="width: 50%;">
                  <div class="card h-100">
                    <div class="card-header">
                     
                    </div>
                    <div class="card-body px-0">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                          <div class="d-flex p-4 pt-3">
                          </div>
                          <div id="incomeChart"></div>
                          <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                              <div id="expensesOfWeek"></div>
                            </div>
                            <div>
                              <p class="mb-n1 mt-1">Novos clientes na ultima temporada</p>
                              <small class="text-muted">$39 less than last week</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

              </div>
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>

      const tableContainer = document.getElementById('table-container')

  function showTable(tableId) {

    document.getElementById('table-provider').style.display = 'none';
    document.getElementById('table-plans').style.display = 'none';
    document.getElementById('table-contract').style.display = 'none';

    tableContainer.style.display = 'block';

    const table = document.getElementById(tableId);
    if (table) {
      table.style.display = 'block';
    }
  }

  function closeTable(){
    tableContainer.style.display = 'none'
  }
</script>

</x-app-layout>
