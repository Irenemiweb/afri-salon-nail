@props(['id_inputSearchClient', "onkeyup"])

<div class="" style="width: 100%">
    <div class="w-100 d-flex align-items-center searchbox-form_SearchBox__wrapper__6HWA_">
        <img
            class="searchbox-form_SearchBox__icon--magnifier__yXxdh"
            src="{{ asset('storage/buscador/search-icon.svg') }}" width="20" height="20"
            alt="Search Icon Magnifier">
        <div class="searchbox-form_SearchBox__fakePlaceholder__VhWWB w-100 position-absolute pl-5">
            <span class=""> Buscar servicio</span>

        </div>
        <input style="font-family: 'gualazonF';font-weight: 700;" onkeyup="buscar('#{{ $id_inputSearchClient }}')" id="{{ $id_inputSearchClient }}" type="search" class="searchbox-form-input w-100 searchbox-form_SearchBox__input__kl64p"
            autocomplete="off" value="">
    </div>
</div>

{{-- <div class="customers_search_qPU6u">
    <div class="styles_container_pjyTj styles_size--sm_dOZPQ styles_theme--filled_LnEz6 styles_theme--default_x92vh b-input-search_field_enuVF customers_searchInput_x0x6f">
        <div class="styles_outerWrapper_NumuG" style="min-width: 0px;">
            <div class="styles_wrapper_hb1CA">
                <div class="styles_slotLeft_k29Ng">
                    <span class="b-icon iconFont icon-search b-input-search_icon_HSN65" style="font-size: 24px;"></span>
                </div>
                <input onkeyup="{{ $onkeyup }}" placeholder="Buscar cliente..." data-testid="customer-search" id="{{ $id_inputSearchClient }}" name="customer-search" type="search" role="search" autocomplete="off" inputmode="text" class="styles_field_Bhxvq" style="min-width: 0px;">
            </div>
        </div>
    </div>
</div> --}}
