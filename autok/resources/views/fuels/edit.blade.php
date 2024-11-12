@extends('layouts.app')
@section('content')
<div>
    @include('error')
    <form action="{{ route('updateFuel', $entity->id) }}" method="post">
        @csrf
        @method('PATCH')
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name" required value="{{ old('name', $entity->name) }}">
        </fieldset>

        <button class="btn" type="submit">Mentés</button>
        <a class="btn" href="{{ route('fuels') }}">Mégse</a>
    </form>
</div>
@endsection