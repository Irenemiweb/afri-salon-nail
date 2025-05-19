<style>
    @font-face {
    font-family: 'Garet-Book';
    /* src: url('{{ asset("fonts/GLAMOURGIRL.TTF") }}') format("truetype"); */
    src: url('../fonts/Garet-Book.otf') format('opentype');
}
.marca{
    font-family: 'Garet-Book'!important;
    font-size: 2rem;
    color: #298fc2;
    font-weight: bolder;
}
</style>
@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<h1 class="beauti">{{ config('app.name') }}</h1>
{{-- <img height="70" src='https://i.postimg.cc/3RzsRvwY/gualazon-Name.png'  alt='gualazon'/> --}}
{{-- {{ $slot }} --}}
@endif
</a>
</td>
</tr>
