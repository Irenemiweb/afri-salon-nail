<div>
    <div class="modal fade" id="modifyCategoryModal" tabindex="-1" aria-labelledby="modifyCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modifyCategoryModalLabel">Modificar Categoria</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-groupInput mb-3">
                    <input type="text" placeholder=" " name="nombreNuevaCategoriaModificada"
                        class="gualazonF inputsNewService" id="nombreNuevaCategoriaModificada"
                        required
                        onblur="verificarInput('titulo')"/>
                    <label for="nombreNuevaCategoriaModificada" class="styles_label_hleTI">Nombre de la categoría</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row botonesModificarCategoria justify-content-between" style="width: 100%">
                    <div class="col-lg-4 col-md-12 mb-2 d-grid gap-2">
                        <button data-bs-dismiss="modal" type="submit" class="btn btn-dark w-100" id="submitModifyCategory">Modificar categoria</button>
                    </div>
                    <div class="col-lg-3 col-md-12 mb-2 d-grid gap-2">
                        <button style="border: 1px solid #c7cbd4;" type="submit" class="btn btn-lg btn-light w-100" id="submitDeleteCategory">
                            @include('iconos.icon-papeleraRoja')
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-2 d-grid gap-2">
                        <button data-bs-dismiss="modal" style="border: 1px solid #c7cbd4;" type="button" class="btn btn-light w-100" id="cancelModifyCategory">Cancelar</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
