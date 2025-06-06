@props(['plan'])

<div class="modal fade" id="modalToggle" tabindex="-1" aria-labelledby="modalToggleLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Editar plano</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('provider.update', $plan->id) }}">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <input type="text" name="name_plan" id="basic-default-name" class="form-control" />
              </div>
              <div class="mb-3">
                <input type="text" name="speed_plan" id="basic-default-speed" class="form-control"  />
              </div>
              <div class="mb-3">
                <input type="text" name="type_plan" id="basic-default-type" class="form-control"  />
              </div>
              <div class="mb-3">
                <input type="text" name="price_plan" id="basic-default-price" class="form-control"  />
              </div>

              <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary" style="background-color: #04b0d3;">Salvar</button>
                <button type="button" data-bs-target="#modalToggle2" data-bs-toggle="modal"
                  data-bs-dismiss="modal" class="btn btn-primary" style="background-color: #04b0d3;">
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
