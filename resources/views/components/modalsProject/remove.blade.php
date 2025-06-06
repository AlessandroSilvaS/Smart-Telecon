@props(['plan'])

<div class="modal fade" id="modalToggle2" tabindex="-1" aria-labelledby="modalToggleLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('provider.removePlan', $plan->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="alert alert-danger m-3">Cuidado! - Você está certo do que faz?</div>
        <p class="m-3" id="confirm-delete">Realmente quer apagar esse plano?</p>

        <div class="m-3" style="display: flex; gap: 10px;">
          <button type="button" class="btn btn-primary" style="background-color:#04b0d3" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary" style="background-color: #04b0d3;">
            Deletar registro
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
