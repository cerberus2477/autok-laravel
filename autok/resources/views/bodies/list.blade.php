@extends('layouts.app')
@section('content')
@section('title', 'Karosszériák (GET Bodies)')

<div>
    <h3>Frissíteni kéne a Fuels táblából</h3>
    <a class="btn" href="{{route("createBody")}}">Új Body hozzáadása</a>
    <a class="order" href="{{route("bodies", ["sort_by" => "name", "sort_dir" => "asc"])}}" title="ABC">ABC</a>
    <a class="order" href="{{route("bodies", ["sort_by" => "name", "sort_dir" => "desc"])}}" title="ZYX">ZYX</a>

    <table class="editable">
        <thead>
            <tr>
                <th>#</th>
                <th>Megnevezés</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td id="{{$entity->id}}">{{$entity->id}}</td>
                    <td>{{$entity->name}}</td>
                    <td>
                        <input type="button" class="btn" onclick="editRow()" value="Módosít">
                        <input style="display: none;" type="button" class="btn" onclick={{route('saveBody', $entity->id)}}
                            value="Mentés">
                        <input type="button" class="btn" onclick="{{route('deleteBody', $entity->id)}}" value="Töröl">
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