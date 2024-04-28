<!-- Modal -->
<div class="modal fade" id="licitarModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bidModalLabel">Introduza o valor da licitação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="licitarForm">
          <div class="">
          <div class="input-group">
            <span class="input-group-text">€</span> <!-- O formato do valor precisa ser modificado para ter os céntimos-->
            <input type="number" class="form-control" id="licitacaoUser" name="licitacaoUser" 
            placeholder="00.00" aria-label="licitacao" required>
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
