<li class="list-group-item p-2 category-list-option align-items-center"
    style="cursor: pointer;"
    data-category-name="{{ $name }}">
    <span class="ms-3">{{ $name }}</span>
    <input class="form-check-input" type="checkbox" name="categoria_product" value="{{ $name }}" id="categoria{{ Str::slug($name, '_') . (isset($index) ? $index : '') }}">
    <label class="ms-3" for="categoria{{ Str::slug($name, '_') . (isset($index) ? $index : '') }}"></label>
</li>
