<!DOCTYPE html>
<html
  lang="pt-br"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Smart | Seus provedores</title>

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

<!-- Icons -->
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />
<link rel="stylesheet" href="/assets/css/provider.css">

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!-- Config -->
<script src="../assets/js/config.js"></script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <x-app-layout>

    <div class="layout-wrapper layout-content-navbar">

      <div class="layout-container-tables-project">

          <div class="container-initial-informations">

            
              <x-slot name="header">
                  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                      {{ __('Provedores') }}
                  </h2>
              </x-slot>

            <div class="initial-informations-title-and-subtitle">

              <div class="initial-information-title">

                <h1>Bem vindo(a), {{ explode(' ', Auth::user()->name)[0] }}!</h1>

              </div>

              <div class="initial-informations-subtitle">

                <h3>Monitore ativamente seus provedores.</h3>

              </div>

            </div>

          </div>

          <!-- <div class="menssage-container" style='width: 100%;'>

              <x-mensage-box :title="'Sucesso!'" :text="'Operação bem sucedida!'" :typeMensage="'s'" :widthDimension="'20%'"/>

          </div> -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <hr class="my-5" />

              <!-- Bootstrap Table with Header - Dark -->
              <div class="card">

                    <h5 class="card-header" style="font-size: 36px">Seus planos</h5>

                    <!--butões de gerar documento e adicionar plano-->

                    <div class="buttons-area">

                      <a href='/provider/createDocument' class='buttons-area-buttons'><i class="bi bi-file-earmark-bar-graph fs-4"></i></a>

                      <button class="buttons-area-buttons"><i class="bi bi-search"></i></button>

                      <button class="buttons-area-buttons" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class="bi bi-plus fs-4"></i></button>

                    </div>

                <!--Modal to add-->

                    <form action="{{route('provider.store')}}" method="POST">
                      <div class="col-lg-4 col-md-6">

                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Adicione um plano novo!</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <!-- <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input
                                      type="text"
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    />
                                  </div>
                                </div> -->

                            <!--Linha 1-->
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="name_plan" class="form-label">Nome do plano</label>
                                    <input
                                      type="text"
                                      id="name_plan"
                                      name="name_plan"
                                      class="form-control"
                                      placeholder="De um nome ao seu plano..."
                                      style="border-radius: 5px; border: 0.5px solid #000000;"
                                    />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="speed-plan" class="form-label">Velocidade</label>
                                    <input
                                      type="text"
                                      id="speed_plan"
                                      name="speed_plan"
                                      class="form-control"
                                      placeholder="Velocidade em mgb.."
                                      style="border-radius: 5px; border: 0.5px solid #000000;"
                                    />
                                  </div>
                                </div>

                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="type_plan" class="form-label">Tipo</label>
                                    <select 
                                      class="form-select" 
                                      id="type_plan"
                                      name="type_plan" 
                                      aria-label="Default select example" 
                                      style="border: 0.5px solid #000000;">

                                      <option selected>Open this select menu</option>
                                      <option value="Optíca">Optíca</option>
                                      <option value="HTC">Cabo Hfc</option>
                                      <option value="ADSL">Adsl</option>
                                      <option value="Satélite">Satélite</option>
                                    </select>
                                  </div>
                                  <div class="col mb-0">
                                    <label for="price_plan" class="form-label">Preço</label>
                                    <input
                                      type="text"
                                      id="price_plan"
                                      name="price_plan"
                                      class="form-control"
                                      placeholder="Valor do plano..."
                                      style="border-radius: 5px; border: 0.5px solid #000000;"
                                    />
                                  </div>
                                </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @csrf

                
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th>Nome</th>
                      <th>Velocidade</th>
                      <th>Tipo</th>
                      <th>Preço</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">

                    @foreach($plans as $plan):

                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$plan->name_plan}}</strong></td>
                        <td>{{$plan->speed_plan}} mgb</td>
                        <td>{{$plan->type_plan}}</td>
                        <td>{{$plan->price_plan}}</td>
                        <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);">
                                  <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);">
                                  <i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Bootstrap Table with Header Dark -->

 
            

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        
        <!-- / Layout page -->
      </div>

    </div>

    </x-app-layout>

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
