@if ($errors->any())
<div style="">
    <div style="" class="alert alert-success-dark d-flex p-4 rounded-3" role="alert">
        <i style="font-size: 30px" class="fa fa-exclamation-triangle text-danger me-3 align-self-center" aria-hidden="true"></i>
        <div class="mb-0">
                {{ __('Whoops! Algo ha ido mal.') }}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn-close btn-sm ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if ($errors->updateProfileInformation->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->updateProfileInformation->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
