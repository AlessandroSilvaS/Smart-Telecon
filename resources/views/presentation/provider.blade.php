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

    <title>Smart | Seus planos</title>

    <meta name="description" content="" /><!-- Favicon -->
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
<link rel="stylesheet" href="/assets/css/provider.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!-- Config -->
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/config.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  </head>

  <body>
    <!-- Layout wrapper -->
    <x-app-layout>

    <div class="layout-wrapper layout-content-navbar" >

      <div class="layout-container-tables-project">

          <div class="container-initial-informations">

            <div class="initial-informations-title-and-subtitle">

          <!--Título e subtitulo-->

              <div class="initial-information-title">

                <h1>Bem vindo(a), {{ explode(' ', Auth::user()->name)[0] }}!</h1>

              </div>

              <div class="initial-informations-subtitle">

                <h3>Monitore ativamente seus planos.</h3>


              </div>

            </div>

          </div>

          <!--Edit and delete modals-->

           <div class="col-lg-4 col-md-6">
                      <div class="mt-3">

                        <!-- Modal 1-->
                        <div
                          class="modal fade"
                          id="modalToggle"
                          aria-labelledby="modalToggleLabel"
                          tabindex="-1"
                          style="display: none"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content"> <div class="col-xxl">
                              <div class="card mb-4">      
                                <div class="card-header d-flex align-items-center justify-content-between">
                                  <h5 class="mb-0">Editar coluna</h5>
                                </div>
                                <div class="card-body">

                                @if(Auth()->check())

                                  @php

                                    $itemId = request()->query('id');
                                    
                                    $planItem = App\Models\UserPlan::find($itemId);

                                  @endphp

                                  @if($planItem)
                                  
                                  <form>

                                    <div class="row mb-3">
                                      <div class="col-sm-12">
                                       <input type="text" class="form-control" id="basic-default-name1" value={{$planItem->name_plan}} placeholder="John Doe" />
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" id="basic-default-name2" value={{$planItem->speed_plan}} placeholder="John Doe" />
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" id="basic-default-name3" value={{$planItem->type_plan}} placeholder="John Doe" />
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <div class="col-sm-12">
                                        <input type="text" class="form-control" id="basic-default-name4" value={{$planItem->price_plan}} placeholder="John Doe" />
                                      </div>
                                    </div>

                                  

                                    <div style="display: flex; gap: 10px;">

                                      <div class="row justify-content-start">
                                        <div class="col-sm-12">
                                          <button type="submit" class="btn btn-primary" style="background-color: #04b0d3;">Salvar</button>
                                        </div>
                                      </div>

                                      <div class="row justify-content-start">
                                        <div class="col-sm-12">
                                          <button type="button" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" style="background-color: #04b0d3;" class="btn btn-primary">Deletar registro</button>
                                        </div>
                                      </div>

                                    </div>

                                  </form>
                                  @endif
                                  @endif
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal 2-->
                         
                        <div
                          class="modal fade"
                          id="modalToggle2"
                          aria-hidden="true"
                          aria-labelledby="modalToggleLabel2"
                          tabindex="-1"
                        >
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                            @if(Auth()->check())

                                  @php

                                    $itemId = request()->query('id');
                                    
                                    $planItem = App\Models\UserPlan::find($itemId);

                                  @endphp

                                  @if($planItem)

                            <form action="{{route('provider.removePlan', $planItem->id)}}" method="POST">

                                @csrf
                                @method('DELETE')

                                <div class="alert alert-danger" role="alert" style="margin:30px">Cuidado! - Você está certo do que faz?</div>

                                <p style="margin: 5%;" id='confirm-delete'>Realmente quer apagar esse plano?</p>

                                <div style="display: flex; gap: 10px; margin: 5%;">

                                      <div class="row justify-content-start">

                                        <div class="col-sm-12">
                                          <button type="submit" class="btn btn-primary" style="background-color:#04b0d3">Cancelar</button>
                                        </div>

                                      </div>

                                      <div class="row justify-content-start">

                                        <div class="col-sm-12">
                                          <button type="submit" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" style="background-color: #04b0d3;" class="btn btn-primary">Deletar registro</button>
                                        </div>
                                      </div>

                                  </div>

                            </form>
                            @endif
                            @endif

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y" style="margin-bottom: 10%;">


              <div class="card">

                    <h5 class="card-header" style="font-size: 36px">Seus planos</h5>

                    <small style="margin: 2%;">Clique em uma linha da tabela para edita-la</small>

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
                      <th>Data de criação</th>
                      <th>Ultima Edição</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">

                    @foreach($plans as $plan)

                      <tr onClick="openModal(1,'{{$plan->id}}')" style="cursor: pointer;">
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$plan->name_plan}}</strong></td>
                        <td>{{$plan->speed_plan}} mgb</td>
                        <td>{{$plan->type_plan}}</td>
                        <td>{{$plan->price_plan}}</td>
                        <td>{{$plan->created_at}}</td>
                        <td>{{$plan->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
 
      </div>

    </div>

    </x-app-layout>


    <script>

        function openModal(indexModal, itemId) {
    // Atualizar a URL sem recarregar a página
    history.pushState(null, null, '?id=' + itemId);

    // Função AJAX para buscar os dados do plano
    fetch(`/plan/${itemId}/details`)  // A URL que irá retornar os dados do plano
        .then(response => response.json())
        .then(data => {
            // Preencher os campos do modal com os dados do plano
            document.getElementById('basic-default-name1').value = data.name_plan;
            document.getElementById('basic-default-name2').value = data.speed_plan;
            document.getElementById('basic-default-name3').value = data.type_plan;
            document.getElementById('basic-default-name4').value = data.price_plan;
            document.getElementById('confirm-delete').value = data.name_plan;

            // Mostrar o modal apropriado com base no indexModal
            if (indexModal == 1) {
                const modal1 = new bootstrap.Modal(document.getElementById('modalToggle'));
                modal1.show();
                
                // Fechar modal2 caso aberto
                const modal2 = new bootstrap.Modal(document.getElementById('modalToggle2'));
                modal2.hide();
            } else if (indexModal == 2) {
                const modal2 = new bootstrap.Modal(document.getElementById('modalToggle2'));
                modal2.show();
                
                // Fechar modal1 caso aberto
                const modal1 = new bootstrap.Modal(document.getElementById('modalToggle'));
                modal1.hide();
            }
        })
        .catch(error => {
            console.error('Erro ao carregar os dados do plano:', error);
        });
}


    </script>

    <script>
    $(document).ready(function () {
      // Limpar os campos quando o modal for fechado
      $('#modalToggle').on('hidden.bs.modal', function () {
          document.getElementById('basic-default-name1').value = '';
          document.getElementById('basic-default-name2').value = '';
          document.getElementById('basic-default-name3').value = '';
          document.getElementById('basic-default-name4').value = '';
          document.getElementById('confirm-delete').value = ';'
      })
});

    </script>

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
