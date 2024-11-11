@extends('layouts.app')
@section('content')
@section('title', 'Járművek (GET Jármű)')

<div>
    <a class="btn" href="{{route("createFuel")}}">Új Jármű hozzáadása</a>
    <a class="order" href="{{route("fuels", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">ABC</a>
    <a class="order" href="{{route("fuels", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">ZYX</a>

    <table class="editable">
        <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Sok mező....</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <!-- <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td id="{{$entity->id}}">{{$entity->id}}</td>
                    <td>{{$entity->name}}</td>
                    <td>
                        <input type="button" class="btn" onclick="editRow()" value="Módosít">
                        <input style="display: none;" type="button" class="btn" onclick={{route('saveFuel', $entity->id)}}
                            value="Mentés">
                        <input type="button" class="btn" onclick="{{route('deleteFuel', $entity->id)}}" value="Töröl">
                    </td>
                </tr> -->

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
        <!-- @endforeach
        </tbody> -->
    </table>
</div>
@endsection