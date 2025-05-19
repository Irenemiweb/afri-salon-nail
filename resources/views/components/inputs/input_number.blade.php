

<gualazon-number-input class=" d-block">
    <div class="label">
        @isset($textDivLabel){{ $textDivLabel }}@endisset
        <span style="font-size: xx-small">
            {{-- Comprueba si existe la variable--}}
            @isset($spantext){{ $spantext }}@endisset
        </span>
    </div>
    <div class="form-groupInput mb-3">
        <input type="text" placeholder=" "
            class="gualazonF p-3" id="{{ $inputIdNameLabelFor }}"
            value=""  maxlength="{{ $maxlength }}"
            name="{{ $inputIdNameLabelFor }}" required autofocus
            oninput="this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        <label for="{{ $inputIdNameLabelFor }}">{{ $labelPlaceHolder }}</label>
    </div>
</gualazon-number-input>
