@extends('layouts.app')
@section('content')
@section('title', 'Üzemanyag')

<div>
    @include('success')
    @include('error')
    <a class="btn" href="{{route("fuels.create")}}" title="Új">Új Fuel hozzáadása</a>
    <!-- <a class="order" href="{{route("fuels.index", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">ABC</a>
    <a class="order" href="{{route("fuels.index", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">ZYX</a> -->

    <h1>Fuels</h1>
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