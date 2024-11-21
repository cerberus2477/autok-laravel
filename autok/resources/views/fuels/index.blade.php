@extends('layouts.app')
@section('content')
@section('title', 'Üzemanyag')

<div>
    @include('success')
    @include('error')

    <div class="title-add">
        <h1>Fuels</h1>
        <a href="{{ route('fuels.create') }}" class="btn btn-add">Új rekord hozzáadása <i
                class="fa-solid fa-plus"></i></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Üzemanyag</th>
                <th>Gombok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td id="{{$entity->id}}">{{$entity->id}}</td>
                    <td>{{$entity->name}}</td>

                    <td>
                        <!-- EDIT -->
                        <a class="btn" href="{{ route('fuels.edit', $entity->id) }}">
                            Módosít
                        </a>

                        <!-- DELETE -->
                        <div class="col">
                            <form action="{{route('fuels.destroy', $entity->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit" name="btn-del-fuel">
                                    Törlés
                                </button>

                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection