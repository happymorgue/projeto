<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Posto de Polícia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="editMoradaPosto">Morada</label>
            <input type="text" class="form-control" id="editMoradaPosto">
          </div>
          <div class="form-group">
            <label for="editTelemovelPosto">Telemóvel</label>
            <input type="text" maxlength="9" class="form-control" id="editTelemovelPosto">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="salvarAlteracoes()" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>