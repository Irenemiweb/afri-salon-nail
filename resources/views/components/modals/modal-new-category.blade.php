<div>
  <!-- Modal -->
{{-- <div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newCategoryModalLabel">Nueva categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="newCategoryModalLabel">Crear categoria</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-groupInput mb-3">
                <input type="text" placeholder=" " name="nombreCategoria"
                    class="gualazonF inputsNewService" id="nombreNuevaCategoria"
                    value="{{ old('nombreCategoria') }}" required
                    onblur="verificarInput('titulo')"/>
                <label for="nombreCategoria" class="styles_label_hleTI">Nombre de la categoría</label>
            </div>
            <div class="">
                <label for="imagen">Imagen de la categoría:</label>
                <!-- Contenedor con el "+" en el centro -->
                <div id="image-selector" class="image-selector" onclick="document.getElementById('imagenCategoria').click()">
                    <img id="preview-image" src="" alt="Vista previa" style="display:none;">
                    <span id="plus-sign" class="plus-sign">+</span>
                    <input type="file" name="imagenCategoria" id="imagenCategoria" class="d-none" accept="image/*">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button onclick="storageNewCategory();" type="button" data-bs-dismiss="modal" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</div>
