@extends('layouts.app')

@section('content')
<h1>Új Fuel</h1>
<div>
    @include('error')
    @include('success')
    <form action="{{route('fuels.store')}}" method="post">
        @csrf
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name">
        </fieldset>
        <button class="btn" type="submit">Ment</button>
        <a class="btn" href="{{ route('fuels.index') }}">Mégse</a>
    </form>
</div>
@endsection