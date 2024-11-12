@extends('layouts.app')
@section('content')
@section('title', 'Üzemanyag (GET Fuel)')

<div>
    @include('success')
    <a class="btn" href="{{route("createFuel")}}" title="Új">Új Fuel hozzáadása</a>
    <a class="order" href="{{route("fuels", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">ABC</a>
    <a class="order" href="{{route("fuels", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">ZYX</a>

    <table class="editable">
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
                        <!-- <input type="button" class="btn" onclick="editRow()" value="Módosít">
                                                        <input style="display: none;" type="button" class="btn" onclick={{route('storeFuel', $entity->id)}}
                                                            value="Mentés">

                                                        <input type="button" class="btn" onclick="{}" value="Töröl"> -->

                        <!-- EDIT -->
                        <a class="btn" href="{{ route('editFuel', $entity->id) }}">
                            Módosít
                        </a>

                        <!-- DELETE -->
                        <div class="col">
                            <form action="{{route('destroyFuel', $entity->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit" name="btn-del-fuel">
                                    Törlés
                                </button>

                            </form>
                    </td>


                </tr>

                <!-- ÁKOS -->
                <!-- <tr>
                                                                                                <td><a href="route("editMakers", $entity->id)">Szerkesztés</a></td>
                                                                                                <td>
                                                                                                    <form action="route("deleteMakers", $entity->id)" method="post">
                                                                                                        @csrf
                                                                                                        @method("DELETE")
                                                                                                        <button type="submit">Törlés</button>
                                                                                                    </form>
                                                                                                </td>
                                                                                            </tr> -->
            @endforeach
        </tbody>
    </table>
</div>
@endsection