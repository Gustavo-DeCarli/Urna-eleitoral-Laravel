@extends('base.index')

@section('container')

<H1 class="container text-center">Voto Realizado!!!!</h1>
<audio style='visibility:hidden' id="audio1" autoplay controls>
    <source src="{{ asset('som/som.mp3') }}" type="audio/mp3" />
</audio>
@endsection