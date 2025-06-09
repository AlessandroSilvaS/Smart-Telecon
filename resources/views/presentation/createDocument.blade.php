<!DOCTYPE html>
<html lang="pt_br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart | Gerar contrato</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
</head>
<body>
  <div class="form-container" style="width: 50%; margin: 0 auto; margin-top: 5%;">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Gerar Contrato</h5>
          <small class="text-muted float-end">Informações obrigatórias</small>
        </div>
        <div class="card-body">

          <!-- FORMULÁRIO CORRETO -->
          <form method="POST" action="{{ route('presentation.generateDocument') }}">
            @csrf

            <div class="mb-3">
              <label class="form-label" for="cnpj">CNPJ</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ Auth::user()->cnpj ?? '' }}" required />
            </div>

            <div class="mb-3">
              <label class="form-label" for="cidade">Cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Nome da cidade" required />
            </div>

            <div class="mb-3">
              <label class="form-label" for="valor">Valor do Contrato (R$)</label>
              <input type="text" class="form-control" id="valor" name="valor" placeholder="000,00" required />
            </div>

            <div class="mb-3">
              <label class="form-label" for="vigencia_inicio">Vigência</label>
              <div class="d-flex gap-2">
                <input type="date" class="form-control" id="vigencia_inicio" name="vigencia_inicio" required />
                <input type="date" class="form-control" id="vigencia_fim" name="vigencia_fim" required />
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Gerar Documento</button>
            <button type="button" class="btn btn-primary" onClick="history.back()">Cancelar</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
