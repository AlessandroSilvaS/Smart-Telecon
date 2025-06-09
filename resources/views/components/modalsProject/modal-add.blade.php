 <form action="{{route('provider.store')}}" method="POST">

    @csrf

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

                                      <option selected>Escolha o tipo de rede</option>
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