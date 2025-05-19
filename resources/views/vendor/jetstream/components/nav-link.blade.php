@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active font-weight-bolder'
            : 'nav-link';
@endphp

<li class="nombreSubmarca nav-item align-items-center" style="display:flex">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
