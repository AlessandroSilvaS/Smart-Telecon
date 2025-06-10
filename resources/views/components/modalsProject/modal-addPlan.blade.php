<form action="{{ route('plan.store') }}" method="POST">
  @csrf

  <div class="col-lg-4 col-md-6">
    <div class="modal fade" id="plansAdd" tabindex="-1" aria-hidden="true">
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
            <!-- Linha 1 -->
            <div class="row g-2">
              <div class="col mb-0">
                <label for="name_plan" class="form-label">Nome do plano</label>
                <input
                  type="text"
                  id="name_plan"
                  name="name_plan"
                  class="form-control"
                  placeholder="Dê um nome ao seu plano..."
                  style="border-radius: 5px; border: 0.5px solid #000000;"
                />
              </div>
              <div class="col mb-0">
                <label for="speed_plan" class="form-label">Velocidade</label>
                <input
                  type="text"
                  id="speed_plan"
                  name="speed_plan"
                  class="form-control"
                  placeholder="Velocidade em Mbps..."
                  style="border-radius: 5px; border: 0.5px solid #000000;"
                />
              </div>
            </div>

            <!-- Linha 2 -->
            <div class="row g-2">
              <div class="col mb-0">
                <label for="type_plan" class="form-label">Tipo</label>
                <select 
                  class="form-select" 
                  id="type_plan"
                  name="type_plan" 
                  aria-label="Default select example" 
                  style="border: 0.5px solid #000000;"
                  onchange="updatePrice()"
                >
                  <option selected disabled>Escolha o tipo de rede</option>
                  <option value="Óptica">Fibra óptica</option>
                  <option value="HTC">Cabo HFC</option>
                  <option value="ADSL">ADSL</option>
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
                  readonly
                  placeholder="Preço definido automaticamente"
                  style="border-radius: 5px; border: 0.5px solid #000000; background-color: #f8f9fa;"
                />
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function updatePrice() {
    const type = document.getElementById("type_plan").value;
    const priceField = document.getElementById("price_plan");

    let price = "";

    switch (type) {
      case "Óptica":
        price = "99.90";
        break;
      case "HTC":
        price = "89.90";
        break;
      case "ADSL":
        price = "79.90";
        break;
      case "Satélite":
        price = "149.90";
        break;
      default:
        price = "";
    }

    priceField.value = price;
  }
</script>
