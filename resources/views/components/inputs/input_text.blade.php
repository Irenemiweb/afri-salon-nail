<gualazon-text-input class=" d-block">
    <div class="form-groupInput mb-3">
        <input type="text" placeholder=" "
            class="gualazonF p-3" id="{{ $inputIdNameLabelFor }}"
            value="" required autofocus
            name="{{ $inputIdNameLabelFor }}"
            onblur="{{ $onblurAction }}"/>
        <label for="{{ $inputIdNameLabelFor }}">{{ $labelPlaceHolder }}</label>
    </div>
</gualazon-text-input>
