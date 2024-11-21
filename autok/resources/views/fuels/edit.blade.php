@extends('layouts.app')

@section('content')
<h1>Fuel módosítása</h1>
<div>
    @include('error')
    @include('success')
    <form action="{{ route('fuels.update', $entity->id) }}" method="post">
        @csrf
        @method('PATCH')
        <fieldset>
            <label for="name">Megnevezés</label>
            <input type="text" id="name" name="name" required value="{{ old('name', $entity->name) }}">
        </fieldset>

        <button class="btn" type="submit">Mentés</button>
        <a class="btn" href="{{ route('fuels.index') }}">Mégse</a>
    </form>
</div>
@endsection