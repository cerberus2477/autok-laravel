@extends('layouts.app')
@section('content')
@section('title', 'Autómodellek (GET carModel)')

<div>
    <!-- <input type="button" class="btn" value="Új carModel hozzáadása" onclick={{route('createCarModel')}}> -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>GyártóID</th>
                <th>Típus</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($entities as $entity)
                <tr>
                    <td id="{{$entity->id}}">{{$entity->id}}</td>
                    <td>{{$entity->makerId}}</td>
                    <td>{{$entity->name}}</td>
                    <!-- <td>
                            <input type="button" class="btn" onclick="editRow()" value="Módosít">
                            <input style="display: none;" type="button" class="btn" onclick={{route('fuels')}} value="Mentés">
                            <input type="button" class="btn" onclick="{{route('fuels')}}" value="Töröl">
                        </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection