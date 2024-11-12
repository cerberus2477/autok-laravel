@extends('layout')

<main>

    @yield('content')
</main>

@section('content')
<h1>Új karosszéria</h1>
<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <!-- ide íratjuk ki a validációs hibákat -->
    @include('error')

    <form action="{{route('bodies.store')}}" method="post">
        @csrf
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name">
        </fieldset>
        <button class="btn" type="submit">Ment</button>
        <a class="btn" href="{{ route('fuels') }}">Mégse</a>
    </form>
</div>
@endsection