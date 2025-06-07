<div class="col-lg-4 col-md-6">
  <div class="mt-3">
    <div class="modal fade" id="modalFilter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Filtrar tabela</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <div class="modal-body">

            <div class="filter-whith-name" id="filter-wn">

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Tabela Específica</label>
                        <input
                        type="text"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder="Nome da tabela.."
                        />
                    </div>
                </div>

            </div>

            <div class="form-check form-check-inline">

                <input class="form-check-input" id="check" type="checkbox" id="inlineCheckbox2" value="option2" />
                <label class="form-check-label"  for="inlineCheckbox2" id="label-check">Ou filtre por caracteristcas</label>

            </div>

            <div class="filter-with-check" id="filter-wc" style="display: none;">

                <div class="row g-2">
                    <div class="col-md">

                        <div class="form-check form-check-inline mt-3">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio1"
                                value="option1"
                            />
                            <label class="form-check-label" for="inlineRadio1">Velocidade</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                id="inlineRadio2"
                                value="option2"
                            />
                            <label class="form-check-label" for="inlineRadio2">Preço</label>
                        </div>

                        <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="inlineRadioOptions"
                            id="inlineRadio2"
                            value="option2"
                        />
                        <label class="form-check-label" for="inlineRadio2">Tipo de rede</label>
                        </div>

                    </div>
                </div>
            </div>
          </div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-outline-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>

    const filterWName = document.getElementById('filter-wn')
    const filterWChecks = document.getElementById('filter-wc')

    const checkBox = document.getElementById('check')
    const labelCheck = document.getElementById('label-check')

    function atualized(){

        if(!checkBox.checked){

            filterWName.style.display = 'block'
            filterWChecks.style.display = 'none'

            labelCheck.textContent = 'Filtrar por catcterísticas'

        }else{

            filterWName.style.display = 'none'
            filterWChecks.style.display = 'block'

            labelCheck.textContent = 'Buscar um valor específico'

        }

    }

    atualized()

    checkBox.addEventListener('change', atualized)

</script>