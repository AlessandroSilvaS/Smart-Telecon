<form action="{{ route('provider.store') }}" method="POST">
  @csrf

  <div class="modal fade" id="providerAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicione um novo usuário!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row g-2">
            <label for="name" class="form-label">Nome</label>
            <input
              type="text"
              id="name"
              name="name"
              class="form-control"
              placeholder="Nome do novo provedor"
              required
            />
            @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="example@gmail.com"
              required
            />
            @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="password" class="form-label">Senha</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"
              placeholder="****"
              required
            />
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="cnpj" class="form-label">CNPJ</label>
            <input
              type="text"
              id="cnpj"
              name="cnpj"
              class="form-control"
              placeholder="00.000.000/0000-00"
            />
            @error('cnpj')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</form>
